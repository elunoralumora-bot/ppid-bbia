@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Open Data</h1>
            <p>Data terbuka PPID Balai Besar Industri Agro</p>
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
                    <img src="{{ asset('images/open data.png') }}" alt="Open Data">
                </div>
                
                <div class="service-content">
                    <h2>Open Data PPID BBIA</h2>
                    <p>Akses data terbuka PPID Balai Besar Industri Agro untuk transparansi dan partisipasi publik dalam pengembangan industri agro.</p>
                    
                    <div class="info-box">
                        <h3>Tentang Open Data:</h3>
                        <p>Open Data adalah data yang dapat diakses, digunakan, dan dibagikan oleh siapa saja secara bebas. PPID BBIA menyediakan data terbuka untuk mendukung transparansi dan inovasi.</p>
                    </div>
                    
                    <div class="data-categories">
                        <div class="data-category">
                            <h3>Data Industri</h3>
                            <ul>
                                <li><a href="#">Statistik Produksi Industri Agro</a></li>
                                <li><a href="#">Data Perusahaan Terdaftar</a></li>
                                <li><a href="#">Ekspor-Impor Produk Agro</a></li>
                                <li><a href="#">Investasi Sektor Agroindustri</a></li>
                            </ul>
                        </div>
                        
                        <div class="data-category">
                            <h3>Data Layanan</h3>
                            <ul>
                                <li><a href="#">Statistik Layanan PPID</a></li>
                                <li><a href="#">Data Permohonan Informasi</a></li>
                                <li><a href="#">Waktu Respon Layanan</a></li>
                                <li><a href="#">Kepuasan Pelanggan</a></li>
                            </ul>
                        </div>
                        
                        <div class="data-category">
                            <h3 Data Regulasi</h3>
                            <ul>
                                <li><a href="#">Database Regulasi Industri</a></li>
                                <li><a href="#">Standar Mutu Produk</a></li>
                                <li><a href="#">Kebijakan Industri Agro</a></li>
                                <li><a href="#">Perizinan Usaha</a></li>
                            </ul>
                        </div>
                        
                        <div class="data-category">
                            <h3>Data Geospasial</h3>
                            <ul>
                                <li><a href="#">Peta Industri Agro Indonesia</a></li>
                                <li><a href="#">Lokasi Sentra Produksi</a></li>
                                <li><a href="#">Infrastruktur Pendukung</a></li>
                                <li><a href="#">Wilayah Pengembangan</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="info-box">
                        <h3>Format Data:</h3>
                        <ul>
                            <li><strong>CSV:</strong> Comma Separated Values untuk analisis data</li>
                            <li><strong>JSON:</strong> JavaScript Object Notation untuk aplikasi web</li>
                            <li><strong>XML:</strong> eXtensible Markup Language untuk integrasi sistem</li>
                            <li><strong>PDF:</strong> Portable Document Format untuk dokumen</li>
                            <li><strong>Excel:</strong> Spreadsheet untuk pengolahan data</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Lisensi Data:</h3>
                        <p>Semua data yang tersedia dilisensikan dengan <strong>Open Government License (OGL)</strong> yang memungkinkan:</p>
                        <ul>
                            <li>Penggunaan data secara bebas</li>
                            <li>Modifikasi dan distribusi ulang</li>
                            <li>Penggabungan dengan data lain</li>
                            <li>Penggunaan untuk tujuan komersial</li>
                        </ul>
                    </div>
                    
                    <div class="action-buttons">
                        <a href="#" class="btn btn-primary">Unduh Dataset</a>
                        <a href="#" class="btn btn-outline">API Documentation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
