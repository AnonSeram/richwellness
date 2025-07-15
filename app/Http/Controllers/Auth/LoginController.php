<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada

class LoginController extends Controller
{
    // Jangan gunakan trait AuthenticatesUsers jika buat login manual
    // use AuthenticatesUsers; 

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan view login tersedia
    }

    public function login(Request $request)
    {
        $request->validate([  // gunakan validate() dari request
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
        return redirect()->route('admin.home');
    } elseif ($user->role === 'resepsionis') {
        return redirect()->route('resepsionis');
    } else {
        return redirect()->route('home');
    }
        }


        return redirect()->route('login')->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
