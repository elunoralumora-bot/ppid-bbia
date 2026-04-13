@extends('admin.layout')

@section('title', 'Kontak PPID - PPID BBIA')
@section('page-title', 'Kontak PPID')

@section('content')
<div class="form-card">
    <h2 style="margin: 0 0 1.5rem 0; color: #0f2338;">Edit Kontak PPID</h2>
    
    <form method="POST" action="{{ route('admin.kontak-ppid.update') }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3" required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="telepon">Nomor Telepon</label>
            <input type="tel" id="telepon" name="telepon" value="{{ old('telepon', $profil->telepon ?? '') }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $profil->email ?? '') }}" required>
        </div>
        
        <div class="form-group">
            <label for="website">Website</label>
            <input type="url" id="website" name="website" value="{{ old('website', $profil->website ?? '') }}">
        </div>
        
        <div class="form-group">
            <label for="jam_kerja">Jam Kerja</label>
            <input type="text" id="jam_kerja" name="jam_kerja" value="{{ old('jam_kerja', $profil->jam_kerja ?? '') }}" placeholder="Contoh: Senin - Jumat, 08:00 - 16:00">
        </div>
        
        <div class="form-group">
            <label for="keterangan">Keterangan Tambahan</label>
            <textarea id="keterangan" name="keterangan" rows="4">{{ old('keterangan', $profil->keterangan ?? '') }}</textarea>
        </div>
        
        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

@if($profils->count() > 0)
<div class="table-container" style="margin-top: 2rem;">
    <h3 style="margin: 0 0 1.5rem 0; color: #0f2338;">Daftar Kontak PPID</h3>
    
    <div style="padding: 0 1.5rem 1.5rem;">
        <table>
            <thead>
                <tr>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Jam Kerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profils as $item)
                <tr>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->website ?? '-' }}</td>
                    <td>{{ $item->jam_kerja ?? '-' }}</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('admin.profil.edit', $item->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <form action="{{ route('admin.profil.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
