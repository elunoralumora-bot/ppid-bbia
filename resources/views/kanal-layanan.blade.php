@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Kanal Layanan Informasi</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Kanal Layanan Informasi Publik PPID BBIA</h2>
        <p>PPID BBIA menyediakan berbagai kanal layanan informasi publik untuk memudahkan masyarakat mengakses informasi yang dibutuhkan.</p>
            
            <div class="channel-grid">
                <div class="channel-item">
                    <div class="channel-icon">
                        <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Layanan Langsung">
                    </div>
                    <div class="channel-content">
                        <h3>Layanan Langsung</h3>
                        <p>Layanan informasi publik yang dapat diakses langsung di kantor PPID BBIA.</p>
                        <div class="channel-details">
                            <div class="detail-item">
                                <strong>Lokasi:</strong> Jl. Ir. H. Juanda No. 11, Bogor
                            </div>
                            <div class="detail-item">
                                <strong>Jam Layanan:</strong> Senin - Jumat, 08:00 - 16:00 WIB
                            </div>
                            <div class="detail-item">
                                <strong>Petugas:</strong> PPID BBIA dan Staf
                            </div>
                        </div>
                        <a href="#" class="channel-link">Lihat Detail →</a>
                    </div>
                </div>
                
                <div class="channel-item">
                    <div class="channel-icon">
                        <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Layanan Online">
                    </div>
                    <div class="channel-content">
                        <h3>Layanan Online</h3>
                        <p>Layanan informasi publik melalui website dan aplikasi PPID BBIA.</p>
                        <div class="channel-details">
                            <div class="detail-item">
                                <strong>Website:</strong> ppid.bbia.go.id
                            </div>
                            <div class="detail-item">
                                <strong>Akses:</strong> 24/7 (kecuali maintenance)
                            </div>
                            <div class="detail-item">
                                <strong>Fitur:</strong> Permohonan, Tracking, Download
                            </div>
                        </div>
                        <a href="#" class="channel-link">Lihat Detail →</a>
                    </div>
                </div>
                
                <div class="channel-item">
                    <div class="channel-icon">
                        <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Layanan Email">
                    </div>
                    <div class="channel-content">
                        <h3>Layanan Email</h3>
                        <p>Layanan informasi publik melalui email resmi PPID BBIA.</p>
                        <div class="channel-details">
                            <div class="detail-item">
                                <strong>Email:</strong> ppid@bbia.go.id
                            </div>
                            <div class="detail-item">
                                <strong>Respon:</strong> Maksimal 2x24 jam
                            </div>
                            <div class="detail-item">
                                <strong>Dokumen:</strong> PDF, DOC, XLS
                            </div>
                        </div>
                        <a href="#" class="channel-link">Lihat Detail →</a>
                    </div>
                </div>
                
                <div class="channel-item">
                    <div class="channel-icon">
                        <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Layanan WhatsApp">
                    </div>
                    <div class="channel-content">
                        <h3>Layanan WhatsApp</h3>
                        <p>Layanan informasi publik melalui WhatsApp untuk komunikasi cepat.</p>
                        <div class="channel-details">
                            <div class="detail-item">
                                <strong>Nomor:</strong> +62 812-3456-7890
                            </div>
                            <div class="detail-item">
                                <strong>Jam Layanan:</strong> 08:00 - 20:00 WIB
                            </div>
                            <div class="detail-item">
                                <strong>Layanan:</strong> Konsultasi, Informasi
                            </div>
                        </div>
                        <a href="#" class="channel-link">Lihat Detail →</a>
                    </div>
                </div>
                
                <div class="channel-item">
                    <div class="channel-icon">
                        <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Layanan Telepon">
                    </div>
                    <div class="channel-content">
                        <h3>Layanan Telepon</h3>
                        <p>Layanan informasi publik melalui telepon untuk konsultasi langsung.</p>
                        <div class="channel-details">
                            <div class="detail-item">
                                <strong>Telepon:</strong> (0251) 8324068
                            </div>
                            <div class="detail-item">
                                <strong>Jam Layanan:</strong> 08:00 - 16:00 WIB
                            </div>
                            <div class="detail-item">
                                <strong>Layanan:</strong> Konsultasi, Informasi
                            </div>
                        </div>
                        <a href="#" class="channel-link">Lihat Detail →</a>
                    </div>
                </div>
                
                <div class="channel-item">
                    <div class="channel-icon">
                        <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Layanan Pos">
                    </div>
                    <div class="channel-content">
                        <h3>Layanan Pos</h3>
                        <p>Layanan informasi publik melalui surat pos untuk permohonan resmi.</p>
                        <div class="channel-details">
                            <div class="detail-item">
                                <strong>Alamat:</strong> PPID BBIA, Jl. Ir. H. Juanda No. 11, Bogor
                            </div>
                            <div class="detail-item">
                                <strong>Proses:</strong> 10 hari kerja
                            </div>
                            <div class="detail-item">
                                <strong>Dokumen:</strong> Surat resmi, Formulir
                            </div>
                        </div>
                        <a href="#" class="channel-link">Lihat Detail →</a>
                    </div>
                </div>
            </div>
            
            <h2>Statistik Layanan</h2>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">45%</div>
                    <div class="stat-label">Layanan Langsung</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">30%</div>
                    <div class="stat-label">Layanan Online</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">15%</div>
                    <div class="stat-label">Layanan Email</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">10%</div>
                    <div class="stat-label">Lainnya</div>
                </div>
            </div>
            
            <h2>Panduan Penggunaan</h2>
            <div class="guide-section">
                <div class="guide-item">
                    <h3>📖 Panduan Layanan Langsung</h3>
                    <p>Panduan lengkap penggunaan layanan informasi publik langsung di kantor PPID BBIA.</p>
                    <a href="#" class="guide-link">Download Panduan PDF</a>
                </div>
                
                <div class="guide-item">
                    <h3>💻 Panduan Layanan Online</h3>
                    <p>Panduan lengkap penggunaan layanan informasi publik melalui website PPID BBIA.</p>
                    <a href="#" class="guide-link">Download Panduan PDF</a>
                </div>
                
                <div class="guide-item">
                    <h3>📧 Panduan Layanan Email</h3>
                    <p>Panduan lengkap penggunaan layanan informasi publik melalui email PPID BBIA.</p>
                    <a href="#" class="guide-link">Download Panduan PDF</a>
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

.content-card p {
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
}

.channel-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.channel-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 30px;
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.channel-icon {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
}

.channel-icon img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.channel-content {
    flex: 1;
}

.channel-content h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.channel-content p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 15px;
}

.channel-details {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 15px;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 14px;
}

.detail-item strong {
    color: #1a3a5f;
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
}

.guide-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.guide-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
}

.guide-item h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.guide-item p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 15px;
}

.guide-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    padding: 8px 16px;
    border: 1px solid #1a3a5f;
    border-radius: 5px;
    font-size: 14px;
    display: inline-block;
}

.guide-link:hover {
    background: #1a3a5f;
    color: white;
}
</style>

@endsection
