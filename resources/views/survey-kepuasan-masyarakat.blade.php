@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Laporan Survey Kepuasan Masyarakat</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Laporan Survey Kepuasan Masyarakat PPID BBIA</h2>
        <p>Berikut adalah laporan hasil survey kepuasan masyarakat terhadap layanan informasi publik PPID BBIA yang dilaksanakan secara berkala.</p>
            
            @forelse($kontens as $konten)
            <div class="survey-item">
                <div class="survey-header">
                    <h3>{{ $konten->judul }}</h3>
                    @if($konten->meta_data['periode'] ?? null)
                        <span class="survey-period">{{ $konten->meta_data['periode'] }}</span>
                    @endif
                </div>
                <div class="survey-content">
                    @if($konten->meta_data['ringkasan'] ?? null)
                        <div class="ringkasan-section">
                            <h4>Ringkasan Hasil</h4>
                            <p>{{ $konten->meta_data['ringkasan'] }}</p>
                        </div>
                    @endif
                    
                    @if($konten->meta_data['kesimpulan'] ?? null)
                        <div class="kesimpulan-section">
                            <h4>Kesimpulan</h4>
                            <p>{{ $konten->meta_data['kesimpulan'] }}</p>
                        </div>
                    @endif
                </div>
                
                <div class="survey-stats">
                    @if($konten->meta_data['nilai_kepuasan'] ?? null)
                        <div class="stat-item">
                            <div class="stat-number">{{ $konten->meta_data['nilai_kepuasan'] }}</div>
                            <div class="stat-label">Skor Kepuasan</div>
                        </div>
                    @endif
                    
                    @if($konten->meta_data['responden'] ?? null)
                        <div class="stat-item">
                            <div class="stat-number">{{ $konten->meta_data['responden'] }}</div>
                            <div class="stat-label">Responden</div>
                        </div>
                    @endif
                </div>
                
                <div class="survey-actions">
                    @if($konten->meta_data['file_path'] ?? null)
                        <a href="{{ asset('storage/' . $konten->meta_data['file_path']) }}" target="_blank" class="btn-link">
                            <i class="fas fa-download me-2"></i>Download Laporan
                        </a>
                    @endif
                    @if($konten->meta_data['ringkasan'] ?? null)
                        <a href="#" class="btn-link">
                            <i class="fas fa-file-text me-2"></i>Ringkasan
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="content-section">
                <div class="content-full">
                    <h2>Laporan Survey Kepuasan Masyarakat PPID BBIA</h2>
                    <p>Belum ada data survey kepuasan masyarakat yang tersedia.</p>
                    <p>Silakan kembali lagi nanti untuk melihat survey terbaru.</p>
                </div>
            </div>
        @endforelse
            
            <h2>Metodologi Survey</h2>
            <div class="methodology-section">
                <div class="method-item">
                    <h3>📊 Metode Sampling</h3>
                    <p>Simple random sampling dengan tingkat kepercayaan 95% dan margin error 5%.</p>
                </div>
                
                <div class="method-item">
                    <h3>📋 Instrumen Survey</h3>
                    <p>Kuesioner terstruktur dengan skala Likert 1-5 untuk mengukur kepuasan masyarakat.</p>
                </div>
                
                <div class="method-item">
                    <h3>👥 Responden</h3>
                    <p>Masyarakat pengguna layanan informasi publik dari berbagai latar belakang.</p>
                </div>
                
                <div class="method-item">
                    <h3>📅 Waktu Pelaksanaan</h3>
                    <p>Survey dilaksanakan setiap semester dengan durasi 2 minggu.</p>
                </div>
            </div>
            
            <h2>Analisis Hasil</h2>
            <div class="analysis-section">
                <div class="analysis-item">
                    <h3>📈 Faktor Kepuasan</h3>
                    <ul>
                        <li><strong>Kecepatan Layanan:</strong> Korelasi positif dengan kepuasan tinggi</li>
                        <li><strong>Kualitas Informasi:</strong> Faktor dominan dalam kepuasan pengguna</li>
                        <li><strong>Profesionalisme Petugas:</strong> Meningkatkan kepercayaan masyarakat</li>
                        <li><strong>Kemudahan Akses:</strong> Kemudahan akses meningkatkan frekuensi penggunaan</li>
                    </ul>
                </div>
                
                <div class="analysis-item">
                    <h3>🎯 Rekomendasi</h3>
                    <ul>
                        <li>Meningkatkan kualitas dan kecepatan layanan informasi publik</li>
                        <li>Melakukan pelatihan rutin kepada petugas PPID</li>
                        <li>Mengembangkan sistem informasi yang lebih user-friendly</li>
                        <li>Meningkatkan komunikasi dengan masyarakat</li>
                    </ul>
                </div>
            </div>
            
            <h2>Informasi Kontak</h2>
            <div class="contact-box">
                <p>Untuk informasi lebih lanjut mengenai survey kepuasan masyarakat, hubungi:</p>
                <ul>
                    <li><strong>Telepon:</strong> (0251) 8324068</li>
                    <li><strong>Email:</strong> ppid@bbia.go.id</li>
                    <li><strong>WhatsApp:</strong> +62 812-3456-7890</li>
                    <li><strong>Alamat:</strong> Jl. Ir. H. Juanda No. 11, Bogor</li>
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

.content-card li {
    margin-bottom: 8px;
}

.survey-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.survey-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 20px;
}

.survey-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.survey-header h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin: 0;
}

.survey-period {
    background: #1a3a5f;
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
}

.survey-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin-bottom: 15px;
}

.stat-item {
    background: #1a3a5f;
    color: white;
    border-radius: 8px;
    padding: 12px 8px;
    text-align: center;
}

.stat-number {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 3px;
}

.stat-label {
    font-size: 11px;
    opacity: 0.8;
}

.survey-actions {
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

.trend-chart {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    margin: 30px 0;
}

.chart-container h3 {
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

.methodology-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.method-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
}

.method-item h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.method-item p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin: 0;
}

.analysis-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 30px 0;
}

.analysis-item {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
}

.analysis-item h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.analysis-item ul {
    color: #333;
    line-height: 1.6;
    margin-bottom: 0;
}

.analysis-item li {
    margin-bottom: 8px;
}

.contact-box {
    background: #1a3a5f;
    color: white;
    border-radius: 10px;
    padding: 25px;
    margin: 20px 0;
}

.contact-box p {
    color: white;
    margin-bottom: 15px;
}

.contact-box ul {
    color: white;
}

.contact-box li {
    margin-bottom: 8px;
}

.contact-box li strong {
    color: rgba(255, 255, 255, 0.8);
}
</style>

@endsection
