<?php

namespace App\Http\Controllers;

use App\Models\DataReservasi;
use App\Models\DataKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PemesananController extends Controller
{
    public function index()
    {
        return view('tamu.pesanReservasi', [
            'datakamar' => DataKamar::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data awal
        $validatedData = $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_hp' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'tipe_kamar' => 'required|exists:data_kamar,id',
            'jumlah_kamar' => 'required|integer|min:1',
            'tgl_check_in' => 'required|date|after_or_equal:today',
            'tgl_check_out' => 'required|date|after:tgl_check_in',
            'metode_pembayaran' => 'required|string|in:online,offline',
        ]);

        $dataKamar = DataKamar::findOrFail($request->tipe_kamar);

        if ($dataKamar->jumlah_kamar < $request->jumlah_kamar) {
            return redirect()->route('pesanReservasi.index')
                ->withErrors(['tipe_kamar' => 'Kamar tidak tersedia, silakan pilih kamar lain.'])
                ->withInput();
        }

        // Hitung total harga
        $jumlahMalam = (new \DateTime($request->tgl_check_out))->diff(new \DateTime($request->tgl_check_in))->days;
        $totalHarga = $dataKamar->harga * $request->jumlah_kamar * $jumlahMalam;

        // Simpan data reservasi
        $validatedData['harga'] = $totalHarga;
        $validatedData['kode_booking'] = $this->generateBookingCode();
        $validatedData['status_pembayaran'] = 'Belum Bayar';

        $dataReservasi = DataReservasi::create($validatedData);
        $dataKamar->kurangJumlahKamar($request->jumlah_kamar);

        // Jika metode pembayaran online, langsung redirect ke Midtrans
        if ($request->metode_pembayaran === 'online') {
            \Midtrans\Config::$serverKey = config('midtrans.serverkey');
            \Midtrans\Config::$isProduction = config('midtrans.isProduction');
            \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
            \Midtrans\Config::$is3ds = config('midtrans.is3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => $dataReservasi->kode_booking,
                    'gross_amount' => (int) $dataReservasi->harga,
                ],
                'customer_details' => [
                    'first_name' => $dataReservasi->nama_tamu,
                    'email' => $dataReservasi->email,
                    'phone' => $dataReservasi->no_hp,
                ],
            ];

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                return view('reservasi.bayar', [
                    'snapToken' => $snapToken,
                    'kode_booking' => $dataReservasi->kode_booking,
                    'dataReservasi' => $dataReservasi
                ]);
            } catch (\Exception $e) {
                Log::error('Midtrans Error: ' . $e->getMessage());
                return redirect()->route('pesanReservasi.index')
                    ->withErrors(['midtrans' => 'Gagal menghubungi Midtrans: ' . $e->getMessage()]);
            }
        }

        return redirect()->route('cetak.bukti', ['kode_booking' => $dataReservasi->kode_booking])
            ->with('message', 'Pemesanan berhasil!');
    }

    public function cetakBukti($kode_booking)
    {
        $post = DataReservasi::where('kode_booking', $kode_booking)->firstOrFail();
        return view('tamu.bukti', compact('post'));
    }

    public function handleNotification(Request $request)
    {
        try {
            // Log incoming request untuk debugging
            Log::info('Midtrans Notification Received', $request->all());
            
            \Midtrans\Config::$serverKey = config('midtrans.serverkey');
            \Midtrans\Config::$isProduction = config('midtrans.isProduction');

            $notif = new \Midtrans\Notification();
            $transaction = $notif->transaction_status;
            $fraud = $notif->fraud_status;
            $orderId = $notif->order_id;

            $reservasi = DataReservasi::where('kode_booking', $orderId)->first();
            
            if (!$reservasi) {
                Log::error('Reservasi not found for order_id: ' . $orderId);
                return response()->json(['status' => 'error', 'message' => 'Reservasi not found'], 404);
            }

            if (($transaction == 'capture' && $fraud == 'accept') || $transaction == 'settlement') {
                $reservasi->status_pembayaran = 'Sudah Bayar';
            } else {
                $reservasi->status_pembayaran = 'Belum Bayar';
            }

            $reservasi->save();
            
            Log::info('Payment status updated for order_id: ' . $orderId . ' to ' . $reservasi->status_pembayaran);
            
            return response()->json(['status' => 'ok']);
            
        } catch (\Exception $e) {
            Log::error('Midtrans Notification Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    private function generateBookingCode()
    {
        return 'BKG-' . strtoupper(substr(uniqid(), -6));
    }

    public function keranjang(Request $request)
    {
        $keranjang = [];

        if (auth()->check()) {
            $keranjang = DataReservasi::with('dataKamar')
                ->where('email', auth()->user()->email)
                ->where('status_pembayaran', 'Belum Bayar')
                ->get();
        } elseif (session()->has('keranjang')) {
            $keranjang = DataReservasi::with('dataKamar')
                ->whereIn('kode_booking', session('keranjang'))
                ->get();
        }

        return view('user.keranjang', compact('keranjang'));
    }

    public function lanjutkanPembayaran($kode_booking)
    {
        $dataReservasi = DataReservasi::where('kode_booking', $kode_booking)
            ->where('status_pembayaran', 'Belum Bayar')
            ->firstOrFail();

        \Midtrans\Config::$serverKey = config('midtrans.serverkey');
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $dataReservasi->kode_booking,
                'gross_amount' => (int) $dataReservasi->harga,
            ],
            'customer_details' => [
                'first_name' => $dataReservasi->nama_tamu,
                'email' => $dataReservasi->email,
                'phone' => $dataReservasi->no_hp,
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('reservasi.bayar', [
                'snapToken' => $snapToken,
                'kode_booking' => $dataReservasi->kode_booking,
                'dataReservasi' => $dataReservasi
            ]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return redirect()->back()
                ->withErrors(['midtrans' => 'Gagal menghubungi Midtrans: ' . $e->getMessage()]);
        }
    }
}

