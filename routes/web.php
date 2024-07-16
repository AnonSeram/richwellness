<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKamarController;
use App\Http\Controllers\DataReservasiController;
use App\Http\Controllers\FasilitasHotelController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\TeamController;

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

Route::get('/', 
    [FasilitasKamarController::class, 'homepage']
);

Route::resource('pesanReservasi', PemesananController::class)->except(['create', 'store']);
Route::get('pesanReservasi/create', [PemesananController::class, 'showForm'])->name('pesanReservasi.create');
Route::post('pesanReservasi/store', [PemesananController::class, 'store'])->name('pesanReservasi.store');
Route::get('bukti-online', [PemesananController::class, 'showBuktiOnline'])->name('bukti.online');
Route::get('/cetak-bukti', [PemesananController::class, 'cetakBukti'])->name('cetak.bukti');

Route::middleware(['is_admin'])->group(function () {
    Route::resource('dataKamar', DataKamarController::class);
    // Add other routes that can only be accessed by admin here
});

Route::get('cetak', [PemesananController::class, 'cetakBukti']);

Auth::routes();

Route::get('dataKamar', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');
Route::get('dataReservasi', [App\Http\Controllers\HomeController::class, 'resepsionis'])->name('home');

// Add other routes here if needed
Route::put('/update-status/{id}', [PemesananController::class, 'updateStatus']);

Route::resource('dataKamar', DataKamarController::class);
Route::resource('fasilitasKamar', FasilitasKamarController::class);

Route::get('/dataReservasi', [DataReservasiController::class, 'index']);
Route::get('/dataReservasi/search', [DataReservasiController::class, 'cari']);
Route::get('/dataReservasi/filter', [DataReservasiController::class, 'tanggal']);
Route::get('/dataReservasi/cari', [DataReservasiController::class, 'cari'])->name('dataReservasi.cari');


Route::get('/cetak', [PemesananController::class, 'cetakBukti']);

Auth::routes();
Route::get('/dataKamar', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');
Route::get('/dataReservasi', [App\Http\Controllers\HomeController::class, 'resepsionis'])->name('home');

Route::get('/dataReservasi/edit/{id}', [DataReservasiController::class, 'edit'])->name('dataReservasi.edit');
Route::put('/dataReservasi/update/{id}', [DataReservasiController::class, 'update'])->name('dataReservasi.update');
Route::delete('/dataReservasi/delete/{id}', [DataReservasiController::class, 'destroy'])->name('dataReservasi.destroy');


// admin ganti password

// Route untuk halaman autentikasi
Auth::routes();

// Route untuk halaman dashboard atau halaman lain yang membutuhkan autentikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');

Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

Route::get('/team', [TeamController::class, 'index'])->name('team.index');

