@extends('admin.layout')

@section('title', 'Pengajuan Keberatan - PPID BBIA')
@section('page-title', 'Pengajuan Keberatan')

@section('content')
<div class="card">
    <h2>Daftar Pengajuan Keberatan</h2>
    
    <div style="margin-bottom: 1.5rem;">
        <div style="display: flex; gap: 1rem; align-items: center;">
            <select class="form-control" style="width: 200px;">
                <option>Semua Status</option>
                <option>Baru</option>
                <option>Diproses</option>
                <option>Diterima</option>
                <option>Ditolak</option>
            </select>
            <input type="text" class="form-control" placeholder="Cari keberatan..." style="width: 300px;">
            <button class="btn btn-primary">Cari</button>
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemohon</th>
                <th>Alasan Keberatan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($keberatans->count() > 0)
                @foreach($keberatans as $keberatan)
                    <tr>
                        <td>{{ $keberatan->id }}</td>
                        <td>{{ $keberatan->nama_pemohon }}</td>
                        <td>{{ Str::limit($keberatan->alasan_keberatan, 50) }}</td>
                        <td>{{ $keberatan->tanggal_keberatan->format('d/m/Y') }}</td>
                        <td>
                            <span class="btn btn-{{ 
                                $keberatan->status == 'baru' ? 'warning' : 
                                ($keberatan->status == 'diproses' ? 'primary' : 
                                ($keberatan->status == 'diterima' ? 'success' : 'danger')) 
                            }}">
                                {{ ucfirst($keberatan->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.keberatan.show', $keberatan->id) }}" class="btn btn-primary" style="margin-right: 0.5rem;">Detail</a>
                            @if($keberatan->status == 'baru')
                                <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="diproses">
                                    <button type="submit" class="btn btn-warning">Proses</button>
                                </form>
                            @elseif($keberatan->status == 'diproses')
                                <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline; margin-right: 0.5rem;">
                                    @csrf
                                    <input type="hidden" name="status" value="diterima">
                                    <button type="submit" class="btn btn-success">Terima</button>
                                </form>
                                <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="ditolak">
                                    <button type="submit" class="btn btn-danger">Tolak</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" style="text-align: center; padding: 2rem; color: #666;">
                        Belum ada data keberatan.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    
    @if($keberatans->hasPages())
        <div style="margin-top: 1rem;">
            {{ $keberatans->links() }}
        </div>
    @endif
</div>
@endsection