@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Prosedur Permohonan Informasi</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Prosedur Permohonan Informasi Publik</h2>
        <p>Berikut adalah prosedur lengkap untuk mengajukan permohonan informasi publik kepada PPID BBIA.</p>
            
            <div class="procedure-flow">
                <div class="flow-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Persiapan Permohonan</h3>
                        <p>Persiapkan dokumen dan informasi yang diperlukan untuk permohonan informasi.</p>
                        <ul>
                            <li>Identitas diri (KTP/SIM/Paspor)</li>
                            <li>Formulir permohonan informasi</li>
                            <li>Surat kuasa (jika diwakilkan)</li>
                            <li>Materai Rp 10.000 (untuk permohonan tertulis)</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Pengajuan Permohonan</h3>
                        <p>Ajukan permohonan informasi melalui salah satu kanal yang tersedia:</p>
                        <ul>
                            <li>Langsung datang ke kantor PPID BBIA</li>
                            <li>Email: ppid@bbia.go.id</li>
                            <li>Website: ppid.bbia.go.id</li>
                            <li>WhatsApp: +62 812-3456-7890</li>
                            <li>Surat pos ke alamat PPID BBIA</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Verifikasi Permohonan</h3>
                        <p>PPID BBIA akan melakukan verifikasi terhadap permohonan yang diajukan:</p>
                        <ul>
                            <li>Kelengkapan dokumen</li>
                            <li>Kesesuaian dengan kewenangan PPID BBIA</li>
                            <li>Kejelasan informasi yang diminta</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Proses Permohonan</h3>
                        <p>Permohonan akan diproses sesuai dengan ketentuan:</p>
                        <ul>
                            <li>Maksimal 10 hari kerja sejak diterima</li>
                            <li>Dapat diperpanjang maksimal 7 hari kerja</li>
                            <li>Pemberitahuan perpanjangan waktu</li>
                        </ul>
                    </div>
                </div>
                
                <div class="flow-step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h3>Penyelesaian Permohonan</h3>
                        <p>Hasil permohonan akan disampaikan melalui:</p>
                        <ul>
                            <li>Informasi disediakan sesuai format yang diminta</li>
                            <li>Penolakan dengan alasan yang jelas</li>
                            <li>Rujukan ke instansi terkait (jika perlu)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <h2>Formulir Permohonan</h2>
            <div class="form-section">
                <div class="form-info">
                    <h3>📄 Formulir Permohonan Informasi</h3>
                    <p>Unduh formulir permohonan informasi publik PPID BBIA:</p>
                    <a href="#" class="btn-link">Download Formulir PDF</a>
                </div>
                
                <div class="form-guide">
                    <h3>📖 Panduan Pengisian</h3>
                    <p>Panduan lengkap pengisian formulir permohonan informasi:</p>
                    <a href="#" class="btn-link">Download Panduan PDF</a>
                </div>
            </div>
            
            <h2>Waktu dan Biaya</h2>
            <div class="time-cost-grid">
                <div class="info-card">
                    <h3>⏰ Waktu Layanan</h3>
                    <ul>
                        <li><strong>Proses Permohonan:</strong> 10 hari kerja</li>
                        <li><strong>Perpanjangan:</strong> Maksimal 7 hari kerja</li>
                        <li><strong>Penyelesaian:</strong> Sesuai kesepakatan</li>
                        <li><strong>Keberatan:</strong> 30 hari kerja</li>
                    </ul>
                </div>
                
                <div class="info-card">
                    <h3>💰 Biaya Layanan</h3>
                    <ul>
                        <li><strong>Permohonan Informasi:</strong> Gratis</li>
                        <li><strong>Penggandaan:</strong> Rp 200/halaman</li>
                        <li><strong>Penyimpanan Digital:</strong> Rp 5.000/MB</li>
                        <li><strong>Pengiriman:</strong> Sesuai tarif jasa</li>
                    </ul>
                </div>
            </div>
            
            <h2>Kontak Bantuan</h2>
            <div class="contact-box">
                <p>Untuk bantuan prosedur permohonan informasi, hubungi:</p>
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
    margin: 0;
    width: 100vw;
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
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
    margin-bottom: 15px;
}

.step-content ul {
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

.time-cost-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    margin: 30px 0;
}

.info-card {
    background: #f8f9fa;
    border: 2px solid #1a3a5f;
    border-radius: 10px;
    padding: 25px;
}

.info-card h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}

.info-card ul {
    margin-bottom: 0;
}

.info-card li {
    margin-bottom: 10px;
}

.info-card li strong {
    color: #1a3a5f;
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
