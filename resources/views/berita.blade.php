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

        
        <div class="content-wrapper">
            <div class="main-content">
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
                        <div class="no-berita-icon">📰</div>
                        <h3>Belum Ada Berita</h3>
                        <p>Belum ada berita yang tersedia saat ini. Silakan kembali lagi nanti.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        
        <div class="sidebar">
            <div class="sidebar-widget">
                <h3>Kategori Berita</h3>
                <div class="categories">
                    @php
                        $categories = [
                            'Pengumuman' => \App\Models\Berita::where('status', 'published')->where('kategori', 'Pengumuman')->count(),
                            'Kegiatan PPID' => \App\Models\Berita::where('status', 'published')->where('kategori', 'Kegiatan PPID')->count(),
                            'Regulasi' => \App\Models\Berita::where('status', 'published')->where('kategori', 'Regulasi')->count(),
                            'Layanan' => \App\Models\Berita::where('status', 'published')->where('kategori', 'Layanan')->count(),
                            'Penghargaan' => \App\Models\Berita::where('status', 'published')->where('kategori', 'Penghargaan')->count(),
                        ];
                    @endphp
                    <ul>
                        @foreach($categories as $category => $count)
                            <li>
                                <a href="#">
                                    <span class="category-name">{{ $category }}</span>
                                    <span class="category-count">{{ $count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            <div class="sidebar-widget">
                <h3>Berita Terbaru</h3>
                <div class="popular-news">
                    @php
                        $popularBerita = \App\Models\Berita::where('status', 'published')
                            ->latest()
                            ->take(5)
                            ->get();
                    @endphp
                    <ul>
                        @forelse($popularBerita as $popular)
                            <li>
                                <a href="{{ url('/berita/detail/' . $popular->slug) }}">
                                    <span class="popular-number">{{ $loop->iteration }}</span>
                                    <span class="popular-title">{{ $popular->judul }}</span>
                                </a>
                            </li>
                        @empty
                            <li class="no-popular">
                                <a href="#">Belum ada berita populer</a>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            
<style>
.page-header {
    background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
    color: white;
    padding: 40px 0;
    margin: 0 0 20px 0;
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
    padding: 10px 20px;
    min-height: 60vh;
}

.content-full {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 40px;
    background: transparent;
}

.content-wrapper {
    display: flex;
    gap: 40px;
    align-items: flex-start;
}

.main-content {
    flex: 1;
    min-width: 0;
}

.sidebar {
    width: 350px;
    flex-shrink: 0;
}

.section-header {
    margin-bottom: 20px;
}

.section-header h2 {
    color: #1a3a5f;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 10px;
}

.section-header p {
    color: #666;
    font-size: 16px;
    margin-bottom: 0;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
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
    padding: 80px 40px;
    color: #666;
    background: rgba(26, 58, 95, 0.02);
    border-radius: 15px;
    border: 2px dashed rgba(26, 58, 95, 0.2);
}

.no-berita-icon {
    font-size: 64px;
    margin-bottom: 20px;
}

.no-berita h3 {
    color: #1a3a5f;
    font-size: 24px;
    margin-bottom: 15px;
}

.no-berita p {
    font-size: 16px;
    margin-bottom: 0;
}

.sidebar-widget {
    background: white;
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    margin-top: 40px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(26, 58, 95, 0.1);
}

.sidebar-widget h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
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
    border-bottom: 1px solid rgba(26, 58, 95, 0.05);
    padding-bottom: 12px;
}

.categories li:last-child,
.popular-news li:last-child {
    margin-bottom: 0;
    border-bottom: none;
    padding-bottom: 0;
}

.categories li a,
.popular-news li a {
    color: #333;
    text-decoration: none;
    font-size: 15px;
    line-height: 1.5;
    transition: color 0.3s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.categories li a:hover,
.popular-news li a:hover {
    color: #2c5282;
}

.category-name {
    flex: 1;
}

.category-count {
    background: rgba(26, 58, 95, 0.1);
    color: #1a3a5f;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    min-width: 20px;
    text-align: center;
}

.popular-number {
    background: linear-gradient(135deg, #2c5282, #1a3a5f);
    color: white;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
    margin-right: 12px;
    flex-shrink: 0;
}

.popular-title {
    flex: 1;
    line-height: 1.4;
}

.no-popular a {
    color: #999;
    font-style: italic;
}

.tags-section {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 15px;
}

.tag {
    display: inline-block;
    padding: 6px 12px;
    background: rgba(26, 58, 95, 0.1);
    color: #1a3a5f;
    text-decoration: none;
    border-radius: 15px;
    font-size: 13px;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 1px solid rgba(26, 58, 95, 0.2);
}

.tag:hover {
    background: #1a3a5f;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(26, 58, 95, 0.3);
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

@media (max-width: 1024px) {
    .sidebar {
        width: 280px;
    }
}

@media (max-width: 768px) {
    .page-header-content {
        padding: 0 20px;
    }
    
    .content-full {
        padding: 40px 20px;
    }
    
    .content-wrapper {
        flex-direction: column;
        gap: 30px;
    }
    
    .sidebar {
        width: 100%;
    }
    
    .section-header h2 {
        font-size: 28px;
    }
    
    .news-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .no-berita {
        padding: 60px 20px;
    }
    
    .no-berita-icon {
        font-size: 48px;
    }
    
    .sidebar-widget {
        padding: 20px;
    }
    
    .sidebar-widget h3 {
        font-size: 18px;
    }
    
    .btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection
