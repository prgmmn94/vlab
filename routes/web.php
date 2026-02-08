<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;

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
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{slug}', [BeritaController::class, 'detail']);

Route::get('/profil', function () {
    return view('user.profil');
})->name('profil');

Route::prefix('praktikum')->group(function () {
    Route::get('/tata-tertib', function () {
        // Dot (.) di sini artinya masuk ke dalam folder
        // user -> folder praktikum -> file tata-tertib.blade.php
        return view('user.praktikum.tata-tertib'); 
    })->name('praktikum.tata-tertib');

    Route::get('/jadwal', function () {
        return view('user.praktikum.jadwal');
    })->name('praktikum.jadwal');
});

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
