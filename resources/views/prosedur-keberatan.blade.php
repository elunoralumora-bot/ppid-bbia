@extends('layouts.app')

@section('title', 'Prosedur Pengajuan Keberatan - PPID BBIA')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Prosedur Pengajuan Keberatan</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <h2>Prosedur Pengajuan Keberatan Atas Layanan Informasi Publik</h2>
        <p>Berikut adalah prosedur lengkap untuk mengajukan keberatan atas layanan informasi publik PPID BBIA sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2013.</p>
        
        <div class="infografis-container">
            <img src="{{ asset('images/pengajuan keberatan.png') }}" alt="Prosedur Pengajuan Keberatan" class="infografis-img">
        </div>
        
        <div class="procedure-flow">
            <div class="flow-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Alasan Pengajuan Keberatan</h3>
                    <p>Keberatan dapat diajukan karena alasan-alasan berikut:</p>
                    <div class="reason-options">
                        <div class="reason-item">
                            <h4>⏰ Lewat Waktu</h4>
                            <p>Permohonan informasi tidak ditanggapi dalam waktu 10 hari kerja</p>
                        </div>
                        <div class="reason-item">
                            <h4>❌ Ditolak</h4>
                            <p>Permohonan informasi ditolak tanpa alasan yang jelas</p>
                        </div>
                        <div class="reason-item">
                            <h4>🔄 Tidak Sesuai</h4>
                            <p>Informasi yang diberikan tidak sesuai dengan yang diminta</p>
                        </div>
                        <div class="reason-item">
                            <h4>💰 Biaya Tidak Wajar</h4>
                            <p>Biaya yang dibebankan tidak sesuai dengan ketentuan</p>
                        </div>
                    </div>
                    <div class="note-box">
                        <p><strong>Catatan:</strong> Keberatan diajukan paling lambat 30 hari setelah menerima pemberitahuan hasil permohonan.</p>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Pengisian Formulir Keberatan</h3>
                    <p>Pemohon mengisi formulir keberatan informasi publik secara lengkap:</p>
                    <ul>
                        <li>Formulir dapat diisi secara online melalui website PPID BBIA</li>
                        <li>Formulir dapat diisi langsung di kantor PPID BBIA</li>
                        <li>Formulir dapat diunduh dan diisi kemudian dikirim via email</li>
                    </ul>
                    <div class="required-docs">
                        <h4>Dokumen yang Diperlukan:</h4>
                        <ul>
                            <li>Fotokopi KTP/SIM/Paspor pemohon</li>
                            <li>Surat pemberitahuan hasil permohonan asli</li>
                            <li>Bukti pengajuan permohonan awal (jika ada)</li>
                            <li>Surat kuasa (jika diwakilkan)</li>
                            <li>Dokumen pendukung lainnya (jika diperlukan)</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Verifikasi dan Registrasi</h3>
                    <p>PPID BBIA akan melakukan verifikasi terhadap pengajuan keberatan:</p>
                    <ul>
                        <li>Kelengkapan data dan dokumen pemohon</li>
                        <li>Kesesuaian format dan waktu pengajuan</li>
                        <li>Klarifikasi alasan keberatan (jika diperlukan)</li>
                        <li>Pemberian nomor registrasi/tiket keberatan</li>
                    </ul>
                    <div class="timeline-info">
                        <strong>Waktu Verifikasi:</strong> Maksimal 3 hari kerja
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Proses Keberatan</h3>
                    <p>Setelah verifikasi, keberatan akan diproses dengan tahapan:</p>
                    <ul>
                        <li><strong>Analisis Keberatan:</strong> 2-3 hari kerja</li>
                        <li><strong>Review Permohonan Awal:</strong> 2-3 hari kerja</li>
                        <li><strong>Konsultasi Internal:</strong> 3-5 hari kerja</li>
                        <li><strong>Penyusunan Jawaban:</strong> 2-3 hari kerja</li>
                    </ul>
                    <div class="timeline-info">
                        <strong>Total Waktu Proses:</strong> Maksimal 30 hari kerja
                    </div>
                    <div class="note-box">
                        <p><strong>Catatan:</strong> Jika diperlukan, waktu dapat diperpanjang maksimal 14 hari kerja dengan pemberitahuan tertulis.</p>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3>Penyelesaian Keberatan</h3>
                    <p>Keberatan dapat diselesaikan dengan beberapa hasil:</p>
                    <div class="outcome-options">
                        <div class="outcome-item">
                            <h4>✅ Diterima</h4>
                            <p>Keberatan diterima dan informasi diberikan sesuai permohonan awal</p>
                        </div>
                        <div class="outcome-item">
                            <h4>🔄 Diterima Sebagian</h4>
                            <p>Keberatan diterima sebagian dengan alasan yang jelas</p>
                        </div>
                        <div class="outcome-item">
                            <h4>❌ Ditolak</h4>
                            <p>Keberatan ditolak dengan alasan sesuai undang-undang</p>
                        </div>
                    </div>
                    <div class="next-steps">
                        <h4>Langkah Selanjutnya:</h4>
                        <ul>
                            <li>Jika keberatan ditolak, pemohon dapat mengajukan sengketa ke Komisi Informasi</li>
                            <li>Pengajuan sengketa dilakukan paling lambat 14 hari setelah pemberitahuan keberatan</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">6</div>
                <div class="step-content">
                    <h3>Pemberitahuan Hasil Keberatan</h3>
                    <p>PPID BBIA akan memberitahukan hasil keberatan kepada pemohon:</p>
                    <ul>
                        <li>Surat keputusan atas keberatan</li>
                        <li>Informasi yang diminta (jika keberatan diterima)</li>
                        <li>Alasan penolakan keberatan (jika ditolak)</li>
                        <li>Informasi mengenai hak mengajukan sengketa informasi</li>
                        <li>Prosedur pengajuan sengketa ke Komisi Informasi</li>
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
                <h3>📋 Syarat Pengajuan Keberatan</h3>
                <ul>
                    <li>Pernah mengajukan permohonan informasi ke PPID BBIA</li>
                    <li>Menerima pemberitahuan hasil permohonan</li>
                    <li>Mengajukan keberatan paling lambat 30 hari</li>
                    <li>Menyertakan dokumen pendukung yang lengkap</li>
                    <li>Mencantumkan alasan keberatan yang jelas</li>
                </ul>
            </div>
            
            <div class="info-box">
                <h3>⏰ Waktu Layanan Keberatan</h3>
                <ul>
                    <li><strong>Penerimaan:</strong> Senin - Jumat, 08:00 - 16:00 WIB</li>
                    <li><strong>Verifikasi:</strong> Maksimal 3 hari kerja</li>
                    <li><strong>Proses:</strong> Maksimal 30 hari kerja</li>
                    <li><strong>Perpanjangan:</strong> Maksimal 14 hari kerja</li>
                    <li><strong>Sengketa:</strong> 14 hari setelah keputusan keberatan</li>
                </ul>
            </div>
            
            <div class="info-box">
                <h3>⚖️ Sengketa Informasi</h3>
                <ul>
                    <li>Diajukan ke Komisi Informasi</li>
                    <li>Maksimal 14 hari setelah keputusan keberatan</li>
                    <li>Menggunakan formulir pengaduan resmi</li>
                    <li>Menyertakan semua dokumen terkait</li>
                    <li>Gratis tanpa biaya administrasi</li>
                </ul>
            </div>
        </div>
        
        <div class="comparison-table">
            <h3>📊 Perbandingan Permohonan vs Keberatan</h3>
            <table class="comparison">
                <thead>
                    <tr>
                        <th>Aspek</th>
                        <th>Permohonan Informasi</th>
                        <th>Keberatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Tujuan</strong></td>
                        <td>Mendapatkan informasi</td>
                        <td>Menanggapi hasil permohonan</td>
                    </tr>
                    <tr>
                        <td><strong>Waktu Proses</strong></td>
                        <td>10 hari kerja</td>
                        <td>30 hari kerja</td>
                    </tr>
                    <tr>
                        <td><strong>Biaya</strong></td>
                        <td>Gratis (penyalinan berbayar)</td>
                        <td>Gratis</td>
                    </tr>
                    <tr>
                        <td><strong>Langkah Selanjutnya</strong></td>
                        <td>Keberatan (jika tidak puas)</td>
                        <td>Sengketa Informasi</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="action-section">
            <h3>📝 Ajukan Keberatan Sekarang</h3>
            <p style="color: white;">Silakan ajukan keberatan atas layanan informasi publik melalui formulir online kami:</p>
            <div class="action-buttons">
                <a href="{{ url('/form-keberatan') }}" class="btn btn-action">
                    <i class="fas fa-exclamation-triangle"></i>
                    Formulir Keberatan
                </a>
                <a href="{{ url('/mekanisme-sengketa') }}" class="btn btn-action">
                    <i class="fas fa-gavel"></i>
                    Mekanisme Sengketa
                </a>
                <a href="{{ url('/periksa-keberatan') }}" class="btn btn-action">
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
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    margin: 30px auto;
    padding: 20px;
    background: transparent;
    border-radius: 15px;
    box-shadow: none;
    border: none;
    text-align: center;
}

.infografis-img {
    max-width: 100%;
    max-height: 600px;
    width: auto;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    display: block;
    transition: transform 0.3s ease;
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

.reason-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 20px 0;
}

.reason-item {
    background: white;
    border: 1px solid #e1e5e9;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
}

.reason-item h4 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #1a3a5f;
}

.required-docs, .timeline-info, .note-box, .contact-info, .next-steps {
    background: rgba(44, 82, 130, 0.05);
    border-left: 4px solid #2c5282;
    padding: 15px 20px;
    margin: 20px 0;
    border-radius: 0 8px 8px 0;
}

.required-docs h4, .timeline-info strong, .contact-info strong, .next-steps h4 {
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

.comparison-table {
    margin: 40px 0;
}

.comparison-table h3 {
    color: #1a3a5f;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 20px;
}

.comparison {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.comparison th {
    background: linear-gradient(135deg, #2c5282 0%, #1a3a5f 100%);
    color: white;
    padding: 15px;
    text-align: left;
    font-weight: 600;
}

.comparison td {
    padding: 15px;
    border-bottom: 1px solid #e1e5e9;
}

.comparison tr:last-child td {
    border-bottom: none;
}

.comparison td:first-child {
    font-weight: 600;
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
    
    .reason-options, .outcome-options {
        grid-template-columns: 1fr;
    }
    
    .comparison {
        font-size: 14px;
    }
    
    .comparison th, .comparison td {
        padding: 10px;
    }
    
    .action-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 200px;
        justify-content: center;
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
