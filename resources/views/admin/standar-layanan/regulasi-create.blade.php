@extends('admin.layout')

@section('title', 'Tambah Regulasi - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Tambah Regulasi</h1>
        <div>
            <a href="{{ route('admin.regulasi') }}" class="btn btn-secondary">
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
        <form action="{{ route('admin.regulasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Regulasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Lengkap</label>
                        <textarea class="form-control" id="isi" name="isi" rows="10">{{ old('isi') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor Regulasi</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" value="{{ old('nomor') }}" placeholder="Contoh: 01/PPID/2024">
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="{{ old('tahun') ?? date('Y') }}" min="2000" max="{{ date('Y') + 5 }}">
                    </div>

                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Regulasi</label>
                        <select class="form-control" id="jenis" name="jenis">
                            <option value="">Pilih Jenis</option>
                            <option value="Peraturan Pemerintah" {{ old('jenis') == 'Peraturan Pemerintah' ? 'selected' : '' }}>Peraturan Pemerintah</option>
                            <option value="Peraturan Menteri" {{ old('jenis') == 'Peraturan Menteri' ? 'selected' : '' }}>Peraturan Menteri</option>
                            <option value="Keputusan Menteri" {{ old('jenis') == 'Keputusan Menteri' ? 'selected' : '' }}>Keputusan Menteri</option>
                            <option value="Surat Edaran" {{ old('jenis') == 'Surat Edaran' ? 'selected' : '' }}>Surat Edaran</option>
                            <option value="Peraturan Daerah" {{ old('jenis') == 'Peraturan Daerah' ? 'selected' : '' }}>Peraturan Daerah</option>
                            <option value="Lainnya" {{ old('jenis') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">File Dokumen (PDF/DOC/DOCX) <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx" required>
                        <small class="text-muted">Maksimal 10MB</small>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_ditetapkan" class="form-label">Tanggal Ditetapkan</label>
                        <input type="date" class="form-control" id="tanggal_ditetapkan" name="tanggal_ditetapkan" value="{{ old('tanggal_ditetapkan') }}">
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
                <a href="{{ route('admin.regulasi') }}" class="btn btn-secondary">
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
