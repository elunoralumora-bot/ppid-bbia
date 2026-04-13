@extends('layouts.app')

@section('title', 'Periksa Keberatan - PPID BBIA')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Periksa Keberatan</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        @if(session('error'))
            <div style="background: #fee; color: #c00; padding: 1rem; border-radius: 5px; margin-bottom: 1rem; border-left: 4px solid #c00;">
                {{ session('error') }}
            </div>
        @endif
        
        <p>Untuk memeriksa status keberatan atas layanan informasi publik yang telah Anda ajukan, silakan masukkan nomor tiket atau nomor registrasi keberatan Anda.</p>
        
        <form class="permohonan-form" method="POST" action="{{ url('/cek-status-keberatan') }}">
            @csrf
                        
            <!-- Data Pemeriksaan -->
            <div class="form-section">
                <h3> Data Pemeriksaan</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nomor_tiket_keberatan">Nomor Tiket Keberatan *</label>
                        <input type="text" id="nomor_tiket_keberatan" name="nomor_tiket_keberatan" required placeholder="Masukkan nomor tiket keberatan (ID)">
                        <small class="form-help">Contoh: 1, 2, 3 (sesuai ID keberatan)</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="email_pemohon_keberatan">Email Pemohon *</label>
                        <input type="email" id="email_pemohon_keberatan" name="email_pemohon_keberatan" required placeholder="Masukkan email yang digunakan saat mengajukan keberatan">
                        <small class="form-help">Email harus sama dengan yang digunakan saat pengajuan</small>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-actions">
                <button type="submit" class="btn">
                    <i class="fas fa-search"></i>
                    Periksa Status
                </button>
                <button type="button" class="btn" onclick="window.location.href='{{ url('/') }}'">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
            </div>
        </form>

        
        <!-- Hasil Pencarian -->
        @if(session('keberatan'))
        <div class="hasil-pencarian" id="hasil-pencarian" style="display: block;">
            <h2> Hasil Pencarian</h2>
            
            <div class="status-card">
                <div class="status-header">
                    <h3>Informasi Keberatan</h3>
                    <span class="status-badge status-{{ session('keberatan')->status }}">
                        {{ ucfirst(session('keberatan')->status) }}
                    </span>
                </div>
                
                <div class="status-content">
                    <div class="status-row">
                        <strong>Nomor Tiket:</strong>
                        <span>{{ session('keberatan')->id }}</span>
                    </div>
                    <div class="status-row">
                        <strong>Nama Pemohon:</strong>
                        <span>{{ session('keberatan')->nama_pemohon }}</span>
                    </div>
                    <div class="status-row">
                        <strong>Email:</strong>
                        <span>{{ session('keberatan')->email }}</span>
                    </div>
                    <div class="status-row">
                        <strong>Telepon:</strong>
                        <span>{{ session('keberatan')->telepon }}</span>
                    </div>
                    <div class="status-row">
                        <strong>Tanggal Pengajuan:</strong>
                        <span>{{ session('keberatan')->tanggal_keberatan->format('d F Y, H:i') }}</span>
                    </div>
                    <div class="status-row">
                        <strong>Alasan Keberatan:</strong>
                        <span>{{ session('keberatan')->alasan_keberatan }}</span>
                    </div>
                    <div class="status-row">
                        <strong>Status Saat Ini:</strong>
                        <span class="status-{{ session('keberatan')->status }}">
                            @switch(session('keberatan')->status)
                                @case('pending')
                                    Pending
                                    @break
                                @case('proses')
                                    Sedang Diproses
                                    @break
                                @case('selesai')
                                    Selesai
                                    @break
                                @case('ditolak')
                                    Ditolak
                                    @break
                                @default
                                    {{ session('keberatan')->status }}
                            @endswitch
                        </span>
                    </div>
                    @if(session('keberatan')->tanggal_proses)
                    <div class="status-row">
                        <strong>Tanggal Proses:</strong>
                        <span>{{ session('keberatan')->tanggal_proses->format('d F Y, H:i') }}</span>
                    </div>
                    @endif
                    @if(session('keberatan')->tanggal_selesai)
                    <div class="status-row">
                        <strong>Tanggal Selesai:</strong>
                        <span>{{ session('keberatan')->tanggal_selesai->format('d F Y, H:i') }}</span>
                    </div>
                    @endif
                    @if(session('keberatan')->catatan)
                    <div class="status-row">
                        <strong>Catatan:</strong>
                        <span>{{ session('keberatan')->catatan }}</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="timeline-section">
                <h3> Timeline Proses</h3>
                <div class="timeline">
                    <div class="timeline-item completed">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <strong>Keberatan Diterima</strong>
                            <p>{{ session('keberatan')->tanggal_keberatan->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                    @if(session('keberatan')->tanggal_proses)
                    <div class="timeline-item completed">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <strong>Proses Keberatan</strong>
                            <p>{{ session('keberatan')->tanggal_proses->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                    @endif
                    @if(session('keberatan')->tanggal_selesai)
                    <div class="timeline-item completed">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <strong>Keberatan {{ ucfirst(session('keberatan')->status) }}</strong>
                            <p>{{ session('keberatan')->tanggal_selesai->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                    @endif
                    @if(!session('keberatan')->tanggal_selesai && session('keberatan')->status != 'pending')
                    <div class="timeline-item active">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <strong>Sedang Diproses</strong>
                            <p>Status: {{ ucfirst(session('keberatan')->status) }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif

        
        <!-- Informasi Tambahan -->
        <div class="info-grid">
            <div class="info-box">
                <h3>📋 Informasi Penting</h3>
                <ul>
                    <li><strong>Nomor Tiket:</strong> Diberikan setelah pengajuan keberatan</li>
                    <li><strong>Waktu Respon:</strong> Maksimal 30 hari kerja</li>
                    <li><strong>Status Update:</strong> Status diperbarui setiap hari kerja</li>
                </ul>
            </div>
            
            <div class="info-box">
                <h3>📞 Kontak PPID</h3>
                <ul>
                    <li><strong>Email:</strong> ppid.bbia@kemenperin.go.id</li>
                    <li><strong>Telepon:</strong> (0251) 8323880</li>
                    <li><strong>Alamat:</strong> Jl. Ir. H. Juanda No. 11, Bogor</li>
                    <li><strong>Jam Operasional:</strong> Senin - Jumat, 08.00 - 16.00 WIB</li>
                </ul>
            </div>
            
            <div class="info-box">
                <h3>🔗 Link Terkait</h3>
                <ul>
                    <li><a href="{{ url('/form-keberatan') }}">Form Keberatan</a></li>
                    <li><a href="{{ url('/form-permohonan') }}">Form Permohonan</a></li>
                    <li><a href="{{ url('/mekanisme-sengketa') }}">Mekanisme Sengketa</a></li>
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

.permohonan-form {
    background: rgba(26, 58, 95, 0.02);
    border: 1px solid rgba(26, 58, 95, 0.1);
    border-radius: 10px;
    padding: 40px;
    margin: 40px 0;
}

.form-section {
    margin-bottom: 40px;
}

.form-section h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #2c5282;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    color: #1a3a5f;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e1e5e9;
    border-radius: 8px;
    font-size: 14px;
    transition: border-color 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #2c5282;
    box-shadow: 0 0 0 3px rgba(44, 82, 130, 0.1);
}

.form-help {
    display: block;
    margin-top: 5px;
    color: #666;
    font-size: 12px;
}

.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid #e1e5e9;
}

.form-actions .btn {
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid #2c5282;
    background-color: #2c5282;
    color: white;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 180px;
    min-height: 44px;
}

.form-actions .btn:hover {
    background-color: #1a365d;
    border-color: #1a365d;
    transform: translateY(-1px);
}

.hasil-pencarian {
    background: rgba(26, 58, 95, 0.02);
    border: 1px solid rgba(26, 58, 95, 0.1);
    border-radius: 10px;
    padding: 40px;
    margin: 40px 0;
}

.hasil-pencarian h2 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 25px;
}

.status-card {
    background: white;
    border: 1px solid #e1e5e9;
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 30px;
}

.status-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e1e5e9;
}

.status-header h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin: 0;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

.status-proses {
    background: #fef3c7;
    color: #92400e;
}

.status-selesai {
    background: #d1fae5;
    color: #065f46;
}

.status-pending {
    background: #e0e7ff;
    color: #3730a3;
}

.status-ditolak {
    background: #fee2e2;
    color: #991b1b;
}

.status-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #f3f4f6;
}

.status-row:last-child {
    border-bottom: none;
}

.status-row strong {
    color: #1a3a5f;
    font-weight: 600;
}

.timeline-section h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
}

.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    padding-bottom: 30px;
}

.timeline-item:last-child {
    padding-bottom: 0;
}

.timeline-dot {
    position: absolute;
    left: -30px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #e1e5e9;
}

.timeline-item.completed .timeline-dot {
    background: #10b981;
}

.timeline-item.active .timeline-dot {
    background: #2c5282;
}

.timeline-content {
    padding-left: 10px;
}

.timeline-content strong {
    color: #1a3a5f;
    font-weight: 600;
    display: block;
    margin-bottom: 5px;
}

.timeline-content p {
    color: #666;
    font-size: 14px;
    margin: 0;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 40px;
}

.info-grid .info-box {
    background: rgba(26, 58, 95, 0.02);
    border: 1px solid rgba(26, 58, 95, 0.1);
    border-radius: 10px;
    padding: 25px;
}

.info-grid .info-box h3 {
    color: #1a3a5f;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
}

.info-grid .info-box ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-grid .info-box li {
    margin-bottom: 10px;
    color: #333;
    font-size: 14px;
    line-height: 1.6;
}

.info-grid .info-box li strong {
    color: #1a3a5f;
}

.info-grid .info-box a {
    color: #2c5282;
    text-decoration: none;
    font-weight: 500;
}

.info-grid .info-box a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .page-header-content {
        padding: 0 20px;
    }
    
    .content-full {
        padding: 40px 20px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
    
    .form-actions {
        flex-direction: column;
        gap: 15px;
    }
    
    .form-actions .btn {
        width: 180px;
        justify-content: center;
        min-height: 44px;
    }
    
    .status-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
    
    .status-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto scroll ke hasil jika ada session data
    const hasilPencarian = document.getElementById('hasil-pencarian');
    if (hasilPencarian && hasilPencarian.style.display !== 'none') {
        setTimeout(() => {
            hasilPencarian.scrollIntoView({ behavior: 'smooth' });
        }, 500);
    }
});
</script>
@endsection
