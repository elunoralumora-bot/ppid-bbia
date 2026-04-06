@extends('layouts.app')

@section('title', 'Berita PPID - PPID BBIA')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Berita PPID</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Berita Terkini</h2>
        <p>Berikut adalah berita-berita terkini dari PPID BBIA:</p>
        
        <div class="news-section">
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
        </div>
        
        <div class="sidebar-section">
            <h2>Kategori Berita</h2>
            <div class="categories">
                <ul>
                    <li><a href="#">Pengumuman (12)</a></li>
                    <li><a href="#">Kegiatan PPID (8)</a></li>
                    <li><a href="#">Regulasi (5)</a></li>
                    <li><a href="#">Layanan (7)</a></li>
                    <li><a href="#">Penghargaan (3)</a></li>
                </ul>
            </div>
            
            <h2>Berita Terpopuler</h2>
            <div class="popular-news">
                <ul>
                    <li><a href="#">PPID BBIA Luncurkan Layanan Digital</a></li>
                    <li><a href="#">Sosialisasi Keterbukaan Informasi</a></li>
                    <li><a href="#">Laporan Tahunan PPID BBIA 2025</a></li>
                    <li><a href="#">Penghargaan PPID Terbaik 2025</a></li>
                    <li><a href="#">Workshop Standar Layanan</a></li>
                </ul>
            </div>
            
            <h2>Tags</h2>
            <div class="tags-section">
                <a href="#" class="tag">PPID BBIA</a>
                <a href="#" class="tag">Informasi Publik</a>
                <a href="#" class="tag">Layanan Digital</a>
                <a href="#" class="tag">Transparansi</a>
                <a href="#" class="tag">Akuntabilitas</a>
                <a href="#" class="tag">Industri Agro</a>
                <a href="#" class="tag">Regulasi</a>
                <a href="#" class="tag">Workshop</a>
                <a href="#" class="tag">Sosialisasi</a>
                <a href="#" class="tag">Inovasi</a>
            </div>
        </div>
        
        <div class="action-section">
            <h2>Akses Layanan Informasi</h2>
            <p>Silakan akses layanan informasi publik melalui link berikut:</p>
            <div class="action-links">
                <a href="{{ url('/informasi-publik') }}" class="btn btn-outline">Informasi Publik</a>
                <a href="{{ url('/daftar-informasi-publik') }}" class="btn btn-outline">Daftar Informasi</a>
                <a href="{{ url('/form-permohonan') }}" class="btn btn-outline">Ajukan Permohonan</a>
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

.content-full p {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 16px;
}

.news-section {
    margin: 40px 0;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 30px;
}

.news-item {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 2px solid rgba(26, 58, 95, 0.1);
    transition: transform 0.3s ease;
}

.news-item:hover {
    transform: translateY(-5px);
}

.news-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.news-content {
    padding: 20px;
}

.news-date {
    color: #666;
    font-size: 14px;
    margin-bottom: 10px;
}

.news-content h3 {
    margin: 0 0 15px 0;
    font-size: 18px;
    line-height: 1.4;
}

.news-content h3 a {
    color: #1a3a5f;
    text-decoration: none;
}

.news-content h3 a:hover {
    color: #2c5282;
}

.news-content p {
    margin: 0 0 15px 0;
    color: #666;
    font-size: 14px;
    line-height: 1.6;
}

.read-more {
    color: #2c5282;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.read-more:hover {
    color: #1a3a5f;
}

.no-berita {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.sidebar-section {
    margin: 60px 0;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
}

.sidebar-section h2 {
    color: #1a3a5f;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 20px;
}

.categories ul,
.popular-news ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.categories li,
.popular-news li {
    margin-bottom: 12px;
}

.categories li a,
.popular-news li a {
    color: #333;
    text-decoration: none;
    font-size: 15px;
    line-height: 1.5;
    transition: color 0.3s ease;
}

.categories li a:hover,
.popular-news li a:hover {
    color: #2c5282;
}

.tags-section {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 20px 0;
}

.tag {
    display: inline-block;
    padding: 8px 16px;
    background: rgba(26, 58, 95, 0.1);
    color: #1a3a5f;
    text-decoration: none;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.tag:hover {
    background: #1a3a5f;
    color: white;
}

.action-section {
    margin-top: 60px;
    padding: 30px;
    background: rgba(26, 58, 95, 0.05);
    border-radius: 15px;
    border: 2px solid rgba(26, 58, 95, 0.1);
}

.action-section h2 {
    margin-top: 0;
    color: #1a3a5f;
}

.action-section p {
    margin-bottom: 25px;
}

.action-links {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.action-links .btn {
    flex: 1;
    min-width: 200px;
    text-align: center;
}

.btn {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-block;
}

.btn-primary {
    background: linear-gradient(135deg, #1a3a5f, #2c5282);
    color: white;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #102841, #1e3d5a);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(26, 58, 95, 0.3);
}

.btn-outline {
    background: transparent;
    color: #1a3a5f;
    border: 2px solid #1a3a5f;
}

.btn-outline:hover {
    background: #1a3a5f;
    color: white;
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .page-header-content {
        padding: 0 20px;
    }
    
    .content-full {
        padding: 40px 20px;
    }
    
    .content-full h2 {
        font-size: 24px;
    }
    
    .news-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .sidebar-section {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .action-links {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection
