@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Berita PPID</h1>
            <p>Berita terkini dan kegiatan PPID Balai Besar Industri Agro</p>
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
            <div class="news-section">
                <h2>Berita Terkini</h2>
                
                <div class="news-grid">
                    @php
                        $beritas = \App\Models\Berita::where('status', 'published')->latest()->get();
                    @endphp
                    
                    @forelse ($beritas as $berita)
                    <article class="news-item">
                        <div class="news-image">
                            @if ($berita->gambar)
                                <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}">
                            @else
                                <img src="{{ asset('images/beranda.jpg') }}" alt="{{ $berita->judul }}">
                            @endif
                        </div>
                        <div class="news-content">
                            <div class="news-date">{{ $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('d F Y') : $berita->created_at->format('d F Y') }}</div>
                            <h3><a href="{{ url('/berita/detail/' . $berita->slug) }}">{{ $berita->judul }}</a></h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 150) }}</p>
                            <a href="{{ url('/berita/detail/' . $berita->slug) }}" class="read-more">Baca Selengkapnya →</a>
                        </div>
                    </article>
                    @empty
                    <div class="no-berita">
                        <p>Belum ada berita yang tersedia saat ini.</p>
                    </div>
                    @endforelse
                </div>
                
                <div class="pagination">
                    <a href="#" class="page-link active">1</a>
                    <a href="#" class="page-link">2</a>
                    <a href="#" class="page-link">3</a>
                    <a href="#" class="page-link">→</a>
                </div>
            </div>
            
            <div class="sidebar">
                <div class="widget">
                    <h3>Kategori Berita</h3>
                    <ul>
                        <li><a href="#">Pengumuman (12)</a></li>
                        <li><a href="#">Kegiatan PPID (8)</a></li>
                        <li><a href="#">Regulasi (5)</a></li>
                        <li><a href="#">Layanan (7)</a></li>
                        <li><a href="#">Penghargaan (3)</a></li>
                    </ul>
                </div>
                
                <div class="widget">
                    <h3>Berita Terpopuler</h3>
                    <ul>
                        <li><a href="#">PPID BBIA Luncurkan Layanan Digital</a></li>
                        <li><a href="#">Sosialisasi Keterbukaan Informasi</a></li>
                        <li><a href="#">Laporan Tahunan PPID BBIA 2025</a></li>
                        <li><a href="#">Penghargaan PPID Terbaik 2025</a></li>
                        <li><a href="#">Workshop Standar Layanan</a></li>
                    </ul>
                </div>
                
                <div class="widget">
                    <h3>Tags</h3>
                    <div class="tags">
                        <a href="#" class="tag">PPID BBIA</a>
                        <a href="#" class="tag">Informasi Publik</a>
                        <a href="#" class="tag">Layanan Digital</a>
                        <a href="#" class="tag">Transparansi</a>
                        <a href="#" class="tag">Akuntabilitas</a>
                        <a href="#" class="tag">Industri Agro</a>
                        <a href="#" class="tag">Regulasi</a>
                        <a href="#" class="tag">Workshop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
