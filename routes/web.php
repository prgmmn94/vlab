<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/profil', function () {
    return view('home.profil');
});

Route::prefix('praktikum')->name('praktikum.')->group(function () {
    Route::view('/tata-tertib', 'user.praktikum.tata-tertib')
        ->name('tata-tertib');
    Route::view('/jadwal', 'user.praktikum.jadwal')
        ->name('jadwal');
});

Route::view('/download', 'home.download')->name('download');

Route::view('/kontak', 'home.kontak')->name('kontak');

Route::view('/galeri', 'home.galeri')->name('galeri');

Route::view('/berita', 'home.berita')->name('berita');

// Route::view('/profil', 'home.profil')->name('profil');

Route::get('/dashboard', function () {
    return view('admin/home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
