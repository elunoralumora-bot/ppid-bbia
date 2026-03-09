@extends('admin.layout')

@section('title', 'Edit Profil - PPID BBIA')
@section('page-title', 'Edit Profil')

@section('content')
<div class="card">
    <h2>Edit Profil</h2>
    
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

    <form action="{{ route('admin.profil.update', $profil->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; gap: 1rem;">
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Kategori *</label>
                <select name="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Visi Misi" {{ $profil->kategori == 'Visi Misi' ? 'selected' : '' }}>Visi Misi</option>
                    <option value="Struktur Organisasi" {{ $profil->kategori == 'Struktur Organisasi' ? 'selected' : '' }}>Struktur Organisasi</option>
                    <option value="Tugas dan Fungsi" {{ $profil->kategori == 'Tugas dan Fungsi' ? 'selected' : '' }}>Tugas dan Fungsi</option>
                    <option value="Profil Pejabat" {{ $profil->kategori == 'Profil Pejabat' ? 'selected' : '' }}>Profil Pejabat</option>
                    <option value="Maklumat Pelayanan" {{ $profil->kategori == 'Maklumat Pelayanan' ? 'selected' : '' }}>Maklumat Pelayanan</option>
                    <option value="Dasar Hukum" {{ $profil->kategori == 'Dasar Hukum' ? 'selected' : '' }}>Dasar Hukum</option>
                    <option value="Program Kerja" {{ $profil->kategori == 'Program Kerja' ? 'selected' : '' }}>Program Kerja</option>
                    <option value="Lainnya" {{ $profil->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Judul *</label>
                <input type="text" name="judul" class="form-control" value="{{ $profil->judul }}" required>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Konten *</label>
                <textarea name="konten" class="form-control" rows="10" required>{{ $profil->konten }}</textarea>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Urutan *</label>
                <input type="number" name="urutan" class="form-control" value="{{ $profil->urutan }}" min="0" required>
                <small style="color: #666;">Nomor urutan untuk pengurutan tampilan</small>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">
                    <input type="checkbox" name="is_active" value="1" {{ $profil->is_active ? 'checked' : '' }}>
                    Aktif
                </label>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.profil') }}" class="btn btn-outline">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection