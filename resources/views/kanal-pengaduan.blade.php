@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Kanal Pengaduan</h1>
            <p>Layanan pengaduan dan aspirasi masyarakat PPID BBIA</p>
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
                    <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Kanal Pengaduan">
                </div>
                
                <div class="service-content">
                    <h2>Kanal Pengaduan PPID BBIA</h2>
                    <p>PPID BBIA menyediakan berbagai kanal pengaduan untuk menerima aspirasi, keluhan, dan saran dari masyarakat terkait pelayanan informasi publik.</p>
                    
                    <div class="complaint-channels">
                        <div class="channel-card">
                            <h3>Pengaduan Online</h3>
                            <p>Ajukan pengaduan secara online melalui formulir elektronik</p>
                            <a href="#" class="btn btn-sm">Ajukan Online</a>
                        </div>
                        
                        <div class="channel-card">
                            <h3>Hotline</h3>
                            <p>Layanan telepon untuk pengaduan mendesak</p>
                            <p><strong>(0251) 8324068</strong></p>
                            <p>Senin - Jumat: 08:00 - 16:00 WIB</p>
                        </div>
                        
                        <div class="channel-card">
                            <h3>Email</h3>
                            <p>Kirim pengaduan melalui email resmi</p>
                            <p><strong>pengaduan@bbia.go.id</strong></p>
                            <a href="mailto:pengaduan@bbia.go.id" class="btn btn-sm">Kirim Email</a>
                        </div>
                        
                        <div class="channel-card">
                            <h3>Langsung ke Kantor</h3>
                            <p>Datang langsung ke kantor PPID BBIA</p>
                            <p>Jl. Ir. H. Juanda No. 11, Bogor</p>
                            <p>Senin - Jumat: 08:00 - 16:00 WIB</p>
                        </div>
                    </div>
                    
                    <div class="info-box">
                        <h3>Jenis Pengaduan:</h3>
                        <ul>
                            <li>Pelayanan yang tidak sesuai standar (SOP)</li>
                            <li>Penolakan permohonan informasi tidak wajar</li>
                            <li>Waktu penyelesaian yang melebihi batas</li>
                            <li>Biaya yang tidak sesuai ketentuan</li>
                            <li>Sikap petugas yang tidak profesional</li>
                            <li>Kesulitan dalam mengakses informasi</li>
                            <li>Saran untuk perbaikan pelayanan</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Tata Cara Pengaduan:</h3>
                        <ol>
                            <li>Siapkan identitas diri yang jelas</li>
                            <li>Jelaskan permasalahan secara rinci dan objektif</li>
                            <li>Sertakan bukti-bukti pendukung (jika ada)</li>
                            <li>Sebutkan waktu dan tempat kejadian</li>
                            <li>Beri nama dan kontak pelapor</li>
                            <li>Kirimkan pengaduan melalui kanal yang tersedia</li>
                        </ol>
                    </div>
                    
                    <div class="info-box">
                        <h3>Proses Penanganan:</h3>
                        <ul>
                            <li>Pengaduan akan diregistrasi dalam sistem</li>
                            <li>Verifikasi kebenaran informasi maksimal 3 hari kerja</li>
                            <li>Penanganan pengaduan maksimal 14 hari kerja</li>
                            <li>Hasil penanganan akan disampaikan kepada pelapor</li>
                            <li>Data pengaduan digunakan untuk perbaikan layanan</li>
                        </ul>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="#" class="btn btn-primary">Ajukan Pengaduan Online</a>
                        <a href="{{ url('/kontak-ppid') }}" class="btn btn-outline">Hubungi PPID</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
