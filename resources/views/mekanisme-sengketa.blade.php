@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Mekanisme Penanganan Sengketa Informasi</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Mekanisme Penanganan Sengketa Informasi Publik</h2>
        <p>Berikut adalah mekanisme lengkap penanganan sengketa informasi publik di PPID BBIA sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2013.</p>
            
            <div class="mechanism-flow">
                <div class="flow-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Penerimaan Pengaduan</h3>
                        <p>Pengaduan dapat disampaikan melalui:</p>
                        <ul>
                            <li>Langsung datang ke kantor PPID BBIA</li>
                            <li>Surat pos ke alamat PPID BBIA</li>
                            <li>Email: ppid@bbia.go.id</li>
                            <li>WhatsApp: +62 812-3456-7890</li>
                            <li>Formulir online di website PPID BBIA</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Verifikasi Pengaduan</h3>
                        <p>PPID BBIA akan melakukan verifikasi terhadap pengaduan yang diterima:</p>
                        <ul>
                            <li>Kelengkapan dokumen pendukung</li>
                            <li>Kesesuaian dengan informasi yang ada</li>
                            <li>Wawancara dengan pelapor (jika diperlukan)</li>
                            <li>Survei lapangan (jika diperlukan)</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Analisis dan Evaluasi</h3>
                        <p>Pengaduan akan dianalisis dan dievaluasi untuk menentukan:</p>
                        <ul>
                            <li>Kategori sengketa (biasa, sederhana, atau cepat)</li>
                            <li>Urgensi dan dampak terhadap masyarakat</li>
                            <li>Ketersediaan informasi yang diminta</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Penyelesaian</h3>
                        <p>Penyelesaian sengketa dilakukan melalui:</p>
                        <ul>
                            <li><strong>Klarifikasi:</strong> Memberikan klarifikasi atas informasi yang dianggap sengketa</li>
                            <li><strong>Koreksi:</strong> Memperbaiki informasi yang tidak akurat</li>
                            <li><strong>Pemenuhan:</strong> Menyediakan informasi yang benar dan lengkap</li>
                            <li><strong>Pemberitahuan:</strong> Memberitahukan hasil penyelesaian kepada pelapor</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h3>Waktu Penyelesaian</h3>
                        <p>Waktu penyelesaian sengketa informasi publik:</p>
                        <ul>
                            <li><strong>Sengketa Biasa:</strong> 30 hari kerja</li>
                            <li><strong>Sengketa Sederhana:</strong> 20 hari kerja</li>
                            <li><strong>Sengketa Cepat:</strong> 10 hari kerja</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">6</div>
                    <div class="step-content">
                        <h3>Laporan dan Monitoring</h3>
                        <p>PPID BBIA akan:</p>
                        <ul>
                            <li>Mencatat semua pengaduan yang diterima</li>
                            <li>Melaporkan hasil penyelesaian ke Komisi Informasi</li>
                            <li>Memantau efektivitas mekanisme penanganan sengketa</li>
                            <li>Melakukan evaluasi berkala terhadap kualitas layanan</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <h2>Formulir Pengaduan</h2>
            <div class="form-section">
                <div class="form-info">
                    <h3>📄 Formulir Pengaduan</h3>
                    <p>Unduh formulir pengaduan sengketa informasi publik:</p>
                    <div class="form-links">
                        <a href="#" class="btn-link">Formulir Pengaduan Biasa</a>
                        <a href="#" class="btn-link">Formulir Pengaduan Sederhana</a>
                        <a href="#" class="btn-link">Formulir Pengaduan Cepat</a>
                    </div>
                </div>
                
                <div class="form-guide">
                    <h3>📖 Panduan Pengisian</h3>
                    <p>Panduan lengkap pengisian formulir pengaduan:</p>
                    <a href="#" class="btn-link">Download Panduan PDF</a>
                </div>
            </div>
            
            <h2>Kontak Pengaduan</h2>
            <div class="contact-box">
                <p>Untuk pengaduan sengketa informasi publik, hubungi:</p>
                <ul>
                    <li><strong>Telepon:</strong> (0251) 8324068</li>
                    <li><strong>Email:</strong> ppid@bbia.go.id</li>
                    <li><strong>WhatsApp:</strong> +62 812-3456-7890</li>
                    <li><strong>Alamat:</strong> Jl. Ir. H. Juanda No. 11, Bogor</li>
                </ul>
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

.content-full p {
    color: #333;
    line-height: 1.8;
    margin-bottom: 20px;
    font-size: 16px;
}

.mechanism-flow {
    display: grid;
    gap: 30px;
    margin: 30px 0;
}

.flow-step {
    display: flex;
    gap: 20px;
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
}

.step-number {
    width: 50px;
    height: 50px;
    background: #1a3a5f;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 700;
    flex-shrink: 0;
}

.step-content h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.step-content p {
    color: #333;
    font-size: 14px;
    line-height: 1.5;
    margin-bottom: 0;
}

.form-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.form-info, .form-guide {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
}

.form-info h3, .form-guide h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.form-info p, .form-guide p {
    margin-bottom: 15px;
}

.form-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.btn-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
    padding: 8px 16px;
    border: 1px solid #1a3a5f;
    border-radius: 5px;
    font-size: 14px;
    display: inline-block;
}

.btn-link:hover {
    background: #1a3a5f;
    color: white;
}

.contact-box {
    background: #1a3a5f;
    color: white;
    border-radius: 10px;
    padding: 25px;
    margin: 20px 0;
}

.contact-box p {
    color: white;
    margin-bottom: 15px;
}

.contact-box ul {
    color: white;
}

.contact-box li {
    margin-bottom: 8px;
}

.contact-box li strong {
    color: rgba(255, 255, 255, 0.8);
}
</style>

@endsection
