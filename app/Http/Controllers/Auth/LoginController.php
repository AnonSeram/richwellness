<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'  // Tambahkan validasi untuk role
        ]);

        $credentials = [
            'email' => $input['email'],
            'password' => $input['password']
        ];

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            // Periksa apakah email sesuai dengan peran yang dipilih
            if (($input['role'] == 'admin' && $user->is_admin == 1) ||
                ($input['role'] == 'receptionist' && $user->is_admin == 0)) {

                if ($user->is_admin == 1) {
                    return redirect()->route('admin.home');
                } else {
                    return redirect()->route('home');
                }
            } else {
                auth()->logout(); // Logout user jika role tidak sesuai
                return redirect()->route('login')->with('error', 'Role and Email do not match');
            }
        } else {
            return redirect()->route('login')->with('error', 'Wrong Email and Password');
        }
    }
}
