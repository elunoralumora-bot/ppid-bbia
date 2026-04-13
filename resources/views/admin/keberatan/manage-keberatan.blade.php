@extends('admin.layout')

@section('title', 'Kelola Keberatan - PPID BBIA')
@section('page-title', 'Kelola Keberatan')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 1.5rem;">Daftar Keberatan Informasi</h2>
    
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemohon</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alasan Keberatan</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($keberatan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_pemohon }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->alasan_keberatan, 50) }}</td>
                    <td>
                        @switch($item->status)
                            @case('pending')
                                <span class="btn btn-warning">Pending</span>
                                @break
                            @case('proses')
                                <span class="btn btn-info">Diproses</span>
                                @break
                            @case('selesai')
                                <span class="btn btn-success">Selesai</span>
                                @break
                            @case('ditolak')
                                <span class="btn btn-danger">Ditolak</span>
                                @break
                            @default
                                <span class="btn btn-outline">{{ $item->status }}</span>
                        @endswitch
                    </td>
                    <td>{{ $item->tanggal_keberatan->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('admin.show-keberatan', $item->id) }}" class="btn btn-primary" style="margin-right: 0.5rem;"><i class="fas fa-eye"></i> Detail</a>
                        <form action="{{ route('admin.destroy-keberatan', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus keberatan ini?')"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center; padding: 2rem; color: #666;">
                        Belum ada keberatan informasi.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <div style="margin-top: 2rem; padding: 1rem; background: #f8f9fa; border-radius: 5px;">
        <h4 style="margin: 0 0 0.5rem 0;">Total Keberatan: {{ $keberatan->count() }}</h4>
        <p style="margin: 0; color: #666; font-size: 0.9rem;">
            Kelola keberatan informasi yang diajukan oleh user terkait permohonan informasi.
        </p>
    </div>
</div>
@endsection
