@extends('admin.layout')

@section('title', 'Edit Maklumat Informasi Publik - PPID BBIA')
@section('page-title', 'Edit Maklumat Informasi Publik')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Maklumat Informasi Publik</h1>
        <div>
            <a href="{{ route('admin.maklumat-informasi-publik') }}" class="btn btn-secondary">
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
        <form action="{{ route('admin.maklumat-informasi-publik.update', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Maklumat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $data->judul ?? 'Maklumat Informasi Publik') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Maklumat <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="isi" name="isi" rows="15" required>{{ old('isi', $data->isi ?? '') }}</textarea>
                        <small class="text-muted">Isi maklumat informasi publik sesuai peraturan perundang-undangan</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="versi" class="form-label">Versi</label>
                        <input type="text" class="form-control" id="versi" name="versi" value="{{ old('versi', $data->versi ?? '1.0') }}" placeholder="Contoh: 1.0, 2.0">
                    </div>

                    <div class="mb-3">
                        <label for="tahun_berlaku" class="form-label">Tahun Berlaku</label>
                        <input type="number" class="form-control" id="tahun_berlaku" name="tahun_berlaku" value="{{ old('tahun_berlaku', $data->tahun_berlaku ?? date('Y')) }}" min="2000" max="{{ date('Y') + 5 }}">
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File Dokumen (PDF)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf">
                        <small class="text-muted">Maksimal 10MB. Kosongkan jika tidak ingin mengubah file.</small>
                        @if(isset($data->file_path) && $data->file_path)
                            <br><small class="text-success">
                                <i class="fas fa-file me-1"></i>File saat ini: {{ basename($data->file_path) }}
                            </small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_ditetapkan" class="form-label">Tanggal Ditetapkan</label>
                        <input type="date" class="form-control" id="tanggal_ditetapkan" name="tanggal_ditetapkan" value="{{ old('tanggal_ditetapkan', $data->tanggal_ditetapkan ?? '') }}">
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
                <a href="{{ route('admin.maklumat-informasi-publik') }}" class="btn btn-secondary">
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
