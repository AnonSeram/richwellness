<?php

namespace App\Http\Controllers;

use App\Models\DataReservasi;
use App\Models\DataKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $validateData = $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'tipe_kamar' => 'required|exists:data_kamar,id',
            'jumlah_kamar' => 'required|integer',
            'tgl_check_in' => 'required|date',
            'tgl_check_out' => 'required|date',
        ]);
    
        // Ambil data kamar berdasarkan ID kamar yang dipilih
        $dataKamar = DataKamar::find($request->tipe_kamar);
    
        // Jika data kamar tidak ditemukan
        if (!$dataKamar) {
            return redirect()->route('pesanReservasi.index')->withErrors(['ketersediaan' => 'Kamar tidak tersedia, silakan pilih kamar lain.'])->withInput();
        }
    
        // Jika jumlah kamar yang diminta melebihi ketersediaan
        if ($dataKamar->jumlah_kamar < $request->jumlah_kamar) {
            return redirect()->route('pesanReservasi.index')->withErrors(['ketersediaan' => 'Kamar tidak tersedia, silakan pilih kamar lain.'])->withInput();
        }
    
        // Hitung jumlah malam
        $tglCheckIn = new \DateTime($request->tgl_check_in);
        $tglCheckOut = new \DateTime($request->tgl_check_out);
        $jumlahMalam = $tglCheckOut->diff($tglCheckIn)->days;
    
        // Hitung total harga berdasarkan harga kamar, jumlah kamar, dan jumlah malam
        $totalHarga = $dataKamar->harga * $request->jumlah_kamar * $jumlahMalam;
    
        // Buat data reservasi jika kamar tersedia
        $validateData['tipe_kamar'] = $dataKamar->tipe_kamar;
        $validateData['harga'] = $totalHarga; // Simpan total harga ke dalam data reservasi
        $validateData['kode_booking'] = $this->generateBookingCode(); // Tambahkan kode booking unik
        $dataReservasi = DataReservasi::create($validateData);
    
        // Kurangi jumlah kamar yang tersedia
        $dataKamar->kurangiJumlahKamar($request->jumlah_kamar);
    
        // Redirect sesuai metode pembayaran
        if ($request->metode_pembayaran === 'online') {
            return redirect()->route('bukti.online')->with('message', 'Pemesanan berhasil!');
        } else {
            return redirect()->route('cetak.bukti')->with('message', 'Pemesanan berhasil!');
        }
    }

    private function generateBookingCode()
    {
        $code = Str::upper(Str::random(6));

        // Pastikan kode booking unik
        while (DataReservasi::where('kode_booking', $code)->exists()) {
            $code = Str::upper(Str::random(6));
        }

        return $code;
    }
    public function updateStatus(Request $request, $id)
    {
        $reservation = DataReservasi::findOrFail($id);
        $reservation->status_pembayaran = $request->status_pembayaran;
        $reservation->save();
    
        return response()->json(['success' => true]);
    }
    
    public function showBuktiOnline()
    {
        
        $post = DataReservasi::latest()->first(); // Ambil hanya satu bukti reservasi terbaru
        return view('tamu.buktiOnline', compact('post'));
    }
    
    public function cetakBukti()
    {
        $post = DataReservasi::latest()->first(); // Ambil hanya satu bukti reservasi terbaru
        return view('tamu.bukti', ['post' => $post]);
    }
}
