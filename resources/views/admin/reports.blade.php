@extends('admin.layout')

@section('title', 'Laporan Admin - PPID BBIA')
@section('page-title', 'Laporan Admin')

@section('content')
<div class="table-container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; padding: 1.5rem 1.5rem 0;">
        <h2 style="margin: 0; color: #0f2338; font-size: 1.25rem; font-weight: 700;">Laporan Administrasi PPID</h2>
        <div style="display: flex; gap: 1rem;">
            <button class="btn btn-success" onclick="exportPDF()">
                <i class="fas fa-file-pdf"></i>
                Export PDF
            </button>
            <button class="btn btn-warning" onclick="exportExcel()">
                <i class="fas fa-file-excel"></i>
                Export Excel
            </button>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div style="padding: 0 1.5rem 1.5rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
            <div style="background: linear-gradient(135deg, #fef3c7 0%, #fed7aa 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #92400e;">{{ \App\Models\Permohonan::count() }}</div>
                <div style="font-size: 0.875rem; color: #78350f;">Total Permohonan</div>
                <div style="font-size: 0.75rem; color: #92400e; margin-top: 0.25rem;">{{ \App\Models\Permohonan::whereYear('tanggal_permohonan', date('Y'))->count() }} tahun ini</div>
            </div>
            <div style="background: linear-gradient(135deg, #fef3c7 0%, #fed7aa 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #92400e;">{{ \App\Models\Permohonan::where('status', 'baru')->count() }}</div>
                <div style="font-size: 0.875rem; color: #78350f;">Permohonan Baru</div>
                <div style="font-size: 0.75rem; color: #92400e; margin-top: 0.25rem;">{{ \App\Models\Permohonan::where('status', 'baru')->whereYear('tanggal_permohonan', date('Y'))->count() }} tahun ini</div>
            </div>
            <div style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #1e40af;">{{ \App\Models\Permohonan::where('status', 'diproses')->count() }}</div>
                <div style="font-size: 0.875rem; color: #1e3a8a;">Sedang Diproses</div>
                <div style="font-size: 0.75rem; color: #1e40af; margin-top: 0.25rem;">{{ \App\Models\Permohonan::where('status', 'diproses')->whereYear('tanggal_proses', date('Y'))->count() }} tahun ini</div>
            </div>
            <div style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #065f46;">{{ \App\Models\Permohonan::where('status', 'selesai')->count() }}</div>
                <div style="font-size: 0.875rem; color: #047857;">Selesai</div>
                <div style="font-size: 0.75rem; color: #065f46; margin-top: 0.25rem;">{{ \App\Models\Permohonan::where('status', 'selesai')->whereYear('tanggal_selesai', date('Y'))->count() }} tahun ini</div>
            </div>
            <div style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #991b1b;">{{ \App\Models\Permohonan::where('status', 'ditolak')->count() }}</div>
                <div style="font-size: 0.875rem; color: #7f1d1d;">Ditolak</div>
                <div style="font-size: 0.75rem; color: #991b1b; margin-top: 0.25rem;">{{ \App\Models\Permohonan::where('status', 'ditolak')->whereYear('tanggal_selesai', date('Y'))->count() }} tahun ini</div>
            </div>
            <div style="background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%); border-radius: 12px; padding: 1rem; text-align: center;">
                <div style="font-size: 1.5rem; font-weight: 700; color: #4338ca;">{{ \App\Models\Keberatan::count() }}</div>
                <div style="font-size: 0.875rem; color: #4c1d95;">Total Keberatan</div>
                <div style="font-size: 0.75rem; color: #4338ca; margin-top: 0.25rem;">{{ \App\Models\Keberatan::whereYear('tanggal_keberatan', date('Y'))->count() }} tahun ini</div>
            </div>
        </div>
    </div>
    
    <!-- Tabel Laporan Bulanan -->
    <div style="padding: 0 1.5rem 1.5rem;">
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Permohonan Baru</th>
                    <th>Sedang Diproses</th>
                    <th>Selesai</th>
                    <th>Ditolak</th>
                    <th>Keberatan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    $currentYear = date('Y');
                @endphp
                
                @for($i = 1; $i <= 12; $i++)
                    @php
                        $monthName = $months[$i-1];
                        $permohonanBaru = \App\Models\Permohonan::whereMonth('tanggal_permohonan', $i)->whereYear('tanggal_permohonan', $currentYear)->count();
                        $diproses = \App\Models\Permohonan::where('status', 'diproses')->whereMonth('tanggal_proses', $i)->whereYear('tanggal_proses', $currentYear)->count();
                        $selesai = \App\Models\Permohonan::where('status', 'selesai')->whereMonth('tanggal_selesai', $i)->whereYear('tanggal_selesai', $currentYear)->count();
                        $ditolak = \App\Models\Permohonan::where('status', 'ditolak')->whereMonth('tanggal_selesai', $i)->whereYear('tanggal_selesai', $currentYear)->count();
                        $keberatan = \App\Models\Keberatan::whereMonth('tanggal_keberatan', $i)->whereYear('tanggal_keberatan', $currentYear)->count();
                        $total = $permohonanBaru;
                    @endphp
                    
                    <tr>
                        <td>{{ $monthName }}</td>
                        <td>{{ $permohonanBaru }}</td>
                        <td>{{ $diproses }}</td>
                        <td>{{ $selesai }}</td>
                        <td>{{ $ditolak }}</td>
                        <td>{{ $keberatan }}</td>
                        <td><strong>{{ $total }}</strong></td>
                    </tr>
                @endfor
                
                <!-- Total Row -->
                <tr style="background: #f8f9fa; font-weight: bold;">
                    <td>TOTAL</td>
                    <td>{{ \App\Models\Permohonan::whereYear('tanggal_permohonan', $currentYear)->count() }}</td>
                    <td>{{ \App\Models\Permohonan::where('status', 'diproses')->whereYear('tanggal_proses', $currentYear)->count() }}</td>
                    <td>{{ \App\Models\Permohonan::where('status', 'selesai')->whereYear('tanggal_selesai', $currentYear)->count() }}</td>
                    <td>{{ \App\Models\Permohonan::where('status', 'ditolak')->whereYear('tanggal_selesai', $currentYear)->count() }}</td>
                    <td>{{ \App\Models\Keberatan::whereYear('tanggal_keberatan', $currentYear)->count() }}</td>
                    <td>{{ \App\Models\Permohonan::whereYear('tanggal_permohonan', $currentYear)->count() }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
function exportPDF() {
    alert('Export PDF akan segera tersedia');
    // Implementasi export PDF
}

function exportExcel() {
    alert('Export Excel akan segera tersedia');
    // Implementasi export Excel
}
</script>

@endsection
