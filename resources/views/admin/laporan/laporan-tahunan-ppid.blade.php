@extends('admin.layout')

@section('title', 'Laporan Tahunan PPID - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Laporan Tahunan PPID</h1>
        <div>
            <a href="{{ route('admin.laporan-tahunan-ppid.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Laporan
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
        </div>
    @endif

    <div class="table-container">
        <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Laporan</th>
                            <th>Tahun</th>
                            <th>Periode</th>
                            <th>Tanggal Publikasi</th>
                            <th>Dokumen</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporanTahunan ?? [] as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $item->judul ?? '-' }}</strong>
                                    @if($item->deskripsi)
                                        <br><small class="text-muted">{{ Str::limit($item->deskripsi, 100) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($item->tahun)
                                        <span class="badge bg-primary">{{ $item->tahun }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->periode)
                                        <span class="badge bg-info">{{ $item->periode }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->tanggal_publikasi ? \Carbon\Carbon::parse($item->tanggal_publikasi)->format('d/m/Y') : '-' }}</td>
                                <td>
                                    @if($item->file_path)
                                        <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-file-pdf me-1"></i>Download
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'published')
                                        <span class="badge bg-success">Dipublikasi</span>
                                    @elseif($item->status == 'draft')
                                        <span class="badge bg-warning">Draft</span>
                                    @else
                                        <span class="badge bg-secondary">Arsip</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('admin.laporan-tahunan-ppid.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('{{ $item->id }}')" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <i class="fas fa-chart-bar fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data laporan tahunan PPID</p>
                                    <a href="{{ route('admin.laporan-tahunan-ppid.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah Laporan
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
        </table>
    </div>

            @if(isset($laporanTahunan) && $laporanTahunan->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Menampilkan {{ $laporanTahunan->firstItem() }} - {{ $laporanTahunan->lastItem() }} dari {{ $laporanTahunan->total() }} data</small>
                    {{ $laporanTahunan->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('admin.laporan-tahunan-ppid.destroy', ['id' => ':id']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
function confirmDelete(id) {
    if(confirm('Apakah Anda yakin ingin menghapus laporan ini?')) {
        document.getElementById('deleteId').value = id;
        const form = document.getElementById('deleteForm');
        form.action = form.action.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
