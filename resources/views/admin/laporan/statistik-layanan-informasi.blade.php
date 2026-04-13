@extends('admin.layout')

@section('title', 'Statistik Layanan Informasi Publik - PPID BBIA')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Statistik Layanan Informasi Publik</h1>
        <div>
            <a href="{{ route('admin.statistik-layanan-informasi.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Statistik
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
                            <th>Judul Statistik</th>
                            <th>Tahun</th>
                            <th>Periode</th>
                            <th>Jumlah Permohonan</th>
                            <th>Permohonan Dipenuhi</th>
                            <th>Waktu Respon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($statistikLayanan ?? [] as $index => $item)
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
                                <td>
                                    @if($item->jumlah_permohonan)
                                        <span class="badge bg-secondary">{{ $item->jumlah_permohonan }}</span>
                                    @else
                                        <span class="text-muted">0</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->permohonan_dipenuhi)
                                        <span class="badge bg-success">{{ $item->permohonan_dipenuhi }}</span>
                                    @else
                                        <span class="text-muted">0</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->waktu_respon_rata)
                                        <span class="badge bg-warning text-dark">{{ $item->waktu_respon_rata }} Hari</span>
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
                                        <a href="{{ route('admin.statistik-layanan-informasi.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit">
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
                                <td colspan="9" class="text-center py-4">
                                    <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data statistik layanan informasi publik</p>
                                    <a href="{{ route('admin.statistik-layanan-informasi.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah Statistik
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
        </table>
    </div>

            @if(isset($statistikLayanan) && $statistikLayanan->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Menampilkan {{ $statistikLayanan->firstItem() }} - {{ $statistikLayanan->lastItem() }} dari {{ $statistikLayanan->total() }} data</small>
                    {{ $statistikLayanan->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('admin.statistik-layanan-informasi.destroy', ['id' => ':id']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" id="deleteId">
</form>

<script>
function confirmDelete(id) {
    if(confirm('Apakah Anda yakin ingin menghapus statistik ini?')) {
        document.getElementById('deleteId').value = id;
        const form = document.getElementById('deleteForm');
        form.action = form.action.replace(':id', id);
        form.submit();
    }
}
</script>
@endsection
