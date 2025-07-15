<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('user')->latest()->get();
        return response()->json($ratings);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pemesanan_id' => 'required|exists:pemesanan,id',
            'rating' => 'required|integer|between:1,5',
            'description' => 'required|string|max:1000',
        ]);

        if (Rating::where('pemesanan_id', $validated['pemesanan_id'])->exists()) {
            return back()->with('error', 'Anda sudah memberikan ulasan untuk pesanan ini.');
        }

        $validated['user_id'] = Auth::id(); // tambahkan user_id

        Rating::create($validated);
        return back()->with('success', 'Terima kasih atas ulasan Anda!');
    }

  public function update(Request $request, $id)
{
    $request->validate([
        'pemesanan_id' => 'required|exists:pemesanan,id', // pastikan nama tabel valid
        'rating' => 'required|integer|min:1|max:5',
        'description' => 'required|string|max:1000',
    ]);

    $rating = Rating::find($id);

    if (!$rating) {
        // Jika belum ada, buat baru
        Rating::create([
            'pemesanan_id' => $request->pemesanan_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'description' => $request->description,
        ]);
    } else {
        // Jika sudah ada, update
        $rating->update([
            'rating' => $request->rating,
            'description' => $request->description,
        ]);
    }

    return back()->with('success', 'Review berhasil disimpan!');
}

}
