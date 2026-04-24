@extends('admin.layout')

@section('title', 'Prosedur Pengajuan Keberatan - PPID BBIA')
@section('page-title', 'Prosedur Pengajuan Keberatan')

@section('content')
<!-- Success Alert -->
@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
@endif

<!-- Error Alert -->
@if(session('error'))
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
    </div>
@endif

@php
// Baca data dari file JSON yang disimpan
$dataFile = public_path('data/prosedur_keberatan.json');
$prosedurData = [];

if (file_exists($dataFile)) {
    $jsonContent = file_get_contents($dataFile);
    $prosedurData = json_decode($jsonContent, true) ?: [];
}
@endphp

<!-- Edit Prosedur Section -->
<div class="card">
    <h2>Edit Prosedur Pengajuan Keberatan</h2>

    <form method="POST" action="{{ route('admin.prosedur-pengajuan-keberatan.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="procedure-flow">
            <!-- Gambar Prosedurur -->
            <div class="infografis-section">
                <div class="infografis-container">
                    <img src="{{ asset('images/pengajuan keberatan.png') }}" alt="Prosedur Pengajuan Keberatan" class="infografis-img">
                </div>
            </div>
            
            <!-- Tahap 1: Alasan Pengajuan -->
            <div class="flow-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Alasan Pengajuan Keberatan</h3>
                    <p>Keberatan dapat diajukan karena alasan-alasan berikut:</p>
                    <div class="form-group">
                        <label class="form-label">Alasan Pengajuan:</label>
                        <textarea class="form-control" name="prosedur[alasan_pengajuan][konten]" rows="4" placeholder="Masukkan alasan pengajuan...">{{ isset($prosedurData['alasan_pengajuan']['konten']) ? str_replace(["\r\n", "\n"], "\n", $prosedurData['alasan_pengajuan']['konten']) : 'Keberatan dapat diajukan karena alasan-alasan berikut:
- Lewat Waktu: Permohonan informasi tidak ditanggapi dalam waktu 10 hari kerja
- Ditolak: Permohonan informasi ditolak tanpa alasan yang jelas
- Tidak Sesuai: Informasi yang diberikan tidak sesuai dengan yang diminta
- Biaya Tidak Wajar: Biaya yang dibebankan tidak sesuai dengan ketentuan' }}</textarea>
                    </div>
                    <div class="timeline-info">
                        <strong>Batas Waktu:</strong> 30 hari setelah menerima hasil permohonan
                    </div>
                </div>
            </div>
            
            <!-- Tahap 2: Tata Cara Pengajuan -->
            <div class="flow-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Tata Cara Pengajuan</h3>
                    <p>Pengajuan keberatan dilakukan dengan cara:</p>
                    <div class="form-group">
                        <label class="form-label">Tata Cara Pengajuan:</label>
                        <textarea class="form-control" name="prosedur[tata_cara_pengajuan][konten]" rows="4" placeholder="Masukkan tata cara pengajuan...">{{ isset($prosedurData['tata_cara_pengajuan']['konten']) ? str_replace(["\r\n", "\n"], "\n", $prosedurData['tata_cara_pengajuan']['konten']) : 'Pengajuan keberatan dilakukan dengan cara:
1. Mengisi formulir keberatan yang tersedia
2. Melampirkan dokumen pendukung (KTP, surat permohonan asli, dll)
3. Menyertakan alasan keberatan secara jelas
4. Mengajukan secara langsung atau melalui media elektronik' }}</textarea>
                    </div>
                    <div class="timeline-info">
                        <strong>Tempat:</strong> PPID BBIA di Ruang CSO Jl. Ir. H. Juanda No. 11, Bogor
                    </div>
                </div>
            </div>
            
            <!-- Tahap 3: Proses Penanganan -->
            <div class="flow-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Proses Penanganan</h3>
                    <p>Proses penanganan keberatan:</p>
                    <div class="form-group">
                        <label class="form-label">Proses Penanganan:</label>
                        <textarea class="form-control" name="prosedur[proses_penanganan][konten]" rows="4" placeholder="Masukkan proses penanganan...">{{ isset($prosedurData['proses_penanganan']['konten']) ? str_replace(["\r\n", "\n"], "\n", $prosedurData['proses_penanganan']['konten']) : 'Proses penanganan keberatan:
- Penerimaan: Keberatan dicatat dan diberi nomor registrasi
- Verifikasi: Kelengkapan dokumen dan keabsahan pengajuan
- Evaluasi: Analisis alasan keberatan dan dokumen pendukung
- Keputusan: Ditetapkan oleh Atasan PPID' }}</textarea>
                    </div>
                    <div class="timeline-info">
                        <strong>Waktu Proses:</strong> Maksimal 30 hari kerja
                    </div>
                </div>
            </div>
            
            <!-- Tahap 4: Hasil Keputusan -->
            <div class="flow-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Hasil Keputusan</h3>
                    <p>Hasil keputusan keberatan dapat berupa:</p>
                    <div class="outcome-options">
                        <div class="outcome-item">
                            <h4>Diterima</h4>
                            <textarea class="form-control" name="prosedur[hasil_keputusan][diterima]" rows="3" placeholder="Masukkan deskripsi...">{{ isset($prosedurData['hasil_keputusan']['diterima']) ? $prosedurData['hasil_keputusan']['diterima'] : 'Keberatan diterima dan informasi disediakan sesuai permohonan' }}</textarea>
                        </div>
                        <div class="outcome-item">
                            <h4>Diberikan Sebagian</h4>
                            <textarea class="form-control" name="prosedur[hasil_keputusan][sebagian]" rows="3" placeholder="Masukkan deskripsi...">{{ isset($prosedurData['hasil_keputusan']['sebagian']) ? $prosedurData['hasil_keputusan']['sebagian'] : 'Informasi diberikan sebagian dengan alasan yang jelas' }}</textarea>
                        </div>
                        <div class="outcome-item">
                            <h4>Ditolak</h4>
                            <textarea class="form-control" name="prosedur[hasil_keputusan][ditolak]" rows="3" placeholder="Masukkan deskripsi...">{{ isset($prosedurData['hasil_keputusan']['ditolak']) ? $prosedurData['hasil_keputusan']['ditolak'] : 'Keberatan ditolak dengan alasan sesuai undang-undang' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tahap 5: Pemberitahuan Hasil -->
            <div class="flow-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3>Pemberitahuan Hasil</h3>
                    <p>Hasil keberatan akan disampaikan kepada pemohon melalui:</p>
                    <div class="form-group">
                        <label class="form-label">Pemberitahuan Hasil:</label>
                        <textarea class="form-control" name="prosedur[pemberitahuan_hasil][konten]" rows="4" placeholder="Masukkan cara pemberitahuan hasil...">{{ isset($prosedurData['pemberitahuan_hasil']['konten']) ? str_replace(["\r\n", "\n"], "\n", $prosedurData['pemberitahuan_hasil']['konten']) : 'Hasil keberatan akan disampaikan kepada pemohon melalui:
- Email: Dokumen digital dalam format PDF
- Surat Resmi: Dokumen fisik dengan cap dan tanda tangan
- Preview: Informasi yang dapat diakses online' }}</textarea>
                    </div>
                    <div class="timeline-info">
                        <strong>Batas Waktu Penyelesaian:</strong> 30 hari kerja sejak keberatan lengkap
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<style>
/* Card */
.card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 24px;
    margin-bottom: 24px;
}

.card h2 {
    margin: 0 0 20px 0;
    font-size: 18px;
    font-weight: 600;
    color: #374151;
}

/* Alert */
.alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
    border: 1px solid transparent;
}

.alert-success {
    background-color: #f0fdf4;
    border-color: #86efac;
    color: #166534;
}

.alert-danger {
    background-color: #fef2f2;
    border-color: #fca5a5;
    color: #dc2626;
}

.alert-info {
    background-color: #eff6ff;
    border-color: #93c5fd;
    color: #1d4ed8;
}

/* Prosedur List */
.prosedur-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.prosedur-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.prosedur-item:hover {
    background: #f3f4f6;
    border-color: #d1d5db;
}

.prosedur-info {
    flex: 1;
    display: flex;
    align-items: center;
    gap: 12px;
}

.prosedur-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 4px;
}

.prosedur-text {
    color: #6b7280;
    font-size: 14px;
    line-height: 1.4;
}

.prosedur-image {
    flex-shrink: 0;
}

.prosedur-meta {
    display: flex;
    align-items: center;
    gap: 12px;
}

.status {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
}

.status.active {
    background-color: #dcfce7;
    color: #166534;
}

.status.inactive {
    background-color: #f3f4f6;
    color: #6b7280;
}


/* Form Grid */
.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    gap: 24px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-weight: 500;
    color: #374151;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.form-group input,
.form-group textarea,
.form-group select {
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    transition: border-color 0.2s ease;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-text {
    font-size: 12px;
    color: #6b7280;
    margin-top: 4px;
}

.current-image {
    margin-top: 8px;
    padding: 8px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 4px;
}

.current-image label {
    font-size: 12px;
    font-weight: 500;
    color: #374151;
    margin-bottom: 4px;
}


/* Form Actions */
.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 24px;
    padding-top: 24px;
    border-top: 1px solid #e5e7eb;
}

.btn {
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    border: 1px solid transparent;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.btn-primary {
    background-color: #3b82f6;
    color: white;
    border-color: #3b82f6;
}

.btn-primary:hover {
    background-color: #2563eb;
    border-color: #2563eb;
}

.btn-secondary {
    background-color: #f3f4f6;
    color: #374151;
    border-color: #d1d5db;
}

.btn-secondary:hover {
    background-color: #e5e7eb;
    border-color: #9ca3af;
}

.btn-outline-danger {
    background-color: transparent;
    color: #dc2626;
    border-color: #dc2626;
}

.btn-outline-danger:hover {
    background-color: #dc2626;
    color: white;
}

.btn-sm {
    padding: 4px 8px;
    font-size: 12px;
}

/* Procedure Flow */
.procedure-flow {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

/* Infografis Section */
.infografis-section {
    margin-bottom: 20px;
}

.infografis-container {
    text-align: center;
    margin: 0 0 15px 0;
}

.infografis-img {
    max-width: 20%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

/* Flow Step */
.flow-step {
    display: flex;
    gap: 10px;
    align-items: flex-start;
    padding: 20px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    transition: all 0.3s ease;
    margin-bottom: 10px;
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

.outcome-item textarea {
    width: 100%;
    min-height: 80px;
    resize: vertical;
}

/* Form Label */
.form-label {
    font-weight: 500;
    color: #374151;
    font-size: 14px;
    margin-bottom: 4px;
    display: block;
}

/* Responsive */
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .prosedur-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .prosedur-meta {
        width: 100%;
        justify-content: flex-end;
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
        align-self: center;
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
    
    .timeline-info {
        padding: 12px 14px;
        font-size: 14px;
    }
    
    .infografis-img {
        max-width: 60%;
    }
}
</style>

@endsection
