@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Pemeriksaan Keberatan</h1>
            <p>Monitoring status pengajuan keberatan informasi publik PPID BBIA</p>
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
                    <img src="{{ asset('images/periksa keberatan.png') }}" alt="Pemeriksaan Keberatan">
                </div>
                
                <div class="service-content">
                    <h2>Pemeriksaan Keberatan</h2>
                    <p>Lacak status pengajuan keberatan Anda secara online. Masukkan nomor keberatan untuk mengetahui proses penanganannya.</p>
                    
                    <div class="search-box">
                        <h3>Cari Status Keberatan</h3>
                        <form class="search-form">
                            <div class="form-group">
                                <label for="nomor-keberatan">Nomor Keberatan</label>
                                <input type="text" id="nomor-keberatan" name="nomor_keberatan" placeholder="Masukkan nomor keberatan" required>
                            </div>
                            <div class="form-group">
                                <label for="email-keberatan">Email</label>
                                <input type="email" id="email-keberatan" name="email_keberatan" placeholder="Masukkan email Anda" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cari Status</button>
                        </form>
                    </div>
                    
                    <div class="info-box">
                        <h3>Status Keberatan:</h3>
                        <div class="status-list">
                            <div class="status-item">
                                <span class="status-badge pending">Menunggu Verifikasi</span>
                                <p>Keberatan sedang diverifikasi oleh atasan PPID</p>
                            </div>
                            <div class="status-item">
                                <span class="status-badge processing">Dalam Proses</span>
                                <p>Keberatan sedang ditelaah dan dievaluasi</p>
                            </div>
                            <div class="status-item">
                                <span class="status-badge review">Dalam Penelaahan</span>
                                <p>Keberatan sedang dalam proses penelaahan mendalam</p>
                            </div>
                            <div class="status-item">
                                <span class="status-badge completed">Disetujui</span>
                                <p>Keberatan disetujui dan informasi akan disediakan</p>
                            </div>
                            <div class="status-item">
                                <span class="status-badge rejected">Ditolak</span>
                                <p>Keberatan ditolak dengan alasan yang jelas</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-box">
                        <h3>Prosedur Lanjutan:</h3>
                        <ul>
                            <li>Jika keberatan ditolak, dapat mengajukan sengketa informasi</li>
                            <li>Sengketa informasi dapat diajukan ke Komisi Informasi</li>
                            <li>Keputusan Komisi Informasi bersifat final dan mengikat</li>
                            <li>Dokumen keberatan dapat diunduh saat status selesai</li>
                        </ul>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="{{ url('/ajukan-keberatan') }}" class="btn btn-primary">Ajukan Keberatan Baru</a>
                        <a href="{{ url('/mekanisme-sengketa') }}" class="btn btn-outline">Mekanisme Sengketa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
