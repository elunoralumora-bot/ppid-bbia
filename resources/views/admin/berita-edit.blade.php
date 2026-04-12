@extends('admin.layout')

@section('title', 'Edit Berita - PPID BBIA')
@section('page-title', 'Edit Berita')

@section('content')
<div class="card">
    <div style="margin-bottom: 1.5rem;">
        <a href="{{ route('admin.berita.index') }}" class="btn btn-primary">← Kembali</a>
    </div>
    
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="judul">Judul Berita *</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
            @error('judul')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="konten">Konten Berita *</label>
            <textarea id="konten" name="konten" class="form-control" rows="10" required>{{ old('konten', $berita->konten) }}</textarea>
            @error('konten')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
            @if($berita->gambar)
                <div style="margin-top: 0.5rem;">
                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" style="max-width: 200px; height: auto; border-radius: 5px;">
                    <p style="font-size: 0.875rem; color: #666; margin-top: 0.25rem;">Gambar saat ini. Upload gambar baru untuk mengganti.</p>
                </div>
            @endif
            @error('gambar')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="status">Status *</label>
            <select id="status" name="status" class="form-control" required>
                <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $berita->status) == 'published' ? 'selected' : '' }}>Dipublikasikan</option>
            </select>
            @error('status')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="tanggal_publikasi">Tanggal Publikasi</label>
            <input type="date" id="tanggal_publikasi" name="tanggal_publikasi" class="form-control" value="{{ old('tanggal_publikasi', $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('Y-m-d') : '') }}">
            @error('tanggal_publikasi')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</div>
            @enderror
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection
