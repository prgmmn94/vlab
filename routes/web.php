<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RecruitmentPeriodController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\CandidateRecruitmentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\UserScheduleController;


Route::view('/', 'home.home');
Route::view('/profil', 'home.profil');
Route::view('/download', 'home.download')->name('download');
Route::view('/kontak', 'home.kontak')->name('kontak');
Route::view('/jadwal', 'praktikum.jadwal')->name('jadwal');
Route::view('/galeri', 'home.galeri')->name('galeri');
Route::view('/berita', 'home.berita')->name('berita');

Route::prefix('praktikum')->name('praktikum.')->group(function () {

    Route::view('/tata-tertib', 'user.praktikum.tata-tertib')
        ->name('tata-tertib');
});



Route::prefix('praktikum')->name('praktikum.')->group(function () {

    Route::view('/tata-tertib', 'home.praktikum.tata-tertib')
        ->name('tata-tertib');
});
Route::get('/praktikum/jadwal', [UserScheduleController::class, 'index'])
->name('praktikum.jadwal');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'detail'])->name('berita.detail');

// Public Routes - Candidate Recruitment
Route::prefix('recruitments')->group(function () {
    Route::get('/', [CandidateRecruitmentController::class, 'index'])
        ->name('candidate.recruitments.index');

    Route::post('/', [CandidateRecruitmentController::class, 'store'])
        ->name('candidate.recruitments.store');

    Route::get('success', [CandidateRecruitmentController::class, 'success'])
        ->name('candidate.recruitments.success');
});

// Admin Dashboard
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

// Admin Routes - News Management
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::delete('news/bulk-destroy', [NewsController::class, 'bulkDestroy'])
        ->name('news.bulk-destroy');
    Route::resource('news', NewsController::class);
});

// Admin Routes - Photos Management
// Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
//     Route::delete('galleries/bulk-destroy', [GalleriesController::class, 'bulkDestroy'])
//         ->name('galleries.bulk-destroy');
//     Route::resource('galleries', GalleriesController::class);
// });

// Admin Routes - Schedules Management
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::delete('schedules/bulk-destroy', [SchedulesController::class, 'bulkDestroy'])
        ->name('schedules.bulk-destroy');
    Route::resource('schedules', SchedulesController::class);
});

// Profile Routes 
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';