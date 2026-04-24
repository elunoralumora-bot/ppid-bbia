@extends('admin.layout')

@section('title', 'Kelola Berita - PPID BBIA')
@section('page-title', 'Kelola Berita')

@section('content')
<style>
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-align: center;
    vertical-align: middle;
}

.btn i {
    margin: 0;
    vertical-align: middle;
}

.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    line-height: 1.5;
}
</style>
<div class="table-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; padding: 1.5rem 1.5rem 0;">
        <h2 style="margin: 0; color: #0f2338; font-size: 1.25rem; font-weight: 700;">Daftar Berita</h2>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Berita
        </a>
    </div>
    
    @if($beritas->count() > 0)
        <div style="padding: 0 1.5rem 1.5rem;">
            <table>
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
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                @else
                                    <img src="{{ asset('images/beranda.jpg') }}" alt="{{ $berita->judul }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                @endif
                            </td>
                            <td>
                                <div style="max-width: 300px;">
                                    <strong>{{ $berita->judul }}</strong>
                                    @if($berita->excerpt)
                                        <div style="font-size: 0.8rem; color: #64748b; margin-top: 0.25rem;">{{ Str::limit($berita->excerpt, 80) }}</div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if($berita->status == 'published')
                                    <span class="badge badge-success">Dipublikasikan</span>
                                @else
                                    <span class="badge badge-warning">Draft</span>
                                @endif
                            </td>
                            <td>{{ $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('d/m/Y') : '-' }}</td>
                            <td>
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
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
        
        <div style="padding: 0 1.5rem 1.5rem;">
            {{ $beritas->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 3rem; color: #64748b;">
            <i class="fas fa-newspaper" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
            <h3 style="margin: 0 0 0.5rem 0; color: #374151;">Belum ada berita</h3>
            <p style="margin: 0 0 1.5rem 0;">Mulai dengan menambahkan berita pertama Anda.</p>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Berita Pertama
            </a>
        </div>
    @endif
</div>
@endsection
