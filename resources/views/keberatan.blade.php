@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Keberatan</h1>
            <p>Layanan pengajuan keberatan informasi PPID BBIA</p>
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
                    <img src="{{ asset('images/keberatan.png') }}" alt="Keberatan">
                </div>
                
                <div class="service-content">
                    <h2>Layanan Keberatan PPID BBIA</h2>
                    <p>Layanan keberatan disediakan bagi pemohon informasi yang merasa tidak puas dengan tanggapan yang diberikan oleh PPID BBIA.</p>
                    
                    <div class="info-box">
                        <h3>Dasar Hukum:</h3>
                        <ul>
                            <li>Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik</li>
                            <li>Peraturan Komisi Informasi Nomor 1 Tahun 2010 tentang Standar Layanan Informasi Publik</li>
                            <li>Peraturan Pemerintah Nomor 61 Tahun 2010 tentang Pelaksanaan UU KIP</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Alasan Pengajuan Keberatan:</h3>
                        <ul>
                            <li>Permohonan informasi ditolak tanpa alasan yang jelas</li>
                            <li>Informasi yang diberikan tidak sesuai dengan yang diminta</li>
                            <li>Waktu penyelesaian permohonan melebihi batas waktu</li>
                            <li>Biaya yang dikenakan tidak sesuai ketentuan</li>
                            <li>Pemberian informasi tidak lengkap atau tidak akurat</li>
                            <li>Penolakan permohonan tidak sesuai dengan ketentuan perundang-undangan</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Tata Cara Pengajuan Keberatan:</h3>
                        <ol>
                            <li>Siapkan surat keberatan yang ditujukan kepada Atasan PPID</li>
                            <li>Jelaskan alasan pengajuan keberatan secara rinci</li>
                            <li>Sertakan bukti-bukti pendukung (surat tanggapan PPID, dll)</li>
                            <li>Lampirkan fotokopi identitas diri</li>
                            <li>Sertakan nomor registrasi permohonan awal</li>
                            <li>Kirimkan keberatan dalam waktu 30 hari sejak menerima tanggapan</li>
                        </ol>
                    </div>
                    
                    <div class="info-box">
                        <h3>Dokumen yang Diperlukan:</h3>
                        <ul>
                            <li>Surat keberatan yang ditandatangani di atas materai</li>
                            <li>Fotokopi KTP/SIM/Paspor</li>
                            <li>Bukti pengajuan permohonan awal</li>
                            <li>Bukti tanggapan PPID yang menjadi dasar keberatan</li>
                            <li>Dokumen pendukung lainnya (jika ada)</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Waktu Penyelesaian:</h3>
                        <ul>
                            <li><strong>Maksimal 30 hari kerja</strong> sejak keberatan diterima</li>
                            <li>Dapat diperpanjang maksimal 30 hari kerja untuk kasus kompleks</li>
                            <li>Hasil keberatan akan disampaikan secara tertulis</li>
                            <li>Keputusan bersifat final dan mengikat</li>
                        </ul>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="{{ url('/form-keberatan') }}" class="btn btn-primary">Ajukan Keberatan</a>
                        <a href="{{ url('/pemeriksaan-keberatan') }}" class="btn btn-outline">Cek Status Keberatan</a>
                        <a href="{{ url('/kontak-ppid') }}" class="btn btn-outline">Hubungi PPID</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
