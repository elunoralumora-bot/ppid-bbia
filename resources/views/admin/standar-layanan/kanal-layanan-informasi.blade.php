@extends('admin.layout')

@section('title', 'Kanal Layanan Informasi - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Kanal Layanan Informasi</h1>
        <div>
            <a href="{{ route('admin.kanal-layanan-informasi.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Kanal
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
                            <th>Nama Kanal</th>
                            <th>Jenis</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kanalLayanan ?? [] as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $item->nama_kanal ?? '-' }}</strong>
                                    @if($item->deskripsi)
                                        <br><small class="text-muted">{{ Str::limit($item->deskripsi, 100) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($item->jenis)
                                        <span class="badge bg-info">{{ $item->jenis }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->kontak)
                                        <span class="badge bg-primary">{{ $item->kontak }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->alamat)
                                        <small class="text-muted">{{ Str::limit($item->alamat, 50) }}</small>
                                    @else
                                        <span class="text-muted">-</span>
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
                                        <a href="{{ route('admin.kanal-layanan-informasi.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit">
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
                                    <i class="fas fa-plug fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data kanal layanan informasi</p>
                                    <a href="{{ route('admin.kanal-layanan-informasi.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah Kanal
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if(isset($kanalLayanan) && $kanalLayanan->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Menampilkan {{ $kanalLayanan->firstItem() }} - {{ $kanalLayanan->lastItem() }} dari {{ $kanalLayanan->total() }} data</small>
                    {{ $kanalLayanan->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('admin.kanal-layanan-informasi.destroy', ['id' => ':id']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
function confirmDelete(id) {
    if(confirm('Apakah Anda yakin ingin menghapus kanal ini?')) {
        document.getElementById('deleteId').value = id;
        const form = document.getElementById('deleteForm');
        form.action = form.action.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
