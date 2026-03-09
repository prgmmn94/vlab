<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RecruitmentPeriodController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\CandidateRecruitmentController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::view('/', 'home.home');
Route::view('/profil', 'home.profil');
Route::view('/download', 'home.download')->name('download');
Route::view('/kontak', 'home.kontak')->name('kontak');
Route::view('/galeri', 'home.galeri')->name('galeri');

/*
|--------------------------------------------------------------------------
| Berita
|--------------------------------------------------------------------------
*/

Route::controller(BeritaController::class)->group(function () {
    Route::get('/berita', 'index')->name('berita.index');
    Route::get('/berita/{slug}', 'detail')->name('berita.detail');
});

/*
|--------------------------------------------------------------------------
| Praktikum
|--------------------------------------------------------------------------
*/

Route::prefix('praktikum')->name('praktikum.')->group(function () {
    Route::view('/tata-tertib', 'home.praktikum.tata-tertib')->name('tata-tertib');
    Route::view('/jadwal', 'home.praktikum.jadwal')->name('jadwal');
});

/*
|--------------------------------------------------------------------------
| Candidate Recruitment (Public)
|--------------------------------------------------------------------------
*/

Route::prefix('recruitments')->group(function () {

    Route::get('/', [CandidateRecruitmentController::class, 'index'])
        ->name('candidate.recruitments.index');

    Route::post('/', [CandidateRecruitmentController::class, 'store'])
        ->name('candidate.recruitments.store');

    Route::get('/success', [CandidateRecruitmentController::class, 'success'])
        ->name('candidate.recruitments.success');
});

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Recruitment Management
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    /*
    | Recruitment Periods
    */

    Route::resource('recruitment_periods', RecruitmentPeriodController::class)
        ->names('recruitment_periods')
        ->except(['show']);

    Route::patch(
        'recruitment_periods/{recruitmentPeriod}/toggle',
        [RecruitmentPeriodController::class, 'toggleActive']
    )->name('recruitment_periods.toggle');

    /*
    | Super Admin Only
    */

    Route::middleware('role:Super Admin')->group(function () {
        Route::resource('recruitment_periods', RecruitmentPeriodController::class)
            ->names('recruitment_periods')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    });

    /*
    | Recruitment CRUD
    */

    Route::resource('recruitment_periods.recruitments', RecruitmentController::class)
        ->parameters([
            'recruitment_periods' => 'recruitmentPeriod',
            'recruitments' => 'recruitment'
        ])
        ->names('admin.recruitments');

    /*
    | Export
    */

    Route::get(
        'recruitment_periods/{recruitmentPeriod}/recruitments/export',
        [RecruitmentController::class, 'export']
    )->name('admin.recruitments.export');

    /*
    | Download Files
    */

    Route::prefix('recruitment_periods/{recruitmentPeriod}/recruitments')->group(function () {

        Route::get('download/all', [RecruitmentController::class, 'downloadAll'])
            ->name('admin.recruitments.download.all');

        Route::get('download/region/{region}', [RecruitmentController::class, 'downloadByRegion'])
            ->name('admin.recruitments.download.region');

        Route::get('download/position/{posisi}', [RecruitmentController::class, 'downloadByPosition'])
            ->name('admin.recruitments.download.position');

        Route::get(
            'download/region/{region}/position/{posisi}',
            [RecruitmentController::class, 'downloadByRegionAndPosition']
        )->name('admin.recruitments.download.region-position');
    });
});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';