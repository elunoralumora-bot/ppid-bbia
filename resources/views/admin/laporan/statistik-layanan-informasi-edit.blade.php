@extends('admin.layout')

@section('title', 'Edit Statistik Layanan Informasi - PPID BBIA')
@section('page-title', 'Edit Statistik Layanan Informasi')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Statistik Layanan Informasi</h1>
        <div>
            <a href="{{ route('admin.statistik-layanan-informasi') }}" class="btn btn-secondary">
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
        <form action="{{ route('admin.statistik-layanan-informasi.update', $statistik->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Statistik <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $statistik->judul) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $statistik->meta_data['deskripsi'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="ringkasan" class="form-label">Ringkasan Data</label>
                        <textarea class="form-control" id="ringkasan" name="ringkasan" rows="8">{{ old('ringkasan', $statistik->meta_data['ringkasan'] ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="analisis" class="form-label">Analisis Data</label>
                        <textarea class="form-control" id="analisis" name="analisis" rows="5">{{ old('analisis', $statistik->meta_data['analisis'] ?? '') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun Statistik <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="{{ old('tahun', $statistik->meta_data['tahun'] ?? date('Y')) }}" min="2000" max="{{ date('Y') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="periode" class="form-label">Periode</label>
                        <select class="form-control" id="periode" name="periode">
                            <option value="Januari - Desember" {{ old('periode', $statistik->meta_data['periode'] ?? '') == 'Januari - Desember' ? 'selected' : '' }}>Januari - Desember</option>
                            <option value="Semester 1" {{ old('periode', $statistik->meta_data['periode'] ?? '') == 'Semester 1' ? 'selected' : '' }}>Semester 1</option>
                            <option value="Semester 2" {{ old('periode', $statistik->meta_data['periode'] ?? '') == 'Semester 2' ? 'selected' : '' }}>Semester 2</option>
                            <option value="Triwulan 1" {{ old('periode', $statistik->meta_data['periode'] ?? '') == 'Triwulan 1' ? 'selected' : '' }}>Triwulan 1</option>
                            <option value="Triwulan 2" {{ old('periode', $statistik->meta_data['periode'] ?? '') == 'Triwulan 2' ? 'selected' : '' }}>Triwulan 2</option>
                            <option value="Triwulan 3" {{ old('periode', $statistik->meta_data['periode'] ?? '') == 'Triwulan 3' ? 'selected' : '' }}>Triwulan 3</option>
                            <option value="Triwulan 4" {{ old('periode', $statistik->meta_data['periode'] ?? '') == 'Triwulan 4' ? 'selected' : '' }}>Triwulan 4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="total_permohonan" class="form-label">Total Permohonan</label>
                        <input type="number" class="form-control" id="total_permohonan" name="total_permohonan" value="{{ old('total_permohonan', $statistik->meta_data['total_permohonan'] ?? '') }}" min="0">
                    </div>

                    <div class="mb-3">
                        <label for="total_disetujui" class="form-label">Total Disetujui</label>
                        <input type="number" class="form-control" id="total_disetujui" name="total_disetujui" value="{{ old('total_disetujui', $statistik->meta_data['total_disetujui'] ?? '') }}" min="0">
                    </div>

                    <div class="mb-3">
                        <label for="total_ditolak" class="form-label">Total Ditolak</label>
                        <input type="number" class="form-control" id="total_ditolak" name="total_ditolak" value="{{ old('total_ditolak', $statistik->meta_data['total_ditolak'] ?? '') }}" min="0">
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File Statistik (PDF)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf">
                        <small class="text-muted">Maksimal 20MB. Kosongkan jika tidak ingin mengubah file.</small>
                        @if($statistik->meta_data['file_path'] ?? null)
                            <br><small class="text-info">File saat ini: <a href="{{ asset('storage/' . $statistik->meta_data['file_path']) }}" target="_blank">Download</a></small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi</label>
                        <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="{{ old('tanggal_publikasi', $statistik->meta_data['tanggal_publikasi'] ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="draft" {{ old('status', $statistik->meta_data['status'] ?? 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $statistik->meta_data['status'] ?? 'draft') == 'published' ? 'selected' : '' }}>Dipublikasi</option>
                            <option value="archived" {{ old('status', $statistik->meta_data['status'] ?? 'draft') == 'archived' ? 'selected' : '' }}>Arsip</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.statistik-layanan-informasi') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
