@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1>Form Permohonan Informasi</h1>
            <p>Formulir permohonan informasi publik PPID BBIA</p>
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
                <h2>Formulir Permohonan Informasi Publik</h2>
                <p>Silakan isi formulir berikut secara lengkap dan benar untuk mengajukan permohonan informasi publik.</p>
                
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
                        <h3>Rincian Informasi yang Diminta</h3>
                        
                        <div class="form-group">
                            <label for="jenis-informasi">Jenis Informasi *</label>
                            <select id="jenis-informasi" name="jenis_informasi" required>
                                <option value="">-- Pilih Jenis Informasi --</option>
                                <option value="informasi-berkala">Informasi Berkala</option>
                                <option value="informasi-serta-merta">Informasi Serta Merta</option>
                                <option value="informasi-setiap-saat">Informasi Setiap Saat</option>
                                <option value="regulasi">Regulasi dan Kebijakan</option>
                                <option value="laporan">Laporan dan Statistik</option>
                                <option value="prosedur">Prosedur dan Standar</option>
                                <option value="struktur">Struktur Organisasi</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="rincian-informasi">Rincian Informasi yang Diminta *</label>
                            <textarea id="rincian-informasi" name="rincian_informasi" rows="5" placeholder="Jelaskan secara rinci informasi yang Anda butuhkan" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="tujuan">Tujuan Penggunaan Informasi *</label>
                            <textarea id="tujuan" name="tujuan" rows="3" placeholder="Jelaskan tujuan penggunaan informasi yang diminta" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3>Cara Penyampaian Informasi</h3>
                        
                        <div class="form-group">
                            <label>Cara Mendapatkan Informasi *</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="cara_dapat" value="langsung" required>
                                    <span>Langsung di Kantor PPID</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="cara_dapat" value="email" required>
                                    <span>Melalui Email</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="cara_dapat" value="pos" required>
                                    <span>Melalui Pos/Kurir</span>
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="cara_dapat" value="download" required>
                                    <span>Download (jika tersedia)</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="format-informasi">Format Informasi yang Diinginkan</label>
                            <select id="format-informasi" name="format_informasi">
                                <option value="">-- Pilih Format --</option>
                                <option value="pdf">PDF</option>
                                <option value="doc">Microsoft Word</option>
                                <option value="excel">Microsoft Excel</option>
                                <option value="cetak">Cetak (Hardcopy)</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3>Dokumen Lampiran</h3>
                        
                        <div class="form-group">
                            <label>Upload Dokumen Pendukung (jika ada)</label>
                            <input type="file" id="dokumen" name="dokumen" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" multiple>
                            <small class="form-help">Maksimal 5 file, format PDF/DOC/DOCX/JPG/JPEG/PNG, maksimal 5MB per file</small>
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
                                <span>Saya menyetujui syarat dan ketentuan layanan permohonan informasi publik</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Kirim Permohonan</button>
                        <button type="reset" class="btn btn-outline">Reset Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
