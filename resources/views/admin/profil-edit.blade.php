@extends('admin.layout')

@section('title', 'Edit Profil - PPID BBIA')
@section('page-title', 'Edit Profil')

@push('styles')
<style>
    .edit-profile-container {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 2rem;
    }
    
    .form-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    .preview-section {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 20px;
        height: fit-content;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #374151;
        font-size: 0.95rem;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 200px;
        line-height: 1.6;
    }
    
    .select-wrapper {
        position: relative;
    }
    
    .select-wrapper::after {
        content: '\f107';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #6b7280;
    }
    
    select.form-control {
        appearance: none;
        padding-right: 2.5rem;
    }
    
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem;
        background: #f8fafc;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .checkbox-wrapper:hover {
        border-color: #3b82f6;
        background: #f0f9ff;
    }
    
    .checkbox-wrapper input[type="checkbox"] {
        width: 20px;
        height: 20px;
        accent-color: #3b82f6;
        cursor: pointer;
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        padding-top: 2rem;
        border-top: 2px solid #e5e7eb;
        margin-top: 2rem;
    }
    
    .preview-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .preview-content {
        color: #4b5563;
        line-height: 1.6;
        font-size: 0.9rem;
    }
    
    .preview-content h3 {
        color: #1f2937;
        font-size: 1rem;
        font-weight: 600;
        margin: 1rem 0 0.5rem 0;
    }
    
    .preview-content p {
        margin-bottom: 0.75rem;
    }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        margin-top: 1rem;
    }
    
    .status-active {
        background: #dcfce7;
        color: #166534;
    }
    
    .status-inactive {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .help-text {
        font-size: 0.85rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }
    
    .alert {
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .alert-success {
        background: #dcfce7;
        color: #166534;
        border-left: 4px solid #22c55e;
    }
    
    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border-left: 4px solid #ef4444;
    }
    
    .character-count {
        text-align: right;
        font-size: 0.8rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }
    
    @media (max-width: 1024px) {
        .edit-profile-container {
            grid-template-columns: 1fr;
        }
        
        .preview-section {
            position: static;
        }
    }
</style>
@endpush

@section('content')
<div class="edit-profile-container">
    <!-- Form Section -->
    <div class="form-section">
        <h2 style="margin: 0 0 1.5rem 0; color: #1f2937; font-size: 1.5rem; font-weight: 600;">Edit Profil</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <div>
                    <strong>Terjadi kesalahan:</strong>
                    <ul style="margin: 0.5rem 0 0 0; padding-left: 1.5rem;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.profil.update', $profil->id) }}" method="POST" id="profileForm">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-label" for="kategori">
                    <i class="fas fa-folder"></i> Kategori Profil *
                </label>
                <div class="select-wrapper">
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Kategori Profil</option>
                        <option value="Visi Misi" {{ $profil->kategori == 'Visi Misi' ? 'selected' : '' }}>📋 Visi & Misi</option>
                        <option value="Struktur Organisasi" {{ $profil->kategori == 'Struktur Organisasi' ? 'selected' : '' }}>🏢 Struktur Organisasi</option>
                        <option value="Tugas dan Fungsi" {{ $profil->kategori == 'Tugas dan Fungsi' ? 'selected' : '' }}>📌 Tugas & Fungsi</option>
                        <option value="Profil Pejabat" {{ $profil->kategori == 'Profil Pejabat' ? 'selected' : '' }}>👤 Profil Pejabat</option>
                        <option value="Kontak PPID" {{ $profil->kategori == 'Kontak PPID' ? 'selected' : '' }}>📞 Kontak PPID</option>
                        <option value="Maklumat Pelayanan" {{ $profil->kategori == 'Maklumat Pelayanan' ? 'selected' : '' }}>📝 Maklumat Pelayanan</option>
                        <option value="Dasar Hukum" {{ $profil->kategori == 'Dasar Hukum' ? 'selected' : '' }}>⚖️ Dasar Hukum</option>
                        <option value="Program Kerja" {{ $profil->kategori == 'Program Kerja' ? 'selected' : '' }}>📈 Program Kerja</option>
                        <option value="Lainnya" {{ $profil->kategori == 'Lainnya' ? 'selected' : '' }}>📁 Lainnya</option>
                    </select>
                </div>
                <div class="help-text">Pilih kategori yang sesuai untuk profil ini</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="judul">
                    <i class="fas fa-heading"></i> Judul Profil *
                </label>
                <input type="text" name="judul" id="judul" class="form-control" 
                       value="{{ $profil->judul }}" required 
                       placeholder="Masukkan judul profil yang akan tampil di publik">
                <div class="character-count">
                    <span id="judulCount">{{ strlen($profil->judul) }}</span> / 100 karakter
                </div>
                <div class="help-text">Judul akan ditampilkan di halaman publik website</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="konten">
                    <i class="fas fa-file-alt"></i> Konten Profil *
                </label>
                <textarea name="konten" id="konten" class="form-control" rows="12" required 
                          placeholder="Tulis konten profil yang akan ditampilkan ke publik...&#10;&#10;Tips:&#10;• Gunakan bahasa yang mudah dipahami&#10;• Pisahkan informasi penting dengan paragraf&#10;• Format: Gunakan enter untuk membuat paragraf baru">{{ $profil->konten }}</textarea>
                <div class="character-count">
                    <span id="kontenCount">{{ strlen($profil->konten) }}</span> karakter
                </div>
                <div class="help-text">Konten ini akan ditampilkan di halaman profil publik website PPID BBIA</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="urutan">
                    <i class="fas fa-sort-numeric-up"></i> Urutan Tampilan *
                </label>
                <input type="number" name="urutan" id="urutan" class="form-control" 
                       value="{{ $profil->urutan }}" min="0" max="999" required>
                <div class="help-text">Nomor urutan untuk mengatur tampilan profil di halaman publik (angka kecil = tampil atas)</div>
            </div>

            <div class="form-group">
                <label class="checkbox-wrapper">
                    <input type="checkbox" name="is_active" value="1" {{ $profil->is_active ? 'checked' : '' }} id="isActive">
                    <div>
                        <strong>Tampilkan di Website Publik</strong>
                        <div class="help-text" style="margin: 0.25rem 0 0 0;">Centang untuk membuat profil ini visible di halaman publik</div>
                    </div>
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.profil') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </form>
    </div>
    
    <!-- Preview Section -->
    <div class="preview-section">
        <div class="preview-title">
            <i class="fas fa-eye"></i> Preview Tampilan Publik
        </div>
        <div class="preview-content" id="preview">
            <h3 id="previewJudul">{{ $profil->judul ?: 'Judul Profil' }}</h3>
            <p><strong>Kategori:</strong> {{ $profil->kategori ?: 'Belum dipilih' }}</p>
            <div id="previewKonten">
                {!! nl2br(e($profil->konten ?: 'Konten profil akan tampil di sini...')) !!}
            </div>
            <div class="status-badge {{ $profil->is_active ? 'status-active' : 'status-inactive' }}">
                <i class="fas {{ $profil->is_active ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                {{ $profil->is_active ? 'Aktif di Publik' : 'Tidak Aktif' }}
            </div>
        </div>
    </div>
</div>

<script>
// Character counter
document.getElementById('judul').addEventListener('input', function() {
    document.getElementById('judulCount').textContent = this.value.length;
    updatePreview();
});

document.getElementById('konten').addEventListener('input', function() {
    document.getElementById('kontenCount').textContent = this.value.length;
    updatePreview();
});

// Live preview
document.getElementById('kategori').addEventListener('change', updatePreview);
document.getElementById('judul').addEventListener('input', updatePreview);
document.getElementById('konten').addEventListener('input', updatePreview);
document.getElementById('isActive').addEventListener('change', updatePreview);

function updatePreview() {
    const kategori = document.getElementById('kategori').value;
    const judul = document.getElementById('judul').value;
    const konten = document.getElementById('konten').value;
    const isActive = document.getElementById('isActive').checked;
    
    document.getElementById('previewJudul').textContent = judul || 'Judul Profil';
    
    let kategoriText = kategori || 'Belum dipilih';
    document.querySelector('#preview p strong').parentElement.innerHTML = '<strong>Kategori:</strong> ' + kategoriText;
    
    document.getElementById('previewKonten').innerHTML = konten ? 
        konten.replace(/\n/g, '<br>') : 'Konten profil akan tampil di sini...';
    
    const statusBadge = document.querySelector('.status-badge');
    statusBadge.className = 'status-badge ' + (isActive ? 'status-active' : 'status-inactive');
    statusBadge.innerHTML = '<i class="fas ' + (isActive ? 'fa-check-circle' : 'fa-times-circle') + '"></i> ' + 
                           (isActive ? 'Aktif di Publik' : 'Tidak Aktif');
}

// Form validation
document.getElementById('profileForm').addEventListener('submit', function(e) {
    const judul = document.getElementById('judul').value.trim();
    const konten = document.getElementById('konten').value.trim();
    
    if (judul.length > 100) {
        e.preventDefault();
        alert('Judul maksimal 100 karakter!');
        return;
    }
    
    if (konten.length < 10) {
        e.preventDefault();
        alert('Konten minimal 10 karakter!');
        return;
    }
});
</script>
@endsection
