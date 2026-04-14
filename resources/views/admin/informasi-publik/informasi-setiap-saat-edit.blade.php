@extends('admin.layout')

@section('title', 'Edit Informasi Setiap Saat - PPID BBIA')
@section('page-title', 'Edit Informasi Setiap Saat')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Informasi Setiap Saat</h1>
        <div>
            <a href="{{ route('admin.informasi-setiap-saat') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('admin.informasi-setiap-saat.update', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Informasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $data->judul ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Lengkap</label>
                        <textarea class="form-control" id="isi" name="isi" rows="10">{{ old('isi', $data->isi ?? '') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option value="Informasi Setiap Saat" {{ (old('kategori', $data->kategori ?? '') == 'Informasi Setiap Saat') ? 'selected' : '' }}>Informasi Setiap Saat</option>
                            <option value="Prosedur Standar" {{ (old('kategori', $data->kategori ?? '') == 'Prosedur Standar') ? 'selected' : '' }}>Prosedur Standar</option>
                            <option value="Daftar Informasi" {{ (old('kategori', $data->kategori ?? '') == 'Daftar Informasi') ? 'selected' : '' }}>Daftar Informasi</option>
                            <option value="Laporan" {{ (old('kategori', $data->kategori ?? '') == 'Laporan') ? 'selected' : '' }}>Laporan</option>
                            <option value="Lainnya" {{ (old('kategori', $data->kategori ?? '') == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File Dokumen (PDF/DOC/DOCX)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx">
                        <small class="text-muted">Maksimal 10MB. Kosongkan jika tidak ingin mengubah file.</small>
                        @if(isset($data->file_path) && $data->file_path)
                            <br><small class="text-success">
                                <i class="fas fa-file me-1"></i>File saat ini: {{ basename($data->file_path) }}
                            </small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi</label>
                        <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="{{ old('tanggal_publikasi', $data->tanggal_publikasi ?? date('Y-m-d')) }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="draft" {{ (old('status', $data->status ?? '') == 'draft') ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ (old('status', $data->status ?? '') == 'published') ? 'selected' : '' }}>Dipublikasi</option>
                            <option value="archived" {{ (old('status', $data->status ?? '') == 'archived') ? 'selected' : '' }}>Arsip</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.informasi-setiap-saat') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
