<?php

namespace App\Http\Controllers;

use App\Models\DataKamar;
use Illuminate\Http\Request;

class DataKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKamar = DataKamar::latest()->get();
        return view('admin.dataKamar.index', compact('dataKamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dataKamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipe_kamar' => ['required', 'max:255', 'string'],
            'jumlah_kamar' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
        ]);

        DataKamar::create($validatedData);

        return redirect('/dataKamar')->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datakamar = DataKamar::findOrFail($id);
        return view('admin.dataKamar.edit', compact('datakamar'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataKamar = DataKamar::findOrFail($id);

        $validatedData = $request->validate([
            'tipe_kamar' => ['required', 'max:255', 'string'],
            'jumlah_kamar' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
        ]);

        $dataKamar->update($validatedData);

        return redirect('/dataKamar')->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataKamar = DataKamar::findOrFail($id);
        $dataKamar->delete();

        return redirect('/dataKamar')->with('message', 'Data berhasil dihapus!');
    }

        // Tambahkan metode ini untuk mengirimkan dataKamar ke view pesanReservasi
        public function showForm()
        {
            $dataKamar = DataKamar::all();
            return view('tamu.pesanReservasi', compact('dataKamar'));
        }
}
