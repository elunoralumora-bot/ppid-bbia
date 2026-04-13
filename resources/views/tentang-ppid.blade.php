@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Tentang PPID</h1>
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
            <h2>Apa itu PPID?</h2>
            <p>Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab atas penyediaan layanan dan informasi publik di lingkungan Balai Besar Industri Agro (BBIA). PPID BBIA berfungsi sebagai jembatan antara institusi dengan masyarakat dalam hal akses informasi publik.</p>
            
            <h2>Tugas dan Tanggung Jawab</h2>
            <p>Sesuai Peraturan Pemerintah No. 61 Tahun 2010 Tentang Pelaksanaan Undang-Undang No. 14 Tahun 2008, tugas dan tanggung jawab PPID adalah:</p>
            
            <ol>
                <li>Penyediaan, penyimpanan, pendokumentasian dan pengamanan informasi;</li>
                <li>Pelayanan Informasi Publik sesuai aturan yang berlaku;</li>
                <li>Pelayanan Informasi Publik yang cepat, tepat, sederhana;</li>
                <li>Penetapan prosedur operasional dalam penyebarluasan Informasi Publik;</li>
                <li>Pengujian konsekuensi;</li>
                <li>Pengklasifikasian informasi dan/atau pengubahannya;</li>
                <li>Penetapan informasi yang dikecualikan yang telah habis jangka waktu pengecualiannya sebagai Informasi Publik yang dapat diakses; dan</li>
                <li>Penetapan pertimbangan tertulis atas setiap kebijakan yang diambil untuk memenuhi hak setiap orang atas Informasi Publik.</li>
            </ol>
            
            <h2>Operasional PPID</h2>
            
            <p>Pemohon informasi publik dapat memperoleh informasi publik secara langsung maupun melalui media, yaitu sebagai berikut:</p>
            
            <h3>Layanan Informasi Langsung</h3>
            
            <p>Untuk layanan langsung, pemohon Informasi Publik dapat datang langsung ke Desk Layanan Informasi Balai Besar Industri Agro di Ruang CSO (Customer Service Officer) Jl. Ir. H. Juanda No. 11, Bogor.</p>
            
            <h3>Layanan Informasi Melalui Media</h3>
            
            <p>Untuk Layanan Informasi melalui media, Pemohon Informasi Publik dapat menghubungi:</p>
            
            <div class="contact-info">
                <p><strong>WA :</strong> 0812 1390 0044</p>
                <p><strong>Telp. :</strong> (0251) 8324068</p>
                <p><strong>Fax. :</strong> (0251) 8323339</p>
                <p><strong>Email :</strong> cabi@bbia.go.id</p>
                <p><strong>Website :</strong> http://www.bbia.go.id</p>
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
