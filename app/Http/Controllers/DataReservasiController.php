<?php

namespace App\Http\Controllers;

use App\Models\DataReservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataReservasiController extends Controller
{
    /**
     * Tampilkan semua data reservasi.
     */
    public function index()
    {
        return view('admin.dataReservasi.index', [
            'dataReservasi' => DataReservasi::latest()->paginate(10)
        ]);
    }

    /**
     * Cari berdasarkan nama tamu.
     */
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $dataReservasi = DataReservasi::where('nama_tamu', 'like', "%" . $cari . "%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.dataReservasi.index', ['dataReservasi' => $dataReservasi]);
    }

    /**
     * Filter berdasarkan tanggal check-in dan check-out.
     */
    public function tanggal(Request $request)
    {
        $fromdate = $request->fromdate;
        $todate = $request->todate;

        $dataReservasi = DB::table('pemesanan')
            ->whereDate('tgl_check_in', '>=', $fromdate)
            ->whereDate('tgl_check_out', '<=', $todate)
            ->orderBy('tgl_check_in', 'desc')
            ->paginate(10);

        return view('admin.dataReservasi.index', ['dataReservasi' => $dataReservasi]);
    }

    /**
     * Tampilkan form edit data reservasi.
     */
    public function edit($id)
    {
        $dataReservasi = DataReservasi::findOrFail($id);
        return view('admin.dataReservasi.edit', compact('dataReservasi'));
    }

    /**
     * Proses update data reservasi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tamu' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tipe_kamar' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'tgl_check_in' => 'required|date',
            'tgl_check_out' => 'required|date',
        ]);

        $dataReservasi = DataReservasi::findOrFail($id);
        $dataReservasi->update($request->all());

        return redirect()->route('dataReservasi.index')->with('success', 'Data reservasi berhasil diperbarui.');
    }

    /**
     * Hapus data reservasi.
     */
    public function destroy($id)
    {
        $dataReservasi = DataReservasi::findOrFail($id);
        $dataReservasi->delete();

        return redirect()->route('dataReservasi.index')->with('success', 'Data reservasi berhasil dihapus.');
    }
}
