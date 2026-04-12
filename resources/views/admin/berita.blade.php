@extends('admin.layout')

@section('title', 'Kelola Berita - PPID BBIA')
@section('page-title', 'Kelola Berita')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2 style="margin: 0;">Daftar Berita</h2>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">+ Tambah Berita</a>
    </div>
    
    @if($beritas->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal Publikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $berita)
                    <tr>
                        <td>{{ $berita->id }}</td>
                        <td>
                            @if($berita->gambar)
                                <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                            @else
                                <img src="{{ asset('images/beranda.jpg') }}" alt="{{ $berita->judul }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                            @endif
                        </td>
                        <td>{{ $berita->judul }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem; background: {{ $berita->status == 'published' ? '#d4edda' : '#fff3cd' }}; color: {{ $berita->status == 'published' ? '#155724' : '#856404' }};">
                                {{ $berita->status == 'published' ? 'Dipublikasikan' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('d/m/Y') : '-' }}</td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning" style="margin-right: 0.5rem;">Edit</a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div style="margin-top: 1rem;">
            {{ $beritas->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 2rem; color: #666;">
            <p>Belum ada berita.</p>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">Tambah Berita Pertama</a>
        </div>
    @endif
</div>
@endsection
