@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Maklumat Informasi Publik</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <div class="maklumat-container">
            @if($konten && $konten->gambar)
                <img src="{{ asset('images/' . $konten->gambar) }}" alt="Maklumat Informasi Publik" class="maklumat-image">
            @else
                <img src="{{ asset('images/informasi publik.png') }}" alt="Maklumat Informasi Publik" class="maklumat-image">
            @endif
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

.content-section {
    width: 100%;
    padding: 0 20px;
    min-height: 60vh;
}

.content-full {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px 40px 60px 40px;
    background: transparent;
}

.maklumat-container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.maklumat-image {
    max-width: 50%;
    height: auto;
    display: block;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}
</style>

@endsection
