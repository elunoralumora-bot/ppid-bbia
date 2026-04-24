@extends('admin.layout')

@section('title', 'Edit Prosedur Pengajuan Keberatan - PPID BBIA')
@section('page-title', 'Edit Prosedur Pengajuan Keberatan')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Prosedur Pengajuan Keberatan</h1>
        <div>
            <a href="{{ route('admin.prosedur-pengajuan-keberatan') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.prosedur-pengajuan-keberatan.update', $prosedur->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Prosedur <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $prosedur->judul) }}" required>
                            @error('judul')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten Prosedur <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="konten" name="konten" rows="10" required>{{ old('konten', $prosedur->konten) }}</textarea>
                            @error('konten')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Gunakan HTML untuk formatting (contoh: &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;)</small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Infografis</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/jpeg,image/png,image/jpg,image/gif">
                            @error('gambar')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal: 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                            
                            @if($prosedur->gambar)
                                <div class="mt-2">
                                    <label class="form-label">Gambar Saat Ini:</label>
                                    <div>
                                        <img src="{{ asset('images/' . $prosedur->gambar) }}" alt="{{ $prosedur->judul }}" class="img-fluid" style="max-width: 200px; border-radius: 8px;">
                                        <p class="small text-muted mt-1">{{ $prosedur->gambar }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <div class="alert alert-info">
                                <h6 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Tips:</h6>
                                <ul class="mb-0 small">
                                    <li>Gunakan judul yang jelas dan deskriptif</li>
                                    <li>Tuliskan langkah-langkah prosedur secara detail</li>
                                    <li>Gunakan numbering atau bullet points untuk kemudahan membaca</li>
                                    <li>Upload gambar infografis jika tersedia</li>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6>Preview:</h6>
                            <div class="border rounded p-3 bg-light" style="min-height: 200px;">
                                <div id="preview-content">
                                    @if($prosedur->judul || $prosedur->konten)
                                        @if($prosedur->judul)
                                            <h5 style="color: #2c5282; margin-bottom: 10px;">{{ $prosedur->judul }}</h5>
                                        @endif
                                        @if($prosedur->konten)
                                            <div style="font-size: 14px; line-height: 1.6;">{!! $prosedur->konten !!}</div>
                                        @endif
                                    @else
                                        <p class="text-muted">Preview akan muncul di sini...</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <form action="{{ route('admin.prosedur-pengajuan-keberatan.destroy', $prosedur->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus prosedur ini?')">
                                <i class="fas fa-trash me-2"></i>Hapus
                            </button>
                        </form>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.prosedur-pengajuan-keberatan') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('konten').addEventListener('input', function() {
    const preview = document.getElementById('preview-content');
    const judul = document.getElementById('judul').value;
    
    let html = '';
    if (judul) {
        html += '<h5 style="color: #2c5282; margin-bottom: 10px;">' + judul + '</h5>';
    }
    if (this.value) {
        html += '<div style="font-size: 14px; line-height: 1.6;">' + this.value + '</div>';
    }
    
    if (!html) {
        html = '<p class="text-muted">Preview akan muncul di sini...</p>';
    }
    
    preview.innerHTML = html;
});

document.getElementById('judul').addEventListener('input', function() {
    const preview = document.getElementById('preview-content');
    const konten = document.getElementById('konten').value;
    
    let html = '';
    if (this.value) {
        html += '<h5 style="color: #2c5282; margin-bottom: 10px;">' + this.value + '</h5>';
    }
    if (konten) {
        html += '<div style="font-size: 14px; line-height: 1.6;">' + konten + '</div>';
    }
    
    if (!html) {
        html = '<p class="text-muted">Preview akan muncul di sini...</p>';
    }
    
    preview.innerHTML = html;
});
</script>

<style>
.card {
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.card-body {
    padding: 2rem;
}

.form-label {
    font-weight: 600;
    color: #374151;
}

.form-control:focus {
    border-color: #2c5282;
    box-shadow: 0 0 0 0.2rem rgba(44, 82, 130, 0.25);
}

.alert-info {
    background-color: #e8f4fd;
    border-color: #bee5eb;
    color: #0c5460;
}

.alert-heading {
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.bg-light {
    background-color: #f8fafc !important;
}

.border {
    border-color: #e5e7eb !important;
}
</style>
@endsection
