@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Statistik Layanan</h1>
            <p>Data statistik pelayanan informasi publik PPID BBIA</p>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb">
    <div class="container">
    </div>
</nav>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <div class="content-section">
            <div class="service-detail">
                <div class="service-icon-large">
                    <img src="{{ asset('images/statistik layanan.png') }}" alt="Statistik Layanan">
                </div>
                
                <div class="service-content">
                    <h2>Statistik Layanan Informasi Publik</h2>
                    <p>Statistik real-time pelayanan informasi publik PPID BBIA untuk transparansi dan akuntabilitas.</p>
                    
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-number">1,247</div>
                            <div class="stat-label">Total Permohonan</div>
                            <div class="stat-period">2024</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number">1,189</div>
                            <div class="stat-label">Permohonan Selesai</div>
                            <div class="stat-period">2024</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number">95.3%</div>
                            <div class="stat-label">Tingkat Keberhasilan</div>
                            <div class="stat-period">2024</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number">58</div>
                            <div class="stat-label">Total Keberatan</div>
                            <div class="stat-period">2024</div>
                        </div>
                    </div>
                    
                    <div class="info-box">
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
                                <span class="month">Des</span>
                                <span class="count">86</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-box">
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
                    </div>
                    
                    <div class="action-buttons">
                        <a href="{{ url('/laporan-tahunan') }}" class="btn btn-primary">Laporan Tahunan</a>
                        <a href="{{ url('/survey-kepuasan-masyarakat') }}" class="btn btn-outline">Survey Kepuasan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
