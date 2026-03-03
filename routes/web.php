<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitmentPeriodController;
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

Route::get('/admin/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/recruitment', function () {
    return view('admin.recruitment.index');
})->middleware(['auth', 'verified'])->name('recruitment.index');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::resource('recruitment_periods', RecruitmentPeriodController::class)
        ->middleware(['auth', 'verified']);

    Route::middleware('role:Super Admin')->group(function () {
        Route::resource('recruitment_periods', RecruitmentPeriodController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
