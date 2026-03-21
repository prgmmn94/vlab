<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserNewsController;
use App\Http\Controllers\RecruitmentPeriodController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\CandidateRecruitmentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\UserScheduleController;
use App\Http\Controllers\PhotoEventController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserPhotoController;


Route::view('/', 'home.home');
Route::view('/profil', 'home.profil');
Route::view('/download', 'home.download')->name('download');
Route::view('/kontak', 'home.kontak')->name('kontak');
Route::view('/jadwal', 'praktikum.jadwal')->name('jadwal');
// Route::view('/galeri', 'home.galeri')->name('galeri');
Route::view('/berita', 'home.berita')->name('berita');

Route::prefix('praktikum')->name('praktikum.')->group(function () {

    Route::view('/tata-tertib', 'user.praktikum.tata-tertib')
        ->name('tata-tertib');
});

Route::prefix('praktikum')->name('praktikum.')->group(function () {
    Route::view('/tata-tertib', 'home.praktikum.tata-tertib')
        ->name('tata-tertib');
});

// Public Routes - Schedules
Route::get('/praktikum/jadwal', [UserScheduleController::class, 'index'])
    ->name('praktikum.jadwal');

// Public Routes - News
Route::get('/berita', [UserNewsController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [UserNewsController::class, 'detail'])->name('berita.detail');

// Public Routes - Photo Gallery
Route::get('/galeri', [UserPhotoController::class, 'index'])->name('galeri.index');
Route::get('/galeri/kategori', [UserPhotoController::class, 'kategori'])->name('galeri.kategori');
Route::get('/galeri/{slug}', [UserPhotoController::class, 'show'])->name('galeri.show');

// Public Routes - Candidate Recruitment
Route::prefix('pendaftaran')->group(function () {
    Route::get('/', [CandidateRecruitmentController::class, 'index'])
        ->name('candidate.recruitments.index');

    Route::post('/', [CandidateRecruitmentController::class, 'store'])
        ->name('candidate.recruitments.store');

    Route::get('success', [CandidateRecruitmentController::class, 'success'])
        ->name('candidate.recruitments.success');
});

// Admin Routes - Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.home');
})->middleware(['auth', 'verified'])->name('dashboard');


// Admin Routes - Recruitment Management
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::resource('recruitment_periods', RecruitmentPeriodController::class)
        ->names('recruitment_periods')
        ->except(['show']);

    Route::patch(
        'recruitment_periods/{recruitmentPeriod}/toggle',
        [RecruitmentPeriodController::class, 'toggleActive']
    )->name('recruitment_periods.toggle');

    Route::middleware('role:Super Admin')->group(function () {
        Route::resource('recruitment_periods', RecruitmentPeriodController::class)
            ->names('recruitment_periods')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    });

    Route::get(
        'recruitment_periods/{recruitmentPeriod}/recruitments/export',
        [RecruitmentController::class, 'export']
    )->name('admin.recruitments.export');

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

    Route::resource('recruitment_periods.recruitments', RecruitmentController::class)
        ->parameters([
            'recruitment_periods' => 'recruitmentPeriod',
            'recruitments' => 'recruitment'
        ])
        ->names('admin.recruitments');
});

// Admin Routes - News Management
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::delete('news/bulk-destroy', [NewsController::class, 'bulkDestroy'])
        ->name('news.bulk-destroy');
    Route::resource('news', NewsController::class);
});

// Admin Routes - Photos Management
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    Route::controller(PhotoEventController::class)->group(function () {
        Route::delete('photo_events/bulk-destroy', 'bulkDestroy')
            ->name('admin.photo_events.bulk-destroy');
    });

    Route::resource('photo_events', PhotoEventController::class)
        ->names([
            'index' => 'admin.photo_events.index',
            'create' => 'admin.photo_events.create',
            'store' => 'admin.photo_events.store',
            'edit' => 'admin.photo_events.edit',
            'update' => 'admin.photo_events.update',
            'destroy' => 'admin.photo_events.destroy',
        ])
        ->except(['show']);

    Route::prefix('photo_events/{photoEvent}/photos')->group(function () {
        Route::delete('bulk-destroy', [PhotoController::class, 'bulkDestroy'])
            ->name('admin.photo_events.photos.bulk-destroy');
    });

    Route::resource('photo_events.photos', PhotoController::class)
        ->names([
            'index' => 'admin.photo_events.photos.index',
            'create' => 'admin.photo_events.photos.create',
            'store' => 'admin.photo_events.photos.store',
            'edit' => 'admin.photo_events.photos.edit',
            'update' => 'admin.photo_events.photos.update',
            'destroy' => 'admin.photo_events.photos.destroy',
        ])
        ->except(['show']);
});

// Admin Routes - Schedules Management
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::delete('schedules/bulk-destroy', [SchedulesController::class, 'bulkDestroy'])
        ->name('schedules.bulk-destroy');
    Route::resource('schedules', SchedulesController::class);
});

// Admin Routes - Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
