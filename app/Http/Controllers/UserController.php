<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

   
public function updateProfile(Request $request)
{
    $user = User::find(Auth::id()); // Pastikan ini instance model User

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->save(); // Ini akan berfungsi karena $user adalah Eloquent model

    return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
}
}
