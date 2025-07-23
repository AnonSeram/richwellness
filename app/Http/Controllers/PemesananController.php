<?php

namespace App\Http\Controllers;

use App\Models\DataKamar;
use App\Models\DataReservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PemesananController extends Controller
{
    public function index()
    {
        return view('tamu.pesanReservasi', [
            'dataKamar' => DataKamar::getKamarTersedia()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'tipe_kamar' => 'required|exists:data_kamar,id',
            'jumlah_kamar' => 'required|integer|min:1',
            'tgl_check_in' => 'required|date|after_or_equal:today',
            'tgl_check_out' => 'required|date|after:tgl_check_in',
            'metode_pembayaran' => 'required|in:online,offline',
        ]);

        $dataKamar = DataKamar::findOrFail($validatedData['tipe_kamar']);

        if ($dataKamar->jumlah_tersedia < $validatedData['jumlah_kamar']) {
            return redirect()->route('pesanReservasi.index')
                ->withErrors(['tipe_kamar' => 'Jumlah kamar tidak mencukupi.'])
                ->withInput();
        }

        // Hitung jumlah malam & harga
        $jumlahMalam = (new \DateTime($validatedData['tgl_check_out']))
                            ->diff(new \DateTime($validatedData['tgl_check_in']))->days;

        $totalHarga = $dataKamar->harga * $validatedData['jumlah_kamar'] * $jumlahMalam;

        // Simpan reservasi
        $validatedData['harga'] = $totalHarga;
        $validatedData['kode_booking'] = $this->generateBookingCode();
        $validatedData['status_pembayaran'] = 'Belum Bayar';

        try {
            $dataKamar->kurangiJumlahKamar($validatedData['jumlah_kamar']);
        } catch (\Exception $e) {
            return redirect()->route('pesanReservasi.index')
                ->withErrors(['tipe_kamar' => 'Kamar tidak mencukupi atau error saat mengurangi jumlah.'])
                ->withInput();
        }

        $dataReservasi = DataReservasi::create($validatedData);

        if ($validatedData['metode_pembayaran'] === 'online') {
            return $this->bayarDenganMidtrans($dataReservasi);
        }

        return redirect()->route('cetak.bukti', ['kode_booking' => $dataReservasi->kode_booking])
            ->with('message', 'Pemesanan berhasil!');
    }

    private function bayarDenganMidtrans($dataReservasi)
    {
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

    public function cetakBukti($kode_booking)
    {
        $post = DataReservasi::where('kode_booking', $kode_booking)->firstOrFail();
        return view('tamu.bukti', compact('post'));
    }

    public function handleNotification(Request $request)
    {
        try {
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
                return response()->json(['status' => 'error', 'message' => 'Reservasi tidak ditemukan'], 404);
            }

            if (($transaction == 'capture' && $fraud == 'accept') || $transaction == 'settlement') {
                $reservasi->status_pembayaran = 'Sudah Bayar';
            } elseif ($transaction == 'cancel' || $transaction == 'expire') {
                $reservasi->status_pembayaran = 'Gagal';
                // Jika dibatalkan, kembalikan kamar
                $dataKamar = DataKamar::find($reservasi->tipe_kamar);
                if ($dataKamar) {
                    $dataKamar->tambahJumlahKamar($reservasi->jumlah_kamar);
                }
            } else {
                $reservasi->status_pembayaran = 'Belum Bayar';
            }

            $reservasi->save();

            Log::info('Status pembayaran diupdate: ' . $orderId . ' menjadi ' . $reservasi->status_pembayaran);

            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('Notifikasi Midtrans gagal: ' . $e->getMessage());
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

        return $this->bayarDenganMidtrans($dataReservasi);
    }
}
