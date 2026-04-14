@extends('layouts.app')

@section('content')
    <div class="page-header">
    <div class="page-header-content">
        <h1>Informasi Serta Merta</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Informasi Serta Merta PPID BBIA</h2>
        <p>Informasi serta merta adalah informasi yang dapat mengancam hajat hidup orang banyak atau ketenteraman masyarakat yang harus segera disampaikan.</p>
                        
            <h2>Informasi Serta Merta Tersedia</h2>
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
                            <h3>Belum Ada Informasi Serta Merta</h3>
                            <span class="info-date">{{ now()->format('d F Y') }}</span>
                        </div>
                        <p>Saat ini belum ada informasi serta merta yang tersedia. Silakan kembali lagi nanti.</p>
                        <span class="btn-link" style="opacity: 0.5;">Belum Ada File</span>
                    </div>
                @endforelse
            </div>
            
            <h2>Mekanisme Penyampaian</h2>
            <p>Informasi serta merta akan disampaikan melalui:</p>
            <ul>
                <li>Website resmi PPID BBIA</li>
                <li>Papan pengumuman di kantor BBIA</li>
                <li>Media sosial resmi BBIA</li>
                <li>Surat edaran internal dan eksternal</li>
                <li>Press release kepada media massa</li>
            </ul>
            
            <h2>Waktu Penyampaian</h2>
            <p>Informasi serta merta harus disampaikan dalam waktu:</p>
            <ul>
                <li><strong>Segera:</strong> Paling lambat 2x24 jam sejak kejadian</li>
                <li><strong>Update:</strong> Setiap ada perkembangan penting</li>
                <li><strong>Klarifikasi:</strong> Segera setelah ada informasi yang akurat</li>
            </ul>
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

.alert-box {
    background: #fff3cd;
    border: 2px solid #ffc107;
    border-radius: 10px;
    padding: 20px;
    margin: 20px 0;
}

.alert-box h3 {
    color: #856404;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.alert-box p {
    color: #856404;
    margin-bottom: 10px;
}

.alert-box ul {
    color: #856404;
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
