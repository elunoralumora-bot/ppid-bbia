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
use App\Http\Controllers\KontenWebController;
use App\Http\Controllers\PublikController;
use App\Http\Controllers\GaleriFotoController;
use App\Http\Controllers\KomentarBeritaController;

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
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    });
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Protected Admin Routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/api/realtime-activity', [AdminController::class, 'getRealTimeActivity'])->name('admin.api.realtime-activity');
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
        Route::post('/permohonan/{id}/reply', [PermohonanController::class, 'reply'])->name('admin.permohonan.reply');
        
        Route::get('/keberatan', [KeberatanController::class, 'index'])->name('admin.keberatan');
        Route::post('/keberatan', [KeberatanController::class, 'store'])->name('admin.keberatan.store');
        Route::post('/keberatan/{id}/status', [KeberatanController::class, 'updateStatus'])->name('admin.keberatan.updateStatus');
        Route::get('/keberatan/{id}', [KeberatanController::class, 'show'])->name('admin.keberatan.show');
        Route::post('/keberatan/{id}/reply', [KeberatanController::class, 'reply'])->name('admin.keberatan.reply');
        
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
        Route::put('/unit-pelaksana', [ProfilController::class, 'updateUnitPelaksana'])->name('admin.unit-pelaksana.update');
        
        Route::get('/visi-misi', [ProfilController::class, 'editVisiMisi'])->name('admin.visi-misi');
        Route::put('/visi-misi', [ProfilController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');
        
        Route::get('/kontak-ppid', [ProfilController::class, 'editKontakPPID'])->name('admin.kontak-ppid');
        Route::put('/kontak-ppid', [ProfilController::class, 'updateKontakPPID'])->name('admin.kontak-ppid.update');
        
        // Galeri Foto Routes
        Route::get('/galeri', [GaleriFotoController::class, 'index'])->name('admin.galeri.index');
        Route::get('/galeri/create', [GaleriFotoController::class, 'create'])->name('admin.galeri.create');
        Route::post('/galeri', [GaleriFotoController::class, 'store'])->name('admin.galeri.store');
        Route::get('/galeri/{id}/edit', [GaleriFotoController::class, 'edit'])->name('admin.galeri.edit');
        Route::put('/galeri/{id}', [GaleriFotoController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/galeri/{id}', [GaleriFotoController::class, 'destroy'])->name('admin.galeri.destroy');
        Route::post('/galeri/{id}/toggle', [GaleriFotoController::class, 'toggleStatus'])->name('admin.galeri.toggle');
        Route::post('/galeri/bulk', [GaleriFotoController::class, 'bulkAction'])->name('admin.galeri.bulk');
        
        // Informasi Publik Routes
        Route::get('/informasi-berkala', [AdminController::class, 'informasiBerkala'])->name('admin.informasi-berkala');
        Route::get('/informasi-berkala/create', [AdminController::class, 'createInformasiBerkala'])->name('admin.informasi-berkala.create');
        Route::post('/informasi-berkala', [AdminController::class, 'storeInformasiBerkala'])->name('admin.informasi-berkala.store');
        Route::get('/informasi-berkala/{id}/edit', [AdminController::class, 'editInformasiBerkala'])->name('admin.informasi-berkala.edit');
        Route::put('/informasi-berkala/{id}', [AdminController::class, 'updateInformasiBerkala'])->name('admin.informasi-berkala.update');
        Route::delete('/informasi-berkala/{id}', [AdminController::class, 'destroyInformasiBerkala'])->name('admin.informasi-berkala.destroy');
        
        Route::get('/informasi-serta-merta', [AdminController::class, 'informasiSertaMerta'])->name('admin.informasi-serta-merta');
        Route::get('/informasi-serta-merta/create', [AdminController::class, 'createInformasiSertaMerta'])->name('admin.informasi-serta-merta.create');
        Route::post('/informasi-serta-merta', [AdminController::class, 'storeInformasiSertaMerta'])->name('admin.informasi-serta-merta.store');
        Route::get('/informasi-serta-merta/{id}/edit', [AdminController::class, 'editInformasiSertaMerta'])->name('admin.informasi-serta-merta.edit');
        Route::put('/informasi-serta-merta/{id}', [AdminController::class, 'updateInformasiSertaMerta'])->name('admin.informasi-serta-merta.update');
        Route::delete('/informasi-serta-merta/{id}', [AdminController::class, 'destroyInformasiSertaMerta'])->name('admin.informasi-serta-merta.destroy');
        
        Route::get('/informasi-setiap-saat', [AdminController::class, 'informasiSetiapSaat'])->name('admin.informasi-setiap-saat');
        Route::get('/informasi-setiap-saat/create', [AdminController::class, 'createInformasiSetiapSaat'])->name('admin.informasi-setiap-saat.create');
        Route::post('/informasi-setiap-saat', [AdminController::class, 'storeInformasiSetiapSaat'])->name('admin.informasi-setiap-saat.store');
        Route::get('/informasi-setiap-saat/{id}/edit', [AdminController::class, 'editInformasiSetiapSaat'])->name('admin.informasi-setiap-saat.edit');
        Route::put('/informasi-setiap-saat/{id}', [AdminController::class, 'updateInformasiSetiapSaat'])->name('admin.informasi-setiap-saat.update');
        Route::delete('/informasi-setiap-saat/{id}', [AdminController::class, 'destroyInformasiSetiapSaat'])->name('admin.informasi-setiap-saat.destroy');
        
        Route::get('/daftar-informasi-publik-online', [AdminController::class, 'daftarInformasiPublikOnline'])->name('admin.daftar-informasi-publik-online');
        Route::get('/daftar-informasi-publik-online/create', [AdminController::class, 'createDaftarInformasiPublikOnline'])->name('admin.daftar-informasi-publik-online.create');
        Route::post('/daftar-informasi-publik-online', [AdminController::class, 'storeDaftarInformasiPublikOnline'])->name('admin.daftar-informasi-publik-online.store');
        Route::get('/daftar-informasi-publik-online/{id}/edit', [AdminController::class, 'editDaftarInformasiPublikOnline'])->name('admin.daftar-informasi-publik-online.edit');
        Route::put('/daftar-informasi-publik-online/{id}', [AdminController::class, 'updateDaftarInformasiPublikOnline'])->name('admin.daftar-informasi-publik-online.update');
        Route::delete('/daftar-informasi-publik-online/{id}', [AdminController::class, 'destroyDaftarInformasiPublikOnline'])->name('admin.daftar-informasi-publik-online.destroy');
        
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
        
        // Standar Layanan Routes
        Route::get('/regulasi', [AdminController::class, 'regulasi'])->name('admin.regulasi');
        Route::get('/regulasi/create', [AdminController::class, 'createRegulasi'])->name('admin.regulasi.create');
        Route::post('/regulasi', [AdminController::class, 'storeRegulasi'])->name('admin.regulasi.store');
        Route::get('/regulasi/{id}/edit', [AdminController::class, 'editRegulasi'])->name('admin.regulasi.edit');
        Route::put('/regulasi/{id}', [AdminController::class, 'updateRegulasi'])->name('admin.regulasi.update');
        Route::delete('/regulasi/{id}', [AdminController::class, 'destroyRegulasi'])->name('admin.regulasi.destroy');
        
        Route::get('/prosedur-permohonan-informasi', [AdminController::class, 'prosedurPermohonanInformasi'])->name('admin.prosedur-permohonan-informasi');
        Route::get('/prosedur-permohonan-informasi/create', [AdminController::class, 'createProsedurPermohonanInformasi'])->name('admin.prosedur-permohonan-informasi.create');
        Route::post('/prosedur-permohonan-informasi', [AdminController::class, 'storeProsedurPermohonanInformasi'])->name('admin.prosedur-permohonan-informasi.store');
        Route::get('/prosedur-permohonan-informasi/{id}/edit', [AdminController::class, 'editProsedurPermohonanInformasi'])->name('admin.prosedur-permohonan-informasi.edit');
        Route::put('/prosedur-permohonan-informasi', [AdminController::class, 'updateProsedurPermohonanInformasi'])->name('admin.prosedur-permohonan-informasi.update');
        Route::delete('/prosedur-permohonan-informasi/{id}', [AdminController::class, 'destroyProsedurPermohonanInformasi'])->name('admin.prosedur-permohonan-informasi.destroy');
        
        Route::get('/prosedur-pengajuan-keberatan', [AdminController::class, 'prosedurPengajuanKeberatan'])->name('admin.prosedur-pengajuan-keberatan');
        Route::get('/prosedur-pengajuan-keberatan/create', [AdminController::class, 'createProsedurPengajuanKeberatan'])->name('admin.prosedur-pengajuan-keberatan.create');
        Route::post('/prosedur-pengajuan-keberatan', [AdminController::class, 'storeProsedurPengajuanKeberatan'])->name('admin.prosedur-pengajuan-keberatan.store');
        Route::get('/prosedur-pengajuan-keberatan/{id}/edit', [AdminController::class, 'editProsedurPengajuanKeberatan'])->name('admin.prosedur-pengajuan-keberatan.edit');
        Route::put('/prosedur-pengajuan-keberatan', [AdminController::class, 'updateProsedurPengajuanKeberatan'])->name('admin.prosedur-pengajuan-keberatan.update');
        Route::delete('/prosedur-pengajuan-keberatan/{id}', [AdminController::class, 'destroyProsedurPengajuanKeberatan'])->name('admin.prosedur-pengajuan-keberatan.destroy');
        
        Route::get('/sop-ppid', [AdminController::class, 'sopPpid'])->name('admin.sop-ppid');
        Route::get('/sop-ppid/create', [AdminController::class, 'createSopPpid'])->name('admin.sop-ppid.create');
        Route::post('/sop-ppid', [AdminController::class, 'storeSopPpid'])->name('admin.sop-ppid.store');
        Route::get('/sop-ppid/{id}/edit', [AdminController::class, 'editSopPpid'])->name('admin.sop-ppid.edit');
        Route::put('/sop-ppid/{id}', [AdminController::class, 'updateSopPpid'])->name('admin.sop-ppid.update');
        Route::delete('/sop-ppid/{id}', [AdminController::class, 'destroySopPpid'])->name('admin.sop-ppid.destroy');
        
        Route::get('/kanal-layanan-informasi', [AdminController::class, 'kanalLayananInformasi'])->name('admin.kanal-layanan-informasi');
        Route::get('/kanal-layanan-informasi/create', [AdminController::class, 'createKanalLayananInformasi'])->name('admin.kanal-layanan-informasi.create');
        Route::post('/kanal-layanan-informasi', [AdminController::class, 'storeKanalLayananInformasi'])->name('admin.kanal-layanan-informasi.store');
        Route::get('/kanal-layanan-informasi/{id}/edit', [AdminController::class, 'editKanalLayananInformasi'])->name('admin.kanal-layanan-informasi.edit');
        Route::put('/kanal-layanan-informasi/{id}', [AdminController::class, 'updateKanalLayananInformasi'])->name('admin.kanal-layanan-informasi.update');
        Route::delete('/kanal-layanan-informasi/{id}', [AdminController::class, 'destroyKanalLayananInformasi'])->name('admin.kanal-layanan-informasi.destroy');
        
        Route::get('/waktu-biaya-layanan', [AdminController::class, 'waktuBiayaLayanan'])->name('admin.waktu-biaya-layanan');
        Route::get('/waktu-biaya-layanan/create', [AdminController::class, 'createWaktuBiayaLayanan'])->name('admin.waktu-biaya-layanan.create');
        Route::post('/waktu-biaya-layanan', [AdminController::class, 'storeWaktuBiayaLayanan'])->name('admin.waktu-biaya-layanan.store');
        Route::get('/waktu-biaya-layanan/{id}/edit', [AdminController::class, 'editWaktuBiayaLayanan'])->name('admin.waktu-biaya-layanan.edit');
        Route::put('/waktu-biaya-layanan/{id}', [AdminController::class, 'updateWaktuBiayaLayanan'])->name('admin.waktu-biaya-layanan.update');
        Route::delete('/waktu-biaya-layanan/{id}', [AdminController::class, 'destroyWaktuBiayaLayanan'])->name('admin.waktu-biaya-layanan.destroy');
        
        Route::get('/maklumat-informasi-publik', [AdminController::class, 'maklumatInformasiPublik'])->name('admin.maklumat-informasi-publik');
        Route::post('/maklumat-informasi-publik/update-image', [AdminController::class, 'updateMaklumatImage'])->name('admin.maklumat-informasi-publik.update-image');
        
        Route::get('/laporan-publik', [LaporanPublikController::class, 'index'])->name('admin.laporan-publik');
        Route::get('/laporan-publik/create', [LaporanPublikController::class, 'create'])->name('admin.laporan-publik.create');
        Route::post('/laporan-publik', [LaporanPublikController::class, 'store'])->name('admin.laporan-publik.store');
        Route::get('/laporan-publik/{id}/edit', [LaporanPublikController::class, 'edit'])->name('admin.laporan-publik.edit');
        Route::put('/laporan-publik/{id}', [LaporanPublikController::class, 'update'])->name('admin.laporan-publik.update');
        Route::delete('/laporan-publik/{id}', [LaporanPublikController::class, 'destroy'])->name('admin.laporan-publik.destroy');
        
        // Laporan Routes
        Route::get('/laporan-tahunan-ppid', [AdminController::class, 'laporanTahunanPpid'])->name('admin.laporan-tahunan-ppid');
        Route::get('/laporan-tahunan-ppid/create', [AdminController::class, 'createLaporanTahunanPpid'])->name('admin.laporan-tahunan-ppid.create');
        Route::post('/laporan-tahunan-ppid', [AdminController::class, 'storeLaporanTahunanPpid'])->name('admin.laporan-tahunan-ppid.store');
        Route::get('/laporan-tahunan-ppid/{id}/edit', [AdminController::class, 'editLaporanTahunanPpid'])->name('admin.laporan-tahunan-ppid.edit');
        Route::put('/laporan-tahunan-ppid/{id}', [AdminController::class, 'updateLaporanTahunanPpid'])->name('admin.laporan-tahunan-ppid.update');
        Route::delete('/laporan-tahunan-ppid/{id}', [AdminController::class, 'destroyLaporanTahunanPpid'])->name('admin.laporan-tahunan-ppid.destroy');
        
        Route::get('/laporan-survey-kepuasan', [AdminController::class, 'laporanSurveyKepuasan'])->name('admin.laporan-survey-kepuasan');
        Route::get('/laporan-survey-kepuasan/create', [AdminController::class, 'createLaporanSurveyKepuasan'])->name('admin.laporan-survey-kepuasan.create');
        Route::post('/laporan-survey-kepuasan', [AdminController::class, 'storeLaporanSurveyKepuasan'])->name('admin.laporan-survey-kepuasan.store');
        Route::get('/laporan-survey-kepuasan/{id}/edit', [AdminController::class, 'editLaporanSurveyKepuasan'])->name('admin.laporan-survey-kepuasan.edit');
        Route::put('/laporan-survey-kepuasan/{id}', [AdminController::class, 'updateLaporanSurveyKepuasan'])->name('admin.laporan-survey-kepuasan.update');
        Route::delete('/laporan-survey-kepuasan/{id}', [AdminController::class, 'destroyLaporanSurveyKepuasan'])->name('admin.laporan-survey-kepuasan.destroy');
        
        Route::get('/statistik-layanan-informasi', [AdminController::class, 'statistikLayananInformasi'])->name('admin.statistik-layanan-informasi');
        Route::get('/statistik-layanan-informasi/create', [AdminController::class, 'createStatistikLayananInformasi'])->name('admin.statistik-layanan-informasi.create');
        Route::post('/statistik-layanan-informasi', [AdminController::class, 'storeStatistikLayananInformasi'])->name('admin.statistik-layanan-informasi.store');
        Route::get('/statistik-layanan-informasi/{id}/edit', [AdminController::class, 'editStatistikLayananInformasi'])->name('admin.statistik-layanan-informasi.edit');
        Route::put('/statistik-layanan-informasi/{id}', [AdminController::class, 'updateStatistikLayananInformasi'])->name('admin.statistik-layanan-informasi.update');
        Route::delete('/statistik-layanan-informasi/{id}', [AdminController::class, 'destroyStatistikLayananInformasi'])->name('admin.statistik-layanan-informasi.destroy');
        
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
        Route::get('/users/{id}/edit', [AdminController::class, 'editAdmin'])->name('admin.users.edit');
        Route::put('/users/{id}', [AdminController::class, 'updateAdmin'])->name('admin.users.update');
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
        Route::get('/reports/export-pdf', [AdminController::class, 'exportPDF'])->name('admin.reports.export-pdf');
        Route::get('/reports/export-excel', [AdminController::class, 'exportExcel'])->name('admin.reports.export-excel');
        
        // Konten Web Management Routes
        Route::prefix('konten-web')->group(function () {
            // Profil
            Route::get('/profil', [KontenWebController::class, 'profilIndex'])->name('admin.konten-web.profil.index');
            Route::get('/profil/create', [KontenWebController::class, 'profilCreate'])->name('admin.konten-web.profil.create');
            Route::post('/profil', [KontenWebController::class, 'profilStore'])->name('admin.konten-web.profil.store');
            Route::get('/profil/{id}/edit', [KontenWebController::class, 'profilEdit'])->name('admin.konten-web.profil.edit');
            Route::put('/profil/{id}', [KontenWebController::class, 'profilUpdate'])->name('admin.konten-web.profil.update');
            Route::delete('/profil/{id}', [KontenWebController::class, 'profilDestroy'])->name('admin.konten-web.profil.destroy');
            
            // Informasi Publik
            Route::get('/informasi-publik', [KontenWebController::class, 'informasiPublikIndex'])->name('admin.konten-web.informasi-publik.index');
            Route::get('/informasi-publik/create', [KontenWebController::class, 'informasiPublikCreate'])->name('admin.konten-web.informasi-publik.create');
            Route::post('/informasi-publik', [KontenWebController::class, 'informasiPublikStore'])->name('admin.konten-web.informasi-publik.store');
            Route::get('/informasi-publik/{id}/edit', [KontenWebController::class, 'informasiPublikEdit'])->name('admin.konten-web.informasi-publik.edit');
            Route::put('/informasi-publik/{id}', [KontenWebController::class, 'informasiPublikUpdate'])->name('admin.konten-web.informasi-publik.update');
            Route::delete('/informasi-publik/{id}', [KontenWebController::class, 'informasiPublikDestroy'])->name('admin.konten-web.informasi-publik.destroy');
            
            // Standar Layanan
            Route::get('/standar-layanan', [KontenWebController::class, 'standarLayananIndex'])->name('admin.konten-web.standar-layanan.index');
            Route::get('/standar-layanan/create', [KontenWebController::class, 'standarLayananCreate'])->name('admin.konten-web.standar-layanan.create');
            Route::post('/standar-layanan', [KontenWebController::class, 'standarLayananStore'])->name('admin.konten-web.standar-layanan.store');
            Route::get('/standar-layanan/{id}/edit', [KontenWebController::class, 'standarLayananEdit'])->name('admin.konten-web.standar-layanan.edit');
            Route::put('/standar-layanan/{id}', [KontenWebController::class, 'standarLayananUpdate'])->name('admin.konten-web.standar-layanan.update');
            Route::delete('/standar-layanan/{id}', [KontenWebController::class, 'standarLayananDestroy'])->name('admin.konten-web.standar-layanan.destroy');
            
            // Laporan
            Route::get('/laporan', [KontenWebController::class, 'laporanIndex'])->name('admin.konten-web.laporan.index');
            Route::get('/laporan/create', [KontenWebController::class, 'laporanCreate'])->name('admin.konten-web.laporan.create');
            Route::post('/laporan', [KontenWebController::class, 'laporanStore'])->name('admin.konten-web.laporan.store');
            Route::get('/laporan/{id}/edit', [KontenWebController::class, 'laporanEdit'])->name('admin.konten-web.laporan.edit');
            Route::put('/laporan/{id}', [KontenWebController::class, 'laporanUpdate'])->name('admin.konten-web.laporan.update');
            Route::delete('/laporan/{id}', [KontenWebController::class, 'laporanDestroy'])->name('admin.konten-web.laporan.destroy');
        });
    });
});


// Profil Menu Routes
Route::get('/tentang-ppid', [PublikController::class, 'tentangPpid']);
Route::get('/struktur-organisasi', [PublikController::class, 'strukturOrganisasi']);
Route::get('/visi-misi', [PublikController::class, 'visiMisi']);
Route::get('/kontak-ppid', [PublikController::class, 'kontakPpid']);

Route::get('/galeri-foto', function () {
    return view('galeri-foto');
});

Route::get('/ppid-pelaksana-upt', function () {
    return view('ppid-pelaksana-upt');
});

// Informasi Publik Menu Routes
Route::get('/informasi-publik', [PublikController::class, 'informasiPublik']);
Route::get('/informasi-berkala', [PublikController::class, 'informasiBerkala']);
Route::get('/informasi-serta-merta', [PublikController::class, 'informasiSertaMerta']);
Route::get('/informasi-setiap-saat', [PublikController::class, 'informasiSetiapSaat']);

// Standar Layanan Menu Routes
Route::get('/standar-layanan', [PublikController::class, 'standarLayanan']);
Route::get('/regulasi', [PublikController::class, 'regulasi']);
Route::get('/prosedur-permohonan', [PublikController::class, 'prosedurPermohonan']);
Route::get('/prosedur-keberatan', [PublikController::class, 'prosedurKeberatan']);
Route::get('/sop-ppid', [PublikController::class, 'sopPpid']);
Route::get('/kanal-layanan', [PublikController::class, 'kanalLayanan']);
Route::get('/waktu-biaya-layanan', [PublikController::class, 'waktuBiayaLayanan']);
Route::get('/maklumat-informasi-publik', [PublikController::class, 'maklumatInformasiPublik']);

// Laporan Menu Routes
Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/laporan-tahunan', [PublikController::class, 'laporanTahunan']);
Route::get('/survey-kepuasan-masyarakat', [PublikController::class, 'surveyKepuasanMasyarakat']);

// Service Pages
Route::get('/ajukan-permohonan', function () {
    return view('ajukan-permohonan');
});

Route::get('/ajukan-keberatan', function () {
    return view('ajukan-keberatan');
});

Route::get('/statistik-layanan', [PublikController::class, 'statistikLayanan']);
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

Route::post('/submit-permohonan', [PermohonanController::class, 'store'])->name('submit.permohonan');

// Form Keberatan
Route::get('/form-keberatan', function () {
    return view('form-keberatan');
});

Route::post('/submit-keberatan', [KeberatanController::class, 'store'])->name('submit.keberatan');

// Debug route
Route::get('/debug-form', function () {
    return view('debug-form');
});

Route::post('/debug-submit', function (\Illuminate\Http\Request $request) {
    \Log::info('Debug submission', $request->all());
    return response()->json(['success' => true, 'data' => $request->all()]);
});

Route::get('/check-data', function () {
    $permohonan = \App\Models\Permohonan::latest()->first();
    $keberatan = \App\Models\Keberatan::latest()->first();
    
    return response()->json([
        'total_permohonan' => \App\Models\Permohonan::count(),
        'total_keberatan' => \App\Models\Keberatan::count(),
        'latest_permohonan' => $permohonan,
        'latest_keberatan' => $keberatan,
    ]);
});

// Periksa Permohonan
Route::get('/periksa-permohonan', function () {
    return view('periksa-permohonan');
});

Route::post('/cek-status-permohonan', [PermohonanController::class, 'cekStatus'])->name('cek.status.permohonan');

// Periksa Keberatan
Route::get('/periksa-keberatan', function () {
    return view('periksa-keberatan');
});

Route::post('/cek-status-keberatan', [KeberatanController::class, 'cekStatus'])->name('cek.status.keberatan');

// Komentar Berita Routes
Route::post('/komentar-berita', [KomentarBeritaController::class, 'store'])->name('komentar.berita.store');
Route::get('/komentar-berita/{beritaId}', [KomentarBeritaController::class, 'getByBerita'])->name('komentar.berita.get');

