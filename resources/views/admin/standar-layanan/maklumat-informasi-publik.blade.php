@extends('admin.layout')

@section('title', 'Maklumat Informasi Publik - PPID BBIA')
@section('page-title', 'Maklumat Informasi Publik')

@section('content')
<div class="content">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="maklumat-preview-container">
                        <h5 class="mb-3">Preview Gambar</h5>
                        @if($konten && $konten->gambar)
                            <div class="image-preview-wrapper">
                                <img src="{{ asset('images/' . $konten->gambar) }}" alt="Maklumat Informasi Publik" class="img-fluid preview-image">
                            </div>
                        @else
                            <div class="empty-preview text-center">
                                <i class="fas fa-image fa-5x text-muted mb-4"></i>
                                <h5 class="text-muted">Belum ada gambar maklumat</h5>
                                <p class="text-muted small">Upload gambar untuk menampilkan maklumat informasi publik</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="upload-form-container">
                        <h5 class="mb-3">Upload Gambar</h5>
                        <div class="card bg-light">
                            <div class="card-body">
                                <form action="{{ route('admin.maklumat-informasi-publik.update-image') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="gambar" class="form-label fw-semibold">Pilih Gambar</label>
                                        <div class="file-upload-wrapper">
                                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                                        </div>
                                        <div class="form-text mt-2">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Format yang didukung: JPG, JPEG, PNG. Maksimal 5MB.
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-upload me-2"></i>Upload Gambar
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.maklumat-preview-container {
    padding-right: 20px;
}

.image-preview-wrapper {
    background: #f8f9fa;
    border: 2px dashed #dee2e6;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    min-height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.preview-image {
    max-height: 500px;
    max-width: 100%;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.empty-preview {
    padding: 60px 20px;
}

.upload-form-container {
    padding-left: 20px;
}

.file-upload-wrapper input[type="file"] {
    padding: 12px;
    border: 2px solid #dee2e6;
    border-radius: 8px;
    background: white;
}

.file-upload-wrapper input[type="file"]:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.info-box {
    background: #fff3cd;
    border-left: 4px solid #ffc107;
    padding: 15px;
    border-radius: 8px;
}

.info-box ul {
    margin: 0;
}

.info-box li {
    margin-bottom: 5px;
}

@media (max-width: 991px) {
    .maklumat-preview-container,
    .upload-form-container {
        padding: 0 0 20px 0;
    }
}
</style>
@endsection
