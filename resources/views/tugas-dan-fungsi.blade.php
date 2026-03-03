@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Tugas dan Fungsi PPID</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Tugas Utama PPID BBIA</h2>
        <p>PPID BBIA memiliki tugas utama dalam penyelenggaraan pemerintahan yang bersih dan transparan melalui layanan informasi publik yang berkualitas.</p>
        
        <h3>1. Penyediaan Layanan Informasi</h3>
        <p>Menyediakan layanan informasi publik yang mudah diakses oleh seluruh lapisan masyarakat, meliputi:</p>
        <ul>
            <li>Informasi berkala (tahunan, semesteran, triwulanan, bulanan)</li>
            <li>Informasi serta merta</li>
            <li>Informasi setiap saat</li>
            <li>Informasi yang wajib tersedia</li>
            <li>Informasi yang dikecualikan</li>
        </ul>
        
        <h3>2. Verifikasi dan Konfirmasi</h3>
        <p>Melakukan verifikasi kebenaran informasi publik yang diminta dan memberikan konfirmasi atas kebenaran informasi tersebut.</p>
        
        <h3>3. Standarisasi Layanan</h3>
            <p>Menetapkan standar layanan informasi publik yang meliputi:</p>
            <ul>
                <li>Waktu pelayanan</li>
                <li>Biaya pelayanan</li>
                <li>Produk pelayanan</li>
                <li>SOP pelayanan</li>
            </ul>
            
            <h3>4. Pemutakhiran Informasi</h3>
            <p>Memutakhirkan informasi publik secara berkala dan menyediakan daftar informasi publik yang dapat diakses secara online.</p>
            
            <h3>5. Penanganan Sengketa</h3>
            <p>Menyediakan mekanisme penanganan sengketa informasi sesuai dengan ketentuan perundang-undangan yang berlaku.</p>
            
            <h2>Fungsi PPID BBIA</h2>
            <p>Dalam melaksanakan tugasnya, PPID BBIA menjalankan fungsi:</p>
            <ul>
                <li><strong>Koordinatif:</strong> Mengkoordinasikan penyediaan informasi publik di lingkungan BBIA</li>
                <li><strong>Konsultatif:</strong> Memberikan konsultasi terkait akses informasi publik</li>
                <li><strong>Evaluatif:</strong> Melakukan evaluasi berkala terhadap kualitas layanan informasi</li>
                <li><strong>Advokasi:</strong> Mengadvokasikan pentingnya keterbukaan informasi publik</li>
            </ul>
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

.content-full ul {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    padding-left: 25px;
}

.content-full li {
    margin-bottom: 12px;
    font-size: 16px;
}
</style>

@endsection
