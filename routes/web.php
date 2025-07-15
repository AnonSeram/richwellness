<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKamarController;
use App\Http\Controllers\DataReservasiController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DataReservasiResepsionis;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ==========================
// Halaman Publik (Tanpa Login)
// ==========================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/team', [TeamController::class, 'index'])->name('team.index');

// Halaman Register & Login
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Bukti & Pembayaran (Tidak Perlu Login)
Route::get('/bukti-online', [PemesananController::class, 'showBuktiOnline'])->name('bukti.online');
Route::get('/cetak-bukti/{kode_booking}', [PemesananController::class, 'cetakBukti'])->name('cetak.bukti');
Route::get('/check-payment/{kode_booking}', [PemesananController::class, 'checkPayment']);
Route::get('/cetak', [PemesananController::class, 'cetakBukti']);

Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
Route::put('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');


// ==========================
// Chatbot Routes
// ==========================

// Rute untuk menampilkan halaman view chatbot
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

// Grup rute API untuk interaksi AJAX dari frontend
Route::prefix('api')->name('api.')->group(function () {
    Route::prefix('chat')->name('chat.')->group(function () {
        Route::post('/send', [ChatController::class, 'send'])->name('send');
        Route::get('/history', [ChatController::class, 'history'])->name('history');
        Route::post('/change-language', [ChatController::class, 'changeLanguage'])->name('changeLanguage');
    });
});

// Webhook untuk Dialogflow (jika masih digunakan)
Route::post('/webhook', [WebhookController::class, 'handleWebhook']);
Route::post('/webhook/dialogflow', [WebhookController::class, 'handleDialogflow']);


// ==========================
// Route yang Membutuhkan Login
// ==========================

Route::middleware(['auth'])->group(function () {
    
    // User Dashboard
    Route::get('/dashboard', [HomeController::class, 'user'])->name('dashboard');

    // Pemesanan
    Route::get('/pesanReservasi', [PemesananController::class, 'index'])->name('pesanReservasi.index');
    Route::post('/pesanReservasi/store', [PemesananController::class, 'store'])->name('pesanReservasi.store');

    // Keranjang dan Lanjut Bayar
    Route::get('/user/keranjang', [PemesananController::class, 'keranjang'])->name('keranjang');
    Route::get('/lanjutkan-pembayaran/{kode_booking}', [PemesananController::class, 'lanjutkanPembayaran'])->name('lanjutkan.pembayaran');

    // Ubah Password
    Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

    // Profile User
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::post('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
});


// ==========================
// Admin Routes (Hanya Admin)
// ==========================

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'admin'])->name('admin.home');
    
    Route::resource('/dataKamar', DataKamarController::class);
    Route::resource('/fasilitasKamar', FasilitasKamarController::class);

    Route::get('/dataReservasi', [DataReservasiController::class, 'index'])->name('dataReservasi.index');
    Route::get('/dataReservasi/search', [DataReservasiController::class, 'cari'])->name('dataReservasi.cari');
    Route::get('/dataReservasi/filter', [DataReservasiController::class, 'tanggal'])->name('dataReservasi.filter');
    Route::get('/dataReservasi/edit/{id}', [DataReservasiController::class, 'edit'])->name('dataReservasi.edit');
    Route::put('/dataReservasi/update/{id}', [DataReservasiController::class, 'update'])->name('dataReservasi.update');
    Route::delete('/dataReservasi/delete/{id}', [DataReservasiController::class, 'destroy'])->name('dataReservasi.destroy');
    
    Route::put('/update-status/{id}', [PemesananController::class, 'updateStatus'])->name('status.update');
});


// ==========================
// Resepsionis Routes (Jika masih pakai role resepsionis)
// ==========================

Route::middleware(['auth', 'role_resepsionis'])->group(function () {
    Route::get('/resepsionis', [DataReservasiResepsionis::class, 'index'])->name('resepsionis');

    Route::get('/dataReservasiResep', [DataReservasiResepsionis::class, 'index'])->name('dataReservasiResep.index');
    Route::get('/dataReservasiResep/search', [DataReservasiResepsionis::class, 'cari'])->name('dataReservasiResep.cari');
    Route::get('/dataReservasiResep/filter', [DataReservasiResepsionis::class, 'tanggal'])->name('dataReservasiResep.filter');
    Route::get('/dataReservasiResep/edit/{id}', [DataReservasiResepsionis::class, 'edit'])->name('dataReservasiResep.edit');
    Route::put('/dataReservasiResep/update/{id}', [DataReservasiResepsionis::class, 'update'])->name('dataReservasiResep.update');
    Route::delete('/dataReservasiResep/delete/{id}', [DataReservasiResepsionis::class, 'destroy'])->name('dataReservasiResep.destroy');
});

