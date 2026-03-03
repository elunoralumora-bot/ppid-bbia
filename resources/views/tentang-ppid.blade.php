@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Tentang PPID</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Apa itu PPID?</h2>
        <p>Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab atas penyediaan layanan dan informasi publik di lingkungan Balai Besar Industri Agro (BBIA). PPID BBIA berfungsi sebagai jembatan antara institusi dengan masyarakat dalam hal akses informasi publik.</p>
        
        <h2>Tugas dan Fungsi</h2>
        <p>Berdasarkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik, PPID BBIA memiliki tugas dan fungsi:</p>
        <ul>
            <li>Menyediakan akses informasi publik secara cepat, tepat, dan akuntabel</li>
            <li>Melakukan verifikasi dan konfirmasi informasi publik</li>
            <li>Menetapkan standar layanan informasi publik</li>
            <li>Melakukan pemutakhiran informasi publik secara berkala</li>
            <li>Menyediakan mekanisme penanganan sengketa informasi</li>
        </ul>
        
        <h2>Dasar Hukum</h2>
        <p>Pelaksanaan tugas PPID BBIA didasarkan pada:</p>
        <ul>
            <li>Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik</li>
            <li>Peraturan Pemerintah Nomor 61 Tahun 2010 tentang Pelaksanaan UU Keterbukaan Informasi Publik</li>
            <li>Peraturan Komisi Informasi Nomor 1 Tahun 2010 tentang Standar Layanan Informasi Publik</li>
            <li>Peraturan internal Kementerian Perindustrian terkait PPID</li>
        </ul>
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

.content-full ul {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    padding-left: 25px;
}

.content-full li {
    margin-bottom: 12px;
    font-size: 16px;
}
</style>

@endsection
