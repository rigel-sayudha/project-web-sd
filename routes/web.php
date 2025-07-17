<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Login routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes with auth middleware
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Kotak Saran Admin
    Route::get('/kotak-saran', [\App\Http\Controllers\Admin\KotakSaranAdminController::class, 'index'])->name('admin.kotak-saran');
    // Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Hapus/komentar dashboard
    Route::get('/', [AdminController::class, 'articles'])->name('admin.home'); // Default ke berita

    // Article Management Routes
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class, [
        'as' => 'admin'
    ]);

    // Ekstrakurikuler Management Routes
    Route::resource('ekstrakurikuler', \App\Http\Controllers\EkstrakurikulerController::class, [
        'as' => 'admin'
    ]);

    Route::get('/announcements', [AdminController::class, 'announcements'])->name('admin.announcements');
    Route::get('/registrations', [AdminController::class, 'registrations'])->name('admin.registrations');
    Route::get('/organization', [AdminController::class, 'organization'])->name('admin.organization');
    Route::get('/leaderboard', [AdminController::class, 'leaderboard'])->name('admin.leaderboard');
    Route::get('/print-registration/{id}', [AdminController::class, 'printRegistration'])->name('admin.printRegistration');
    Route::get('/leaderboard/export', [AdminController::class, 'exportAcceptedRegistrations'])->name('admin.leaderboard.export');
    Route::post('/loloskan/{id}', [AdminController::class, 'loloskanSiswa'])->name('admin.loloskan');
    Route::post('/belumloloskan/{id}', [AdminController::class, 'belumLoloskanSiswa'])->name('admin.belumloloskan');

    // Profil Admin
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // Sambutan Kepala Sekolah (Admin)
    Route::resource('sambutan', \App\Http\Controllers\SambutanController::class, [
        'as' => 'admin'
    ]);

    // Pendaftaran Admin Routes
    // Pendaftaran Admin Routes
    Route::resource('pendaftaran', \App\Http\Controllers\PendaftaranController::class, [
        'as' => 'admin'
    ]);

    // Poster Pop-up CRUD
    Route::resource('poster', \App\Http\Controllers\Admin\PosterController::class, [
        'as' => 'admin'
    ]);

    // Poster activate/deactivate
    Route::post('poster/{poster}/activate', [\App\Http\Controllers\Admin\PosterController::class, 'activate'])->name('admin.poster.activate');
    Route::post('poster/{poster}/deactivate', [\App\Http\Controllers\Admin\PosterController::class, 'deactivate'])->name('admin.poster.deactivate');

    // Galeri Admin CRUD
    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class, [
        'as' => 'admin'
    ]);

    // Galeri Admin CRUD
    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriController::class, [
        'as' => 'admin'
    ]);

    Route::get('/print-accepted-registrations', [App\Http\Controllers\AdminController::class, 'printAcceptedRegistrations'])->name('admin.printAcceptedRegistrations');
});

// Registration route
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::post('/kotak-saran', [App\Http\Controllers\KotakSaranController::class, 'store'])->name('kotak-saran.store');

// Struktur Organisasi route
Route::get('/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('struktur-organisasi');

// Pendaftaran routes
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::get('/pendaftaran/success', [PendaftaranController::class, 'success'])->name('pendaftaran.success');

Route::get('/hasil-seleksi', [PendaftaranController::class, 'selectionResults'])->name('hasil-seleksi');

Route::get('/soal-test', [PendaftaranController::class, 'index'])->name('soal-test');

Route::post('/api/chat', [ChatController::class, 'chat'])->name('api.chat');

Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [App\Http\Controllers\BeritaController::class, 'show'])->name('berita.show');

// Struktur Organisasi Admin
Route::get('/admin/organization', [AdminController::class, 'organization'])->name('admin.organization');
Route::put('/admin/organization', [AdminController::class, 'updateOrganization'])->name('admin.organization.update');

// Artikel Management Routes
Route::resource('artikel', ArticleController::class);
Route::get('artikel/{id}', [ArticleController::class, 'show'])->name('artikel.show');

// Galeri Publik
Route::get('/galeri', [\App\Http\Controllers\GaleriController::class, 'index'])->name('galeri.index');
// Galeri detail (optional, uncomment if needed)
// Route::get('/galeri/{id}', [\App\Http\Controllers\GaleriController::class, 'show'])->name('galeri.show');
