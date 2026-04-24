@extends('admin.layout')

@section('title', 'Prosedur Permohonan Informasi - PPID BBIA')
@section('page-title', 'Prosedur Permohonan Informasi')

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
$dataFile = public_path('data/prosedur_permohonan.json');
$prosedurData = [];

if (file_exists($dataFile)) {
    $jsonContent = file_get_contents($dataFile);
    $prosedurData = json_decode($jsonContent, true) ?: [];
}
@endphp

<!-- Edit Prosedur Section -->
<div class="card">
    <h2>Edit Prosedur Permohonan Informasi</h2>

    <form method="POST" action="{{ route('admin.prosedur-permohonan-informasi.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="procedure-flow">
            <!-- Gambar Prosedurur -->
            <div class="infografis-section">
                <div class="infografis-container">
                    <img src="{{ asset('images/permohonan informasi.jpg') }}" alt="Prosedur Permohonan Informasi" class="infografis-img">
                </div>
            </div>
            
            <!-- Tahap 1: Pengisian Formulir -->
            <div class="flow-step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h3>Pengisian Formulir Permohonan</h3>
                    <p>Pemohon mengisi formulir permohonan informasi publik secara lengkap dan benar:</p>
                    <div class="form-group">
                        <label class="form-label">Cara Mengisi Formulir:</label>
                        <textarea class="form-control" name="prosedur[pengisian_formulir][konten]" rows="4" placeholder="Masukkan cara pengisian formulir...">{{ isset($prosedurData['pengisian_formulir']['konten']) ? str_replace("\r\n", "\n", $prosedurData['pengisian_formulir']['konten']) : 'Formulir dapat diisi secara online melalui website PPID BBIA
Formulir dapat diisi langsung di kantor PPID BBIA
Formulir dapat diunduh dan diisi kemudian dikirim via email' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Dokumen yang Diperlukan:</label>
                        <textarea class="form-control" name="prosedur[pengisian_formulir][dokumen]" rows="4" placeholder="Masukkan dokumen yang diperlukan...">{{ isset($prosedurData['pengisian_formulir']['dokumen']) ? str_replace("\r\n", "\n", $prosedurData['pengisian_formulir']['dokumen']) : 'Fotokopi KTP/SIM/Paspor yang masih berlaku
Surat kuasa (jika diwakilkan)
Dokumen pendukung lainnya (jika diperlukan)' }}</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Tahap 2: Verifikasi dan Registrasi -->
            <div class="flow-step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h3>Verifikasi dan Registrasi</h3>
                    <p>PPID BBIA akan melakukan verifikasi terhadap permohonan yang masuk:</p>
                    <div class="form-group">
                        <label class="form-label">Proses Verifikasi:</label>
                        <textarea class="form-control" name="prosedur[verifikasi_registrasi][konten]" rows="4" placeholder="Masukkan proses verifikasi...">{{ isset($prosedurData['verifikasi_registrasi']['konten']) ? str_replace("\r\n", "\n", $prosedurData['verifikasi_registrasi']['konten']) : 'Kelengkapan data pemohon
Kesesuaian format permohonan
Klarifikasi informasi yang diminta (jika diperlukan)
Pemberian nomor registrasi/tiket permohonan' }}</textarea>
                    </div>
                    <div class="timeline-info">
                        <strong>Waktu Verifikasi:</strong> Maksimal 2 hari kerja
                    </div>
                </div>
            </div>
            
            <!-- Tahap 3: Proses Permohonan -->
            <div class="flow-step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h3>Proses Permohonan</h3>
                    <p>Setelah verifikasi, permohonan akan diproses sesuai dengan jenis informasi yang diminta:</p>
                    <div class="form-group">
                        <label class="form-label">Waktu Proses:</label>
                        <textarea class="form-control" name="prosedur[proses_permohonan][konten]" rows="4" placeholder="Masukkan waktu proses...">{{ isset($prosedurData['proses_permohonan']['konten']) ? str_replace("\r\n", "\n", $prosedurData['proses_permohonan']['konten']) : 'Informasi yang tersedia langsung: 1-2 hari kerja
Informasi perlu konsolidasi: 3-5 hari kerja
Informasi kompleks: maksimal 10 hari kerja
Perpanjangan waktu: maksimal 7 hari kerja (diberitahukan tertulis)' }}</textarea>
                    </div>
                    <div class="note-box">
                        <p><strong>Catatan:</strong> Pemohon akan diberikan informasi mengenai estimasi waktu penyelesaian permohonan.</p>
                    </div>
                </div>
            </div>
            
            <!-- Tahap 4: Penyelesaian Permohonan -->
            <div class="flow-step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h3>Penyelesaian Permohonan</h3>
                    <p>Permohonan dapat diselesaikan dengan beberapa cara:</p>
                    <div class="outcome-options">
                        <div class="outcome-item">
                            <h4>Disetujui</h4>
                            <textarea class="form-control" name="prosedur[penyelesaian][disetujui]" rows="3" placeholder="Masukkan deskripsi...">{{ isset($prosedurData['penyelesaian']['disetujui']) ? $prosedurData['penyelesaian']['disetujui'] : 'Informasi diberikan sesuai permohonan dalam bentuk hard copy/soft copy' }}</textarea>
                        </div>
                        <div class="outcome-item">
                            <h4>Diberikan Sebagian</h4>
                            <textarea class="form-control" name="prosedur[penyelesaian][sebagian]" rows="3" placeholder="Masukkan deskripsi...">{{ isset($prosedurData['penyelesaian']['sebagian']) ? $prosedurData['penyelesaian']['sebagian'] : 'Informasi diberikan sebagian dengan alasan yang jelas' }}</textarea>
                        </div>
                        <div class="outcome-item">
                            <h4>Ditolak</h4>
                            <textarea class="form-control" name="prosedur[penyelesaian][ditolak]" rows="3" placeholder="Masukkan deskripsi...">{{ isset($prosedurData['penyelesaian']['ditolak']) ? $prosedurData['penyelesaian']['ditolak'] : 'Permohonan ditolak dengan alasan sesuai undang-undang' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tahap 5: Pemberitahuan Hasil -->
            <div class="flow-step">
                <div class="step-number">5</div>
                <div class="step-content">
                    <h3>Pemberitahuan Hasil</h3>
                    <p>Hasil permohonan akan disampaikan kepada pemohon melalui:</p>
                    <div class="form-group">
                        <label class="form-label">Cara Penyampaian:</label>
                        <textarea class="form-control" name="prosedur[pemberitahuan_hasil][konten]" rows="4" placeholder="Masukkan cara penyampaian...">{{ isset($prosedurData['pemberitahuan_hasil']['konten']) ? str_replace(["\r\n", "\n"], "\n", $prosedurData['pemberitahuan_hasil']['konten']) : '<strong>Email:</strong> Dokumen digital dalam format PDF
<strong>Surat Resmi:</strong> Dokumen fisik dengan cap dan tanda tangan
<strong>Preview:</strong> Informasi yang dapat diakses online' }}</textarea>
                    </div>
                    <div class="timeline-info">
                        <strong>Batas Waktu Penyelesaian:</strong> 10 hari kerja sejak permohonan lengkap
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
    color: #1f2937;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid #e5e7eb;
}

/* Alert */
.alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
    border: 1px solid transparent;
}

.alert-success {
    background-color: #dcfce7;
    color: #166534;
    border-color: #bbf7d0;
}

.alert-danger {
    background-color: #fee2e2;
    color: #dc2626;
    border-color: #fecaca;
}

/* Procedure Flow */
.procedure-flow {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.infografis-section {
    margin-bottom: 10px;
}

.infografis-container {
    text-align: center;
}

.infografis-img {
    max-width: 20%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.flow-step {
    display: flex;
    gap: 15px;
    align-items: flex-start;
    padding: 20px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
}

.step-number {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #2c5282 0%, #1a3a5f 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    font-weight: 700;
    flex-shrink: 0;
}

.step-content {
    flex: 1;
}

.step-content h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
}

.step-content p {
    color: #374151;
    line-height: 1.6;
    margin-bottom: 15px;
}

/* Form Group */
.form-group {
    margin-bottom: 15px;
}

.form-label {
    display: block;
    font-weight: 500;
    color: #374151;
    font-size: 14px;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    transition: border-color 0.2s;
    resize: vertical;
}

.form-control:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Timeline Info */
.timeline-info {
    background: #f1f5f9;
    padding: 10px;
    border-radius: 6px;
    margin-top: 10px;
    font-size: 14px;
    color: #374151;
}

/* Note Box */
.note-box {
    background: #fef3c7;
    padding: 10px;
    border-radius: 6px;
    margin-top: 10px;
    border-left: 4px solid #f59e0b;
}

.note-box p {
    margin: 0;
    color: #92400e;
}

/* Outcome Options */
.outcome-options {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 10px;
    margin-top: 15px;
}

.outcome-item {
    background: #f8fafc;
    padding: 15px;
    border-radius: 6px;
    border-left: 4px solid #2c5282;
}

.outcome-item h4 {
    color: #1a3a5f;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
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
    padding: 10px 16px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s;
    border: 1px solid transparent;
}

.btn-primary {
    background-color: #3b82f6;
    color: white;
}

.btn-primary:hover {
    background-color: #2563eb;
}

.btn-secondary {
    background-color: #f3f4f6;
    color: #374151;
    border-color: #d1d5db;
}

.btn-secondary:hover {
    background-color: #e5e7eb;
}

.btn-sm {
    padding: 4px 8px;
    font-size: 12px;
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
}
</style>

@endsection
