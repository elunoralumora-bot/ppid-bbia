@extends('admin.layout')

@section('title', 'Edit Waktu & Biaya Layanan - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Waktu & Biaya Layanan</h1>
        <div>
            <a href="{{ route('admin.waktu-biaya-layanan') }}" class="btn btn-secondary">
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
        <form action="{{ route('admin.waktu-biaya-layanan.update', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Layanan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $data->judul ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="waktu_pelayanan" class="form-label">Waktu Pelayanan <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="waktu_pelayanan" name="waktu_pelayanan" rows="3" required>{{ old('waktu_pelayanan', $data->waktu_pelayanan ?? '') }}</textarea>
                        <small class="text-muted">Contoh: 10 hari kerja, 14 hari kerja, dst.</small>
                    </div>

                    <div class="mb-3">
                        <label for="biaya" class="form-label">Biaya <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="biaya" name="biaya" rows="3" required>{{ old('biaya', $data->biaya ?? '') }}</textarea>
                        <small class="text-muted">Contoh: Gratis, Rp. 5.000,- per lembar, dst.</small>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="jenis_layanan" class="form-label">Jenis Layanan</label>
                        <select class="form-control" id="jenis_layanan" name="jenis_layanan">
                            <option value="Permohonan Informasi" {{ (old('jenis_layanan', $data->jenis_layanan ?? '') == 'Permohonan Informasi') ? 'selected' : '' }}>Permohonan Informasi</option>
                            <option value="Pengaduan" {{ (old('jenis_layanan', $data->jenis_layanan ?? '') == 'Pengaduan') ? 'selected' : '' }}>Pengaduan</option>
                            <option value="Keberatan" {{ (old('jenis_layanan', $data->jenis_layanan ?? '') == 'Keberatan') ? 'selected' : '' }}>Keberatan</option>
                            <option value="Sengketa Informasi" {{ (old('jenis_layanan', $data->jenis_layanan ?? '') == 'Sengketa Informasi') ? 'selected' : '' }}>Sengketa Informasi</option>
                            <option value="Konsultasi" {{ (old('jenis_layanan', $data->jenis_layanan ?? '') == 'Konsultasi') ? 'selected' : '' }}>Konsultasi</option>
                            <option value="Lainnya" {{ (old('jenis_layanan', $data->jenis_layanan ?? '') == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
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
                        <label for="tanggal_berlaku" class="form-label">Tanggal Berlaku</label>
                        <input type="date" class="form-control" id="tanggal_berlaku" name="tanggal_berlaku" value="{{ old('tanggal_berlaku', $data->tanggal_berlaku ?? '') }}">
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
                <a href="{{ route('admin.waktu-biaya-layanan') }}" class="btn btn-secondary">
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
