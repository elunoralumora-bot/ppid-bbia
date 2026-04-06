@extends('layouts.app')

@section('title', 'Prosedur Permohonan Informasi - PPID BBIA')

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
        <h2>Prosedur Permohonan Informasi Publik PPID BBIA</h2>
        <p>Berikut adalah prosedur lengkap untuk mengajukan permohonan informasi publik kepada PPID BBIA sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2010.</p>
        
        <div class="infografis-container">
            <img src="{{ asset('images/permohonan informasi.jpg') }}" alt="Prosedur Permohonan Informasi" class="infografis-img">
        </div>
        
        <div class="procedure-flow">
            <div class="flow-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Pengisian Formulir Permohonan</h3>
                    <p>Pemohon mengisi formulir permohonan informasi publik secara lengkap dan benar:</p>
                    <ul>
                        <li>Formulir dapat diisi secara online melalui website PPID BBIA</li>
                        <li>Formulir dapat diisi langsung di kantor PPID BBIA</li>
                        <li>Formulir dapat diunduh dan diisi kemudian dikirim via email</li>
                    </ul>
                    <div class="required-docs">
                        <h4>Dokumen yang Diperlukan:</h4>
                        <ul>
                            <li>Fotokopi KTP/SIM/Paspor yang masih berlaku</li>
                            <li>Surat kuasa (jika diwakilkan)</li>
                            <li>Dokumen pendukung lainnya (jika diperlukan)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Verifikasi dan Registrasi</h3>
                    <p>PPID BBIA akan melakukan verifikasi terhadap permohonan yang masuk:</p>
                    <ul>
                        <li>Kelengkapan data pemohon</li>
                        <li>Kesesuaian format permohonan</li>
                        <li>Klarifikasi informasi yang diminta (jika diperlukan)</li>
                        <li>Pemberian nomor registrasi/tiket permohonan</li>
                    </ul>
                    <div class="timeline-info">
                        <strong>Waktu Verifikasi:</strong> Maksimal 2 hari kerja
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Proses Permohonan</h3>
                    <p>Setelah verifikasi, permohonan akan diproses sesuai dengan jenis informasi yang diminta:</p>
                    <ul>
                        <li>Informasi yang tersedia langsung: 1-2 hari kerja</li>
                        <li>Informasi perlu konsolidasi: 3-5 hari kerja</li>
                        <li>Informasi kompleks: maksimal 10 hari kerja</li>
                        <li>Perpanjangan waktu: maksimal 7 hari kerja (diberitahukan tertulis)</li>
                    </ul>
                    <div class="note-box">
                        <p><strong>Catatan:</strong> Pemohon akan diberikan informasi mengenai estimasi waktu penyelesaian permohonan.</p>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Penyelesaian Permohonan</h3>
                    <p>Permohonan dapat diselesaikan dengan beberapa cara:</p>
                    <div class="outcome-options">
                        <div class="outcome-item">
                            <h4>✅ Disetujui</h4>
                            <p>Informasi diberikan sesuai permohonan dalam bentuk hard copy/soft copy</p>
                        </div>
                        <div class="outcome-item">
                            <h4>🔄 Diberikan Sebagian</h4>
                            <p>Informasi diberikan sebagian dengan alasan yang jelas</p>
                        </div>
                        <div class="outcome-item">
                            <h4>❌ Ditolak</h4>
                            <p>Permohonan ditolak dengan alasan sesuai undang-undang</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3>Pemberitahuan Hasil</h3>
                    <p>PPID BBIA akan memberitahukan hasil permohonan kepada pemohon:</p>
                    <ul>
                        <li>Surat pemberitahuan hasil permohonan</li>
                        <li>Informasi yang diminta (jika disetujui)</li>
                        <li>Alasan penolakan/pembatasan (jika ditolak/sebagian)</li>
                        <li>Informasi mengenai hak mengajukan keberatan</li>
                    </ul>
                    <div class="contact-info">
                        <strong>Informasi lebih lanjut:</strong><br>
                        📞 (0251) 8323880<br>
                        📧 ppid.bbia@kemenperin.go.id
                    </div>
                </div>
            </div>
        </div>
        
        <div class="info-grid">
            <div class="info-box">
                <h3>📋 Syarat Permohonan</h3>
                <ul>
                    <li>Warga negara Indonesia atau badan hukum Indonesia</li>
                    <li>Usia minimal 18 tahun atau sudah menikah</li>
                    <li>Mengisi formulir permohonan dengan lengkap</li>
                    <li>Menyertakan identitas diri yang valid</li>
                    <li>Mencantumkan tujuan penggunaan informasi</li>
                </ul>
            </div>
            
            <div class="info-box">
                <h3>⏰ Waktu Layanan</h3>
                <ul>
                    <li><strong>Penerimaan:</strong> Senin - Jumat, 08:00 - 16:00 WIB</li>
                    <li><strong>Proses:</strong> Maksimal 10 hari kerja</li>
                    <li><strong>Perpanjangan:</strong> Maksimal 7 hari kerja</li>
                    <li><strong>Keberatan:</strong> 20 hari kerja setelah pemberitahuan</li>
                </ul>
            </div>
            
            <div class="info-box">
                <h3>💰 Biaya Layanan</h3>
                <ul>
                    <li><strong>Permohonan dasar:</strong> Gratis</li>
                    <li><strong>Penyalinan hard copy:</strong> Rp 200 per halaman</li>
                    <li><strong>CD/DVD:</strong> Rp 5.000 per keping</li>
                    <li><strong>Flashdisk:</strong> Sesuai harga pasar</li>
                    <li><strong>Jasa kurir:</strong> Sesuai tarif yang berlaku</li>
                </ul>
            </div>
        </div>
        
        <div class="action-section">
            <h3>📝 Ajukan Permohonan Sekarang</h3>
            <p style="color: white;">Silakan ajukan permohonan informasi publik melalui formulir online kami:</p>
            <div class="action-buttons">
                <a href="{{ url('/form-permohonan') }}" class="btn btn-action">
                    <i class="fas fa-file-alt"></i>
                    Formulir Online
                </a>
                <a href="{{ url('/kontak-ppid') }}" class="btn btn-action">
                    <i class="fas fa-phone"></i>
                    Hubungi Kami
                </a>
                <a href="{{ url('/periksa-permohonan') }}" class="btn btn-action">
                    <i class="fas fa-search"></i>
                    Cek Status
                </a>
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

.infografis-container {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    text-align: center;
    margin: 40px auto;
    padding: 15px;
    background: rgba(26, 58, 95, 0.02);
    border: 1px solid rgba(26, 58, 95, 0.1);
    border-radius: 15px;
    min-height: auto;
    max-width: fit-content;
}

.infografis-img {
    max-width: 100%;
    max-height: 600px;
    width: auto;
    height: auto;
    object-fit: contain;
    object-position: center;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    display: block;
}

.infografis-img:hover {
    transform: scale(1.02);
}

.procedure-flow {
    margin: 40px 0;
}

.flow-step {
    display: flex;
    gap: 30px;
    margin-bottom: 40px;
    padding: 30px;
    background: rgba(26, 58, 95, 0.02);
    border: 1px solid rgba(26, 58, 95, 0.1);
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.flow-step:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.step-number {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #2c5282 0%, #1a3a5f 100%);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: 700;
}

.step-content {
    flex: 1;
}

.step-content h3 {
    color: #1a3a5f;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
}

.step-content p {
    margin-bottom: 15px;
}

.step-content ul {
    margin-bottom: 20px;
    padding-left: 20px;
}

.step-content li {
    margin-bottom: 8px;
    color: #333;
    line-height: 1.6;
}

.required-docs, .timeline-info, .note-box, .contact-info {
    background: rgba(44, 82, 130, 0.05);
    border-left: 4px solid #2c5282;
    padding: 15px 20px;
    margin: 20px 0;
    border-radius: 0 8px 8px 0;
}

.required-docs h4, .timeline-info strong, .contact-info strong {
    color: #1a3a5f;
    font-weight: 600;
    margin-bottom: 10px;
}

.outcome-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 20px 0;
}

.outcome-item {
    background: white;
    border: 1px solid #e1e5e9;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
}

.outcome-item h4 {
    font-size: 18px;
    margin-bottom: 10px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin: 40px 0;
}

.info-box {
    background: rgba(26, 58, 95, 0.02);
    border: 1px solid rgba(26, 58, 95, 0.1);
    border-radius: 10px;
    padding: 25px;
}

.info-box h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}

.info-box ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-box li {
    margin-bottom: 10px;
    color: #333;
    font-size: 14px;
    line-height: 1.6;
}

.info-box li strong {
    color: #1a3a5f;
}

.action-section {
    background: linear-gradient(135deg, #2c5282 0%, #1a3a5f 100%);
    color: white;
    padding: 40px;
    border-radius: 15px;
    text-align: center;
    margin: 40px 0;
}

.action-section h3 {
    font-size: 24px;
    margin-bottom: 15px;
}

.action-section p {
    margin-bottom: 30px;
    opacity: 0.9;
}

.action-buttons {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn {
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-action {
    background-color: white;
    color: #1a3a5f;
    border: none;
    padding: 15px 30px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 16px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-width: 180px;
    height: 50px;
}

.btn-action:hover {
    background-color: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.btn-primary {
    background-color: white;
    color: #1a3a5f;
}

.btn-primary:hover {
    background-color: #f8f9fa;
    transform: translateY(-1px);
}

.btn-outline {
    background-color: transparent;
    color: white;
    border: 2px solid white;
}

.btn-outline:hover {
    background-color: white;
    color: #1a3a5f;
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .page-header-content {
        padding: 0 20px;
    }
    
    .content-full {
        padding: 40px 20px;
    }
    
    .flow-step {
        flex-direction: column;
        gap: 20px;
        padding: 20px;
    }
    
    .step-number {
        width: 50px;
        height: 50px;
        font-size: 20px;
        align-self: center;
    }
    
    .outcome-options {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 200px;
        justify-content: center;
    }
    
    .btn-action {
        width: 100%;
        max-width: 200px;
        padding: 12px 20px;
        font-size: 14px;
        min-width: 150px;
        height: 45px;
    }
    
    .infografis-container {
        padding: 10px;
        margin: 30px auto;
    }
    
    .infografis-img {
        border-radius: 8px;
    }
}
</style>
@endsection
