<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;

// Guest Routes
Route::get('/', function () {
    return view('ppid');
});

Route::get('/ppid', function () {
    return redirect('/');
});

// Admin Authentication Routes  
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Protected Admin Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/berita', BeritaController::class)->names([
            'index' => 'admin.berita.index',
            'create' => 'admin.berita.create',
            'store' => 'admin.berita.store',
            'show' => 'admin.berita.show',
            'edit' => 'admin.berita.edit',
            'update' => 'admin.berita.update',
            'destroy' => 'admin.berita.destroy',
        ]);
        Route::get('/permohonan', [AdminController::class, 'permohonan'])->name('admin.permohonan');
        Route::get('/keberatan', [AdminController::class, 'keberatan'])->name('admin.keberatan');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
        
        // Additional Admin Routes
        Route::get('/profil', [AdminController::class, 'profil'])->name('admin.profil');
        Route::get('/informasi-publik', [AdminController::class, 'informasiPublik'])->name('admin.informasi-publik');
        Route::get('/standar-layanan', [AdminController::class, 'standarLayanan'])->name('admin.standar-layanan');
        Route::get('/laporan-publik', [AdminController::class, 'laporanPublik'])->name('admin.laporan-publik');
    });
});


// Profil Menu Routes
Route::get('/tentang-ppid', function () {
    return view('tentang-ppid');
});


Route::get('/struktur-organisasi', function () {
    return view('struktur-organisasi');
});

Route::get('/profil-pejabat', function () {
    return view('profil-pejabat');
});

Route::get('/visi-misi', function () {
    return view('visi-misi');
});

Route::get('/kontak-ppid', function () {
    return view('kontak-ppid');
});

Route::get('/galeri-foto', function () {
    return view('galeri-foto');
});

Route::get('/ppid-pelaksana-upt', function () {
    return view('ppid-pelaksana-upt');
});

// Informasi Publik Menu Routes
Route::get('/informasi-publik', function () {
    return view('informasi-publik');
});

Route::get('/informasi-berkala', function () {
    return view('informasi-berkala');
});

Route::get('/informasi-serta-merta', function () {
    return view('informasi-serta-merta');
});

Route::get('/informasi-setiap-saat', function () {
    return view('informasi-setiap-saat');
});

Route::get('/daftar-informasi-publik', function () {
    return view('daftar-informasi-publik');
});

// Standar Layanan Menu Routes
Route::get('/standar-layanan', function () {
    return view('standar-layanan');
});

Route::get('/regulasi', function () {
    return view('regulasi');
});

Route::get('/prosedur-permohonan', function () {
    return view('prosedur-permohonan');
});

Route::get('/prosedur-keberatan', function () {
    return view('prosedur-keberatan');
});

Route::get('/mekanisme-sengketa', function () {
    return view('mekanisme-sengketa');
});

Route::get('/sop-ppid', function () {
    return view('sop-ppid');
});

Route::get('/kanal-layanan', function () {
    return view('kanal-layanan');
});

Route::get('/waktu-biaya-layanan', function () {
    return view('waktu-biaya-layanan');
});

Route::get('/maklumat-informasi-publik', function () {
    return view('maklumat-informasi-publik');
});

// Laporan Menu Routes
Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/laporan-tahunan', function () {
    return view('laporan-tahunan');
});

Route::get('/survey-kepuasan-masyarakat', function () {
    return view('survey-kepuasan-masyarakat');
});

// Service Pages
Route::get('/ajukan-permohonan', function () {
    return view('ajukan-permohonan');
});

Route::get('/ajukan-keberatan', function () {
    return view('ajukan-keberatan');
});

Route::get('/informasi-publik', function () {
    return view('informasi-publik');
});

Route::get('/statistik-layanan', function () {
    return view('statistik-layanan');
});

Route::get('/kanal-pengaduan', function () {
    return view('kanal-pengaduan');
});

Route::get('/berita', function () {
    return view('berita');
});

// Detail Berita
Route::get('/berita/detail/{slug}', function ($slug) {
    return view('detail-berita');
});

// Form Permohonan
Route::get('/form-permohonan', function () {
    return view('form-permohonan');
});

// Form Keberatan
Route::get('/form-keberatan', function () {
    return view('form-keberatan');
});

// Periksa Permohonan
Route::get('/periksa-permohonan', function () {
    return view('periksa-permohonan');
});

// Periksa Keberatan
Route::get('/periksa-keberatan', function () {
    return view('periksa-keberatan');
});

