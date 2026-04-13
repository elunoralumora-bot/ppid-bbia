@extends('admin.layout')

@section('title', 'Daftar Informasi Publik Online - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Daftar Informasi Publik Online</h1>
        <div>
            <a href="{{ route('admin.daftar-informasi-publik-online.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Informasi
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
                            <th>Judul Informasi</th>
                            <th>Kategori</th>
                            <th>Format</th>
                            <th>Tanggal Update</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($daftarInformasiPublikOnline ?? [] as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $item->judul ?? '-' }}</strong>
                                    @if($item->deskripsi)
                                        <br><small class="text-muted">{{ Str::limit($item->deskripsi, 100) }}</small>
                                    @endif
                                    @if($item->link)
                                        <br><small class="text-primary">
                                            <i class="fas fa-link me-1"></i>{{ $item->link }}
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $item->kategori ?? 'DIP Online' }}</span>
                                </td>
                                <td>
                                    @if($item->format)
                                        <span class="badge bg-light text-dark">{{ $item->format }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->tanggal_update ? \Carbon\Carbon::parse($item->tanggal_update)->format('d/m/Y') : '-' }}</td>
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
                                        <a href="{{ route('admin.daftar-informasi-publik-online.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit">
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
                                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data daftar informasi publik online</p>
                                    <a href="{{ route('admin.daftar-informasi-publik-online.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah Informasi
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
        </table>
    </div>

            @if(isset($daftarInformasiPublikOnline) && $daftarInformasiPublikOnline->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Menampilkan {{ $daftarInformasiPublikOnline->firstItem() }} - {{ $daftarInformasiPublikOnline->lastItem() }} dari {{ $daftarInformasiPublikOnline->total() }} data</small>
                    {{ $daftarInformasiPublikOnline->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('admin.daftar-informasi-publik-online.destroy', ['id' => ':id']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
function confirmDelete(id) {
    if(confirm('Apakah Anda yakin ingin menghapus informasi ini?')) {
        document.getElementById('deleteId').value = id;
        const form = document.getElementById('deleteForm');
        form.action = form.action.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
