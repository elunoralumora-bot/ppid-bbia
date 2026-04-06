@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Laporan Tahunan PPID</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Laporan Tahunan PPID BBIA</h2>
        <p>Berikut adalah laporan tahunan PPID BBIA yang berisi ringkasan kegiatan dan pencapaian kinerja dalam penyediaan layanan informasi publik.</p>
            
            <div class="report-grid">
                <div class="report-item">
                    <div class="report-header">
                        <h3>Laporan Tahunan 2025</h3>
                        <span class="report-year">2025</span>
                    </div>
                    <div class="report-stats">
                        <div class="stat">
                            <span class="stat-number">1,234</span>
                            <span class="stat-label">Total Permohonan</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">1,189</span>
                            <span class="stat-label">Diproses</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">98.5%</span>
                            <span class="stat-label">Tingkat Kepuasan</span>
                        </div>
                    </div>
                    <div class="report-actions">
                        <a href="#" class="btn-link">Download PDF</a>
                        <a href="#" class="btn-link">Ringkasan</a>
                    </div>
                </div>
                
                <div class="report-item">
                    <div class="report-header">
                        <h3>Laporan Tahunan 2024</h3>
                        <span class="report-year">2024</span>
                    </div>
                    <div class="report-stats">
                        <div class="stat">
                            <span class="stat-number">1,156</span>
                            <span class="stat-label">Total Permohonan</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">1,123</span>
                            <span class="stat-label">Diproses</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">97.2%</span>
                            <span class="stat-label">Tingkat Kepuasan</span>
                        </div>
                    </div>
                    <div class="report-actions">
                        <a href="#" class="btn-link">Download PDF</a>
                        <a href="#" class="btn-link">Ringkasan</a>
                    </div>
                </div>
                
                <div class="report-item">
                    <div class="report-header">
                        <h3>Laporan Tahunan 2023</h3>
                        <span class="report-year">2023</span>
                    </div>
                    <div class="report-stats">
                        <div class="stat">
                            <span class="stat-number">1,089</span>
                            <span class="stat-label">Total Permohonan</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">1,067</span>
                            <span class="stat-label">Diproses</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">96.8%</span>
                            <span class="stat-label">Tingkat Kepuasan</span>
                        </div>
                    </div>
                    <div class="report-actions">
                        <a href="#" class="btn-link">Download PDF</a>
                        <a href="#" class="btn-link">Ringkasan</a>
                    </div>
                </div>
            </div>
            
            <h2>Statistik Perbandingan</h2>
            <div class="comparison-chart">
                <div class="chart-item">
                    <h3>Trend Permohonan</h3>
                    <div class="chart-bars">
                        <div class="bar-item">
                            <div class="bar" style="height: 80%"></div>
                            <span>2023</span>
                            <span class="value">1,089</span>
                        </div>
                        <div class="bar-item">
                            <div class="bar" style="height: 85%"></div>
                            <span>2024</span>
                            <span class="value">1,156</span>
                        </div>
                        <div class="bar-item">
                            <div class="bar" style="height: 100%"></div>
                            <span>2025</span>
                            <span class="value">1,234</span>
                        </div>
                    </div>
                </div>
                
                <div class="chart-item">
                    <h3>Tingkat Kepuasan</h3>
                    <div class="chart-bars">
                        <div class="bar-item">
                            <div class="bar" style="height: 96.8%"></div>
                            <span>2023</span>
                            <span class="value">96.8%</span>
                        </div>
                        <div class="bar-item">
                            <div class="bar" style="height: 97.2%"></div>
                            <span>2024</span>
                            <span class="value">97.2%</span>
                        </div>
                        <div class="bar-item">
                            <div class="bar" style="height: 98.5%"></div>
                            <span>2025</span>
                            <span class="value">98.5%</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <h2>Indikator Kinerja</h2>
            <div class="indicators-grid">
                <div class="indicator-item">
                    <h3>📊 Waktu Respon</h3>
                    <div class="indicator-value">8.2 hari</div>
                    <div class="indicator-desc">Rata-rata waktu penyelesaian permohonan</div>
                </div>
                
                <div class="indicator-item">
                    <h3>📈 Tingkat Keberhasilan</h3>
                    <div class="indicator-value">96.4%</div>
                    <div class="indicator-desc">Permohonan yang berhasil diproses</div>
                </div>
                
                <div class="indicator-item">
                    <h3>👥 Pengguna Layanan</h3>
                    <div class="indicator-value">2,456</div>
                    <div class="indicator-desc">Total pengguna layanan informasi</div>
                </div>
                
                <div class="indicator-item">
                    <h3>💬 Kepuasan Pelanggan</h3>
                    <div class="indicator-value">4.6/5</div>
                    <div class="indicator-desc">Skor kepuasan pelanggan</div>
                </div>
            </div>
            
            <h2>Informasi Tambahan</h2>
            <div class="info-box">
                <h3>📖 Catatan Laporan</h3>
                <ul>
                    <li>Laporan tahunan dibuat sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2010</li>
                    <li>Data dikumpulkan dari sistem informasi PPID BBIA</li>
                    <li>Laporan diverifikasi oleh internal audit BBIA</li>
                    <li>Laporan disetujui oleh Kepala BBIA</li>
                    <li>Laporan tersedia untuk umum sesuai prinsip keterbukaan informasi</li>
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

.report-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.report-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
}

.report-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.report-header h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
}

.report-year {
    background: #1a3a5f;
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 14px;
    font-weight: 600;
}

.report-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-bottom: 20px;
}

.stat {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 20px;
    font-weight: 700;
    color: #1a3a5f;
}

.stat-label {
    font-size: 12px;
    color: #6c757d;
}

.report-actions {
    display: flex;
    gap: 10px;
}

.btn-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    padding: 8px 16px;
    border: 1px solid #1a3a5f;
    border-radius: 5px;
    font-size: 12px;
    display: inline-block;
}

.btn-link:hover {
    background: #1a3a5f;
    color: white;
}

.comparison-chart {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.chart-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
}

.chart-item h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    text-align: center;
}

.chart-bars {
    display: flex;
    justify-content: space-around;
    align-items: flex-end;
    height: 150px;
    margin-bottom: 10px;
}

.bar-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
}

.bar {
    width: 40px;
    background: #1a3a5f;
    border-radius: 5px 5px 0 0;
    margin-bottom: 5px;
}

.bar-item span {
    font-size: 12px;
    color: #333;
    text-align: center;
}

.bar-item .value {
    font-weight: 600;
    color: #1a3a5f;
}

.indicators-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.indicator-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
}

.indicator-item h3 {
    color: #1a3a5f;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
}

.indicator-value {
    font-size: 24px;
    font-weight: 700;
    color: #1a3a5f;
    margin-bottom: 5px;
}

.indicator-desc {
    font-size: 12px;
    color: #6c757d;
}

.info-box {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    margin: 20px 0;
}

.info-box h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}
</style>

@endsection
