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
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">1,247</div>
                <div class="stat-label">Total Permohonan</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">1,189</div>
                <div class="stat-label">Permohonan Selesai</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">58</div>
                <div class="stat-label">Permohonan Proses</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">95.3%</div>
                <div class="stat-label">Tingkat Keberhasilan</div>
            </div>
        </div>
        
        <h3>Statistik Bulanan:</h3>
        <div class="monthly-stats">
            <div class="month-stat">
                <span class="month">Jan</span>
                <span class="count">98</span>
            </div>
            <div class="month-stat">
                <span class="month">Feb</span>
                <span class="count">112</span>
            </div>
            <div class="month-stat">
                <span class="month">Mar</span>
                <span class="count">134</span>
            </div>
            <div class="month-stat">
                <span class="month">Apr</span>
                <span class="count">98</span>
            </div>
            <div class="month-stat">
                <span class="month">Mei</span>
                <span class="count">87</span>
            </div>
            <div class="month-stat">
                <span class="month">Jun</span>
                <span class="count">102</span>
            </div>
            <div class="month-stat">
                <span class="month">Jul</span>
                <span class="count">125</span>
            </div>
            <div class="month-stat">
                <span class="month">Agu</span>
                <span class="count">118</span>
            </div>
            <div class="month-stat">
                <span class="month">Sep</span>
                <span class="count">95</span>
            </div>
            <div class="month-stat">
                <span class="month">Okt</span>
                <span class="count">89</span>
            </div>
            <div class="month-stat">
                <span class="month">Nov</span>
                <span class="count">103</span>
            </div>
            <div class="month-stat">
                <span class="month">Dec</span>
                <span class="count">86</span>
            </div>
        </div>
        
        <h3>Kategori Informasi yang Diminta:</h3>
        <div class="category-stats">
            <div class="category-item">
                <span class="category-name">Regulasi & Kebijakan</span>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 35%"></div>
                </div>
                <span class="percentage">35%</span>
            </div>
            <div class="category-item">
                <span class="category-name">Laporan & Statistik</span>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 28%"></div>
                </div>
                <span class="percentage">28%</span>
            </div>
            <div class="category-item">
                <span class="category-name">Prosedur & Standar</span>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 22%"></div>
                </div>
                <span class="percentage">22%</span>
            </div>
            <div class="category-item">
                <span class="category-name">Struktur Organisasi</span>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 15%"></div>
                </div>
                <span class="percentage">15%</span>
            </div>
        </div>
        
        <div class="action-buttons">
            <a href="{{ url('/laporan-tahunan') }}" class="btn btn-primary">Laporan Tahunan</a>
            <a href="{{ url('/survey-kepuasan-masyarakat') }}" class="btn btn-outline">Survey Kepuasan</a>
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
    margin: 30px 0;
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
</style>
@endsection
