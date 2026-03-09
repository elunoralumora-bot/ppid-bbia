@extends('layouts.app')

@section('title', 'Informasi Publik - PPID BBIA')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Informasi Publik</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Apa itu Informasi Publik?</h2>
        <p>Informasi publik adalah semua informasi yang dihasilkan, disimpan, dikelola, dan/atau dimiliki oleh lembaga publik yang berkaitan dengan penyelenggara dan/atau kegiatan penyelenggara negara dan/atau lembaga publik lainnya sesuai dengan Undang-Undang No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</p>
        
        <h2>Hak Pemohon Informasi</h2>
        <p>Setiap pemohon informasi publik memiliki hak untuk:</p>
        <ul>
            <li>Memperoleh informasi publik yang tersedia</li>
            <li>Mengajukan permohonan informasi secara tertulis</li>
            <li>Memperoleh informasi tanpa biaya (untuk informasi dasar)</li>
            <li>Memperoleh salinan informasi dalam bentuk hard copy atau soft copy</li>
            <li>Mengajukan keberatan atas pelayanan informasi</li>
        </ul>
        
        <h2>Kewajiban PPID</h2>
        <p>PPID BBIA memiliki kewajiban untuk:</p>
        <ul>
            <li>Menyediakan dan memberikan akses informasi publik</li>
            <li>Melakukan pemutakhiran informasi secara berkala</li>
            <li>Memberikan pelayanan prima kepada pemohon</li>
            <li>Menjaga keamanan dan kerahasiaan informasi tertentu</li>
            <li>Membuat laporan tahunan tentang pelayanan informasi</li>
        </ul>
        
        <h2>Jenis Informasi Publik</h2>
        <p>Berdasarkan UU Keterbukaan Informasi Publik, informasi publik diklasifikasikan menjadi:</p>
        
        <h3>Informasi Berkala</h3>
        <p>Informasi yang wajib tersedia setiap saat dan diumumkan secara berkala. Contoh: program kerja tahunan, laporan keuangan, daftar informasi publik, dan lain-lain.</p>
        
        <h3>Informasi Serta Merta</h3>
        <p>Informasi yang dapat mengancam hajat hidup orang banyak dan kepentingan umum. Contoh: informasi bencana alam, wabah penyakit, dan informasi darurat lainnya.</p>
        
        <h3>Informasi Setiap Saat</h3>
        <p>Informasi yang wajib tersedia setiap saat dan dapat diakses publik. Contoh: informasi tentang prosedur pelayanan, struktur organisasi, dan informasi lain yang relevan.</p>
        
        <h2>Informasi yang Dikecualikan</h2>
        <p>Berdasarkan UU No. 14 Tahun 2008, beberapa informasi tidak dapat diakses publik, yaitu:</p>
        <ul>
            <li>Informasi yang dapat membahayakan pertahanan dan keamanan negara</li>
            <li>Informasi yang mengungkap rahasia pribadi</li>
            <li>Informasi yang dapat menghambat proses penegakan hukum</li>
            <li>Informasi keuangan pemerintah yang belum diumumkan secara resmi</li>
            <li>Informasi yang diatur dalam undang-undang sebagai rahasia dagang</li>
        </ul>
        
        <h2>Prosedur Permohonan Informasi</h2>
        <p>Untuk memperoleh informasi publik dari PPID BBIA, pemohon dapat:</p>
        <ul>
            <li>Mengajukan permohonan secara tertulis melalui form permohonan online</li>
            <li>Mengisi formulir permohonan dengan data yang lengkap dan jelas</li>
            <li>Menyertakan tujuan penggunaan informasi yang diminta</li>
            <li>Menunggu proses verifikasi dan penyiapan informasi</li>
            <li>Menerima informasi dalam bentuk yang disepakati</li>
        </ul>
        
        <h2>Waktu dan Biaya Layanan</h2>
        <p>PPID BBIA memberikan layanan informasi publik dengan:</p>
        <ul>
            <li>Waktu penyelesaian: 10 hari kerja untuk permohonan informasi biasa</li>
            <li>Waktu penyelesaian: 20 hari kerja untuk permohonan informasi kompleks</li>
            <li>Biaya: Gratis untuk informasi dasar, biaya fotokopi untuk salinan fisik</li>
            <li>Biaya penggandaian: Rp. 100 per halaman untuk hitam putih</li>
        </ul>
        
        <div class="action-section">
            <h2>Akses Informasi Publik</h2>
            <p>Silakan akses informasi publik yang tersedia melalui link berikut:</p>
            <div class="action-links">
                <a href="{{ url('/daftar-informasi-publik') }}" class="btn btn-outline">Daftar Informasi Lengkap</a>
                <a href="{{ url('/form-permohonan') }}" class="btn btn-outline">Ajukan Permohonan</a>
                <a href="{{ url('/prosedur-permohonan') }}" class="btn btn-outline">Prosedur Lengkap</a>
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

.content-full h3 {
    color: #2c5282;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
    margin-top: 30px;
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

.action-section {
    margin-top: 60px;
    padding: 30px;
    background: rgba(26, 58, 95, 0.05);
    border-radius: 15px;
    border: 2px solid rgba(26, 58, 95, 0.1);
}

.action-section h2 {
    margin-top: 0;
    color: #1a3a5f;
}

.action-section p {
    margin-bottom: 25px;
}

.action-links {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.action-links .btn {
    flex: 1;
    min-width: 200px;
    text-align: center;
}

.btn {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-block;
}

.btn-primary {
    background: linear-gradient(135deg, #1a3a5f, #2c5282);
    color: white;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #102841, #1e3d5a);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(26, 58, 95, 0.3);
}

.btn-outline {
    background: transparent;
    color: #1a3a5f;
    border: 2px solid #1a3a5f;
}

.btn-outline:hover {
    background: #1a3a5f;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .page-header-content {
        padding: 0 20px;
    }
    
    .content-full {
        padding: 40px 20px;
    }
    
    .content-full h2 {
        font-size: 24px;
    }
    
    .content-full h3 {
        font-size: 20px;
    }
    
    .action-links {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection
