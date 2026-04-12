@extends('admin.layout')

@section('title', 'Tambah Laporan Publik - PPID BBIA')
@section('page-title', 'Tambah Laporan Publik')

@section('content')
<div class="card">
    <h2>Tambah Laporan Publik Baru</h2>
    
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.laporan-publik.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; gap: 1rem;">
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Tahun *</label>
                <input type="text" name="tahun" class="form-control" value="{{ old('tahun', date('Y')) }}" required>
                <small style="color: #666;">Contoh: 2023, 2024</small>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Kategori *</label>
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Laporan Tahunan">Laporan Tahunan</option>
                    <option value="Laporan Triwulan">Laporan Triwulan</option>
                    <option value="Laporan Kinerja">Laporan Kinerja</option>
                    <option value="Laporan Keuangan">Laporan Keuangan</option>
                    <option value="Laporan Layanan">Laporan Layanan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Judul Laporan *</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">File Laporan * (PDF/DOC/DOCX)</label>
                <input type="file" name="file_path" class="form-control" accept=".pdf,.doc,.docx" required>
                <small style="color: #666;">Maksimal 10MB. Format PDF, DOC, atau DOCX</small>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                    Aktif
                </label>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.laporan-publik') }}" class="btn btn-outline">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection
