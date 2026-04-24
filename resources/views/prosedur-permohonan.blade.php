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
        
        @php
        // Baca data dari file JSON yang disimpan oleh admin
        $dataFile = public_path('data/prosedur_permohonan.json');
        $prosedurData = [];
        
        if (file_exists($dataFile)) {
            $jsonContent = file_get_contents($dataFile);
            $prosedurData = json_decode($jsonContent, true) ?: [];
        }
        @endphp
        
        <div class="procedure-flow">
            <div class="infografis-container">
                <img src="{{ asset('images/permohonan informasi.jpg') }}" alt="Prosedur Permohonan Informasi" class="infografis-img">
            </div>
            
            <div class="flow-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Pengisian Formulir Permohonan</h3>
                    <p>Pemohon mengisi formulir permohonan informasi publik secara lengkap dan benar:</p>
                    <div class="form-group">
                        @if(isset($prosedurData['pengisian_formulir']['konten']))
                            {!! nl2br($prosedurData['pengisian_formulir']['konten']) !!}
                        @else
                            <ul>
                                <li>Formulir dapat diisi secara online melalui website PPID BBIA</li>
                                <li>Formulir dapat diisi langsung di kantor PPID BBIA</li>
                                <li>Formulir dapat diunduh dan diisi kemudian dikirim via email</li>
                            </ul>
                        @endif
                    </div>
                    <div class="required-docs">
                        <h4>Dokumen yang Diperlukan:</h4>
                        <div class="form-group">
                            @if(isset($prosedurData['pengisian_formulir']['dokumen']))
                                {!! nl2br($prosedurData['pengisian_formulir']['dokumen']) !!}
                            @else
                                <ul>
                                    <li>Fotokopi KTP/SIM/Paspor yang masih berlaku</li>
                                    <li>Surat kuasa (jika diwakilkan)</li>
                                    <li>Dokumen pendukung lainnya (jika diperlukan)</li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flow-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Verifikasi dan Registrasi</h3>
                    <p>PPID BBIA akan melakukan verifikasi terhadap permohonan yang masuk:</p>
                    <div class="form-group">
                        @if(isset($prosedurData['verifikasi_registrasi']['konten']))
                            {!! nl2br($prosedurData['verifikasi_registrasi']['konten']) !!}
                        @else
                            <ul>
                                <li>Kelengkapan data pemohon</li>
                                <li>Kesesuaian format permohonan</li>
                                <li>Klarifikasi informasi yang diminta (jika diperlukan)</li>
                                <li>Pemberian nomor registrasi/tiket permohonan</li>
                            </ul>
                        @endif
                    </div>
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
                    <div class="form-group">
                        @if(isset($prosedurData['proses_permohonan']['konten']))
                            {!! nl2br($prosedurData['proses_permohonan']['konten']) !!}
                        @else
                            <ul>
                                <li>Informasi yang tersedia langsung: 1-2 hari kerja</li>
                                <li>Informasi perlu konsolidasi: 3-5 hari kerja</li>
                                <li>Informasi kompleks: maksimal 10 hari kerja</li>
                                <li>Perpanjangan waktu: maksimal 7 hari kerja (diberitahukan tertulis)</li>
                            </ul>
                        @endif
                    </div>
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
                            <h4>Disetujui</h4>
                            <p>
                                @if(isset($prosedurData['penyelesaian']['disetujui']))
                                    {!! $prosedurData['penyelesaian']['disetujui'] !!}
                                @else
                                    Informasi diberikan sesuai permohonan dalam bentuk hard copy/soft copy
                                @endif
                            </p>
                        </div>
                        <div class="outcome-item">
                            <h4>Diberikan Sebagian</h4>
                            <p>
                                @if(isset($prosedurData['penyelesaian']['sebagian']))
                                    {!! $prosedurData['penyelesaian']['sebagian'] !!}
                                @else
                                    Informasi diberikan sebagian dengan alasan yang jelas
                                @endif
                            </p>
                        </div>
                        <div class="outcome-item">
                            <h4>Ditolak</h4>
                            <p>
                                @if(isset($prosedurData['penyelesaian']['ditolak']))
                                    {!! $prosedurData['penyelesaian']['ditolak'] !!}
                                @else
                                    Permohonan ditolak dengan alasan sesuai undang-undang
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
                    <p>Hasil permohonan akan disampaikan kepada pemohon melalui:</p>
                    <div class="form-group">
                        @if(isset($prosedurData['pemberitahuan_hasil']['konten']))
                            {!! nl2br($prosedurData['pemberitahuan_hasil']['konten']) !!}
                        @else
                            <ul>
                                <li><strong>Email:</strong> Dokumen digital dalam format PDF</li>
                                <li><strong>Surat Resmi:</strong> Dokumen fisik dengan cap dan tanda tangan</li>
                                <li><strong>Preview:</strong> Informasi yang dapat diakses online</li>
                            </ul>
                        @endif
                    </div>
                    <div class="timeline-info">
                        <strong>Batas Waktu Penyelesaian:</strong> 10 hari kerja sejak permohonan lengkap
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

.note-box p {
    margin: 0;
    color: #92400e;
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
