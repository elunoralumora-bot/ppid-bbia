@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Pemeriksaan Permohonan</h1>
            <p>Monitoring status permohonan informasi publik PPID BBIA</p>
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
                    <img src="{{ asset('images/periksa permohonan.png') }}" alt="Pemeriksaan Permohonan">
                </div>
                
                <div class="service-content">
                    <h2>Pemeriksaan Permohonan</h2>
                    <p>Lacak status permohonan informasi Anda secara online. Masukkan nomor permohonan untuk mengetahui proses penanganannya.</p>
                    
                    <div class="search-box">
                        <h3>Cari Status Permohonan</h3>
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
                    
                    <div class="info-box">
                        <h3>Status Permohonan:</h3>
                        <div class="status-list">
                            <div class="status-item">
                                <span class="status-badge pending">Menunggu Verifikasi</span>
                                <p>Permohonan sedang diverifikasi oleh admin PPID</p>
                            </div>
                            <div class="status-item">
                                <span class="status-badge processing">Dalam Proses</span>
                                <p>Permohonan sedang diproses untuk pengambilan informasi</p>
                            </div>
                            <div class="status-item">
                                <span class="status-badge ready">Siap Diambil</span>
                                <p>Informasi sudah siap dan dapat diambil/dikirim</p>
                            </div>
                            <div class="status-item">
                                <span class="status-badge completed">Selesai</span>
                                <p>Permohonan telah selesai dan informasi telah diserahkan</p>
                            </div>
                            <div class="status-item">
                                <span class="status-badge rejected">Ditolak</span>
                                <p>Permohonan ditolak dengan alasan yang jelas</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-box">
                        <h3>Informasi Tambahan:</h3>
                        <ul>
                            <li>Status permohonan akan diperbarui setiap hari kerja</li>
                            <li>Notifikasi akan dikirim melalui email terdaftar</li>
                            <li>Untuk bantuan lebih lanjut, hubungi kontak PPID</li>
                            <li>Dokumen bukti permohonan dapat diunduh saat status siap</li>
                        </ul>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="{{ url('/ajukan-permohonan') }}" class="btn btn-primary">Ajukan Permohonan Baru</a>
                        <a href="{{ url('/kontak-ppid') }}" class="btn btn-outline">Hubungi PPID</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
