<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\OprecController; // ⬅ WAJIB (tadi belum ada)

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

// ===== OPEN RECRUITMENT =====
Route::get('/oprec', [OprecController::class, 'index'])->name('oprec');
Route::post('/oprec/submit', [OprecController::class, 'submit'])->name('oprec.submit');


// ===== BERITA =====
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'detail'])->name('berita.detail');


// ===== PROFIL =====
Route::view('/profil', 'user.profil')->name('profil');


// ===== PRAKTIKUM =====
Route::prefix('praktikum')->name('praktikum.')->group(function () {

    Route::view('/tata-tertib', 'user.praktikum.tata-tertib')
        ->name('tata-tertib');

    Route::view('/jadwal', 'user.praktikum.jadwal')
        ->name('jadwal');
});


// ===== DOWNLOAD =====
Route::view('/download', 'user.download')->name('download');


// ===== KONTAK =====
Route::view('/kontak', 'user.kontak')->name('kontak');


// ===== GALERI =====
Route::view('/galeri', 'user.galeri')->name('galeri');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
