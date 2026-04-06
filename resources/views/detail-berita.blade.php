@extends('layouts.app')

@section('title', 'Detail Berita - PPID BBIA')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Detail Berita</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        @php
            // Get the current berita by slug (you might need to adjust this based on your route)
            $slug = request()->segment(3); // Assuming URL is /berita/detail/{slug}
            $berita = \App\Models\Berita::where('slug', $slug)->where('status', 'published')->first();
            
            // Get related berita
            $relatedBerita = \App\Models\Berita::where('status', 'published')
                ->where('id', '!=', $berita->id ?? 0)
                ->latest()
                ->take(3)
                ->get();
        @endphp
        
        @if($berita)
        <article class="news-detail">
            <div class="news-header">
                <h1>{{ $berita->judul }}</h1>
                <div class="news-meta">
                    <span class="news-date">{{ $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('d F Y') : $berita->created_at->format('d F Y') }}</span>
                    <span class="news-category">{{ $berita->kategori ?? 'Berita' }}</span>
                    <span class="news-author">{{ $berita->penulis ?? 'Admin PPID' }}</span>
                </div>
            </div>
            
            <div class="news-image">
                @if ($berita->gambar)
                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}">
                @else
                    <img src="{{ asset('images/beranda.jpg') }}" alt="{{ $berita->judul }}">
                @endif
            </div>
            
            <div class="news-content">
                {!! $berita->konten !!}
            </div>
            
            <div class="news-footer">
                <div class="news-tags">
                    @if($berita->tags)
                        @php
                            $tagArray = explode(',', $berita->tags);
                        @endphp
                        @foreach($tagArray as $tag)
                            <span class="tag">{{ trim($tag) }}</span>
                        @endforeach
                    @else
                        <span class="tag">PPID BBIA</span>
                        <span class="tag">Informasi Publik</span>
                        <span class="tag">Berita</span>
                    @endif
                </div>
                
                <div class="news-actions">
                    <a href="{{ url('/berita') }}" class="btn btn-outline">← Kembali ke Berita</a>
                    <a href="#" class="btn btn-primary" onclick="window.print()">Cetak Berita</a>
                </div>
            </div>
        </article>
        
        <!-- Komentar Section -->
        <div class="comments-section">
            <h2>Komentar ({{ $berita->comments ?? 0 }})</h2>
            
            <!-- Form Komentar -->
            <div class="comment-form">
                <h3>Tinggalkan Komentar</h3>
                <form class="comment-form-inner">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="komentar">Komentar</label>
                        <textarea id="komentar" name="komentar" rows="4" placeholder="Tulis komentar Anda..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                </form>
            </div>
            
            <!-- Daftar Komentar -->
            <div class="comments-list">
                <h3>Komentar Terbaru</h3>
                @php
                    // Sample comments - you should get these from database
                    $comments = [
                        [
                            'nama' => 'Ahmad Wijaya',
                            'tanggal' => '2 jam yang lalu',
                            'komentar' => 'Informasi yang sangat bermanfaat, terima kasih PPID BBIA sudah transparan.',
                            'avatar' => 'user1'
                        ],
                        [
                            'nama' => 'Siti Nurhaliza',
                            'tanggal' => '5 jam yang lalu',
                            'komentar' => 'Semoga PPID BBIA terus meningkatkan layanan informasi publiknya.',
                            'avatar' => 'user2'
                        ],
                        [
                            'nama' => 'Budi Santoso',
                            'tanggal' => '1 hari yang lalu',
                            'komentar' => 'Berita yang sangat informatif dan mudah dipahami.',
                            'avatar' => 'user3'
                        ]
                    ];
                @endphp
                
                @forelse($comments as $comment)
                <div class="comment-item">
                    <div class="comment-avatar">
                        <img src="{{ asset('images/' . $comment['avatar'] . '.jpg') }}" alt="{{ $comment['nama'] }}">
                    </div>
                    <div class="comment-content">
                        <div class="comment-header">
                            <span class="comment-name">{{ $comment['nama'] }}</span>
                            <span class="comment-date">{{ $comment['tanggal'] }}</span>
                        </div>
                        <p class="comment-text">{{ $comment['komentar'] }}</p>
                        <div class="comment-actions">
                            <a href="#" class="comment-reply">Balas</a>
                            <a href="#" class="comment-like">Suka</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="no-comments">
                    <p>Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                </div>
                @endforelse
            </div>
        </div>
        
        <!-- Berita Terkait -->
        <div class="related-news">
            <h2>Berita Terkait</h2>
            <div class="related-news-grid">
                @forelse($relatedBerita as $related)
                <article class="related-news-item">
                    <div class="related-news-image">
                        @if ($related->gambar)
                            <img src="{{ asset($related->gambar) }}" alt="{{ $related->judul }}">
                        @else
                            <img src="{{ asset('images/beranda.jpg') }}" alt="{{ $related->judul }}">
                        @endif
                    </div>
                    <div class="related-news-content">
                        <h4><a href="{{ url('/berita/detail/' . $related->slug) }}">{{ $related->judul }}</a></h4>
                        <span class="news-date">{{ $related->tanggal_publikasi ? $related->tanggal_publikasi->format('d F Y') : $related->created_at->format('d F Y') }}</span>
                    </div>
                </article>
                @empty
                <div class="no-related-news">
                    <p>Belum ada berita terkait.</p>
                </div>
                @endforelse
            </div>
        </div>
        
        @else
        <div class="no-berita">
            <h2>Berita Tidak Ditemukan</h2>
            <p>Maaf, berita yang Anda cari tidak ditemukan atau telah dihapus.</p>
            <a href="{{ url('/berita') }}" class="btn btn-primary">Kembali ke Berita</a>
        </div>
        @endif
        
        <div class="action-section">
            <h2>Akses Layanan Informasi</h2>
            <p>Silakan akses layanan informasi publik melalui link berikut:</p>
            <div class="action-links">
                <a href="{{ url('/berita') }}" class="btn btn-outline">Kembali ke Berita</a>
                <a href="{{ url('/informasi-publik') }}" class="btn btn-outline">Informasi Publik</a>
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

.news-detail {
    margin-bottom: 60px;
}

.news-header {
    margin-bottom: 30px;
}

.news-header h1 {
    color: #1a3a5f;
    font-size: 36px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 20px;
}

.news-meta {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.news-meta span {
    color: #666;
    font-size: 14px;
}

.news-meta span::before {
    content: "•";
    margin-right: 8px;
    color: #2c5282;
}

.news-meta span:first-child::before {
    display: none;
}

.news-image {
    width: 100%;
    margin-bottom: 30px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.news-image img {
    width: 100%;
    height: auto;
    max-height: 500px;
    object-fit: cover;
}

.news-content {
    font-size: 18px;
    line-height: 1.8;
    color: #333;
    margin-bottom: 40px;
}

.news-content h2 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin: 30px 0 15px 0;
}

.news-content h3 {
    color: #2c5282;
    font-size: 20px;
    font-weight: 600;
    margin: 25px 0 10px 0;
}

.news-content p {
    margin-bottom: 20px;
}

.news-content ul, .news-content ol {
    margin-bottom: 20px;
    padding-left: 30px;
}

.news-content li {
    margin-bottom: 10px;
}

.news-footer {
    padding: 30px 0;
    border-top: 1px solid #e1e5e9;
    border-bottom: 1px solid #e1e5e9;
    margin-bottom: 40px;
}

.news-tags {
    margin-bottom: 20px;
}

.tag {
    display: inline-block;
    padding: 6px 12px;
    background: rgba(26, 58, 95, 0.1);
    color: #1a3a5f;
    text-decoration: none;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
    margin-right: 8px;
    margin-bottom: 8px;
    transition: all 0.3s ease;
}

.tag:hover {
    background: #1a3a5f;
    color: white;
}

.news-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.comments-section {
    margin-bottom: 60px;
    padding: 40px;
    background: rgba(26, 58, 95, 0.02);
    border-radius: 15px;
    border: 1px solid rgba(26, 58, 95, 0.1);
}

.comments-section h2 {
    color: #1a3a5f;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 30px;
}

.comment-form {
    margin-bottom: 40px;
    padding: 30px;
    background: white;
    border-radius: 10px;
    border: 1px solid #e1e5e9;
}

.comment-form h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.comment-form-inner {
    display: grid;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    color: #1a3a5f;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-group input,
.form-group textarea {
    padding: 12px 16px;
    border: 2px solid #e1e5e9;
    border-radius: 8px;
    font-size: 14px;
    transition: border-color 0.3s;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #2c5282;
}

.comments-list h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.comment-item {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    padding: 20px;
    background: white;
    border-radius: 10px;
    border: 1px solid #e1e5e9;
}

.comment-avatar {
    flex-shrink: 0;
}

.comment-avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.comment-content {
    flex: 1;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.comment-name {
    color: #1a3a5f;
    font-weight: 600;
    font-size: 14px;
}

.comment-date {
    color: #666;
    font-size: 12px;
}

.comment-text {
    color: #333;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 10px;
}

.comment-actions {
    display: flex;
    gap: 15px;
}

.comment-reply,
.comment-like {
    color: #2c5282;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    transition: color 0.3s ease;
}

.comment-reply:hover,
.comment-like:hover {
    color: #1a3a5f;
}

.no-comments {
    text-align: center;
    padding: 40px;
    color: #666;
}

.related-news {
    margin-bottom: 60px;
}

.related-news h2 {
    color: #1a3a5f;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 30px;
}

.related-news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.related-news-item {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(26, 58, 95, 0.1);
    transition: transform 0.3s ease;
}

.related-news-item:hover {
    transform: translateY(-3px);
}

.related-news-image {
    width: 100%;
    height: 150px;
    overflow: hidden;
}

.related-news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-news-content {
    padding: 15px;
}

.related-news-content h4 {
    margin: 0 0 10px 0;
    font-size: 16px;
    line-height: 1.3;
}

.related-news-content h4 a {
    color: #1a3a5f;
    text-decoration: none;
}

.related-news-content h4 a:hover {
    color: #2c5282;
}

.related-news-content .news-date {
    color: #666;
    font-size: 12px;
}

.no-related-news {
    text-align: center;
    padding: 40px;
    color: #666;
}

.no-berita {
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.no-berita h2 {
    color: #1a3a5f;
    font-size: 28px;
    margin-bottom: 20px;
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
    
    .news-header h1 {
        font-size: 28px;
    }
    
    .news-meta {
        flex-direction: column;
        gap: 5px;
    }
    
    .news-meta span::before {
        display: none;
    }
    
    .news-content {
        font-size: 16px;
    }
    
    .news-actions {
        flex-direction: column;
    }
    
    .comments-section {
        padding: 20px;
    }
    
    .comment-form {
        padding: 20px;
    }
    
    .related-news-grid {
        grid-template-columns: 1fr;
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
