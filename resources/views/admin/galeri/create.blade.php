@extends('admin.layout')

@section('title', 'Tambah Foto - PPID BBIA')
@section('page-title', 'Tambah Foto Baru')

@push('styles')
<style>
    .upload-container {
        display: grid;
        grid-template-columns: 1fr 400px;
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
        min-height: 120px;
        line-height: 1.6;
    }
    
    .file-upload-area {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 3rem 2rem;
        text-align: center;
        background: #f9fafb;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .file-upload-area:hover {
        border-color: #3b82f6;
        background: #f0f9ff;
    }
    
    .file-upload-area.dragover {
        border-color: #3b82f6;
        background: #eff6ff;
        transform: scale(1.02);
    }
    
    .file-upload-area.has-file {
        border-color: #10b981;
        background: #ecfdf5;
    }
    
    .upload-icon {
        font-size: 3rem;
        color: #6b7280;
        margin-bottom: 1rem;
    }
    
    .upload-text {
        color: #374151;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .upload-subtext {
        color: #6b7280;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }
    
    .file-input {
        display: none;
    }
    
    .upload-button {
        background: #3b82f6;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }
    
    .upload-button:hover {
        background: #2563eb;
        transform: translateY(-1px);
    }
    
    .preview-image {
        width: 100%;
        max-height: 250px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 1rem;
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
    
    .preview-info {
        background: #f8fafc;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        font-size: 0.85rem;
        color: #6b7280;
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
    
    .file-info {
        background: #ecfdf5;
        border: 1px solid #10b981;
        border-radius: 8px;
        padding: 1rem;
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #065f46;
    }
    
    @media (max-width: 1024px) {
        .upload-container {
            grid-template-columns: 1fr;
        }
        
        .preview-section {
            position: static;
        }
    }
</style>
@endpush

@section('content')
<div class="upload-container">
    <!-- Form Section -->
    <div class="form-section">
        <h2 style="margin: 0 0 1.5rem 0; color: #1f2937; font-size: 1.5rem; font-weight: 600;">Tambah Foto Baru</h2>
        
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

        <form action="{{ route('admin.galeri.store') }}" method="POST" id="uploadForm" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-image"></i> Upload Foto *
                </label>
                <div class="file-upload-area" id="uploadArea" onclick="document.getElementById('foto').click()">
                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="upload-text">Klik atau seret foto ke sini</div>
                    <div class="upload-subtext">Format: JPEG, PNG, JPG, GIF (Maks. 5MB)</div>
                    <button type="button" class="upload-button">
                        <i class="fas fa-folder-open"></i> Pilih File
                    </button>
                </div>
                <input type="file" name="foto" id="foto" class="file-input" accept="image/*" onchange="handleFileSelect(this)">
                <div id="fileInfo" class="file-info" style="display: none;"></div>
            </div>

            <div class="form-group">
                <label class="form-label" for="kategori">
                    <i class="fas fa-folder"></i> Kategori *
                </label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Kegiatan">Kegiatan</option>
                    <option value="Fasilitas">Fasilitas</option>
                    <option value="Struktur">Struktur</option>
                    <option value="Layanan">Layanan</option>
                    <option value="Dokumentasi">Dokumentasi</option>
                    <option value="Lainnya">Lainnya</option>
                    @if($categories->isNotEmpty())
                        @foreach($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    @endif
                </select>
                <div class="help-text">Pilih kategori untuk mengelompokkan foto</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="judul">
                    <i class="fas fa-heading"></i> Judul Foto *
                </label>
                <input type="text" name="judul" id="judul" class="form-control" 
                       value="{{ old('judul') }}" required 
                       placeholder="Masukkan judul foto yang deskriptif">
                <div class="character-count">
                    <span id="judulCount">0</span> / 100 karakter
                </div>
                <div class="help-text">Judul akan ditampilkan di halaman galeri publik</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="deskripsi">
                    <i class="fas fa-align-left"></i> Deskripsi
                </label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" 
                          placeholder="Tulis deskripsi foto (opsional)...">{{ old('deskripsi') }}</textarea>
                <div class="character-count">
                    <span id="deskripsiCount">0</span> / 500 karakter
                </div>
                <div class="help-text">Deskripsi membantu pengunjung memahami konteks foto</div>
            </div>

            <div class="form-group">
                <label class="form-label" for="urutan">
                    <i class="fas fa-sort-numeric-up"></i> Urutan Tampilan *
                </label>
                <input type="number" name="urutan" id="urutan" class="form-control" 
                       value="{{ old('urutan', 0) }}" min="0" max="999" required>
                <div class="help-text">Nomor urutan untuk mengatur tampilan foto (angka kecil = tampil atas)</div>
            </div>

            <div class="form-group">
                <label class="checkbox-wrapper">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} id="isActive">
                    <div>
                        <strong>Tampilkan di Website Publik</strong>
                        <div class="help-text" style="margin: 0.25rem 0 0 0;">Centang untuk membuat foto ini visible di halaman galeri publik</div>
                    </div>
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-upload"></i> Upload Foto
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Galeri
                </a>
            </div>
        </form>
    </div>
    
    <!-- Preview Section -->
    <div class="preview-section">
        <div class="preview-title">
            <i class="fas fa-eye"></i> Preview Tampilan
        </div>
        <div class="preview-content" id="preview">
            <div id="previewImage" style="display: none;">
                <img id="previewImg" class="preview-image" src="" alt="Preview">
            </div>
            <div id="previewPlaceholder" style="text-align: center; padding: 2rem; color: #9ca3af;">
                <i class="fas fa-image" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                <p>Preview foto akan tampil di sini</p>
            </div>
            <div id="previewInfo" style="display: none;">
                <h3 id="previewTitle">Judul Foto</h3>
                <p id="previewCategory" style="color: #6b7280; font-size: 0.9rem; margin-bottom: 0.5rem;">Kategori: -</p>
                <p id="previewDescription" style="color: #4b5563; font-size: 0.9rem; line-height: 1.5;">Deskripsi akan tampil di sini...</p>
                <div class="preview-info">
                    <div><i class="fas fa-sort-numeric-up"></i> Urutan: <span id="previewOrder">0</span></div>
                    <div><i class="fas fa-eye"></i> Status: <span id="previewStatus">Aktif</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let selectedFile = null;

// Drag and drop
const uploadArea = document.getElementById('uploadArea');
const fileInput = document.getElementById('foto');

uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('dragover');
});

uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('dragover');
});

uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('dragover');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        fileInput.files = files;
        handleFileSelect(fileInput);
    }
});

function handleFileSelect(input) {
    const file = input.files[0];
    if (!file) return;
    
    // Validate file
    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    const maxSize = 5 * 1024 * 1024; // 5MB
    
    if (!validTypes.includes(file.type)) {
        alert('Format file tidak valid. Gunakan JPEG, PNG, atau GIF.');
        input.value = '';
        return;
    }
    
    if (file.size > maxSize) {
        alert('Ukuran file terlalu besar. Maksimal 5MB.');
        input.value = '';
        return;
    }
    
    selectedFile = file;
    
    // Show file info
    const fileInfo = document.getElementById('fileInfo');
    fileInfo.innerHTML = `
        <strong>File terpilih:</strong> ${file.name}<br>
        <strong>Ukuran:</strong> ${(file.size / 1024 / 1024).toFixed(2)} MB<br>
        <strong>Tipe:</strong> ${file.type}
    `;
    fileInfo.style.display = 'block';
    
    // Update upload area
    uploadArea.classList.add('has-file');
    uploadArea.querySelector('.upload-text').textContent = 'File terpilih';
    uploadArea.querySelector('.upload-subtext').textContent = file.name;
    
    // Show preview
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('previewImg').src = e.target.result;
        document.getElementById('previewImage').style.display = 'block';
        document.getElementById('previewPlaceholder').style.display = 'none';
        document.getElementById('previewInfo').style.display = 'block';
    };
    reader.readAsDataURL(file);
}

// Character counters
document.getElementById('judul').addEventListener('input', function() {
    document.getElementById('judulCount').textContent = this.value.length;
    updatePreview();
});

document.getElementById('deskripsi').addEventListener('input', function() {
    document.getElementById('deskripsiCount').textContent = this.value.length;
    updatePreview();
});

// Live preview
document.getElementById('kategori').addEventListener('change', updatePreview);
document.getElementById('judul').addEventListener('input', updatePreview);
document.getElementById('deskripsi').addEventListener('input', updatePreview);
document.getElementById('urutan').addEventListener('input', updatePreview);
document.getElementById('isActive').addEventListener('change', updatePreview);

function updatePreview() {
    const kategori = document.getElementById('kategori').value;
    const judul = document.getElementById('judul').value;
    const deskripsi = document.getElementById('deskripsi').value;
    const urutan = document.getElementById('urutan').value;
    const isActive = document.getElementById('isActive').checked;
    
    document.getElementById('previewTitle').textContent = judul || 'Judul Foto';
    document.getElementById('previewCategory').textContent = 'Kategori: ' + (kategori || '-');
    document.getElementById('previewDescription').textContent = deskripsi || 'Deskripsi akan tampil di sini...';
    document.getElementById('previewOrder').textContent = urutan || '0';
    document.getElementById('previewStatus').textContent = isActive ? 'Aktif' : 'Tidak Aktif';
}

// Form validation
document.getElementById('uploadForm').addEventListener('submit', function(e) {
    const judul = document.getElementById('judul').value.trim();
    const kategori = document.getElementById('kategori').value;
    
    if (!selectedFile) {
        e.preventDefault();
        alert('Pilih foto terlebih dahulu!');
        return;
    }
    
    if (!kategori) {
        e.preventDefault();
        alert('Pilih kategori foto!');
        return;
    }
    
    if (judul.length > 100) {
        e.preventDefault();
        alert('Judul maksimal 100 karakter!');
        return;
    }
    
    if (judul.length < 3) {
        e.preventDefault();
        alert('Judul minimal 3 karakter!');
        return;
    }
    
    // Show loading state
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengupload...';
});

// Initialize preview
updatePreview();
</script>
@endsection
