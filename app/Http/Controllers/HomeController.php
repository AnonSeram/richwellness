<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKamar;
use App\Models\FasilitasKamar;
use App\Models\DataReservasi;
use App\Models\Rating;
use App\Models\Pemesanan;

class HomeController extends Controller
{
    public function __construct()
    {
        // Semua method pakai auth, kecuali index (beranda publik)
        $this->middleware('auth')->except(['index']);
    }

    public function admin()
    {
        $this->middleware('is_admin');

        return view('admin.dataKamar.index', [
            'dataKamar' => DataKamar::latest()->get()
        ]);
    }

    public function resepsionis()
    {
        return view('resepsionis.index', [
            'dataReservasi' => DataReservasi::latest()->get()
        ]);
    }

    public function user()
    {
        $pemesanans = Pemesanan::where('email', auth()->user()->email)
            ->latest()
            ->get();

        return view('user.dashboard', [
            'pemesanans' => $pemesanans
        ]);
    }

    public function index()
    {
        $ratings = Rating::with('user')->latest()->get(); // testimoni dengan relasi user
        $fasilitasKamar = FasilitasKamar::all();

        return view('index', compact('ratings', 'fasilitasKamar'));
    }
}
