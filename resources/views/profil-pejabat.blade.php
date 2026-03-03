@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Profil Pejabat</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Pejabat Pengelola Informasi dan Dokumentasi BBIA</h2>
        
        <div class="profile-grid">
            <div class="profile-card">
                <div class="profile-photo">
                    <img src="{{ asset('images/bbia.jpg') }}" alt="PPID BBIA">
                </div>
                <div class="profile-info">
                    <h3>Nama Pejabat</h3>
                    <p class="position">Pejabat Pengelola Informasi dan Dokumentasi</p>
                    <p class="institution">Balai Besar Industri Agro</p>
                    <p class="ministry">Kementerian Perindustrian</p>
                </div>
            </div>
        </div>
        
        <h2>Tugas dan Tanggung Jawab</h2>
            <p>Sebagai PPID BBIA, pejabat ini memiliki tugas dan tanggung jawab:</p>
            <ul>
                <li>Menyediakan akses informasi publik sesuai ketentuan perundang-undangan</li>
                <li>Melakukan verifikasi dan konfirmasi informasi publik</li>
                <li>Menetapkan standar layanan informasi publik</li>
                <li>Melakukan pemutakhiran informasi publik secara berkala</li>
                <li>Menyediakan mekanisme penanganan sengketa informasi</li>
                <li>Membuat laporan pelaksanaan tugas PPID</li>
            </ul>
            
            <h2>Kontak Resmi</h2>
            <div class="contact-info">
                <div class="contact-item">
                    <strong>Alamat:</strong>
                    <p>Jl. Ir. H. Juanda No. 11, Bogor 16122</p>
                </div>
                <div class="contact-item">
                    <strong>Telepon:</strong>
                    <p>(0251) 8324068</p>
                </div>
                <div class="contact-item">
                    <strong>Email:</strong>
                    <p>cabi@bbia.go.id</p>
                </div>
                <div class="contact-item">
                    <strong>Website:</strong>
                    <p><a href="https://bbia.go.id" target="_blank">https://bbia.go.id</a></p>
                </div>
            </div>
            
            <h2>Jam Layanan</h2>
            <div class="service-hours">
                <div class="hours-item">
                    <strong>Senin - Kamis:</strong>
                    <p>08:00 - 16:00 WIB</p>
                </div>
                <div class="hours-item">
                    <strong>Jumat:</strong>
                    <p>08:00 - 15:30 WIB</p>
                </div>
                <div class="hours-item">
                    <strong>Sabtu - Minggu:</strong>
                    <p>Tutup</p>
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

.content-full h3 {
    color: #1a3a5f;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
    margin-top: 30px;
}

.content-full h3:first-child {
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

.profile-grid {
    display: flex;
    justify-content: center;
    margin: 40px 0;
}

.profile-card {
    background: rgba(26, 82, 130, 0.1);
    border: 1px solid rgba(26, 82, 130, 0.2);
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    max-width: 500px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.profile-photo {
    margin-bottom: 20px;
}

.profile-photo img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #1a3a5f;
}

.profile-info h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
}

.profile-info p {
    color: #333;
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 8px;
}

.profile-info .position {
    font-weight: 600;
    color: #1a3a5f;
}

.profile-info .institution {
    font-weight: 600;
    color: #2c5282;
}

.profile-info .ministry {
    font-weight: 600;
    color: #6c757d;
}

.contact-info {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin: 20px 0;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 15px;
}

.contact-item strong {
    color: #1a3a5f;
    min-width: 80px;
}

.contact-item p {
    color: #333;
    margin: 0;
}

.contact-item a {
    color: #1a3a5f;
    text-decoration: none;
}

.contact-item a:hover {
    text-decoration: underline;
}

.service-hours {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin: 20px 0;
}

.hours-item {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 10px;
}

.hours-item strong {
    color: #1a3a5f;
    min-width: 120px;
}

.hours-item p {
    color: #333;
    margin: 0;
}
</style>

@endsection
