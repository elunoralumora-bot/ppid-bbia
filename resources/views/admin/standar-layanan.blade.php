@extends('admin.layout')

@section('title', 'Standar Layanan - PPID BBIA')
@section('page-title', 'Standar Layanan')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Daftar Standar Layanan</h2>
        <a href="{{ route('admin.standar-layanan.create') }}" class="btn btn-primary">+ Tambah Standar</a>
    </div>
    
    @if($standars->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis Layanan</th>
                    <th>Waktu</th>
                    <th>Biaya</th>
                    <th>Produk Layanan</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($standars as $standar)
                    <tr>
                        <td>{{ $standar->id }}</td>
                        <td>{{ $standar->jenis }}</td>
                        <td>{{ $standar->waktu }}</td>
                        <td>{{ $standar->biaya }}</td>
                        <td>{{ $standar->produk }}</td>
                        <td>{{ $standar->urutan }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem; background: {{ $standar->is_active ? '#d4edda' : '#f8d7da' }}; color: {{ $standar->is_active ? '#155724' : '#721c24' }};">
                                {{ $standar->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.standar-layanan.edit', $standar->id) }}" class="btn btn-warning" style="margin-right: 0.5rem;">Edit</a>
                            <form action="{{ route('admin.standar-layanan.destroy', $standar->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus standar layanan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 2rem; color: #666;">
            <p>Belum ada standar layanan.</p>
            <a href="{{ route('admin.standar-layanan.create') }}" class="btn btn-primary">Tambah Standar Pertama</a>
        </div>
    @endif
</div>
@endsection