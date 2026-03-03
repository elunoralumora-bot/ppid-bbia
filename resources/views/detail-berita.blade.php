@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Detail Berita</h1>
            <p>Berita PPID Balai Besar Industri Agro</p>
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
            <article class="news-detail">
                <div class="news-header">
                    <h1>Peningkatan Layanan Informasi Publik BBIA</h1>
                    <div class="news-meta">
                        <span class="news-date">18 Februari 2026</span>
                        <span class="news-category">Pengumuman</span>
                        <span class="news-author">Admin PPID</span>
                    </div>
                </div>
                
                <div class="news-image">
                    <img src="{{ asset('images/news-1.jpg') }}" alt="Peningkatan Layanan Informasi Publik BBIA">
                </div>
                
                <div class="news-content">
                    <p>PPID Balai Besar Industri Agro (BBIA) terus berkomitmen untuk meningkatkan kualitas layanan informasi publik demi transparansi dan akuntabilitas yang lebih baik. Berbagai inovasi telah dilakukan untuk memudahkan akses masyarakat terhadap informasi.</p>
                    
                    <h2>Digitalisasi Layanan</h2>
                    <p>Salah satu terobosan utama adalah digitalisasi layanan permohonan informasi publik. Masyarakat kini dapat mengajukan permohonan secara online melalui website resmi PPID BBIA, mengurangi waktu dan biaya yang diperlukan untuk proses pengajuan.</p>
                    
                    <h2>Standar Layanan yang Lebih Baik</h2>
                    <p>PPID BBIA telah menetapkan standar layanan yang lebih ketat dengan waktu respon maksimal 10 hari kerja untuk permohonan informasi rutin dan 30 hari untuk permohonan kompleks. Standar ini bertujuan memberikan kepastian bagi pemohon informasi.</p>
                    
                    <h2>Penyediaan Informasi Berkala</h2>
                    <p>Informasi berkala seperti laporan tahunan, statistik layanan, dan daftar informasi publik kini tersedia secara online dan dapat diakses kapan saja tanpa perlu mengajukan permohonan.</p>
                    
                    <h2>Komitmen Masa Depan</h2>
                    <p>BBIA akan terus berinovasi dalam penyediaan layanan informasi publik, termasuk pengembangan aplikasi mobile dan integrasi sistem informasi antar instansi untuk kemudahan akses informasi yang lebih baik lagi.</p>
                </div>
                
                <div class="news-footer">
                    <div class="news-tags">
                        <span class="tag">PPID BBIA</span>
                        <span class="tag">Layanan Digital</span>
                        <span class="tag">Informasi Publik</span>
                        <span class="tag">Transparansi</span>
                    </div>
                    
                    <div class="news-actions">
                        <a href="{{ url('/berita') }}" class="btn btn-outline">← Kembali ke Berita</a>
                        <a href="#" class="btn btn-primary">Bagikan</a>
                    </div>
                </div>
            </article>
            
            <div class="related-news">
                <h3>Berita Terkait</h3>
                <div class="related-news-grid">
                    <article class="related-news-item">
                        <img src="{{ asset('images/news-2.jpg') }}" alt="Berita Terkait 1">
                        <h4><a href="{{ url('/berita/detail/sosialisasi-keterbukaan-informasi-publik') }}">Sosialisasi Keterbukaan Informasi Publik</a></h4>
                        <span class="news-date">15 Februari 2026</span>
                    </article>
                    <article class="related-news-item">
                        <img src="{{ asset('images/news-3.jpg') }}" alt="Berita Terkait 2">
                        <h4><a href="{{ url('/berita/detail/laporan-tahunan-ppid-2025') }}">Laporan Tahunan PPID 2025</a></h4>
                        <span class="news-date">10 Februari 2026</span>
                    </article>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
