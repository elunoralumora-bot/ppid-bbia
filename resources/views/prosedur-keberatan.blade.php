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
        
        @php
        // Baca data dari file JSON yang disimpan oleh admin
        $dataFile = public_path('data/prosedur_keberatan.json');
        $prosedurData = [];
        
        if (file_exists($dataFile)) {
            $jsonContent = file_get_contents($dataFile);
            $prosedurData = json_decode($jsonContent, true) ?: [];
        }
        @endphp
        
        <div class="procedure-flow">
            <div class="infografis-container">
                <img src="{{ asset('images/pengajuan keberatan.png') }}" alt="Prosedur Pengajuan Keberatan" class="infografis-img">
            </div>
            
            <div class="flow-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Alasan Pengajuan Keberatan</h3>
                    <p>Keberatan dapat diajukan karena alasan-alasan berikut:</p>
                    <div class="form-group">
                        @if(isset($prosedurData['alasan_pengajuan']['konten']))
                            {!! nl2br(str_replace("\r\n", "\n", $prosedurData['alasan_pengajuan']['konten'])) !!}
                        @else
                            <ul>
                                <li>Lewat Waktu: Permohonan informasi tidak ditanggapi dalam waktu 10 hari kerja</li>
                                <li>Ditolak: Permohonan informasi ditolak tanpa alasan yang jelas</li>
                                <li>Tidak Sesuai: Informasi yang diberikan tidak sesuai dengan yang diminta</li>
                                <li>Biaya Tidak Wajar: Biaya yang dibebankan tidak sesuai dengan ketentuan</li>
                            </ul>
                        @endif
                    </div>
                    <div class="timeline-info">
                        <strong>Batas Waktu:</strong> 30 hari setelah menerima hasil permohonan
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Tata Cara Pengajuan</h3>
                    <p>Pengajuan keberatan dilakukan dengan cara:</p>
                    <div class="form-group">
                        @if(isset($prosedurData['tata_cara_pengajuan']['konten']))
                            {!! nl2br(str_replace("\r\n", "\n", $prosedurData['tata_cara_pengajuan']['konten'])) !!}
                        @else
                            <ul>
                                <li>Mengisi formulir keberatan yang tersedia</li>
                                <li>Melampirkan dokumen pendukung (KTP, surat permohonan asli, dll)</li>
                                <li>Menyertakan alasan keberatan secara jelas</li>
                                <li>Mengajukan secara langsung atau melalui media elektronik</li>
                            </ul>
                        @endif
                    </div>
                    <div class="timeline-info">
                        <strong>Tempat:</strong> PPID BBIA di Ruang CSO Jl. Ir. H. Juanda No. 11, Bogor
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Proses Penanganan</h3>
                    <p>Proses penanganan keberatan:</p>
                    <div class="form-group">
                        @if(isset($prosedurData['proses_penanganan']['konten']))
                            {!! nl2br(str_replace("\r\n", "\n", $prosedurData['proses_penanganan']['konten'])) !!}
                        @else
                            <ul>
                                <li><strong>Penerimaan:</strong> Keberatan dicatat dan diberi nomor registrasi</li>
                                <li><strong>Verifikasi:</strong> Kelengkapan dokumen dan keabsahan pengajuan</li>
                                <li><strong>Evaluasi:</strong> Analisis alasan keberatan dan dokumen pendukung</li>
                                <li><strong>Keputusan:</strong> Ditetapkan oleh Atasan PPID</li>
                            </ul>
                        @endif
                    </div>
                    <div class="timeline-info">
                        <strong>Waktu Proses:</strong> Maksimal 30 hari kerja
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Hasil Keputusan</h3>
                    <p>Hasil keputusan keberatan dapat berupa:</p>
                    <div class="outcome-options">
                        <div class="outcome-item">
                            <h4>Diterima</h4>
                            <p>
                                @if(isset($prosedurData['hasil_keputusan']['diterima']))
                                    {!! $prosedurData['hasil_keputusan']['diterima'] !!}
                                @else
                                    Keberatan diterima dan informasi disediakan sesuai permohonan
                                @endif
                            </p>
                        </div>
                        <div class="outcome-item">
                            <h4>Diberikan Sebagian</h4>
                            <p>
                                @if(isset($prosedurData['hasil_keputusan']['sebagian']))
                                    {!! $prosedurData['hasil_keputusan']['sebagian'] !!}
                                @else
                                    Informasi diberikan sebagian dengan alasan yang jelas
                                @endif
                            </p>
                        </div>
                        <div class="outcome-item">
                            <h4>Ditolak</h4>
                            <p>
                                @if(isset($prosedurData['hasil_keputusan']['ditolak']))
                                    {!! $prosedurData['hasil_keputusan']['ditolak'] !!}
                                @else
                                    Keberatan ditolak dengan alasan sesuai undang-undang
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3>Pemberitahuan Hasil</h3>
                    <p>Hasil keberatan akan disampaikan kepada pemohon melalui:</p>
                    <div class="form-group">
                        @if(isset($prosedurData['pemberitahuan_hasil']['konten']))
                            {!! nl2br(str_replace("\r\n", "\n", $prosedurData['pemberitahuan_hasil']['konten'])) !!}
                        @else
                            <ul>
                                <li><strong>Email:</strong> Dokumen digital dalam format PDF</li>
                                <li><strong>Surat Resmi:</strong> Dokumen fisik dengan cap dan tanda tangan</li>
                                <li><strong>Preview:</strong> Informasi yang dapat diakses online</li>
                            </ul>
                        @endif
                    </div>
                    <div class="timeline-info">
                        <strong>Batas Waktu Penyelesaian:</strong> 30 hari kerja sejak keberatan lengkap
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Page Header */
.page-header {
    background: linear-gradient(135deg, #1a3a5f 0%, #2c5282 100%);
    color: white;
    padding: 60px 0;
    position: relative;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('{{ asset("images/pattern.png") }}') repeat;
    opacity: 0.1;
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

/* Content Section */
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
}

.content-full p {
    color: #64748b;
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 40px;
}

/* Procedure Flow */
.procedure-flow {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.flow-step {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    padding: 20px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.flow-step:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.step-number {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #2c5282 0%, #1a3a5f 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
    font-weight: 700;
    flex-shrink: 0;
}

.step-content {
    flex: 1;
}

.step-content h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 8px;
}

.step-content p {
    color: #374151;
    line-height: 1.6;
    margin-bottom: 8px;
    font-size: 16px;
}

.step-content ul,
.step-content ol {
    margin: 8px 0;
    padding-left: 22px;
}

.step-content li {
    margin-bottom: 6px;
    line-height: 1.5;
    font-size: 16px;
}

/* Infografis Container */
.infografis-container {
    margin: 0 0 15px 0;
    text-align: center;
}

.infografis-img {
    max-width: 40%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

/* Required Docs */
.required-docs {
    background: #f8fafc;
    padding: 10px;
    border-radius: 6px;
    margin: 8px 0;
    border-left: 4px solid #2c5282;
}

.required-docs h4 {
    color: #1a3a5f;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 6px;
}

/* Timeline Info */
.timeline-info {
    background: white;
    padding: 14px 18px;
    border-radius: 8px;
    margin-top: 12px;
    font-size: 15px;
    color: #374151;
    border: 1px solid #e2e8f0;
    border-left: 4px solid #2c5282;
    transition: all 0.2s ease;
}

.timeline-info:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
}

/* Note Box */
.note-box {
    background: #fef3c7;
    padding: 8px;
    border-radius: 6px;
    margin-top: 8px;
    border-left: 4px solid #f59e0b;
}

/* Outcome Options */
.outcome-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 12px;
    margin-top: 12px;
}

.outcome-item {
    background: white;
    padding: 16px;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    border-left: 4px solid #2c5282;
    transition: all 0.2s ease;
}

.outcome-item:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.outcome-item h4 {
    color: #1a3a5f;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
}

.outcome-item p {
    color: #374151;
    margin: 0;
    font-size: 15px;
    line-height: 1.5;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-content {
        padding: 0 20px;
    }
    
    .content-full {
        padding: 30px 20px;
    }
    
    .flow-step {
        flex-direction: column;
        gap: 12px;
        padding: 16px;
    }
    
    .step-number {
        width: 35px;
        height: 35px;
        font-size: 16px;
    }
    
    .step-content h3 {
        font-size: 18px;
    }
    
    .step-content p {
        font-size: 15px;
    }
    
    .step-content li {
        font-size: 15px;
    }
    
    .outcome-options {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    
    .outcome-item {
        padding: 12px;
    }
    
    .outcome-item h4 {
        font-size: 15px;
    }
    
    .outcome-item p {
        font-size: 14px;
    }
    
    .timeline-info {
        padding: 12px 14px;
        font-size: 14px;
    }
}
</style>
@endsection
