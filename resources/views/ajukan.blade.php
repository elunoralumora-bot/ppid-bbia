@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Ajukan Layanan</h1>
            <p>Layanan permohonan informasi publik PPID BBIA</p>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb">
    <div class="container">
    </div>
</nav>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <div class="content-section">
            <div class="service-detail">
                <div class="service-icon-large">
                    <img src="{{ asset('images/ajukan.png') }}" alt="Ajukan Layanan">
                </div>
                
                <div class="service-content">
                    <h2>Ajukan Layanan PPID BBIA</h2>
                    <p>PPID Balai Besar Industri Agro menyediakan berbagai layanan permohonan informasi publik yang dapat diakses oleh masyarakat.</p>
                    
                    <div class="info-box">
                        <h3>Layanan yang Tersedia:</h3>
                        <ul>
                            <li><strong>Permohonan Informasi Publik</strong> - Ajukan permohonan informasi yang dibutuhkan</li>
                            <li><strong>Keberatan Informasi</strong> - Ajukan keberatan atas tanggapan permohonan</li>
                            <li><strong>Konsultasi Informasi</strong> - Konsultasi terkait informasi publik</li>
                            <li><strong>Pengaduan Layanan</strong> - Sampaikan pengaduan terkait pelayanan</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Tata Cara Pengajuan:</h3>
                        <ol>
                            <li>Siapkan dokumen identitas diri yang valid</li>
                            <li>Isi formulir permohonan dengan lengkap dan jelas</li>
                            <li>Sertakan tujuan penggunaan informasi</li>
                            <li>Lampirkan dokumen pendukung (jika ada)</li>
                            <li>Kirimkan permohonan melalui kanal yang tersedia</li>
                            <li>Simpan bukti pengajuan untuk tracking</li>
                        </ol>
                    </div>
                    
                    <div class="info-box">
                        <h3>Kanal Pengajuan:</h3>
                        <div class="channel-grid">
                            <div class="channel-item">
                                <h4>Online</h4>
                                <p>Ajukan permohonan melalui formulir online</p>
                                <a href="{{ url('/form-permohonan') }}" class="btn btn-primary">Ajukan Online</a>
                            </div>
                            
                            <div class="channel-item">
                                <h4>Langsung</h4>
                                <p>Datang langsung ke kantor PPID BBIA</p>
                                <a href="{{ url('/kontak-ppid') }}" class="btn btn-outline">Kunjungi Kantor</a>
                            </div>
                            
                            <div class="channel-item">
                                <h4>Email</h4>
                                <p>Kirim permohonan melalui email resmi</p>
                                <a href="mailto:ppid@bbia.go.id" class="btn btn-outline">Kirim Email</a>
                            </div>
                            
                            <div class="channel-item">
                                <h4>Pos</h4>
                                <p>Kirim permohonan melalui jasa pos/kurir</p>
                                <a href="{{ url('/kontak-ppid') }}" class="btn btn-outline">Alamat Kantor</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-box">
                        <h3>Waktu Layanan:</h3>
                        <ul>
                            <li><strong>Senin - Jumat:</strong> 08:00 - 16:00 WIB</li>
                            <li><strong>Sabtu - Minggu:</strong> Tutup</li>
                            <li><strong>Hari Libur Nasional:</strong> Tutup</li>
                            <li><strong>Waktu Respon:</strong> Maksimal 10 hari kerja</li>
                        </ul>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="{{ url('/form-permohonan') }}" class="btn btn-primary">Ajukan Permohonan</a>
                        <a href="{{ url('/keberatan') }}" class="btn btn-outline">Ajukan Keberatan</a>
                        <a href="{{ url('/form-permohonan') }}" class="btn btn-outline">Form Permohonan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
