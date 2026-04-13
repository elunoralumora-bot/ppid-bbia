@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Standar Layanan</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        @if($konten)
            {!! $konten->konten !!}
        @else
            <!-- Fallback content jika tidak ada data di database -->
            <div class="service-detail">
                <div class="service-icon-large">
                    <img src="{{ asset('images/standar-layanan.png') }}" alt="Standar Layanan">
                </div>
            </div>
            
            <div class="service-content">
                <h2>Standar Layanan PPID BBIA</h2>
                <p>PPID BBIA menetapkan standar layanan informasi publik yang harus dipatuhi oleh seluruh unit kerja di lingkungan Balai Besar Industri Agro sesuai dengan peraturan perundang-undangan.</p>
                
                <div class="info-grid">
                    <div class="info-box">
                        <h3>Dasar Hukum</h3>
                        <ul>
                            <li>Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik</li>
                            <li>Peraturan Pemerintah Nomor 61 Tahun 2010 tentang Pelaksanaan UU KIP</li>
                            <li>Peraturan Komisi Informasi Nomor 1 Tahun 2010 tentang Standar Layanan Informasi Publik</li>
                            <li>Peraturan internal Kementerian Perindustrian terkait PPID</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Jangka Waktu Pelayanan</h3>
                        <ul>
                            <li><strong>Pemohonan Informasi:</strong> Maksimal 10 hari kerja sejak permohonan diterima</li>
                            <li><strong>Keberatan:</strong> Maksimal 14 hari kerja sejak permohonan keberatan diterima</li>
                            <li><strong>Sengketa Informasi:</strong> Maksimal 100 hari kerja sejak pengajuan sengketa informasi ke Komisi Informasi</li>
                            <li><strong>Biaya:</strong> Tidak dipungut biaya untuk pemohonan informasi publik</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Jam Pelayanan</h3>
                        <ul>
                            <li>Senin - Kamis: 08:00 - 16:00 WIB</li>
                            <li>Senin - Jumat: Libur</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Sarana dan Cara Pelayanan</h3>
                        <ul>
                            <li><strong>Langsung:</strong> Permohonan dapat diajukan langsung di kantor PPID BBIA</li>
                            <li><strong>Online:</strong> Permohonan dapat diajukan melalui website atau email</li>
                            <li><strong>Telepon:</strong> Permohonan informasi dapat diajukan melalui telepon</li>
                            <li><strong>Fax:</strong> Permohonan informasi dapat diajukan melalui fax</li>
                        </ul>
                    </div>
                    
                    <div class="info-box">
                        <h3>Tata Cara Pelayanan</h3>
                        <ul>
                            <li><strong>Verifikasi:</strong> PPID BBIA akan memverifikasi kebenaran informasi yang diminta sebelum memberikan informasi tersebut</li>
                            <li><strong>Konfirmasi:</strong> PPID BBIA akan memberikan konfirmasi atas kebenaran informasi yang diminta</li>
                            <li><strong>Pemberitahuan:</strong> Informasi yang telah disediakan akan diberitahukan kepada pemohon</li>
                            <li><strong>Pemutakhiran:</strong> Informasi publik akan dimutakhirkan secara berkala dan disediakan dalam daftar informasi publik</li>
                            <li><strong>Pengaduan:</strong> PPID BBIA akan menangani pengaduan atas sengketa informasi yang diajukan oleh pemohon</li>
                        </ul>
                    </div>
                </div>
            </div>
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

.service-detail {
    display: flex;
    align-items: center;
    gap: 30px;
    margin-bottom: 40px;
}

.service-icon-large {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, rgba(26, 82, 130, 0.1), rgba(44, 130, 201, 0.1));
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.service-icon-large img {
    width: 60px;
    height: 60px;
    object-fit: contain;
}

.service-content {
    flex: 1;
}

.service-content h2 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
}

.service-content p {
    color: #333;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 16px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.info-box {
    background: rgba(26, 82, 130, 0.1);
    border: 1px solid rgba(26, 82, 130, 0.1);
    border-radius: 15px;
    padding: 30px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.info-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.info-box h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
}

.info-box ul {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    padding-left: 25px;
}

.info-box li {
    margin-bottom: 12px;
    font-size: 16px;
}
</style>

@endsection
