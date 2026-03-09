@extends('admin.layout')

@section('title', 'Laporan Publik - PPID BBIA')
@section('page-title', 'Laporan Publik')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Daftar Laporan Publik</h2>
        <a href="{{ route('admin.laporan-publik.create') }}" class="btn btn-primary">+ Tambah Laporan</a>
    </div>
    
    @if($laporans->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $laporan)
                    <tr>
                        <td>{{ $laporan->id }}</td>
                        <td>{{ $laporan->tahun }}</td>
                        <td>{{ $laporan->kategori }}</td>
                        <td>{{ $laporan->judul }}</td>
                        <td>
                            @if($laporan->file_path)
                                <a href="{{ asset($laporan->file_path) }}" target="_blank" class="btn btn-sm btn-info">📄 Lihat File</a>
                            @else
                                <span style="color: #666;">Tidak ada file</span>
                            @endif
                        </td>
                        <td>
                            <span style="padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem; background: {{ $laporan->is_active ? '#d4edda' : '#f8d7da' }}; color: {{ $laporan->is_active ? '#155724' : '#721c24' }};">
                                {{ $laporan->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.laporan-publik.edit', $laporan->id) }}" class="btn btn-warning" style="margin-right: 0.5rem;">Edit</a>
                            <form action="{{ route('admin.laporan-publik.destroy', $laporan->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="text-align: center; padding: 2rem; color: #666;">
            <p>Belum ada laporan publik.</p>
            <a href="{{ route('admin.laporan-publik.create') }}" class="btn btn-primary">Tambah Laporan Pertama</a>
        </div>
    @endif
</div>
@endsection