@extends('admin.layout')

@section('title', 'Tambah Laporan Tahunan PPID - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Tambah Laporan Tahunan PPID</h1>
        <div>
            <a href="{{ route('admin.laporan-tahunan-ppid') }}" class="btn btn-secondary">
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
        <form action="{{ route('admin.laporan-tahunan-ppid.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Laporan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="ringkasan" class="form-label">Ringkasan Eksekutif</label>
                        <textarea class="form-control" id="ringkasan" name="ringkasan" rows="8">{{ old('ringkasan') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun Laporan <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="{{ old('tahun') ?? date('Y') }}" min="2000" max="{{ date('Y') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="periode" class="form-label">Periode</label>
                        <select class="form-control" id="periode" name="periode">
                            <option value="Januari - Desember" {{ old('periode') == 'Januari - Desember' ? 'selected' : '' }}>Januari - Desember</option>
                            <option value="Semester 1" {{ old('periode') == 'Semester 1' ? 'selected' : '' }}>Semester 1</option>
                            <option value="Semester 2" {{ old('periode') == 'Semester 2' ? 'selected' : '' }}>Semester 2</option>
                            <option value="Triwulan 1" {{ old('periode') == 'Triwulan 1' ? 'selected' : '' }}>Triwulan 1</option>
                            <option value="Triwulan 2" {{ old('periode') == 'Triwulan 2' ? 'selected' : '' }}>Triwulan 2</option>
                            <option value="Triwulan 3" {{ old('periode') == 'Triwulan 3' ? 'selected' : '' }}>Triwulan 3</option>
                            <option value="Triwulan 4" {{ old('periode') == 'Triwulan 4' ? 'selected' : '' }}>Triwulan 4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File Laporan (PDF) <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
                        <small class="text-muted">Maksimal 20MB</small>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi</label>
                        <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="{{ old('tanggal_publikasi') }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Dipublikasi</option>
                            <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Arsip</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.laporan-tahunan-ppid') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
