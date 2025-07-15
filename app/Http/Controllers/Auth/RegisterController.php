<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Kemana redirect setelah berhasil register.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Konstruktor: hanya tamu (belum login) yang bisa akses.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Tampilkan form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Validasi input registrasi.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Buat user baru setelah registrasi valid.
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Kirim email selamat datang
        Mail::to($user->email)->send(new WelcomeEmail());

        return $user;
    }

    /**
     * Override method register bawaan untuk menambahkan flash message.
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Tidak langsung login
        // $this->guard()->login($user);

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Berhasil mendaftar! Silakan login');
    }
}
