@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Daftar Informasi Publik Online</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Daftar Informasi Publik PPID BBIA</h2>
        <p>Berikut adalah daftar lengkap informasi publik yang tersedia secara online di PPID BBIA.</p>
            
            <div class="search-section">
                <div class="search-box">
                    <input type="text" placeholder="Cari informasi publik..." class="search-input">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </div>
            
            <div class="info-categories">
                <div class="category-section">
                    <h3>📋 Informasi Wajib Tersedia</h3>
                    <div class="info-list">
                        <div class="info-item">
                            <h4>Profil PPID</h4>
                            <p>Informasi mengenai profil, tugas, dan fungsi PPID BBIA</p>
                            <a href="#" class="info-link">Lihat Detail →</a>
                        </div>
                        <div class="info-item">
                            <h4>Struktur Organisasi</h4>
                            <p>Bagan struktur organisasi PPID BBIA</p>
                            <a href="#" class="info-link">Lihat Detail →</a>
                        </div>
                        <div class="info-item">
                            <h4>Profil Pejabat</h4>
                            <p>Profil Pejabat Pengelola Informasi dan Dokumentasi</p>
                            <a href="#" class="info-link">Lihat Detail →</a>
                        </div>
                    </div>
                </div>
                
                <div class="category-section">
                    <h3>📊 Informasi Berkala</h3>
                    <div class="info-list">
                        <div class="info-item">
                            <h4>Laporan Tahunan</h4>
                            <p>Laporan tahunan PPID BBIA periode 2021-2025</p>
                            <a href="#" class="info-link">Download →</a>
                        </div>
                        <div class="info-item">
                            <h4>Laporan Semesteran</h4>
                            <p>Laporan semesteran PPID BBIA</p>
                            <a href="#" class="info-link">Download →</a>
                        </div>
                        <div class="info-item">
                            <h4>Statistik Layanan</h4>
                            <p>Data statistik layanan informasi publik</p>
                            <a href="#" class="info-link">Lihat Statistik →</a>
                        </div>
                    </div>
                </div>
                
                <div class="category-section">
                    <h3>📄 Informasi Serta Merta</h3>
                    <div class="info-list">
                        <div class="info-item">
                            <h4>Protokol Kesehatan</h4>
                            <p>Protokol kesehatan COVID-19 di lingkungan BBIA</p>
                            <a href="#" class="info-link">Download →</a>
                        </div>
                        <div class="info-item">
                            <h4>Prosedur Darurat</h4>
                            <p>Tata cara penanganan situasi darurat</p>
                            <a href="#" class="info-link">Download →</a>
                        </div>
                    </div>
                </div>
                
                <div class="category-section">
                    <h3>🔍 Informasi Setiap Saat</h3>
                    <div class="info-list">
                        <div class="info-item">
                            <h4>Status Permohonan</h4>
                            <p>Cek status permohonan informasi secara real-time</p>
                            <a href="#" class="info-link">Cek Status →</a>
                        </div>
                        <div class="info-item">
                            <h4>Data Terbuka</h4>
                            <p>Akses data terbuka BBIA untuk penelitian</p>
                            <a href="#" class="info-link">Akses Data →</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="format-section">
                <h2>Format Informasi</h2>
                <div class="format-grid">
                    <div class="format-item">
                        <h3>📄 PDF</h3>
                        <p>Dokumen dalam format PDF untuk diunduh</p>
                    </div>
                    <div class="format-item">
                        <h3>📊 Excel</h3>
                        <p>Data dalam format Excel untuk analisis</p>
                    </div>
                    <div class="format-item">
                        <h3>🌐 HTML</h3>
                        <p>Informasi dalam format web untuk dibaca online</p>
                    </div>
                    <div class="format-item">
                        <h3>📱 Mobile</h3>
                        <p>Tampilan mobile-friendly untuk akses mudah</p>
                    </div>
                </div>
            </div>
            
            <div class="help-section">
                <h2>Bantuan Akses Informasi</h2>
                <div class="help-grid">
                    <div class="help-item">
                        <h3>📞 Kontak PPID</h3>
                        <p>Hubungi PPID BBIA untuk bantuan akses informasi</p>
                        <a href="{{ url('/kontak-ppid') }}" class="help-link">Hubungi Kami →</a>
                    </div>
                    <div class="help-item">
                        <h3>📧 Email Bantuan</h3>
                        <p>Kirim email ke helpdesk@bbia.go.id</p>
                        <a href="mailto:helpdesk@bbia.go.id" class="help-link">Kirim Email →</a>
                    </div>
                    <div class="help-item">
                        <h3>💬 Live Chat</h3>
                        <p>Chat langsung dengan petugas PPID</p>
                        <a href="#" class="help-link">Mulai Chat →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.page-header {
    background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
    color: white;
    padding: 40px 0;
    margin: 0 0 40px 0;
    width: 100%;
    left: 0;
    right: 0;
}

.page-header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 60px;
}

.page-header h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 10px;
}

.breadcrumb {
    font-size: 14px;
    opacity: 0.8;
}

.breadcrumb a {
    color: white;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.content-section {
    width: 100%;
    padding: 0 20px;
    min-height: 60vh;
}

.content-full {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 40px;
    background: transparent;
}

.content-full h2 {
    color: #1a3a5f;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 20px;
    margin-top: 40px;
}

.content-full h2:first-child {
    margin-top: 0;
}

.content-full p {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 16px;
}

.breadcrumb a {
    color: white;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.content-section {
    max-width: 1000px;
    margin: 0 auto;
}

.content-card {
    background: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.content-card h2 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
    margin-top: 30px;
}

.content-card h2:first-child {
    margin-top: 0;
}

.content-card p {
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
}

.search-section {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 30px;
    margin: 20px 0;
}

.search-box {
    display: flex;
    gap: 15px;
    max-width: 600px;
    margin: 0 auto;
}

.search-input {
    flex: 1;
    padding: 12px;
    border: 2px solid #1a3a5f;
    border-radius: 5px;
    font-size: 14px;
}

.btn-primary {
    background-color: #1a3a5f;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 5px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #102841;
}

.info-categories {
    margin: 30px 0;
}

.category-section {
    margin-bottom: 30px;
}

.category-section h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.info-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.info-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
}

.info-item h4 {
    color: #1a3a5f;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
}

.info-item p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 15px;
}

.info-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.info-link:hover {
    text-decoration: underline;
}

.format-section {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 30px;
    margin: 20px 0;
}

.format-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.format-item {
    text-align: center;
    padding: 20px;
}

.format-item h3 {
    color: #1a3a5f;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
}

.format-item p {
    color: #333;
    font-size: 14px;
    margin: 0;
}

.help-section {
    background: #1a3a5f;
    color: white;
    border-radius: 10px;
    padding: 30px;
    margin: 20px 0;
}

.help-section h2 {
    color: white;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.help-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.help-item {
    text-align: center;
}

.help-item h3 {
    color: white;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
}

.help-item p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    margin-bottom: 15px;
}

.help-link {
    color: white;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.help-link:hover {
    text-decoration: underline;
}
</style>

@endsection
