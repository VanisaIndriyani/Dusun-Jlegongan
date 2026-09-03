<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\PopulationStatisticController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\PotentialController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\GalleryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sejarah', [PageController::class, 'sejarah'])->name('sejarah');
Route::get('/geografis', [PageController::class, 'geografis'])->name('geografis');
Route::get('/struktur-kepadukuhan', [PageController::class, 'struktur'])->name('struktur');
Route::get('/kependudukan', [PageController::class, 'kependudukan'])->name('kependudukan');
Route::get('/kegiatan', [PageController::class, 'kegiatan'])->name('kegiatan');
Route::get('/fasilitas', [PageController::class, 'fasilitas'])->name('fasilitas');
Route::get('/potensi', [PageController::class, 'potensi'])->name('potensi');
Route::get('/jadwal', [PageController::class, 'jadwal'])->name('jadwal');
Route::get('/pkk-kwt', [PageController::class, 'pkkKwt'])->name('pkk-kwt');
Route::get('/galeri', [PageController::class, 'galeri'])->name('galeri');

Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [DashboardController::class, 'login'])->name('login');
    Route::post('/authenticate', [DashboardController::class, 'authenticate'])->name('authenticate');

    Route::middleware('auth')->group(function () {
        Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::resource('contents', ContentController::class);
        Route::resource('population-statistics', PopulationStatisticController::class);
        Route::resource('activities', ActivityController::class);
        Route::resource('facilities', FacilityController::class);
        Route::resource('potentials', PotentialController::class);
        Route::resource('schedules', ScheduleController::class);
        Route::resource('organizations', OrganizationController::class);
        Route::resource('galleries', GalleryController::class);
    });
});
