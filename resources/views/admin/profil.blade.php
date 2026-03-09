@extends('admin.layout')

@section('title', 'Profil - PPID BBIA')
@section('page-title', 'Profil')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Daftar Profil</h2>
        <a href="{{ route('admin.profil.create') }}" class="btn btn-primary">+ Tambah Profil</a>
    </div>
    
    @if($profils->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profils as $profil)
                    <tr>
                        <td>{{ $profil->id }}</td>
                        <td>{{ $profil->kategori }}</td>
                        <td>{{ $profil->judul }}</td>
                        <td>{{ $profil->urutan }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem; background: {{ $profil->is_active ? '#d4edda' : '#f8d7da' }}; color: {{ $profil->is_active ? '#155724' : '#721c24' }};">
                                {{ $profil->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.profil.edit', $profil->id) }}" class="btn btn-warning" style="margin-right: 0.5rem;">Edit</a>
                            <form action="{{ route('admin.profil.destroy', $profil->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus profil ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 2rem; color: #666;">
            <p>Belum ada profil.</p>
            <a href="{{ route('admin.profil.create') }}" class="btn btn-primary">Tambah Profil Pertama</a>
        </div>
    @endif
</div>
@endsection