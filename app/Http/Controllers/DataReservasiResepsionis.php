<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataReservasi;
use Illuminate\Support\Facades\DB;

class DataReservasiResepsionis extends Controller
{
     public function index()
    {
        return view('resepsionis.index', [
            'dataReservasiResep' => DataReservasi::latest()->paginate(10)
        ]);
    }

    /**
     * Cari berdasarkan nama tamu.
     */
    public function cari(Request $request)
    {
        $cari = $request->cari;

        $dataReservasiResep = DataReservasi::where('nama_tamu', 'like', "%" . $cari . "%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('resepsionis.index', ['dataReservasiResep' => $dataReservasiResep]);
    }

    /**
     * Filter berdasarkan tanggal check-in dan check-out.
     */
    public function tanggal(Request $request)
    {
        $fromdate = $request->fromdate;
        $todate = $request->todate;

        $dataReservasiResep = DB::table('pemesanan')
            ->whereDate('tgl_check_in', '>=', $fromdate)
            ->whereDate('tgl_check_out', '<=', $todate)
            ->orderBy('tgl_check_in', 'desc')
            ->paginate(10);

        return view('resepsionis.index', ['dataReservasiResep' => $dataReservasiResep]);
    }

    /**
     * Tampilkan form edit data reservasi.
     */
    public function edit($id)
    {
        $dataReservasiResep = DataReservasi::findOrFail($id);
        return view('resepsionis.edit', compact('dataReservasiResep'));
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

        $dataReservasiResep = DataReservasi::findOrFail($id);
        $dataReservasiResep->update($request->all());

        return redirect()->route('dataReservasiResep.index')->with('success', 'Data reservasi berhasil diperbarui.');
    }

    /**
     * Hapus data reservasi.
     */
    public function destroy($id)
    {
        $dataReservasiResep = DataReservasi::findOrFail($id);
        $dataReservasiResep->delete();

        return redirect()->route('dataReservasiResep.index')->with('success', 'Data reservasi berhasil dihapus.');
    }
}