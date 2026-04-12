@extends('admin.layout')

@section('title', 'Permohonan Informasi - PPID BBIA')
@section('page-title', 'Permohonan Informasi')

@section('content')
<div class="card">
    <h2>Daftar Permohonan Informasi</h2>
    
    <div style="margin-bottom: 1.5rem;">
        <div style="display: flex; gap: 1rem; align-items: center;">
            <select class="form-control" style="width: 200px;">
                <option>Semua Status</option>
                <option>Baru</option>
                <option>Diproses</option>
                <option>Selesai</option>
                <option>Ditolak</option>
            </select>
            <input type="text" class="form-control" placeholder="Cari permohonan..." style="width: 300px;">
            <button class="btn btn-primary">Cari</button>
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemohon</th>
                <th>Informasi Diminta</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($permohonans->count() > 0)
                @foreach($permohonans as $permohonan)
                    <tr>
                        <td>{{ $permohonan->id }}</td>
                        <td>{{ $permohonan->nama_pemohon }}</td>
                        <td>{{ Str::limit($permohonan->informasi_diminta, 50) }}</td>
                        <td>{{ $permohonan->tanggal_permohonan->format('d/m/Y') }}</td>
                        <td>
                            <span class="btn btn-{{ 
                                $permohonan->status == 'baru' ? 'warning' : 
                                ($permohonan->status == 'diproses' ? 'primary' : 
                                ($permohonan->status == 'selesai' ? 'success' : 'danger')) 
                            }}">
                                {{ ucfirst($permohonan->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.permohonan.show', $permohonan->id) }}" class="btn btn-primary" style="margin-right: 0.5rem;">Detail</a>
                            @if($permohonan->status == 'baru')
                                <form action="{{ route('admin.permohonan.updateStatus', $permohonan->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="diproses">
                                    <button type="submit" class="btn btn-warning">Proses</button>
                                </form>
                            @elseif($permohonan->status == 'diproses')
                                <form action="{{ route('admin.permohonan.updateStatus', $permohonan->id) }}" method="POST" style="display: inline; margin-right: 0.5rem;">
                                    @csrf
                                    <input type="hidden" name="status" value="selesai">
                                    <button type="submit" class="btn btn-success">Selesai</button>
                                </form>
                                <form action="{{ route('admin.permohonan.updateStatus', $permohonan->id) }}" method="POST" style="display: inline;">
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
                        Belum ada data permohonan.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    
    @if($permohonans->hasPages())
        <div style="margin-top: 1rem;">
            {{ $permohonans->links() }}
        </div>
    @endif
</div>
@endsection
