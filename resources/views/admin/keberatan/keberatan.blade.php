@extends('admin.layout')

@section('title', 'Pengajuan Keberatan - PPID BBIA')
@section('page-title', 'Pengajuan Keberatan')

@section('content')
<div class="table-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; padding: 1.5rem 1.5rem 0;">
        <h2 style="margin: 0; color: #0f2338; font-size: 1.25rem; font-weight: 700;">Daftar Pengajuan Keberatan</h2>
        <div style="display: flex; gap: 1rem;">
            <select id="statusFilter" onchange="filterByStatus()" style="padding: 0.65rem 0.85rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; background: white;">
                <option value="">Semua Status</option>
                <option value="baru" {{ request()->query('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ request()->query('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="diterima" {{ request()->query('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ request()->query('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
            <div style="position: relative;">
                <input type="text" id="searchInput" placeholder="Cari keberatan..." style="padding: 0.65rem 0.85rem 0.65rem 2.5rem; border: 1.5px solid #e2e8f0; border-radius: 8px; font-size: 0.875rem; width: 250px;">
                <i class="fas fa-search" style="position: absolute; left: 0.85rem; top: 50%; transform: translateY(-50%); color: #64748b; font-size: 0.875rem;"></i>
            </div>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div style="padding: 0 1.5rem 1.5rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
            <div style="background: linear-gradient(135deg, #fef3c7 0%, #fed7aa 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #92400e;">{{ $keberatanStats['baru'] ?? 0 }}</div>
                <div style="font-size: 0.875rem; color: #78350f;">Keberatan Baru</div>
            </div>
            <div style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #1e40af;">{{ $keberatanStats['diproses'] ?? 0 }}</div>
                <div style="font-size: 0.875rem; color: #1e3a8a;">Sedang Diproses</div>
            </div>
            <div style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #065f46;">{{ $keberatanStats['diterima'] ?? 0 }}</div>
                <div style="font-size: 0.875rem; color: #047857;">Diterima</div>
            </div>
            <div style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #991b1b;">{{ $keberatanStats['ditolak'] ?? 0 }}</div>
                <div style="font-size: 0.875rem; color: #7f1d1d;">Ditolak</div>
            </div>
        </div>
    </div>
    
    @if($keberatans->count() > 0)
        <div style="padding: 0 1.5rem 1.5rem;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemohon</th>
                        <th>Alasan Keberatan</th>
                        <th>Tanggal Keberatan</th>
                        <th>Permohonan Terkait</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keberatans as $keberatan)
                        <tr>
                            <td>{{ $keberatan->id }}</td>
                            <td>
                                <div style="font-weight: 600; color: #374151;">{{ $keberatan->nama_pemohon }}</div>
                                @if($keberatan->email)
                                    <div style="font-size: 0.8rem; color: #64748b;">{{ $keberatan->email }}</div>
                                @endif
                            </td>
                            <td>
                                <div style="max-width: 300px;">
                                    <div style="color: #374151; line-height: 1.4;">{{ Str::limit($keberatan->alasan_keberatan, 80) }}</div>
                                </div>
                            </td>
                            <td>
                                <div style="color: #374151;">{{ $keberatan->tanggal_keberatan->format('d/m/Y') }}</div>
                                <div style="font-size: 0.8rem; color: #64748b;">{{ $keberatan->tanggal_keberatan->format('H:i') }}</div>
                            </td>
                            <td>
                                @if($keberatan->permohonan)
                                    <div style="font-size: 0.875rem; color: #374151;">#{{ $keberatan->permohonan->id }}</div>
                                    <div style="font-size: 0.75rem; color: #64748b;">{{ Str::limit($keberatan->permohonan->informasi_diminta, 30) }}</div>
                                @else
                                    <span style="color: #64748b; font-size: 0.875rem;">-</span>
                                @endif
                            </td>
                            <td>
                                @if($keberatan->status == 'baru')
                                    <span class="badge badge-warning">Baru</span>
                                @elseif($keberatan->status == 'diproses')
                                    <span class="badge badge-info">Diproses</span>
                                @elseif($keberatan->status == 'diterima')
                                    <span class="badge badge-success">Diterima</span>
                                @else
                                    <span class="badge badge-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; align-items: stretch;">
                                    <a href="{{ route('admin.keberatan.show', $keberatan->id) }}" class="btn btn-sm btn-info" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.35rem; min-height: 32px; padding: 0.35rem 0.7rem;">
                                        <i class="fas fa-eye" style="font-size: 0.75rem;"></i>
                                        <span>Detail</span>
                                    </a>
                                    @if($keberatan->status == 'baru')
                                        <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="diproses">
                                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Proses keberatan ini?')" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.35rem; min-height: 32px; padding: 0.35rem 0.7rem;">
                                                <i class="fas fa-play" style="font-size: 0.75rem;"></i>
                                                <span>Proses</span>
                                            </button>
                                        </form>
                                    @elseif($keberatan->status == 'diproses')
                                        <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="diterima">
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Terima keberatan ini?')" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.35rem; min-height: 32px; padding: 0.35rem 0.7rem;">
                                                <i class="fas fa-check" style="font-size: 0.75rem;"></i>
                                                <span>Terima</span>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.keberatan.updateStatus', $keberatan->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tolak keberatan ini?')" style="display: inline-flex; align-items: center; justify-content: center; gap: 0.35rem; min-height: 32px; padding: 0.35rem 0.7rem;">
                                                <i class="fas fa-times" style="font-size: 0.75rem;"></i>
                                                <span>Tolak</span>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="text-align: center; padding: 3rem; color: #64748b;">
            <i class="fas fa-exclamation-triangle" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
            <h3 style="margin: 0 0 0.5rem 0; color: #374151;">Belum ada keberatan</h3>
            <p style="margin: 0 0 1.5rem 0;">Belum ada pengajuan keberatan yang masuk</p>
        </div>
    @endif
    
    @if($keberatans->hasPages())
        <div style="padding: 0 1.5rem 1.5rem;">
            {{ $keberatans->appends(request()->query())->links() }}
        </div>
    @endif
</div>

<script>
function filterByStatus() {
    const status = document.getElementById('statusFilter').value;
    const url = new URL(window.location);
    
    if (status) {
        url.searchParams.set('status', status);
    } else {
        url.searchParams.delete('status');
    }
    
    window.location.href = url.toString();
}

// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function(e) {
    if (e.key === 'Enter') {
        const search = this.value;
        const url = new URL(window.location);
        
        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }
        
        window.location.href = url.toString();
    }
});
</script>
@endsection
