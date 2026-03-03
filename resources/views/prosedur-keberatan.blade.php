@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Prosedur Pengajuan Keberatan</h1>
        <div class="breadcrumb">
        </div>
    </div>
    
    <div class="content-section">
        <div class="content-card">
            <h2>Prosedur Pengajuan Keberatan Informasi Publik</h2>
            <p>Berikut adalah prosedur lengkap untuk mengajukan keberatan atas informasi publik yang disediakan PPID BBIA sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2013.</p>
            
            <div class="procedure-flow">
                <div class="flow-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Dasar Hukum</h3>
                        <p>Pengajuan keberatan dilandasi pada Peraturan Komisi Informasi Nomor 1 Tahun 2013 tentang Prosedur Penyelesaian Sengketa Informasi Publik.</p>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Waktu Pengajuan</h3>
                        <p>Pengajuan keberatan dapat diajukan dalam waktu 30 hari kerja sejak informasi disampaikan atau diterima.</p>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Tata Cara Pengajuan</h3>
                        <p>Keberatan diajukan secara tertulis kepada PPID BBIA dengan mencantumkan:</p>
                        <ul>
                            <li>Nama lengkap pemohon</li>
                            <li>Alamat lengkap pemohon</li>
                            <li>Informasi kontak yang dapat dihubungi</li>
                            <li>Salinan identitas diri yang sah</li>
                            <li>Uraian singkat informasi yang menjadi sengketa</li>
                            <li>Alasan mengajukan keberatan</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Formulir Pengajuan</h3>
                        <p>Formulir pengajuan keberatan tersedia di:</p>
                        <ul>
                            <li>Kantor PPID BBIA</li>
                            <li>Website PPID BBIA</li>
                            <li>Aplikasi PPID Online</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h3>Proses Verifikasi</h3>
                        <p>PPID BBIA akan melakukan verifikasi terhadap keberatan yang diajukan:</p>
                        <ul>
                            <li>Kelengkapan dokumen yang disertakan</li>
                            <li>Kesesuaian dengan informasi yang ada</li>
                            <li>Wawancara dengan pemohon (jika diperlukan)</li>
                            <li>Survei lapangan (jika diperlukan)</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">6</div>
                    <div class="step-content">
                        <h3>Keputusan</h3>
                        <p>Keputusan atas pengajuan keberatan akan disampaikan dalam waktu:</p>
                        <ul>
                            <li><strong>Keberatan Biasa:</strong> 20 hari kerja sejak diterima</li>
                            <li><strong>Keberatan Sederhana:</strong> 10 hari kerja sejak diterima</li>
                            <li><strong>Keberatan Cepat:</strong> 5 hari kerja sejak diterima</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <h2>Formulir Pengajuan Keberatan</h2>
            <div class="form-section">
                <div class="form-info">
                    <h3>📄 Unduh Formulir</h3>
                    <p>Unduh formulir pengajuan keberatan informasi publik:</p>
                    <div class="form-links">
                        <a href="#" class="btn-link">Formulir Keberatan Biasa</a>
                        <a href="#" class="btn-link">Formulir Keberatan Sederhana</a>
                        <a href="#" class="btn-link">Formulir Keberatan Cepat</a>
                    </div>
                </div>
                
                <div class="form-guide">
                    <h3>📖 Panduan Pengisian</h3>
                    <p>Panduan lengkap pengisian formulir keberatan:</p>
                    <a href="#" class="btn-link">Download Panduan PDF</a>
                </div>
            </div>
            
            <h2>Kontak Bantuan</h2>
            <div class="contact-box">
                <p>Untuk bantuan pengajuan keberatan, hubungi:</p>
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
    background: linear-gradient(135deg, #1a3a5f, #2c5282);
    color: white;
    padding: 40px 0;
    margin-bottom: 40px;
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
    max-width: 800px;
    margin: 0 auto;
}

.content-card {
    background: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.content-card h2 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
    margin-top: 30px;
}

.content-card h2:first-child {
    margin-top: 0;
}

.content-card p {
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
}

.content-card ul {
    color: #333;
    line-height: 1.6;
    margin-bottom: 15px;
    padding-left: 20px;
}

.content-card li {
    margin-bottom: 8px;
}

.procedure-flow {
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
