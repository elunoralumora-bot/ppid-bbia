@extends('admin.layout')

@section('title', 'Regulasi - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Regulasi</h1>
        <div>
            <a href="{{ route('admin.regulasi.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Regulasi
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
                    <th>Judul Regulasi</th>
                    <th>Nomor</th>
                    <th>Tahun</th>
                    <th>Jenis</th>
                    <th>Tanggal Ditetapkan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($regulasi ?? [] as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $item->judul ?? '-' }}</strong>
                            @if($item->deskripsi)
                                <br><small class="text-muted">{{ Str::limit($item->deskripsi, 100) }}</small>
                            @endif
                            @if($item->file_path)
                                <br><small class="text-success">
                                    <i class="fas fa-file-pdf me-1"></i>File tersedia
                                </small>
                            @endif
                        </td>
                        <td>{{ $item->nomor ?? '-' }}</td>
                        <td>{{ $item->tahun ?? '-' }}</td>
                        <td>
                            @if($item->jenis)
                                <span class="badge bg-primary">{{ $item->jenis }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->tanggal_ditetapkan ? \Carbon\Carbon::parse($item->tanggal_ditetapkan)->format('d/m/Y') : '-' }}</td>
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
                                <a href="{{ route('admin.regulasi.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($item->file_path)
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-outline-success" title="Download">
                                        <i class="fas fa-download"></i>
                                    </a>
                                @endif
                                <button type="button" class="btn btn-outline-danger" onclick="confirmDelete('{{ $item->id }}')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="fas fa-gavel fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada data regulasi</p>
                            <a href="{{ route('admin.regulasi.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Tambah Regulasi
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($regulasi) && $regulasi->hasPages())
        <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">Menampilkan {{ $regulasi->firstItem() }} - {{ $regulasi->lastItem() }} dari {{ $regulasi->total() }} data</small>
            {{ $regulasi->links() }}
        </div>
    @endif
</div>

<form id="deleteForm" action="{{ route('admin.regulasi.destroy', ['id' => ':id']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
function confirmDelete(id) {
    if(confirm('Apakah Anda yakin ingin menghapus regulasi ini?')) {
        document.getElementById('deleteId').value = id;
        const form = document.getElementById('deleteForm');
        form.action = form.action.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
