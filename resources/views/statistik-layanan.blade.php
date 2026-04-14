@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Statistik Layanan</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Statistik Layanan Informasi Publik PPID BBIA</h2>
        <p>Berikut adalah data statistik layanan informasi publik PPID BBIA yang diperbarui secara berkala.</p>
        
        @forelse($kontens as $konten)
            <div class="report-item">
                <div class="report-header">
                    <h3>{{ $konten->judul }}</h3>
                    @if($konten->meta_data['tahun'] ?? null)
                        <span class="report-year">{{ $konten->meta_data['tahun'] }}</span>
                    @endif
                </div>
                
                <div class="report-content">
                    @if($konten->meta_data['deskripsi'] ?? null)
                        <p><strong>Deskripsi:</strong> {{ $konten->meta_data['deskripsi'] }}</p>
                    @endif
                    
                    @if($konten->meta_data['ringkasan'] ?? null)
                        <div class="ringkasan-section">
                            <h4>Ringkasan Data</h4>
                            <p>{{ $konten->meta_data['ringkasan'] }}</p>
                        </div>
                    @endif
                    
                    @if($konten->meta_data['analisis'] ?? null)
                        <div class="ringkasan-section">
                            <h4>Analisis Data</h4>
                            <p>{{ $konten->meta_data['analisis'] }}</p>
                        </div>
                    @endif
                </div>
                
                @if($konten->meta_data['total_permohonan'] ?? null || $konten->meta_data['total_disetujui'] ?? null || $konten->meta_data['total_ditolak'] ?? null)
                    <div class="report-stats">
                        @if($konten->meta_data['total_permohonan'] ?? null)
                            <div class="stat">
                                <span class="stat-number">{{ $konten->meta_data['total_permohonan'] }}</span>
                                <span class="stat-label">Total Permohonan</span>
                            </div>
                        @endif
                        
                        @if($konten->meta_data['total_disetujui'] ?? null)
                            <div class="stat">
                                <span class="stat-number">{{ $konten->meta_data['total_disetujui'] }}</span>
                                <span class="stat-label">Disetujui</span>
                            </div>
                        @endif
                        
                        @if($konten->meta_data['total_ditolak'] ?? null)
                            <div class="stat">
                                <span class="stat-number">{{ $konten->meta_data['total_ditolak'] }}</span>
                                <span class="stat-label">Ditolak</span>
                            </div>
                        @endif
                    </div>
                @endif
                
                <div class="report-actions">
                    @if($konten->meta_data['file_path'] ?? null)
                        <a href="{{ asset('storage/' . $konten->meta_data['file_path']) }}" target="_blank" class="btn-link">
                            <i class="fas fa-download me-2"></i>Download PDF
                        </a>
                    @endif
                    
                    @if($konten->meta_data['periode'] ?? null)
                        <span class="period-info">Periode: {{ $konten->meta_data['periode'] }}</span>
                    @endif
                </div>
            </div>
        @empty
            <div class="no-data">
                <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                <p class="text-muted">Belum ada data statistik layanan informasi publik yang tersedia.</p>
                <p>Silakan kembali lagi nanti untuk melihat statistik terbaru.</p>
            </div>
        @endforelse
        
        <div class="action-buttons">
            <a href="{{ url('/laporan-tahunan') }}" class="btn btn-primary">Laporan Tahunan</a>
            <a href="{{ url('/survey-kepuasan-masyarakat') }}" class="btn btn-primary">Survey Kepuasan</a>
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

.content-full h3 {
    color: #1a3a5f;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
    margin-top: 40px;
}

.content-full p {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 16px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin: 10px 0;
}

.stat-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.stat-number {
    font-size: 36px;
    font-weight: 700;
    color: #1a3a5f;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 14px;
    color: #333;
    font-weight: 600;
}

.monthly-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
    gap: 15px;
    margin: 30px 0;
}

.month-stat {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 10px;
    padding: 20px 10px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.month-stat:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.month {
    display: block;
    font-size: 12px;
    color: #666;
    margin-bottom: 5px;
    font-weight: 600;
}

.count {
    display: block;
    font-size: 18px;
    font-weight: 700;
    color: #1a3a5f;
}

.category-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.category-item {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.category-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.category-name {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #1a3a5f;
    margin-bottom: 10px;
}

.progress-bar {
    background: #e9ecef;
    border-radius: 10px;
    height: 8px;
    margin-bottom: 5px;
    overflow: hidden;
}

.progress-fill {
    background: linear-gradient(90deg, #1a3a5f, #2c5282);
    height: 100%;
    border-radius: 10px;
    transition: width 0.3s ease;
}

.percentage {
    font-size: 12px;
    color: #666;
    font-weight: 600;
}

.action-buttons {
    display: flex;
    gap: 20px;
    margin: 40px 0;
    justify-content: center;
}

.btn {
    padding: 12px 24px;
    border-radius: 5px;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: #1a3a5f;
    color: white;
    border: none;
}

.btn-primary:hover {
    background: #102841;
    transform: translateY(-2px);
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

.statistik-item {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 25px;
    margin: 20px 0;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.statistik-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.statistik-item h3 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
}

.description, .ringkasan, .analisis {
    margin: 5px 0;
}

.description p, .ringkasan p, .analisis p {
    margin: 5px 0;
    line-height: 1.8;
}

.data-numerik {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin: 20px 0;
}

.data-item {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    text-align: center;
}

.data-item .label {
    display: block;
    font-size: 12px;
    color: #666;
    margin-bottom: 5px;
    font-weight: 600;
}

.data-item .value {
    display: block;
    font-size: 20px;
    font-weight: 700;
    color: #1a3a5f;
}

.download-section {
    margin: 15px 0;
    text-align: center;
}

.tanggal-publikasi {
    text-align: right;
    margin: 15px 0 0 0;
}

.no-data {
    text-align: center;
    padding: 60px 20px;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    margin: 30px 0;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.no-data p {
    margin: 10px 0;
}

hr {
    border: none;
    border-top: 1px solid #e9ecef;
    margin: 30px 0;
}

/* New Styles for Enhanced Design */
.meta-info {
    display: flex;
    gap: 30px;
    margin: 15px 0;
    padding: 12px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 4px solid #1a3a5f;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.meta-item i {
    color: #1a3a5f;
    font-size: 16px;
}

.content-section {
    margin: 5px 0;
}

.content-section h4 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.content-section h4 i {
    color: #2c5282;
    font-size: 16px;
}

.content-box {
    background: #f8f9fa;
    padding: 12px;
    border-radius: 8px;
    border-left: 4px solid #2c5282;
    margin: 0px 0;
}

.stat-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #1a3a5f, #2c5282);
}

.stat-card.approved::before {
    background: linear-gradient(90deg, #28a745, #20c997);
}

.stat-card.rejected::before {
    background: linear-gradient(90deg, #dc3545, #fd7e14);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.stat-icon {
    margin-bottom: 10px;
}

.stat-icon i {
    font-size: 24px;
    color: #1a3a5f;
}

.stat-card.approved .stat-icon i {
    color: #28a745;
}

.stat-card.rejected .stat-icon i {
    color: #dc3545;
}

.stat-number {
    font-size: 32px;
    font-weight: 700;
    color: #1a3a5f;
    margin-bottom: 8px;
    line-height: 1;
}

.stat-card.approved .stat-number {
    color: #28a745;
}

.stat-card.rejected .stat-number {
    color: #dc3545;
}

.stat-label {
    font-size: 12px;
    color: #666;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.approval-rate {
    margin: 20px 0;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 12px;
    border-left: 4px solid #28a745;
}

.approval-rate h4 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.progress-bar-container {
    position: relative;
}

.progress-bar {
    background: #e9ecef;
    border-radius: 10px;
    height: 12px;
    overflow: hidden;
    margin-bottom: 8px;
}

.progress-fill {
    height: 100%;
    border-radius: 10px;
    transition: width 1s ease;
    background: linear-gradient(90deg, #28a745, #20c997);
}

.progress-text {
    font-size: 14px;
    font-weight: 600;
    color: #28a745;
    text-align: right;
}

.btn-download {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, #dc3545, #c82333);
    color: white;
    padding: 15px 30px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    font-size: 14px;
}

.btn-download:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
    background: linear-gradient(135deg, #c82333, #dc3545);
}

.btn-download i:first-child {
    font-size: 18px;
}

.btn-download i:last-child {
    font-size: 14px;
    transition: transform 0.3s ease;
}

.btn-download:hover i:last-child {
    transform: translateX(3px);
}

/* Report Item Styles (Same as Laporan Tahunan) */
.report-item {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    padding: 30px;
    margin: 30px 0;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.report-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.report-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 15px;
}

.report-header h3 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin: 0;
}

.report-year {
    background: linear-gradient(135deg, #1a3a5f, #2c5282);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

.report-content {
    margin: 20px 0;
}

.report-content p {
    color: #333;
    line-height: 1.8;
    margin-bottom: 15px;
}

.ringkasan-section {
    margin: 20px 0;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 10px;
    border-left: 4px solid #2c5282;
}

.ringkasan-section h4 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.report-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 20px;
    margin: 25px 0;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 10px;
}

.stat {
    text-align: center;
    padding: 15px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.stat:hover {
    transform: translateY(-3px);
}

.stat-number {
    display: block;
    font-size: 28px;
    font-weight: 700;
    color: #1a3a5f;
    margin-bottom: 5px;
}

.stat-label {
    display: block;
    font-size: 12px;
    color: #666;
    font-weight: 600;
    text-transform: uppercase;
}

.report-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #e9ecef;
}

.btn-link {
    display: inline-flex;
    align-items: center;
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.btn-link:hover {
    color: #2c5282;
}

.period-info {
    color: #666;
    font-size: 14px;
    font-style: italic;
}

@media (max-width: 768px) {
    .report-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .report-stats {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    
    .report-actions {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }
    
    .stat-number {
        font-size: 24px;
    }
}
</style>
@endsection
