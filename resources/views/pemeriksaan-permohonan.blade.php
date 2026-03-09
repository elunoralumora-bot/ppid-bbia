@extends('layouts.app')

@section('title', 'Periksa Permohonan - PPID BBIA')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Periksa Permohonan</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Apa itu Pemeriksaan Permohonan?</h2>
        <p>Pemeriksaan permohonan adalah fasilitas yang disediakan PPID BBIA untuk memungkinkan pemohon informasi melacak status pengajuan permohonan informasi publik secara online. Sistem ini memberikan transparansi dalam proses penanganan permohonan dari awal hingga selesai.</p>
        
        <h2>Cara Menggunakan Pemeriksaan Permohonan</h2>
        <p>Untuk memeriksa status permohonan informasi Anda, ikuti langkah-langkah berikut:</p>
        <ul>
            <li>Siapkan nomor permohonan yang Anda terima saat pengajuan</li>
            <li>Masukkan nomor permohonan pada form pencarian</li>
            <li>Masukkan email yang digunakan saat mendaftar</li>
            <li>Klik tombol "Cari Status" untuk melihat hasil</li>
            <li>Periksa informasi status dan perkembangan permohonan</li>
        </ul>
        
        <h2>Status Permohonan</h2>
        <p>Berikut adalah jenis-jenis status permohonan informasi:</p>
        
        <h3>Menunggu Verifikasi</h3>
        <p>Permohonan sedang dalam tahap verifikasi awal oleh admin PPID. Proses ini biasanya memakan waktu 1-2 hari kerja. Admin akan memeriksa kelengkapan data dan dokumen yang Anda ajukan.</p>
        
        <h3>Dalam Proses</h3>
        <p>Permohonan telah diverifikasi dan sedang diproses untuk pengambilan atau penyiapan informasi yang diminta. Proses ini dapat memakan waktu hingga 10 hari kerja tergantung kompleksitas informasi.</p>
        
        <h3>Siap Diambil</h3>
        <p>Informasi yang Anda minta sudah siap dan dapat diambil atau dikirim. Anda akan menerima notifikasi melalui email tentang cara dan jadwal pengambilan informasi.</p>
        
        <h3>Selesai</h3>
        <p>Permohonan telah selesai ditangani dan informasi telah diserahkan kepada pemohon. Status ini menandakan proses permohonan sudah selesai sepenuhnya.</p>
        
        <h3>Ditolak</h3>
        <p>Permohonan ditolak karena alasan tertentu sesuai dengan ketentuan perundang-undangan. Alasan penolakan akan dijelaskan dalam notifikasi yang dikirim ke email pemohon.</p>
        
        <h2>Form Pemeriksaan Status</h2>
        <p>Masukkan nomor permohonan dan email Anda untuk memeriksa status permohonan:</p>
        
        <div class="search-section">
            <form class="search-form">
                <div class="form-group">
                    <label for="nomor-permohonan">Nomor Permohonan</label>
                    <input type="text" id="nomor-permohonan" name="nomor_permohonan" placeholder="Masukkan nomor permohonan" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                <button type="submit" class="btn btn-primary">Cari Status</button>
            </form>
        </div>
        
        <h2>Informasi Penting</h2>
        <p>Beberapa hal yang perlu diperhatikan dalam pemeriksaan permohonan:</p>
        <ul>
            <li>Status permohonan diperbarui setiap hari kerja pada pukul 09.00-17.00 WIB</li>
            <li>Notifikasi perubahan status akan dikirim otomatis melalui email</li>
            <li>Nomor permohonan bersifat rahasia dan hanya dapat digunakan oleh pemohon terdaftar</li>
            <li>Untuk permohonan yang ditolak, dapat mengajukan keberatan sesuai prosedur</li>
            <li>Dokumen bukti permohonan dapat diunduh saat status sudah "Siap Diambil"</li>
        </ul>
        
        <h2>Bantuan dan Kontak</h2>
        <p>Jika Anda mengalami kendala dalam pemeriksaan status permohonan atau memiliki pertanyaan, silakan hubungi:</p>
        <ul>
            <li>Email: ppid.bbia@kemenperin.go.id</li>
            <li>Telepon: (0251) 8323880</li>
            <li>WhatsApp: 0812-3456-7890</li>
            <li>Jam operasional: Senin - Jumat, 08.00 - 16.00 WIB</li>
        </ul>
        
        <div class="action-section">
            <h2>Akses Layanan Permohonan</h2>
            <p>Silakan akses layanan permohonan informasi melalui link berikut:</p>
            <div class="action-links">
                <a href="{{ url('/form-permohonan') }}" class="btn btn-outline">Ajukan Permohonan Baru</a>
                <a href="{{ url('/pemeriksaan-keberatan') }}" class="btn btn-outline">Periksa Keberatan</a>
                <a href="{{ url('/kontak-ppid') }}" class="btn btn-outline">Hubungi PPID</a>
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

.search-section {
    margin: 40px 0;
    padding: 30px;
    background: rgba(26, 58, 95, 0.05);
    border-radius: 15px;
    border: 2px solid rgba(26, 58, 95, 0.1);
}

.search-form {
    max-width: 600px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #1a3a5f;
    font-weight: 600;
}

.form-group input {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e1e5e9;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s;
}

.form-group input:focus {
    outline: none;
    border-color: #2c5282;
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
    
    .search-section {
        padding: 20px;
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
