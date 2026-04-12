@extends('admin.layout')

@section('title', 'Informasi Publik - PPID BBIA')
@section('page-title', 'Informasi Publik')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Daftar Informasi Publik</h2>
        <a href="{{ route('admin.informasi-publik.create') }}" class="btn btn-primary">+ Tambah Informasi</a>
    </div>
    
    @if($informasis->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($informasis as $informasi)
                    <tr>
                        <td>{{ $informasi->id }}</td>
                        <td>{{ $informasi->kategori }}</td>
                        <td>{{ $informasi->judul }}</td>
                        <td>
                            @if($informasi->file_path)
                                <a href="{{ asset($informasi->file_path) }}" target="_blank" class="btn btn-sm btn-info">📄 Lihat File</a>
                            @else
                                <span style="color: #666;">Tidak ada file</span>
                            @endif
                        </td>
                        <td>{{ $informasi->urutan }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem; background: {{ $informasi->is_active ? '#d4edda' : '#f8d7da' }}; color: {{ $informasi->is_active ? '#155724' : '#721c24' }};">
                                {{ $informasi->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.informasi-publik.edit', $informasi->id) }}" class="btn btn-warning" style="margin-right: 0.5rem;">Edit</a>
                            <form action="{{ route('admin.informasi-publik.destroy', $informasi->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 2rem; color: #666;">
            <p>Belum ada informasi publik.</p>
            <a href="{{ route('admin.informasi-publik.create') }}" class="btn btn-primary">Tambah Informasi Pertama</a>
        </div>
    @endif
</div>
@endsection
