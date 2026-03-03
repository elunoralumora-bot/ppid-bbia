@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Ajukan Permohonan Informasi</h1>
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
                    <img src="{{ asset('images/periksa permohonan.png') }}" alt="Ajukan Permohonan">
                </div>
                
                <div class="service-content">
                    <h2>Ajukan Permohonan Informasi</h2>
                    <p>PPID BBIA menyediakan layanan permohonan informasi publik sesuai dengan peraturan perundang-undangan yang berlaku. Masyarakat dapat mengajukan permohonan informasi secara online melalui formulir yang telah disediakan.</p>
                    
                    <div class="info-box">
                        <h3>Tata Cara Permohonan Informasi:</h3>
                        <ol>
                            <li>Isi formulir permohonan informasi secara lengkap dan benar</li>
                            <li>Sertakan identitas diri yang jelas (KTP/SIM/Paspor)</li>
                            <li>Sebutkan informasi yang diminta secara spesifik</li>
                            <li>Tentukan tujuan penggunaan informasi</li>
                            <li>Kirimkan permohonan melalui sistem online atau datang langsung ke kantor PPID</li>
                        </ol>
                    </div>
                    
                    <div class="info-box">
                        <h3>Jangka Waktu Penyelesaian:</h3>
                        <ul>
                            <li>Permohonan informasi akan diproses selambat-lambatnya 10 hari kerja</li>
                            <li>Perpanjangan waktu maksimal 7 hari kerja (jika diperlukan)</li>
                            <li>Penolakan permohonan disertai alasan yang jelas</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Biaya Layanan:</h3>
                        <p>Layanan permohonan informasi dasar tidak dikenakan biaya (gratis). Namun, untuk penyalinan informasi dalam jumlah besar atau format khusus akan dikenakan biaya sesuai dengan peraturan yang berlaku.</p>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="#" class="btn btn-primary">Ajukan Permohonan Online</a>
                        <a href="{{ url('/prosedur-permohonan') }}" class="btn btn-outline">Lihat Prosedur Lengkap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
