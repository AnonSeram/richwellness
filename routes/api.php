<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ChatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/midtrans/notification', [PemesananController::class, 'handleNotification']);

// Midtrans Status
Route::post('/midtrans/callback', [PemesananController::class, 'handleNotification']);

// Chat Routes
Route::get('/chat/history', [ChatController::class, 'getHistory']);
Route::post('/chat/send', [ChatController::class, 'send']);
Route::post('/chat/change-language', [ChatController::class, 'changeLanguage']);

// FAQ Routes
Route::get('/faqs', [FaqController::class, 'getFaqs']);

Route::post('/ratings', [RatingController::class, 'store']);
Route::get('/ratings', [RatingController::class, 'index']);