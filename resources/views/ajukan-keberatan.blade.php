@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Ajukan Keberatan</h1>
            <p>Layanan pengajuan keberatan atas pelayanan informasi publik PPID BBIA</p>
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
                    <img src="{{ asset('images/periksa keberatan.png') }}" alt="Ajukan Keberatan">
                </div>
                
                <div class="service-content">
                    <h2>Ajukan Keberatan</h2>
                    <p>Pemohon informasi dapat mengajukan keberatan apabila permohonan informasi tidak dipenuhi atau tidak puas dengan pelayanan yang diberikan oleh PPID BBIA.</p>
                    
                    <div class="info-box">
                        <h3>Alasan Pengajuan Keberatan:</h3>
                        <ul>
                            <li>Permohonan informasi ditolak tanpa alasan yang jelas</li>
                            <li>Informasi yang diberikan tidak sesuai dengan yang diminta</li>
                            <li>Jangka waktu penyelesaian terlampaui tanpa kejelasan</li>
                            <li>Biaya yang dikenakan tidak sesuai ketentuan</li>
                            <li>Pelayanan tidak sesuai dengan standar yang ditetapkan</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Tata Cara Pengajuan Keberatan:</h3>
                        <ol>
                            <li>Buat surat keberatan secara tertulis</li>
                            <li>Sertakan salinan permohonan informasi awal</li>
                            <li>Jelaskan alasan pengajuan keberatan secara rinci</li>
                            <li>Lampirkan bukti-bukti pendukung</li>
                            <li>Kirimkan keberatan kepada Atasan PPID</li>
                        </ol>
                    </div>
                    
                    <div class="info-box">
                        <h3>Jangka Waktu Penyelesaian:</h3>
                        <ul>
                            <li>Keberatan akan diproses selambat-lambatnya 30 hari kerja</li>
                            <li>Hasil keberatan akan disampaikan secara tertulis</li>
                            <li>Keputusan bersifat final dan mengikat</li>
                        </ul>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="#" class="btn btn-primary">Ajukan Keberatan Online</a>
                        <a href="{{ url('/prosedur-keberatan') }}" class="btn btn-outline">Lihat Prosedur Lengkap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
