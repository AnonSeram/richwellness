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
            'dataKamar' => DataKamar::all()
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data awal
        $validateData = $request->validate([
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
                ->withErrors(['ketersediaan' => 'Kamar tidak tersedia, silakan pilih kamar lain.'])
                ->withInput();
        }

        // Hitung total harga
        $jumlahMalam = (new \DateTime($request->tgl_check_out))
            ->diff(new \DateTime($request->tgl_check_in))->days;

        $totalHarga = $dataKamar->harga * $request->jumlah_kamar * $jumlahMalam;

        // Simpan data reservasi
        $validateData['harga'] = $totalHarga;
        $validateData['kode_booking'] = $this->generateBookingCode();
        $validateData['status_pembayaran'] = 'Belum Bayar';

        $dataReservasi = DataReservasi::create($validateData);
        $dataKamar->kurangiJumlahKamar($request->jumlah_kamar);

        // Jika metode pembayaran online, langsung redirect ke Midtrans
        if ($request->metode_pembayaran === 'online') {
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
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
        // Log semua data yang diterima untuk debugging
        Log::info('Midtrans Notification Received', [
            'headers' => $request->headers->all(),
            'body' => $request->all(),
            'raw_body' => $request->getContent()
        ]);

        // Ambil konfigurasi Midtrans
        $serverKey = config('midtrans.serverKey');
        
        try {
            // Ambil data dari request
            $orderId = $request->input('order_id');
            $transactionStatus = $request->input('transaction_status');
            $fraudStatus = $request->input('fraud_status', 'accept');
            $statusCode = $request->input('status_code');
            $grossAmount = $request->input('gross_amount');
            $signatureKey = $request->input('signature_key');

            Log::info('Midtrans Notification Parsed', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'status_code' => $statusCode,
                'gross_amount' => $grossAmount
            ]);

            // Validasi signature key
            $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);
            
            Log::info('Signature Validation', [
                'expected' => $expectedSignature,
                'received' => $signatureKey,
                'valid' => ($signatureKey === $expectedSignature)
            ]);

            // Untuk production, uncomment validasi signature ini
            // if ($signatureKey !== $expectedSignature) {
            //     Log::error('Invalid signature from Midtrans');
            //     return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
            // }

            $reservasi = DataReservasi::where('kode_booking', $orderId)->first();
            
            if (!$reservasi) {
                Log::error('Reservasi not found for order_id: ' . $orderId);
                return response()->json(['status' => 'error', 'message' => 'Reservasi not found'], 404);
            }

            $oldStatus = $reservasi->status_pembayaran;

            // Update status berdasarkan transaction_status
            if (($transactionStatus === 'capture' && $fraudStatus === 'accept') || $transactionStatus === 'settlement') {
                $reservasi->status_pembayaran = 'Sudah Bayar';
            } elseif ($transactionStatus === 'pending') {
                $reservasi->status_pembayaran = 'Pending';
            } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                $reservasi->status_pembayaran = 'Gagal';
            } else {
                $reservasi->status_pembayaran = 'Belum Bayar';
            }

            $reservasi->save();

            Log::info('Payment Status Updated', [
                'order_id' => $orderId,
                'old_status' => $oldStatus,
                'new_status' => $reservasi->status_pembayaran,
                'transaction_status' => $transactionStatus
            ]);

            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            Log::error('Midtrans Notification Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
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
            $keranjang = DataReservasi::where('email', auth()->user()->email)
                ->where('status_pembayaran', 'Belum Bayar')
                ->get();
        } elseif (session()->has('keranjang')) {
            $keranjang = DataReservasi::whereIn('kode_booking', session('keranjang'))->get();
        }

        return view('user.keranjang', compact('keranjang'));
    }

    public function lanjutkanPembayaran($kode_booking)
    {
        $dataReservasi = DataReservasi::where('kode_booking', $kode_booking)
            ->where('status_pembayaran', 'Belum Bayar')
            ->firstOrFail();

        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
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
            return back()->withErrors(['midtrans' => 'Gagal menghubungi Midtrans.']);
        }
    }

    public function riwayat()
    {
        $userId = auth()->id();

        // Muat rating agar bisa digunakan di blade
        $pemesanans = DataReservasi::with('rating')
            ->where('user_id', $userId)
            ->get();

        $bisaMemberiRating = $pemesanans->contains(function ($pesanan) {
            return $pesanan->status_pembayaran === 'Sudah Bayar';
        });

        return view('user.dashboard', compact('pemesanans', 'bisaMemberiRating'));
    }
}
