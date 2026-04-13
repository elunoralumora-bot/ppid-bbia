@extends('admin.layout')

@section('title', 'SOP PPID - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">SOP PPID</h1>
        <div>
            <a href="{{ route('admin.sop-ppid.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah SOP
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul SOP</th>
                            <th>Kategori</th>
                            <th>Versi</th>
                            <th>Tanggal Berlaku</th>
                            <th>Dokumen</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sopPpid ?? [] as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $item->judul ?? '-' }}</strong>
                                    @if($item->deskripsi)
                                        <br><small class="text-muted">{{ Str::limit($item->deskripsi, 100) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($item->kategori)
                                        <span class="badge bg-info">{{ $item->kategori }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->versi)
                                        <span class="badge bg-secondary">{{ $item->versi }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->tanggal_berlaku ? \Carbon\Carbon::parse($item->tanggal_berlaku)->format('d/m/Y') : '-' }}</td>
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
                                        <a href="{{ route('admin.sop-ppid.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit">
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
                                    <i class="fas fa-tasks fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data SOP PPID</p>
                                    <a href="{{ route('admin.sop-ppid.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah SOP
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(isset($sopPpid) && $sopPpid->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Menampilkan {{ $sopPpid->firstItem() }} - {{ $sopPpid->lastItem() }} dari {{ $sopPpid->total() }} data</small>
                    {{ $sopPpid->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('admin.sop-ppid.destroy', ['id' => ':id']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
function confirmDelete(id) {
    if(confirm('Apakah Anda yakin ingin menghapus SOP ini?')) {
        document.getElementById('deleteId').value = id;
        const form = document.getElementById('deleteForm');
        form.action = form.action.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
