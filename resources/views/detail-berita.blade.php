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
                @php
                    // Process content to ensure proper paragraph formatting
                    $content = $berita->konten;
                    
                    // Convert double newlines to paragraph breaks
                    $content = preg_replace('/\n\s*\n/', '</p><p>', $content);
                    
                    // Ensure content starts with <p> and ends with </p>
                    if (!str_starts_with($content, '<p>')) {
                        $content = '<p>' . $content;
                    }
                    if (!str_ends_with($content, '</p>')) {
                        $content = $content . '</p>';
                    }
                    
                    // Handle other HTML elements
                    $content = str_replace(['<br>', '<br/>'], ['<br/>', '<br/>'], $content);
                @endphp
                {!! $content !!}
            </div>
            
            <div class="news-footer">
                
                <div class="news-actions">
                    <a href="{{ url('/berita') }}" class="btn btn-outline">← Kembali ke Berita</a>
                    <a href="#" class="btn btn-primary" onclick="window.print()">Cetak Berita</a>
                </div>
            </div>
        </article>
        
        <!-- Komentar Section -->
        <div class="comments-section">
            <h2>Komentar (<span id="commentCount">0</span>)</h2>
            
            <!-- Form Komentar -->
            <div class="comment-form">
                <h3>Tinggalkan Komentar</h3>
                <form class="comment-form-inner" id="commentForm">
                    @csrf
                    <input type="hidden" id="berita_id" name="berita_id" value="{{ $berita->id }}">
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
                <div id="commentMessage" class="comment-message" style="display: none;"></div>
            </div>
            
            <!-- Daftar Komentar -->
            <div class="comments-list">
                <h3>Komentar Terbaru</h3>
                <div id="commentsContainer">
                    <div class="loading-comments" style="text-align: center; padding: 20px;">
                        <p>Memuat komentar...</p>
                    </div>
                </div>
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
    </div>
</div>

<style>
@media print {
    /* Hide all elements except what we want to print */
    body * {
        visibility: hidden;
    }
    
    /* Show only the news content we want to print */
    .news-detail, .news-detail * {
        visibility: visible;
    }
    
    /* Hide specific elements within news-detail */
    .news-actions,
    .news-footer,
    .comments-section,
    .related-news {
        display: none !important;
    }
    
    /* Print-specific styling */
    body {
        margin: 0;
        padding: 20px;
        font-family: Arial, sans-serif;
        font-size: 12pt;
        line-height: 1.4;
        color: #000;
        background: white;
    }
    
    .news-detail {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        margin: 0;
        padding: 0;
        background: white;
        box-shadow: none;
    }
    
    .news-header {
        margin-bottom: 20px;
    }
    
    .news-header h1 {
        font-size: 18pt;
        color: #000;
        margin-bottom: 10px;
    }
    
    .news-meta {
        margin-bottom: 20px;
    }
    
    .news-date {
        font-size: 10pt;
        color: #666;
    }
    
    .news-image {
        margin: 0 0 20px 0;
        max-width: 100%;
        page-break-inside: avoid;
    }
    
    .news-image img {
        max-width: 100%;
        height: auto;
        display: block;
    }
    
    .news-content {
        margin: 0;
        padding: 0;
        background: white;
        box-shadow: none;
        border-radius: 0;
        font-size: 12pt;
        line-height: 1.4;
        text-align: justify;
    }
    
    .news-content * {
        max-width: 100%;
    }
    
    .news-content p {
        margin: 0 0 12pt 0;
        text-align: justify;
    }
    
    .news-content h2 {
        font-size: 14pt;
        margin: 16pt 0 8pt 0;
        page-break-after: avoid;
    }
    
    .news-content h3 {
        font-size: 12pt;
        margin: 12pt 0 6pt 0;
        page-break-after: avoid;
    }
    
    .news-content ul, .news-content ol {
        margin: 0 0 12pt 0;
        padding-left: 20pt;
    }
    
    .news-content li {
        margin: 0 0 6pt 0;
    }
    
    .news-content blockquote {
        margin: 12pt 0;
        padding: 8pt 12pt;
        border-left: 2pt solid #ccc;
        background: #f5f5f5;
        font-style: italic;
    }
    
    .news-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 12pt 0;
        font-size: 10pt;
    }
    
    .news-content th, .news-content td {
        padding: 6pt;
        border: 1pt solid #ccc;
        text-align: left;
    }
    
    .news-content th {
        background: #f0f0f0;
        font-weight: bold;
    }
    
    /* Ensure images don't break across pages */
    img {
        page-break-inside: avoid;
        max-width: 100%;
    }
    
    /* Avoid breaking headings */
    h1, h2, h3, h4, h5, h6 {
        page-break-after: avoid;
        page-break-inside: avoid;
    }
}
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
    margin: 0 auto 60px auto;
    display: block;
    clear: both;
    text-align: center;
    overflow: visible;
    position: relative;
    z-index: 1;
}

.news-image img {
    width: auto;
    height: auto;
    max-width: 100%;
    display: inline-block;
    border-radius: 15px;
}

.news-content {
    max-width: 800px;
    margin: 0 auto 40px auto;
    padding: 20px 30px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    font-size: 18px;
    line-height: 1.8;
    color: #333;
    text-align: justify;
    word-wrap: break-word;
    word-break: break-word;
    position: relative;
    z-index: 2;
    clear: both;
}

.news-content * {
    max-width: 100%;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.news-content p {
    margin: 0 0 20px 0;
    text-align: justify;
    line-height: 1.8;
}

.news-content h2 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin: 0 0 20px 0;
    line-height: 1.4;
}

.news-content h3 {
    color: #2c5282;
    font-size: 20px;
    font-weight: 600;
    margin: 25px 0 10px 0;
    line-height: 1.4;
}

.news-content ul, .news-content ol {
    margin-bottom: 20px;
    padding-left: 30px;
    text-align: justify;
}

.news-content li {
    margin-bottom: 10px;
    text-align: justify;
}

.news-content blockquote {
    border-left: 4px solid #2c5282;
    padding-left: 20px;
    margin: 20px 0;
    font-style: italic;
    color: #666;
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
}

.news-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.news-content th, .news-content td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #e1e5e9;
}

.news-content th {
    background: #f8f9fa;
    font-weight: 600;
    color: #1a3a5f;
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

.comment-message {
    margin-top: 15px;
    padding: 12px 16px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
}

.comment-message.success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.comment-message.error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.loading-comments {
    color: #666;
    font-style: italic;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.getElementById('commentForm');
    const commentsContainer = document.getElementById('commentsContainer');
    const commentCount = document.getElementById('commentCount');
    const commentMessage = document.getElementById('commentMessage');
    const beritaId = document.getElementById('berita_id').value;
    
    // Load comments when page loads
    loadComments();
    
    // Handle form submission
    commentForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(commentForm);
        
        fetch('/komentar-berita', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=\"csrf-token\"]')?.getAttribute('content') || document.querySelector('[name=\"_token\"]')?.value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage(data.message, 'success');
                commentForm.reset();
                // Reload comments to show new one immediately
                loadComments(); 
            } else {
                showMessage(data.message || 'Terjadi kesalahan', 'error');
                if (data.errors) {
                    const errorMessages = Object.values(data.errors).flat().join(', ');
                    showMessage(errorMessages, 'error');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showMessage('Terjadi kesalahan saat mengirim komentar', 'error');
        });
    });
    
    function loadComments() {
        fetch(`/komentar-berita/${beritaId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    renderComments(data.data);
                    commentCount.textContent = data.total;
                } else {
                    commentsContainer.innerHTML = '<div class=\"no-comments\"><p>Gagal memuat komentar</p></div>';
                    commentCount.textContent = '0';
                }
            })
            .catch(error => {
                console.error('Error loading comments:', error);
                commentsContainer.innerHTML = '<div class=\"no-comments\"><p>Gagal memuat komentar</p></div>';
                commentCount.textContent = '0';
            });
    }
    
    function renderComments(comments) {
        if (comments.length === 0) {
            commentsContainer.innerHTML = '<div class=\"no-comments\"><p>Belum ada komentar. Jadilah yang pertama berkomentar!</p></div>';
            return;
        }
        
        const commentsHtml = comments.map(comment => `
            <div class=\"comment-item\">
                <div class=\"comment-avatar\">
                    <img src=\"{{ asset('images/email.jpg') }}\" alt=\"${comment.nama}\">
                </div>
                <div class=\"comment-content\">
                    <div class=\"comment-header\">
                        <span class=\"comment-name\">${comment.nama}</span>
                        <span class=\"comment-date\">${comment.tanggal}</span>
                    </div>
                    <p class=\"comment-text\">${comment.komentar}</p>
                </div>
            </div>
        `).join('');
        
        commentsContainer.innerHTML = commentsHtml;
    }
    
    function showMessage(message, type) {
        commentMessage.textContent = message;
        commentMessage.className = `comment-message ${type}`;
        commentMessage.style.display = 'block';
        
        // Hide message after 5 seconds
        setTimeout(() => {
            commentMessage.style.display = 'none';
        }, 5000);
    }
});
</script>
@endsection
