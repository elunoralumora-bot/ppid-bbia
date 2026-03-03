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
            
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-icon">
                        <img src="{{ asset('images/statistik layanan.png') }}" alt="Statistik Layanan">
                    </div>
                    <div class="info-content">
                        <h3>Statistik Layanan</h3>
                        <p>Data statistik real-time layanan informasi publik PPID BBIA.</p>
                        <a href="#" class="info-link">Lihat Statistik →</a>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Kanal Pengaduan">
                    </div>
                    <div class="info-content">
                        <h3>Status Permohonan</h3>
                        <p>Cek status permohonan informasi yang sedang diproses.</p>
                        <a href="#" class="info-link">Cek Status →</a>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <img src="{{ asset('images/periksa keberatan.png') }}" alt="Periksa Keberatan">
                    </div>
                    <div class="info-content">
                        <h3>Status Keberatan</h3>
                        <p>Tracking status pengajuan keberatan informasi publik.</p>
                        <a href="#" class="info-link">Lacak Keberatan →</a>
                    </div>
                </div>
                
                <div class="info-card">
                    <div class="info-icon">
                        <img src="{{ asset('images/open data.png') }}" alt="Open Data">
                    </div>
                    <div class="info-content">
                        <h3>Data Terbuka</h3>
                        <p>Akses data terbuka BBIA untuk penelitian dan pengembangan.</p>
                        <a href="#" class="info-link">Akses Data →</a>
                    </div>
                </div>
            </div>
            
            <h2>Informasi Real-Time</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">1,234</div>
                    <div class="stat-label">Total Permohonan</div>
                    <div class="stat-period">Tahun 2026</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">1,189</div>
                    <div class="stat-label">Permohonan Diproses</div>
                    <div class="stat-period">Tahun 2026</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">45</div>
                    <div class="stat-label">Keberatan Diterima</div>
                    <div class="stat-period">Tahun 2026</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">98.5%</div>
                    <div class="stat-label">Tingkat Kepuasan</div>
                    <div class="stat-period">Tahun 2026</div>
                </div>
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
            
            <h2>Jadwal Update</h2>
            <div class="schedule-box">
                <h3>Waktu Update Informasi</h3>
                <ul>
                    <li><strong>Statistik Layanan:</strong> Update setiap hari (Real-time)</li>
                    <li><strong>Status Permohonan:</strong> Update setiap 1 jam</li>
                    <li><strong>Status Keberatan:</strong> Update setiap 2 jam</li>
                    <li><strong>Data Terbuka:</strong> Update setiap minggu</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
.page-header {
    background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
    color: white;
    padding: 40px 0;
    margin: 0;
    width: 100vw;
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
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
</style>

@endsection
