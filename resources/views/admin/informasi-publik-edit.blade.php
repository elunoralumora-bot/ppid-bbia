@extends('admin.layout')

@section('title', 'Edit Informasi Publik - PPID BBIA')
@section('page-title', 'Edit Informasi Publik')

@section('content')
<div class="card">
    <h2>Edit Informasi Publik</h2>
    
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

    <form action="{{ route('admin.informasi-publik.update', $informasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="display: grid; gap: 1rem;">
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Kategori *</label>
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Informasi Berkala" {{ $informasi->kategori == 'Informasi Berkala' ? 'selected' : '' }}>Informasi Berkala</option>
                    <option value="Informasi Serta Merta" {{ $informasi->kategori == 'Informasi Serta Merta' ? 'selected' : '' }}>Informasi Serta Merta</option>
                    <option value="Informasi Setiap Saat" {{ $informasi->kategori == 'Informasi Setiap Saat' ? 'selected' : '' }}>Informasi Setiap Saat</option>
                    <option value="Informasi Dikecualikan" {{ $informasi->kategori == 'Informasi Dikecualikan' ? 'selected' : '' }}>Informasi Dikecualikan</option>
                </select>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Judul *</label>
                <input type="text" name="judul" class="form-control" value="{{ $informasi->judul }}" required>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Konten *</label>
                <textarea name="konten" class="form-control" rows="8" required>{{ $informasi->konten }}</textarea>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">File Dokumen (PDF/DOC/DOCX)</label>
                <input type="file" name="file_path" class="form-control" accept=".pdf,.doc,.docx">
                <small style="color: #666;">Maksimal 5MB. Kosongkan jika tidak ingin mengubah file.</small>
                @if($informasi->file_path)
                    <div style="margin-top: 0.5rem;">
                        <small>File saat ini: <a href="{{ asset($informasi->file_path) }}" target="_blank">{{ basename($informasi->file_path) }}</a></small>
                    </div>
                @endif
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Urutan *</label>
                <input type="number" name="urutan" class="form-control" value="{{ $informasi->urutan }}" min="0" required>
                <small style="color: #666;">Nomor urutan untuk pengurutan tampilan</small>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">
                    <input type="checkbox" name="is_active" value="1" {{ $informasi->is_active ? 'checked' : '' }}>
                    Aktif
                </label>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.informasi-publik') }}" class="btn btn-outline">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection