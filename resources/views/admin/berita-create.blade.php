@extends('admin.layout')

@section('title', 'Tambah Berita - PPID BBIA')
@section('page-title', 'Tambah Berita')

@section('content')
<div class="card">
    <div style="margin-bottom: 1.5rem;">
        <a href="{{ route('admin.berita.index') }}" class="btn btn-primary">← Kembali</a>
    </div>
    
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="judul">Judul Berita *</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul') }}" required>
            @error('judul')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="konten">Konten Berita *</label>
            <textarea id="konten" name="konten" class="form-control" rows="10" required>{{ old('konten') }}</textarea>
            @error('konten')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
            @error('gambar')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="status">Status *</label>
            <select id="status" name="status" class="form-control" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Dipublikasikan</option>
            </select>
            @error('status')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="tanggal_publikasi">Tanggal Publikasi</label>
            <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" class="form-control" value="{{ old('tanggal_publikasi') }}">
            @error('tanggal_publikasi')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection
