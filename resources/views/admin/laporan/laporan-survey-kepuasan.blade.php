@extends('admin.layout')

@section('title', 'Laporan Survey Kepuasan Masyarakat - PPID BBIA')
@section('page-title', 'Laporan Survey Kepuasan Masyarakat')

@section('content')
<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Laporan Survey Kepuasan Masyarakat</h1>
        <div>
            <a href="{{ route('admin.laporan-survey-kepuasan.create') }}" class="btn btn-primary">
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
                            <th>Judul Survey</th>
                            <th>Tahun</th>
                            <th>Periode</th>
                            <th>Responden</th>
                            <th>Nilai Kepuasan</th>
                            <th>Tanggal Publikasi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporanSurvey ?? [] as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $item->judul ?? '-' }}</strong>
                                    @if($item->meta_data['deskripsi'] ?? null)
                                        <br><small class="text-muted">{{ Str::limit($item->meta_data['deskripsi'], 100) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($item->meta_data['tahun'] ?? null)
                                        <span class="badge bg-primary">{{ $item->meta_data['tahun'] }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->meta_data['periode'] ?? null)
                                        <span class="badge bg-info">{{ $item->meta_data['periode'] }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->meta_data['responden'] ?? null)
                                        <span class="badge bg-success">{{ $item->meta_data['responden'] }} Orang</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->meta_data['nilai_kepuasan'] ?? null)
                                        <span class="badge bg-warning text-dark">{{ $item->meta_data['nilai_kepuasan'] }}%</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->meta_data['tanggal_publikasi'] ? \Carbon\Carbon::parse($item->meta_data['tanggal_publikasi'])->format('d/m/Y') : '-' }}</td>
                                <td>
                                    @if(($item->meta_data['status'] ?? null) == 'published')
                                        <span class="badge bg-success">Dipublikasi</span>
                                    @elseif(($item->meta_data['status'] ?? null) == 'draft')
                                        <span class="badge bg-warning">Draft</span>
                                    @else
                                        <span class="badge bg-secondary">Arsip</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('admin.laporan-survey-kepuasan.edit', $item->id) }}" class="btn btn-outline-primary" title="Edit">
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
                                <td colspan="9" class="text-center py-4">
                                    <i class="fas fa-smile fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada data laporan survey kepuasan masyarakat</p>
                                    <a href="{{ route('admin.laporan-survey-kepuasan.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>Tambah Laporan
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
        </table>
    </div>

            @if(isset($laporanSurvey) && $laporanSurvey->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <small class="text-muted">Menampilkan {{ $laporanSurvey->firstItem() }} - {{ $laporanSurvey->lastItem() }} dari {{ $laporanSurvey->total() }} data</small>
                    {{ $laporanSurvey->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('admin.laporan-survey-kepuasan.destroy', ['id' => ':id']) }}" method="POST" style="display: none;">
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
