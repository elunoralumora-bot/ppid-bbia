@extends('layouts.app')

@section('title', 'Kanal Pengaduan - PPID BBIA')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Kanal Pengaduan</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Apa itu Kanal Pengaduan?</h2>
        <p>Kanal pengaduan adalah fasilitas yang disediakan PPID BBIA untuk menerima aspirasi, keluhan, dan saran dari masyarakat terkait pelayanan informasi publik. Melalui kanal ini, masyarakat dapat menyampaikan masukan untuk perbaikan kualitas layanan PPID BBIA.</p>
        
        <h2>Tujuan Kanal Pengaduan</h2>
        <p>Kanal pengaduan bertujuan untuk:</p>
        <ul>
            <li>Memberikan kemudahan bagi masyarakat untuk menyampaikan keluhan</li>
            <li>Meningkatkan kualitas pelayanan informasi publik</li>
            <li>Menjalin hubungan baik antara PPID dan masyarakat</li>
            <li>Mengidentifikasi permasalahan dalam sistem pelayanan</li>
            <li>Melakukan perbaikan berkelanjutan pada layanan</li>
        </ul>
        
        <h2>Kanal Pengaduan yang Tersedia</h2>
        <p>PPID BBIA menyediakan beberapa kanal pengaduan untuk kemudahan masyarakat:</p>
        
        <h3>Pengaduan Online</h3>
        <p>Ajukan pengaduan secara online melalui formulir elektronik yang tersedia di website PPID BBIA. Sistem online memungkinkan Anda melacak status pengaduan secara real-time.</p>
        
        <h3>Hotline Telepon</h3>
        <p>Layanan telepon untuk pengaduan mendesak yang memerlukan penanganan cepat. Petugas kami siap melayani dan mencatat pengaduan Anda dengan profesional.</p>
        <ul>
            <li><strong>Nomor:</strong> (0251) 8324068</li>
            <li><strong>Jam Operasional:</strong> Senin - Jumat, 08.00 - 16.00 WIB</li>
            <li><strong>Prioritas:</strong> Pengaduan mendesak dan keadaan darurat</li>
        </ul>
        
        <h3>Email Resmi</h3>
        <p>Kirim pengaduan secara tertulis melalui email resmi PPID BBIA. Email cocok untuk pengaduan yang memerlukan dokumentasi lengkap dan bukti pendukung.</p>
        <ul>
            <li><strong>Email:</strong> pengaduan@bbia.go.id</li>
            <li><strong>Format:</strong> Subjek jelas dengan [PENGADUAN] di awal</li>
            <li><strong>Lampiran:</strong> Dokumen bukti pendukung (jika ada)</li>
        </ul>
        
        <h3>Kunjungan Langsung</h3>
        <p>Datang langsung ke kantor PPID BBIA untuk konsultasi dan pengaduan langsung. Petugas kami akan melayani Anda dengan ramah dan profesional.</p>
        <ul>
            <li><strong>Alamat:</strong> Jl. Ir. H. Juanda No. 11, Bogor</li>
            <li><strong>Jam Operasional:</strong> Senin - Jumat, 08.00 - 16.00 WIB</li>
            <li><strong>Persyaratan:</strong> Identitas diri yang valid</li>
        </ul>
        
        <h2>Jenis Pengaduan yang Dapat Diajukan</h2>
        <p>Masyarakat dapat mengajukan pengaduan terkait:</p>
        <ul>
            <li>Pelayanan yang tidak sesuai standar operasional prosedur (SOP)</li>
            <li>Penolakan permohonan informasi yang tidak wajar atau tidak sesuai ketentuan</li>
            <li>Waktu penyelesaian permohonan yang melebihi batas waktu yang ditetapkan</li>
            <li>Pemungutan biaya yang tidak sesuai dengan ketentuan perundang-undangan</li>
            <li>Sikap petugas yang tidak profesional atau tidak ramah</li>
            <li>Kesulitan dalam mengakses informasi publik yang seharusnya tersedia</li>
            <li>Saran dan masukan untuk perbaikan pelayanan informasi publik</li>
            <li>Keluhan terhadap kebijakan atau prosedur yang dirasa tidak adil</li>
        </ul>
        
        <h2>Tata Cara Pengajuan Pengaduan</h2>
        <p>Untuk memastikan pengaduan Anda dapat ditindaklanjuti dengan efektif, ikuti tata cara berikut:</p>
        <ul>
            <li>Siapkan identitas diri yang jelas (nama, alamat, kontak)</li>
            <li>Jelaskan permasalahan secara rinci dan objektif</li>
            <li>Sertakan bukti-bukti pendukung (dokumen, foto, video, dll)</li>
            <li>Sebutkan waktu dan tempat kejadian yang spesifik</li>
            <li>Beri nama dan kontak pelapor yang dapat dihubungi</li>
            <li>Kirimkan pengaduan melalui kanal yang tersedia</li>
            <li>Simpan bukti pengajuan untuk referensi masa depan</li>
        </ul>
        
        <h2>Proses Penanganan Pengaduan</h2>
        <p>Pengaduan yang masuk akan melalui proses penanganan sebagai berikut:</p>
        <ul>
            <li><strong>Registrasi:</strong> Pengaduan akan diregistrasi dalam sistem pengaduan</li>
            <li><strong>Verifikasi:</strong> Verifikasi kebenaran informasi maksimal 3 hari kerja</li>
            <li><strong>Analisis:</strong> Analisis mendalam terhadap permasalahan yang diadukan</li>
            <li><strong>Tindakan:</strong> Penanganan pengaduan maksimal 14 hari kerja</li>
            <li><strong>Follow-up:</strong> Monitoring implementasi solusi yang diberikan</li>
            <li><strong>Report:</strong> Hasil penanganan akan disampaikan kepada pelapor</li>
            <li><strong>Evaluasi:</strong> Data pengaduan digunakan untuk perbaikan layanan berkelanjutan</li>
        </ul>
        
        <h2>Hak dan Kewajiban Pelapor</h2>
        <p>Pelapor pengaduan memiliki hak dan kewajiban yang perlu dipahami:</p>
        
        <h3>Hak Pelapor:</h3>
        <ul>
            <li>Mendapatkan informasi status pengaduan secara berkala</li>
            <li>Mendapatkan tanggapan atas pengaduan yang diajukan</li>
            <li>Identitas pelapor dirahasiat sesuai ketentuan yang berlaku</li>
            <li>Mendapatkan perlindungan hukum jika diperlukan</li>
        </ul>
        
        <h3>Kewajiban Pelapor:</h3>
        <ul>
            <li>Memberikan informasi yang benar dan akurat</li>
            <li>Tidak mengajukan pengaduan palsu atau fitnah</li>
            <li>Menghormati prosedur dan etika yang berlaku</li>
            <li>Bekerja sama dalam proses penyelesaian masalah</li>
        </ul>
        
        <h2>Jaminan Keamanan Data</h2>
        <p>PPID BBIA menjamin keamanan data pengaduan:</p>
        <ul>
            <li>Identitas pelapor dirahasiat dan tidak akan dipublikasikan</li>
            <li>Data pengaduan disimpan dalam sistem yang aman</li>
            <li>Akses data terbatas untuk petugas yang berwenang</li>
            <li>Informasi hanya digunakan untuk tujuan perbaikan layanan</li>
            <li>Kepatuhan terhadap UU Perlindungan Data Pribadi</li>
        </ul>
        
        <div class="action-section">
            <h2>Akses Layanan Pengaduan</h2>
            <p>Silakan akses layanan pengaduan melalui link berikut:</p>
            <div class="action-links">
                <a href="#" class="btn btn-outline">Ajukan Pengaduan Online</a>
                <a href="{{ url('/kontak-ppid') }}" class="btn btn-outline">Hubungi PPID</a>
                <a href="{{ url('/informasi-publik') }}" class="btn btn-outline">Informasi Layanan</a>
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

.content-full h3 {
    color: #2c5282;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
    margin-top: 30px;
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

.action-section {
    margin-top: 60px;
    padding: 30px;
    background: rgba(26, 58, 95, 0.05);
    border-radius: 15px;
    border: 2px solid rgba(26, 58, 95, 0.1);
}

.action-section h2 {
    margin-top: 0;
    color: #1a3a5f;
}

.action-section p {
    margin-bottom: 25px;
}

.action-links {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.action-links .btn {
    flex: 1;
    min-width: 200px;
    text-align: center;
}

.btn {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-block;
}

.btn-primary {
    background: linear-gradient(135deg, #1a3a5f, #2c5282);
    color: white;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #102841, #1e3d5a);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(26, 58, 95, 0.3);
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

@media (max-width: 768px) {
    .page-header-content {
        padding: 0 20px;
    }
    
    .content-full {
        padding: 40px 20px;
    }
    
    .content-full h2 {
        font-size: 24px;
    }
    
    .content-full h3 {
        font-size: 20px;
    }
    
    .action-links {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        text-align: center;
    }
}
</style>
@endsection
