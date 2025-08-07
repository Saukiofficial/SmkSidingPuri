<?php

use Illuminate\Support\Facades\Route;

// Frontend Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController; // Digunakan untuk halaman profil publik
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\PostController as FrontendPostController;
use App\Http\Controllers\GalleryController as FrontendGalleryController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ContactController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SchoolProfileController as AdminProfileController;
use App\Http\Controllers\Admin\FacilityController as AdminFacilityController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\AdmissionController as AdminAdmissionController;
use App\Http\Controllers\Admin\AlumniController as AdminAlumniController;
use App\Http\Controllers\Admin\OrganizationalStructureController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\AcademicCalendarController;

// Breeze Controller for User Profile
use App\Http\Controllers\ProfileController as BreezeProfileController;

/*
|--------------------------------------------------------------------------
| Rute Halaman Publik (Frontend)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(PageController::class)->prefix('profil')->name('profile.')->group(function () {
    Route::get('/visi-misi', 'visionMission')->name('vision-mission');
    Route::get('/sejarah', 'history')->name('history');
    Route::get('/struktur-organisasi', 'organization')->name('organization');
    Route::get('/fasilitas', 'facilities')->name('facilities');
});

Route::controller(AcademicController::class)->prefix('akademik')->name('academic.')->group(function () {
    Route::get('/jadwal-pelajaran', 'schedule')->name('schedule');
    Route::get('/kalender-akademik', 'calendar')->name('calendar');
});

Route::controller(AdmissionController::class)->prefix('ppdb')->name('admission.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/hasil-seleksi', 'results')->name('results');
});

Route::get('/berita', [FrontendPostController::class, 'index'])->name('posts.index');
Route::get('/berita/{post:slug}', [FrontendPostController::class, 'show'])->name('posts.show');

Route::get('/galeri', [FrontendGalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{galleryAlbum:id}', [FrontendGalleryController::class, 'show'])->name('gallery.show');

Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Rute Bawaan Breeze & Panel Admin
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');

Route::middleware('auth')->group(function () {
    // Rute profil user bawaan Breeze
    Route::get('/profile', [BreezeProfileController::class, 'edit'])->name('profile.edit.user');
    Route::patch('/profile', [BreezeProfileController::class, 'update'])->name('profile.update.user');
    Route::delete('/profile', [BreezeProfileController::class, 'destroy'])->name('profile.destroy.user');

    // Grup Rute Panel Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/profil-sekolah', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profil-sekolah/{profile}', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::get('/my-profile', [\App\Http\Controllers\Admin\UserProfileController::class, 'edit'])->name('my-profile.edit');
        Route::patch('/my-profile', [\App\Http\Controllers\Admin\UserProfileController::class, 'update'])->name('my-profile.update');
        Route::put('/my-profile/password', [\App\Http\Controllers\Admin\UserProfileController::class, 'updatePassword'])->name('my-profile.password');

        Route::resource('/struktur-organisasi', OrganizationalStructureController::class);
        Route::resource('/kalender-akademik', AcademicCalendarController::class);
        Route::resource('/ppdb', AdminAdmissionController::class)->only(['index', 'show', 'update', 'destroy']);
        Route::resource('/berita', AdminPostController::class)->except('show');
        Route::resource('/galeri', AdminGalleryController::class);
        Route::resource('/fasilitas', AdminFacilityController::class)->except('show');
        Route::resource('/data-guru', TeacherController::class);
        Route::resource('/alumni', AdminAlumniController::class);

        // Rute untuk Data Siswa
        Route::post('/data-siswa/import', [AdminStudentController::class, 'import'])->name('data-siswa.import');
        Route::get('/data-siswa/export', [AdminStudentController::class, 'export'])->name('data-siswa.export');
        Route::get('/data-siswa/template', [AdminStudentController::class, 'downloadTemplate'])->name('data-siswa.template');
        Route::resource('/data-siswa', AdminStudentController::class);
    });
});

/*
|--------------------------------------------------------------------------
| Rute Autentikasi (Otomatis dari Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
