@extends('layouts.app')

@section('title', 'Form Permohonan - PPID BBIA')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Form Permohonan</h1>
        <div class="breadcrumb">
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <p>Silakan isi formulir berikut untuk mengajukan permohonan informasi publik. Pastikan semua data yang Anda masukkan sudah benar dan lengkap.</p>
        
        <form class="permohonan-form" method="POST" action="{{ url('/submit-permohonan') }}">
            @csrf
                        
                        <!-- Data Pemohon -->
                        <div class="form-section">
                            <h3>📋 Data Pemohon</h3>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="nama_pemohon">Nama Pemohon *</label>
                                    <input type="text" id="nama_pemohon" name="nama_pemohon" required placeholder="Masukkan nama lengkap Anda">
                                </div>
                                
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan *</label>
                                    <input type="text" id="pekerjaan" name="pekerjaan" required placeholder="Masukkan pekerjaan Anda">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat *</label>
                                <textarea id="alamat" name="alamat" required placeholder="Masukkan alamat lengkap Anda" rows="3"></textarea>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="no_telepon">No. Telepon *</label>
                                    <input type="tel" id="no_telepon" name="no_telepon" required placeholder="0812-3456-7890">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" required placeholder="email@example.com">
                                </div>
                            </div>
                        </div>

                        <!-- Rincian Informasi -->
                        <div class="form-section">
                            <h3>📄 Rincian Informasi</h3>
                            
                            <div class="form-group">
                                <label for="rincian_informasi">Rincian Informasi yang Dibutuhkan *</label>
                                <textarea id="rincian_informasi" name="rincian_informasi" required placeholder="Jelaskan secara rinci informasi yang Anda butuhkan" rows="4"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="tujuan_penggunaan">Tujuan Penggunaan Informasi *</label>
                                <textarea id="tujuan_penggunaan" name="tujuan_penggunaan" required placeholder="Jelaskan tujuan penggunaan informasi yang diminta" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Cara Memperoleh Informasi -->
                        <div class="form-section">
                            <h3>🔍 Cara Memperoleh Informasi *</h3>
                            
                            <div class="form-group">
                                <label>Pilih cara memperoleh informasi:</label>
                                <div class="checkbox-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_memperoleh[]" value="melihat_membaca" required>
                                        <span>Melihat/Membaca</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_memperoleh[]" value="mendengarkan">
                                        <span>Mendengarkan</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_memperoleh[]" value="mencatat">
                                        <span>Mencatat</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_memperoleh[]" value="mendapatkan_salinan">
                                        <span>Mendapatkan salinan informasi (hardcopy/softcopy)</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Cara Mendapatkan Salinan -->
                        <div class="form-section">
                            <h3>📦 Cara Mendapatkan Salinan</h3>
                            
                            <div class="form-group">
                                <label>Pilih cara mendapatkan salinan:</label>
                                <div class="checkbox-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_salinan[]" value="mengambil_langsung">
                                        <span>Mengambil langsung</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_salinan[]" value="kurir">
                                        <span>Kurir</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_salinan[]" value="pos">
                                        <span>Pos</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_salinan[]" value="faksimili">
                                        <span>Faksimili</span>
                                    </label>
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cara_salinan[]" value="email">
                                        <span>E-mail</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Dokumen Pendukung -->
                        <div class="form-section">
                            <h3>📎 Dokumen Pendukung</h3>
                            
                            <div class="form-group">
                                <label>Upload Dokumen Pendukung (jika ada)</label>
                                <input type="file" id="dokumen_pendukung" name="dokumen_pendukung" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" multiple>
                                <small class="form-help">Maksimal 5 file, format PDF/DOC/DOCX/JPG/JPEG/PNG, maksimal 5MB per file</small>
                            </div>
                        </div>

                        <!-- Pernyataan -->
                        <div class="form-section">
                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="pernyataan" required>
                                    <span>Saya menyatakan bahwa data yang saya berikan adalah benar dan dapat dipertanggungjawabkan</span>
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="persetujuan" required>
                                    <span>Saya menyetujui syarat dan ketentuan layanan permohonan informasi publik</span>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-actions">
                            <button type="submit" class="btn">
                                <i class="fas fa-paper-plane"></i>
                                Kirim Permohonan
                            </button>
                            <button type="button" class="btn" onclick="window.location.href='{{ url('/') }}'">
                                <i class="fas fa-times"></i>
                                Batal
                            </button>
                        </div>
                    </form>
                    
                    <!-- Informasi Tambahan -->
                    <div class="info-grid">
                        <div class="info-box">
                            <h3>📋 Informasi Penting</h3>
                            <ul>
                                <li><strong>Jangka Waktu:</strong> Permohonan akan diproses selambat-lambatnya 10 hari kerja</li>
                                <li><strong>Biaya:</strong> Layanan dasar gratis, penyalinan dikenakan biaya sesuai peraturan</li>
                                <li><strong>Konfirmasi:</strong> Status permohonan dapat dicek melalui halaman pemeriksaan</li>
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
                                <li><a href="{{ url('/permohonan-informasi') }}">Informasi Permohonan</a></li>
                                <li><a href="{{ url('/form-keberatan') }}">Form Keberatan</a></li>
                                <li><a href="{{ url('/pemeriksaan-permohonan') }}">Cek Status Permohonan</a></li>
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

.checkbox-group {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-top: 10px;
}

.checkbox-label {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    cursor: pointer;
    color: #333;
    font-size: 14px;
    line-height: 1.4;
    margin-bottom: 12px;
}

.checkbox-label input[type="checkbox"] {
    margin-top: 2px;
    flex-shrink: 0;
    width: 16px;
    height: 16px;
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
    
    .checkbox-group {
        grid-template-columns: 1fr;
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
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}
</style>
@endsection
