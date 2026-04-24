@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Visi dan Misi</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        @php
            $profils = \App\Models\Profil::where('is_active', true)
                ->where('kategori', 'Visi Misi')
                ->orderBy('urutan')
                ->get();
        @endphp
        
        @forelse($profils as $profil)
            @if(strtolower($profil->judul) == 'visi')
                <h2>Visi PPID BBIA</h2>
                <div class="vision-box">
                    <p>{!! nl2br(e($profil->konten)) !!}</p>
                </div>
            @elseif(strtolower($profil->judul) == 'misi')
                <h2>Misi PPID BBIA</h2>
                <div class="mission-grid">
                    @php
                        $misiItems = collect(explode("\n", trim($profil->konten)))->filter(function($line) {
                            return !empty(trim($line));
                        });
                    @endphp
                    
                    @foreach($misiItems as $index => $misiItem)
                        <div class="mission-item">
                            <div class="mission-number">{{ $index + 1 }}</div>
                            <div class="mission-content">
                                <h3>Misi {{ $index + 1 }}</h3>
                                <p>{{ $misiItem }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @empty
            <div class="vision-box">
                <p>Informasi visi dan misi sedang dalam pembaruan.</p>
            </div>
        @endforelse
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

.vision-box {
    background: linear-gradient(135deg, rgba(26, 82, 130, 0.1), rgba(44, 130, 201, 0.1));
    border: 1px solid rgba(26, 82, 130, 0.2);
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    margin: 30px 0;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.vision-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.vision-box p {
    color: #1a3a5f;
    font-size: 18px;
    line-height: 1.6;
    margin: 0;
}

.mission-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    margin-top: 30px;
}

.mission-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    background: rgba(26, 82, 130, 0.05);
    border: 1px solid rgba(26, 82, 130, 0.1);
    border-radius: 12px;
    padding: 25px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.mission-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.mission-number {
    background: #1a3a5f;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 700;
    flex-shrink: 0;
}

.mission-content {
    flex: 1;
}

.mission-content h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.mission-content p {
    color: #333;
    font-size: 15px;
    line-height: 1.5;
    margin: 0;
}
</style>

@endsection
