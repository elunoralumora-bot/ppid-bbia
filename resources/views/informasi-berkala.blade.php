@extends('layouts.app')

@section('content')
    <div class="page-header">
    <div class="page-header-content">
        <h1>Informasi Berkala</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>
    
    <div class="content-section">
    <div class="content-full">
        <h2>Informasi Berkala PPID BBIA</h2>
        <p>Informasi berkala adalah informasi yang harus disediakan dan diumumkan secara berkala sesuai dengan ketentuan perundang-undangan.</p>
                        
            <h2>Daftar Informasi Berkala</h2>
            <div class="table-container">
                <table class="info-table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Tanggal Publikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kontens as $konten)
                            <tr>
                                <td>{{ $konten->judul }}</td>
                                <td>{{ $konten->kategori }}</td>
                                <td>{{ $konten->tanggal_publikasi ? $konten->tanggal_publikasi->format('d F Y') : $konten->created_at->format('d F Y') }}</td>
                                <td>
                                    @if($konten->file_path)
                                        <a href="{{ asset($konten->file_path) }}" class="btn-link" target="_blank">Download</a>
                                    @else
                                        <span class="btn-link" style="opacity: 0.5;">Tidak ada file</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center; padding: 20px;">Belum ada informasi berkala tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <h2>Keterangan</h2>
            <ul>
                <li>Informasi berkala tersedia dalam format PDF dan dapat diunduh secara gratis</li>
                <li>Informasi diperbarui secara berkala sesuai jadwal yang ditetapkan</li>
                <li>Untuk informasi yang tidak tersedia, dapat mengajukan permohonan informasi</li>
                <li>Masyarakat dapat memberikan masukan terkait kualitas informasi yang disediakan</li>
            </ul>
        </div>
    </div>
</div>

<div class="spacer-bottom"></div>

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

.table-container {
    overflow-x: auto;
    margin: 30px 0;
}

.info-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.info-table th {
    background: #1a3a5f;
    color: white;
    padding: 15px;
    text-align: left;
    font-weight: 600;
}

.info-table td {
    padding: 15px;
    border-bottom: 1px solid #e9ecef;
    color: #333;
}

.info-table tr:last-child td {
    border-bottom: none;
}

.info-table tr:hover {
    background: #f8f9fa;
}

.btn-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    padding: 5px 10px;
    border: 1px solid #1a3a5f;
    border-radius: 3px;
    font-size: 12px;
}

.btn-link:hover {
    background: #1a3a5f;
    color: white;
}

.spacer-bottom {
    height: 60px;
    width: 100%;
}
</style>

@endsection
