@extends('admin.layout')

@section('title', 'Prosedur Pengajuan Keberatan - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Prosedur Pengajuan Keberatan</h1>
        <div>
            <a href="{{ route('admin.prosedur-pengajuan-keberatan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Prosedur
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
                            <th>Judul Prosedur</th>
                            <th>Alasan Keberatan</th>
                            <th>Waktu Proses</th>
                            <th>Dokumen</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prosedurKeberatan ?? [] as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $item->judul ?? '-' }}</strong>
                                    @if($item->deskripsi)
                                        <br><small class="text-muted">{{ Str::limit($item->deskripsi, 100) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($item->alasan_keberatan)
                                        <span class="badge bg-danger">{{ $item->alasan_keberatan }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->waktu_proses)
                                        <span class="badge bg-warning text-dark">{{ $item->waktu_proses }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
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
                                        <a href="{{ route('admin.prosedur-pengajuan-keberatan.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit">
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
                                <td colspan="7" class="text-center py-4">
                                    <i class="fas fa-exclamation-triangle fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data prosedur pengajuan keberatan</p>
                                    <a href="{{ route('admin.prosedur-pengajuan-keberatan.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah Prosedur
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
        </table>
    </div>

            @if(isset($prosedurKeberatan) && $prosedurKeberatan->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Menampilkan {{ $prosedurKeberatan->firstItem() }} - {{ $prosedurKeberatan->lastItem() }} dari {{ $prosedurKeberatan->total() }} data</small>
                    {{ $prosedurKeberatan->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('admin.prosedur-pengajuan-keberatan.destroy', ['id' => ':id']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
function confirmDelete(id) {
    if(confirm('Apakah Anda yakin ingin menghapus prosedur ini?')) {
        document.getElementById('deleteId').value = id;
        const form = document.getElementById('deleteForm');
        form.action = form.action.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
