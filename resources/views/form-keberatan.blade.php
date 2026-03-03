@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Form Keberatan</h1>
            <p>Formulir pengajuan keberatan informasi publik PPID BBIA</p>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<nav class="breadcrumb">
    <div class="container">
    </div>
</nav>

<!-- Main Content -->
<main class="main-content">
    <div class="container">
        <div class="content-section">
            <div class="form-container">
                <h2>Formulir Pengajuan Keberatan Informasi Publik</h2>
                <p>Silakan isi formulir berikut secara lengkap dan benar untuk mengajukan keberatan atas tanggapan permohonan informasi publik.</p>
                
                <form class="permohonan-form">
                    <div class="form-section">
                        <h3>Data Pemohon</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nama-lengkap">Nama Lengkap *</label>
                                <input type="text" id="nama-lengkap" name="nama_lengkap" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="nik">NIK *</label>
                                <input type="text" id="nik" name="nik" maxlength="16" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="telepon">No. Telepon/HP *</label>
                                <input type="tel" id="telepon" name="telepon" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap *</label>
                            <textarea id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan *</label>
                                <select id="pekerjaan" name="pekerjaan" required>
                                    <option value="">-- Pilih Pekerjaan --</option>
                                    <option value="pegawai-swasta">Pegawai Swasta</option>
                                    <option value="pegawai-negeri">Pegawai Negeri</option>
                                    <option value="wirausaha">Wirausaha</option>
                                    <option value="pelajar">Pelajar/Mahasiswa</option>
                                    <option value="peneliti">Peneliti</option>
                                    <option value="jurnalis">Jurnalis</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="instansi">Instansi/Lembaga</label>
                                <input type="text" id="instansi" name="instansi">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3>Data Keberatan</h3>
                        
                        <div class="form-group">
                            <label for="no-registrasi">Nomor Registrasi Permohonan *</label>
                            <input type="text" id="no-registrasi" name="no_registrasi" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="tanggal-tanggapan">Tanggal Tanggapan Permohonan *</label>
                            <input type="date" id="tanggal-tanggapan" name="tanggal_tanggapan" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="alasan-keberatan">Alasan Pengajuan Keberatan *</label>
                            <select id="alasan-keberatan" name="alasan_keberatan" required>
                                <option value="">-- Pilih Alasan --</option>
                                <option value="ditolak-tanpa-alasan">Permohonan ditolak tanpa alasan yang jelas</option>
                                <option value="informasi-tidak-sesuai">Informasi yang diberikan tidak sesuai yang diminta</option>
                                <option value="waktu-lebih-batas">Waktu penyelesaian melebihi batas waktu</option>
                                <option value="biaya-tidak-sesuai">Biaya yang dikenakan tidak sesuai ketentuan</option>
                                <option value="informasi-tidak-lengkap">Informasi tidak lengkap atau tidak akurat</option>
                                <option value="penolakan-tidak-sesuai">Penolakan tidak sesuai perundang-undangan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="rincian-keberatan">Rincian Keberatan *</label>
                            <textarea id="rincian-keberatan" name="rincian_keberatan" rows="5" placeholder="Jelaskan secara rinci alasan pengajuan keberatan" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="tanggapan-diharapkan">Tanggapan yang Diharapkan *</label>
                            <textarea id="tanggapan-diharapkan" name="tanggapan_diharapkan" rows="3" placeholder="Jelaskan tanggapan yang Anda harapkan dari keberatan ini" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3>Dokumen Lampiran</h3>
                        
                        <div class="form-group">
                            <label>Upload Dokumen Pendukung *</label>
                            <input type="file" id="dokumen" name="dokumen" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" multiple required>
                            <small class="form-help">Wajib melampirkan: Surat keberatan, Fotokopi KTP, Bukti tanggapan PPID. Maksimal 5 file, format PDF/DOC/DOCX/JPG/JPEG/PNG, maksimal 5MB per file</small>
                        </div>
                    </div>
                    
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
                                <span>Saya menyetujui syarat dan ketentuan layanan keberatan informasi publik</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Kirim Keberatan</button>
                        <button type="reset" class="btn btn-outline">Reset Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
