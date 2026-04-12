<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\KeberatanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\InformasiPublikController;
use App\Http\Controllers\StandarLayananController;
use App\Http\Controllers\LaporanPublikController;
use App\Http\Controllers\MenuProfilController;

// Guest Routes
Route::get('/', function () {
    return view('ppid');
});

Route::get('/login', function () {
    return redirect()->route('admin.login');
});

Route::get('/ppid', function () {
    return view('ppid');
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
        Route::get('/permohonan', [PermohonanController::class, 'index'])->name('admin.permohonan');
        Route::post('/permohonan', [PermohonanController::class, 'store'])->name('admin.permohonan.store');
        Route::post('/permohonan/{id}/status', [PermohonanController::class, 'updateStatus'])->name('admin.permohonan.updateStatus');
        Route::get('/permohonan/{id}', [PermohonanController::class, 'show'])->name('admin.permohonan.show');
        
        Route::get('/keberatan', [KeberatanController::class, 'index'])->name('admin.keberatan');
        Route::post('/keberatan', [KeberatanController::class, 'store'])->name('admin.keberatan.store');
        Route::post('/keberatan/{id}/status', [KeberatanController::class, 'updateStatus'])->name('admin.keberatan.updateStatus');
        Route::get('/keberatan/{id}', [KeberatanController::class, 'show'])->name('admin.keberatan.show');
        
        Route::get('/profil', [ProfilController::class, 'index'])->name('admin.profil');
        Route::get('/profil/create', [ProfilController::class, 'create'])->name('admin.profil.create');
        Route::post('/profil', [ProfilController::class, 'store'])->name('admin.profil.store');
        Route::get('/profil/{id}/edit', [ProfilController::class, 'edit'])->name('admin.profil.edit');
        Route::put('/profil/{id}', [ProfilController::class, 'update'])->name('admin.profil.update');
        Route::delete('/profil/{id}', [ProfilController::class, 'destroy'])->name('admin.profil.destroy');
        
        // Profil Page Routes
        Route::get('/tentang-ppid', [ProfilController::class, 'editTentangPPID'])->name('admin.tentang-ppid');
        Route::put('/tentang-ppid', [ProfilController::class, 'updateTentangPPID'])->name('admin.tentang-ppid.update');
        
        Route::get('/tugas-dan-fungsi', [ProfilController::class, 'editTugasDanFungsi'])->name('admin.tugas-dan-fungsi');
        Route::put('/tugas-dan-fungsi', [ProfilController::class, 'updateTugasDanFungsi'])->name('admin.tugas-dan-fungsi.update');
        
        Route::get('/struktur-organisasi', [ProfilController::class, 'editStrukturOrganisasi'])->name('admin.struktur-organisasi');
        Route::put('/struktur-organisasi', [ProfilController::class, 'updateStrukturOrganisasi'])->name('admin.struktur-organisasi.update');
        
        Route::get('/profil-pejabat', [ProfilController::class, 'editProfilPejabat'])->name('admin.profil-pejabat');
        Route::put('/profil-pejabat', [ProfilController::class, 'updateProfilPejabat'])->name('admin.profil-pejabat.update');
        
        Route::get('/visi-misi', [ProfilController::class, 'editVisiMisi'])->name('admin.visi-misi');
        Route::put('/visi-misi', [ProfilController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');
        
        Route::get('/kontak-ppid', [ProfilController::class, 'editKontakPPID'])->name('admin.kontak-ppid');
        Route::put('/kontak-ppid', [ProfilController::class, 'updateKontakPPID'])->name('admin.kontak-ppid.update');
        
        // Menu Profil Routes
        Route::get('/menu-profil', [MenuProfilController::class, 'index'])->name('admin.menu-profil');
        Route::get('/menu-profil/create', [MenuProfilController::class, 'create'])->name('admin.menu-profil.create');
        Route::post('/menu-profil', [MenuProfilController::class, 'store'])->name('admin.menu-profil.store');
        Route::get('/menu-profil/{id}/edit', [MenuProfilController::class, 'edit'])->name('admin.menu-profil.edit');
        Route::put('/menu-profil/{id}', [MenuProfilController::class, 'update'])->name('admin.menu-profil.update');
        Route::delete('/menu-profil/{id}', [MenuProfilController::class, 'destroy'])->name('admin.menu-profil.destroy');
        Route::post('/menu-profil/{id}/toggle', [MenuProfilController::class, 'toggleStatus'])->name('admin.menu-profil.toggle');
        Route::post('/menu-profil/update-order', [MenuProfilController::class, 'updateOrder'])->name('admin.menu-profil.update-order');
        Route::get('/menu-profil/get-next-order', [MenuProfilController::class, 'getNextOrder'])->name('admin.menu-profil.get-next-order');
        
        Route::get('/informasi-publik', [InformasiPublikController::class, 'index'])->name('admin.informasi-publik');
        Route::get('/informasi-publik/create', [InformasiPublikController::class, 'create'])->name('admin.informasi-publik.create');
        Route::post('/informasi-publik', [InformasiPublikController::class, 'store'])->name('admin.informasi-publik.store');
        Route::get('/informasi-publik/{id}/edit', [InformasiPublikController::class, 'edit'])->name('admin.informasi-publik.edit');
        Route::put('/informasi-publik/{id}', [InformasiPublikController::class, 'update'])->name('admin.informasi-publik.update');
        Route::delete('/informasi-publik/{id}', [InformasiPublikController::class, 'destroy'])->name('admin.informasi-publik.destroy');
        
        Route::get('/standar-layanan', [StandarLayananController::class, 'index'])->name('admin.standar-layanan');
        Route::get('/standar-layanan/create', [StandarLayananController::class, 'create'])->name('admin.standar-layanan.create');
        Route::post('/standar-layanan', [StandarLayananController::class, 'store'])->name('admin.standar-layanan.store');
        Route::get('/standar-layanan/{id}/edit', [StandarLayananController::class, 'edit'])->name('admin.standar-layanan.edit');
        Route::put('/standar-layanan/{id}', [StandarLayananController::class, 'update'])->name('admin.standar-layanan.update');
        Route::delete('/standar-layanan/{id}', [StandarLayananController::class, 'destroy'])->name('admin.standar-layanan.destroy');
        
        Route::get('/laporan-publik', [LaporanPublikController::class, 'index'])->name('admin.laporan-publik');
        Route::get('/laporan-publik/create', [LaporanPublikController::class, 'create'])->name('admin.laporan-publik.create');
        Route::post('/laporan-publik', [LaporanPublikController::class, 'store'])->name('admin.laporan-publik.store');
        Route::get('/laporan-publik/{id}/edit', [LaporanPublikController::class, 'edit'])->name('admin.laporan-publik.edit');
        Route::put('/laporan-publik/{id}', [LaporanPublikController::class, 'update'])->name('admin.laporan-publik.update');
        Route::delete('/laporan-publik/{id}', [LaporanPublikController::class, 'destroy'])->name('admin.laporan-publik.destroy');
        
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
        Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
        
        // User Management Routes
        Route::get('/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manage-users');
        Route::get('/create-user', [AdminController::class, 'createUser'])->name('admin.create-user');
        Route::post('/store-user', [AdminController::class, 'storeRegularUser'])->name('admin.store-user');
        Route::get('/edit-user/{id}', [AdminController::class, 'editUser'])->name('admin.edit-user');
        Route::put('/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.update-user');
        Route::delete('/destroy-user/{id}', [AdminController::class, 'destroyRegularUser'])->name('admin.destroy-user');
        
        // Permohonan Management Routes
        Route::get('/manage-permohonan', [AdminController::class, 'managePermohonan'])->name('admin.manage-permohonan');
        Route::get('/show-permohonan/{id}', [AdminController::class, 'showPermohonan'])->name('admin.show-permohonan');
        Route::post('/update-permohonan-status/{id}', [AdminController::class, 'updatePermohonanStatus'])->name('admin.update-permohonan-status');
        Route::delete('/destroy-permohonan/{id}', [AdminController::class, 'destroyPermohonan'])->name('admin.destroy-permohonan');
        
        // Keberatan Management Routes
        Route::get('/manage-keberatan', [AdminController::class, 'manageKeberatan'])->name('admin.manage-keberatan');
        Route::get('/show-keberatan/{id}', [AdminController::class, 'showKeberatan'])->name('admin.show-keberatan');
        Route::post('/update-keberatan-status/{id}', [AdminController::class, 'updateKeberatanStatus'])->name('admin.update-keberatan-status');
        Route::delete('/destroy-keberatan/{id}', [AdminController::class, 'destroyKeberatan'])->name('admin.destroy-keberatan');
        
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
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

