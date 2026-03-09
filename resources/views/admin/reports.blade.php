@extends('admin.layout')

@section('title', 'Laporan Admin - PPID BBIA')
@section('page-title', 'Laporan Admin')

@section('content')
<div class="card">
    <h2>Laporan Administrasi PPID</h2>
    
    <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
        <select class="form-control" style="width: 200px;" id="yearFilter">
            <option value="2026" {{ date('Y') == 2026 ? 'selected' : '' }}>2026</option>
            <option value="2025" {{ date('Y') == 2025 ? 'selected' : '' }}>2025</option>
            <option value="2024" {{ date('Y') == 2024 ? 'selected' : '' }}>2024</option>
            <option value="2023" {{ date('Y') == 2023 ? 'selected' : '' }}>2023</option>
        </select>
        <button class="btn btn-primary" onclick="filterReports()">Filter</button>
        <button class="btn btn-success" onclick="exportPDF()">Export PDF</button>
        <button class="btn btn-warning" onclick="exportExcel()">Export Excel</button>
    </div>
    
    <!-- Statistik Real-time -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
        <div style="background: #3498db; color: white; padding: 1.5rem; border-radius: 10px; text-align: center;">
            <h3 style="margin: 0 0 0.5rem 0;">Total Permohonan</h3>
            <div style="font-size: 2rem; font-weight: bold;">{{ App\Models\Permohonan::count() }}</div>
            <small>{{ App\Models\Permohonan::whereYear('created_at', date('Y'))->count() }} tahun ini</small>
        </div>
        <div style="background: #27ae60; color: white; padding: 1.5rem; border-radius: 10px; text-align: center;">
            <h3 style="margin: 0 0 0.5rem 0;">Diproses</h3>
            <div style="font-size: 2rem; font-weight: bold;">{{ App\Models\Permohonan::where('status', 'diproses')->count() }}</div>
            <small>{{ App\Models\Permohonan::where('status', 'diproses')->whereYear('created_at', date('Y'))->count() }} tahun ini</small>
        </div>
        <div style="background: #f39c12; color: white; padding: 1.5rem; border-radius: 10px; text-align: center;">
            <h3 style="margin: 0 0 0.5rem 0;">Selesai</h3>
            <div style="font-size: 2rem; font-weight: bold;">{{ App\Models\Permohonan::where('status', 'selesai')->count() }}</div>
            <small>{{ App\Models\Permohonan::where('status', 'selesai')->whereYear('created_at', date('Y'))->count() }} tahun ini</small>
        </div>
        <div style="background: #e74c3c; color: white; padding: 1.5rem; border-radius: 10px; text-align: center;">
            <h3 style="margin: 0 0 0.5rem 0;">Ditolak</h3>
            <div style="font-size: 2rem; font-weight: bold;">{{ App\Models\Permohonan::where('status', 'ditolak')->count() }}</div>
            <small>{{ App\Models\Permohonan::where('status', 'ditolak')->whereYear('created_at', date('Y'))->count() }} tahun ini</small>
        </div>
    </div>
    
    <!-- Tabel Laporan Bulanan -->
    <table class="table">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Permohonan Baru</th>
                <th>Diproses</th>
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
                    $permohonanBaru = App\Models\Permohonan::whereMonth('created_at', $i)->whereYear('created_at', $currentYear)->count();
                    $diproses = App\Models\Permohonan::where('status', 'diproses')->whereMonth('updated_at', $i)->whereYear('updated_at', $currentYear)->count();
                    $selesai = App\Models\Permohonan::where('status', 'selesai')->whereMonth('updated_at', $i)->whereYear('updated_at', $currentYear)->count();
                    $ditolak = App\Models\Permohonan::where('status', 'ditolak')->whereMonth('updated_at', $i)->whereYear('updated_at', $currentYear)->count();
                    $keberatan = App\Models\Keberatan::whereMonth('created_at', $i)->whereYear('created_at', $currentYear)->count();
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
                <td>{{ App\Models\Permohonan::whereYear('created_at', $currentYear)->count() }}</td>
                <td>{{ App\Models\Permohonan::where('status', 'diproses')->whereYear('updated_at', $currentYear)->count() }}</td>
                <td>{{ App\Models\Permohonan::where('status', 'selesai')->whereYear('updated_at', $currentYear)->count() }}</td>
                <td>{{ App\Models\Permohonan::where('status', 'ditolak')->whereYear('updated_at', $currentYear)->count() }}</td>
                <td>{{ App\Models\Keberatan::whereYear('created_at', $currentYear)->count() }}</td>
                <td>{{ App\Models\Permohonan::whereYear('created_at', $currentYear)->count() }}</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Additional Statistics -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
    <div class="card">
        <h3>Statistik Berita</h3>
        <div style="padding: 1rem 0;">
            <p><strong>Total:</strong> {{ App\Models\Berita::count() }} berita</p>
            <p><strong>Dipublikasikan:</strong> {{ App\Models\Berita::where('status', 'published')->count() }} berita</p>
            <p><strong>Draft:</strong> {{ App\Models\Berita::where('status', 'draft')->count() }} berita</p>
            <p><strong>Tahun ini:</strong> {{ App\Models\Berita::whereYear('created_at', $currentYear)->count() }} berita</p>
        </div>
    </div>
    
    <div class="card">
        <h3>Statistik Konten</h3>
        <div style="padding: 1rem 0;">
            <p><strong>Profil:</strong> {{ App\Models\Profil::count() }} item</p>
            <p><strong>Informasi Publik:</strong> {{ App\Models\InformasiPublik::count() }} item</p>
            <p><strong>Standar Layanan:</strong> {{ App\Models\StandarLayanan::count() }} item</p>
            <p><strong>Laporan Publik:</strong> {{ App\Models\LaporanPublik::count() }} item</p>
        </div>
    </div>
    
    <div class="card">
        <h3>Statistik User</h3>
        <div style="padding: 1rem 0;">
            <p><strong>Total Admin:</strong> {{ App\Models\Admin::count() }} admin</p>
            <p><strong>Total User:</strong> {{ App\Models\User::count() }} user</p>
            <p><strong>Aktif Hari Ini:</strong> 
                @php
                    $activeToday = App\Models\Admin::whereDate('last_login', today())->count() + 
                                  App\Models\User::whereDate('last_login', today())->count();
                @endphp
                {{ $activeToday }} user
            </p>
        </div>
    </div>
</div>

<script>
function filterReports() {
    const year = document.getElementById('yearFilter').value;
    // Implementasi filter berdasarkan tahun
    console.log('Filter tahun:', year);
    // Reload halaman dengan parameter tahun
    window.location.href = '?year=' + year;
}

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