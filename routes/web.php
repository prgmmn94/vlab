<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitmentPeriodController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\CandidateRecruitmentController;
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

Route::get('/admin/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes - Recruitment Management
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    // Recruitment Periods
    Route::resource('recruitment_periods', RecruitmentPeriodController::class)
        ->names('recruitment_periods')
        ->except(['show']);

    // Toggle active status
    Route::patch('recruitment_periods/{recruitmentPeriod}/toggle', [RecruitmentPeriodController::class, 'toggleActive'])
        ->name('recruitment_periods.toggle');

    Route::middleware('role:Super Admin')->group(function () {
        Route::resource('recruitment_periods', RecruitmentPeriodController::class)
            ->names('recruitment_periods')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    });

    // Admin Recruitments (Full CRUD)
    Route::controller(RecruitmentController::class)->group(function () {
        Route::get('recruitment_periods/{recruitmentPeriod}/recruitments/export', 'export')
            ->name('admin.recruitments.export');
    });

    Route::resource('recruitment_periods.recruitments', RecruitmentController::class)
        ->parameters(['recruitment_periods' => 'recruitmentPeriod', 'recruitments' => 'recruitment'])
        ->names('admin.recruitments');
});

// Candidate Routes (Public - Tanpa Auth)
Route::prefix('recruitments')->group(function () {
    Route::get('/', [CandidateRecruitmentController::class, 'index'])
        ->name('candidate.recruitments.index');

    Route::post('/', [CandidateRecruitmentController::class, 'store'])
        ->name('candidate.recruitments.store');

    Route::get('success', [CandidateRecruitmentController::class, 'success'])
        ->name('candidate.recruitments.success');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
