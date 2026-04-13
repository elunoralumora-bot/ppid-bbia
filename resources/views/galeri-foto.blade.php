@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Galeri Foto</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Dokumentasi Kegiatan PPID BBIA</h2>
        <p>Berikut adalah dokumentasi kegiatan PPID BBIA dalam memberikan layanan informasi publik kepada masyarakat.</p>
        
        <!-- Filter Categories -->
        <div class="filter-section">
            <div class="filter-buttons">
                <button class="filter-btn active" onclick="filterGallery('all')">Semua</button>
                @php
                    $categories = \App\Models\GaleriFoto::active()->distinct()->pluck('kategori')->sort();
                @endphp
                @foreach($categories as $category)
                    <button class="filter-btn" onclick="filterGallery('{{ $category }}')">{{ $category }}</button>
                @endforeach
            </div>
        </div>
            
            <div class="gallery-grid" id="galleryGrid">
                @php
                    $galeri = \App\Models\GaleriFoto::active()->ordered()->get();
                @endphp
                @forelse($galeri as $foto)
                    <div class="gallery-item" data-category="{{ $foto->kategori }}">
                        <div class="gallery-image">
                            <img src="{{ $foto->image_url }}" alt="{{ $foto->judul }}" loading="lazy">
                        </div>
                        <div class="gallery-caption">
                            <h3>{{ $foto->judul }}</h3>
                            <p>{{ $foto->deskripsi }}</p>
                            <div class="gallery-meta">
                                <span class="gallery-category">{{ $foto->kategori }}</span>
                                <span class="gallery-date">{{ $foto->created_at->format('d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-gallery">
                        <div class="empty-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <h3>Belum Ada Foto</h3>
                        <p>Belum ada foto galeri yang tersedia saat ini.</p>
                    </div>
                @endforelse
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

.content-card h2:first-child {
    margin-top: 0;
}

.content-card p {
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.gallery-item {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.gallery-image {
    height: 200px;
    overflow: hidden;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-image img {
    transform: scale(1.05);
}

.gallery-caption {
    padding: 20px;
}

.gallery-caption h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
}

.gallery-caption p {
    color: #333;
    font-size: 14px;
    margin-bottom: 10px;
}

.gallery-date {
    color: #6c757d;
    font-size: 12px;
    font-weight: 500;
}

.filter-section {
    margin: 30px 0;
    text-align: center;
}

.filter-buttons {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 30px;
}

.filter-btn {
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid #1a3a5f;
    color: #1a3a5f;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.filter-btn:hover,
.filter-btn.active {
    background: #1a3a5f;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(26, 58, 95, 0.3);
}

.gallery-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid #e9ecef;
}

.gallery-category {
    background: #1a3a5f;
    color: white;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.empty-gallery {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    color: #6c757d;
}

.empty-gallery .empty-icon {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.5;
}

.empty-gallery h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #1a3a5f;
}

.empty-gallery p {
    font-size: 1rem;
    margin: 0;
}

.gallery-info {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 30px;
    margin: 30px 0;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.info-item {
    text-align: center;
}

.info-item h3 {
    color: #1a3a5f;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
}

.info-item p {
    color: #333;
    font-size: 14px;
    margin: 0;
}
</style>

<script>
function filterGallery(category) {
    const items = document.querySelectorAll('.gallery-item');
    const buttons = document.querySelectorAll('.filter-btn');
    
    // Update active button
    buttons.forEach(btn => {
        btn.classList.remove('active');
        if (btn.textContent.trim().toLowerCase() === category.toLowerCase() || 
            (category === 'all' && btn.textContent.trim() === 'Semua')) {
            btn.classList.add('active');
        }
    });
    
    // Filter items
    items.forEach(item => {
        if (category === 'all') {
            item.style.display = 'block';
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'scale(1)';
            }, 100);
        } else {
            if (item.dataset.category === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'scale(1)';
                }, 100);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        }
    });
}

// Add transition styles
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.gallery-item');
    items.forEach(item => {
        item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    });
});
</script>

@endsection
