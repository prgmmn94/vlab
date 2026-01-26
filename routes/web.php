<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('user.home');
})->name('beranda');

/*
|--------------------------------------------------------------------------
| PUBLIC PAGES (NAVBAR)
|--------------------------------------------------------------------------
*/
Route::get('/berita', function () {
    return view('user.berita');
})->name('berita');

Route::get('/profil', function () {
    return view('user.profil');
})->name('profil');

Route::get('/praktikum', function () {
    return view('user.praktikum');
})->name('praktikum');

Route::get('/download', function () {
    return view('user.download');
})->name('download');

Route::get('/kontak', function () {
    return view('user.kontak');
})->name('kontak');

Route::get('/galeri', function () {
    return view('user.galeri');
})->name('galeri');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| DASHBOARD (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
});
