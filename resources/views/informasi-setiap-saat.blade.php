@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Informasi Setiap Saat</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Informasi Setiap Saat PPID BBIA</h2>
        <p>Informasi setiap saat adalah informasi yang dapat diakses sewaktu-waktu oleh masyarakat sesuai dengan kebutuhan dan kepentingan.</p>
            
            
            <h2>Informasi Tersedia</h2>
            <div class="info-list">
                @forelse($kontens as $konten)
                    <div class="info-item">
                        <div class="info-header">
                            <h3>{{ $konten->judul }}</h3>
                            <span class="info-date">{{ $konten->tanggal_publikasi ? $konten->tanggal_publikasi->format('d F Y') : $konten->created_at->format('d F Y') }}</span>
                        </div>
                        <p>{{ $konten->deskripsi ?: 'Tidak ada deskripsi tersedia' }}</p>
                        @if($konten->file_path)
                            <a href="{{ asset($konten->file_path) }}" class="btn-link" target="_blank">Download PDF</a>
                        @else
                            <span class="btn-link" style="opacity: 0.5;">Tidak ada file</span>
                        @endif
                    </div>
                @empty
                    <div class="info-item">
                        <div class="info-header">
                            <h3>Belum Ada Informasi Setiap Saat</h3>
                            <span class="info-date">{{ now()->format('d F Y') }}</span>
                        </div>
                        <p>Saat ini belum ada informasi setiap saat yang tersedia. Silakan kembali lagi nanti.</p>
                        <span class="btn-link" style="opacity: 0.5;">Belum Ada File</span>
                    </div>
                @endforelse
            </div>
            
            
            <h2>Kanal Akses Informasi</h2>
            <div class="channel-grid">
                <div class="channel-item">
                    <h3>🌐 Website</h3>
                    <p>Akses informasi melalui website resmi PPID BBIA</p>
                    <a href="#" class="channel-link">ppid.bbia.go.id</a>
                </div>
                
                <div class="channel-item">
                    <h3>📧 Email</h3>
                    <p>Kirim permohonan melalui email resmi PPID</p>
                    <a href="#" class="channel-link">ppid@bbia.go.id</a>
                </div>
                
                <div class="channel-item">
                    <h3>📱 WhatsApp</h3>
                    <p>Layanan informasi melalui WhatsApp</p>
                    <a href="#" class="channel-link">+62 812-3456-7890</a>
                </div>
                
                <div class="channel-item">
                    <h3>📞 Telepon</h3>
                    <p>Layanan telepon informasi langsung</p>
                    <a href="#" class="channel-link">(0251) 8324068</a>
                </div>
            </div>
            
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

.breadcrumb a {
    color: white;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.content-section {
    max-width: 1000px;
    margin: 0 auto;
}

.content-card {
    background: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.content-card h2 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
    margin-top: 30px;
}

.content-card h2:first-child {
    margin-top: 0;
}

.content-card p {
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
}

.content-card ul {
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
    padding-left: 20px;
}

.content-card li {
    margin-bottom: 8px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.info-card {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 30px;
    display: flex;
    gap: 20px;
    align-items: center;
}

.info-icon {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
}

.info-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.info-content h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.info-content p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 15px;
}

.info-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.info-link:hover {
    text-decoration: underline;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.stat-item {
    background: #1a3a5f;
    color: white;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
}

.stat-number {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 5px;
}

.stat-period {
    font-size: 14px;
    opacity: 0.8;
}

.channel-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.channel-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
}

.channel-item h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.channel-item p {
    color: #333;
    font-size: 14px;
    margin-bottom: 15px;
}

.channel-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

.channel-link:hover {
    text-decoration: underline;
}

.schedule-box {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 30px;
    margin: 20px 0;
}

.schedule-box h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}

.schedule-box ul {
    color: #333;
    line-height: 1.6;
}

.schedule-box li {
    margin-bottom: 10px;
}

.info-list {
    margin: 30px 0;
}

.info-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.info-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.info-header h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
}

.info-date {
    color: #6c757d;
    font-size: 14px;
}

.info-item p {
    margin-bottom: 15px;
}

.btn-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    padding: 8px 16px;
    border: 1px solid #1a3a5f;
    border-radius: 5px;
    font-size: 14px;
    display: inline-block;
}

.btn-link:hover {
    background: #1a3a5f;
    color: white;
}
</style>

@endsection
