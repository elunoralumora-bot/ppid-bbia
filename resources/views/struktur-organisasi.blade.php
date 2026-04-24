@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Struktur Organisasi</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        @php
            $profils = \App\Models\Profil::where('is_active', true)
                ->where('kategori', 'Struktur Organisasi')
                ->orderBy('urutan')
                ->get();
            
            $unitPelaksana = \App\Models\Profil::where('is_active', true)
                ->where('kategori', 'Unit Pelaksana')
                ->where('judul', 'Unit Pelaksana PPID')
                ->first();
        @endphp
        
        <h2>Struktur Organisasi PPID BBIA</h2>
        <p>PPID BBIA merupakan bagian dari struktur organisasi Balai Besar Industri Agro yang bertanggung jawab langsung kepada Kepala BBIA.</p>
        
        <h2>Struktur Kepemimpinan</h2>
        <div class="org-structure">
            @forelse($profils as $profil)
                <div class="org-box">
                    <h3>{{ $profil->judul }}</h3>
                    <p>{!! nl2br(e($profil->konten)) !!}</p>
                </div>
            @empty
                <div class="org-box">
                    <h3>Informasi Struktur</h3>
                    <p>Informasi struktur organisasi sedang dalam pembaruan.</p>
                </div>
            @endforelse
        </div>
        
        @if($unitPelaksana)
            <h2>Unit Pelaksana PPID</h2>
            <p>Dalam melaksanakan tugasnya, PPID BBIA didukung oleh:</p>
            <ul>
                @php
                    $unitItems = collect(explode("\n", trim($unitPelaksana->konten)))->filter(function($line) {
                        return !empty(trim($line));
                    });
                @endphp
                
                @foreach($unitItems as $unitItem)
                    <li>{{ $unitItem }}</li>
                @endforeach
            </ul>
        @else
            <h2>Unit Pelaksana PPID</h2>
            <p>Dalam melaksanakan tugasnya, PPID BBIA didukung oleh:</p>
            <ul>
                <li><strong>Unit Pelayanan Informasi:</strong> Melayani permohonan informasi langsung</li>
                <li><strong>Unit Dokumentasi:</strong> Mengelola dokumen dan arsip informasi</li>
                <li><strong>Unit Verifikasi:</strong> Memverifikasi kebenaran informasi</li>
                <li><strong>Unit Publikasi:</strong> Memublikasikan informasi berkala</li>
            </ul>
        @endif
        
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
    margin-top: 30px;
}

.content-full h3:first-child {
    margin-top: 0;
}

.content-full p {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 16px;
}

.org-structure {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.org-box {
    background: rgba(26, 82, 130, 0.1);
    border: 1px solid rgba(26, 82, 130, 0.2);
    border-radius: 10px;
    padding: 25px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.org-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.org-box h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.org-box p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
}
</style>

@endsection
