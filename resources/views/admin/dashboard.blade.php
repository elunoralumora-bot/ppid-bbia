@extends('admin.layout')

@section('title', 'Dashboard Admin - PPID BBIA')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Dashboard Stats -->
    <div class="dashboard-stats">
        <div class="stat-card">
            <h3>Total Berita</h3>
            <div class="number">{{ @class_exists('App\Models\Berita') ? \App\Models\Berita::count() : 0 }}</div>
            <div class="stat-detail">
                <span class="published">{{ @class_exists('App\Models\Berita') ? \App\Models\Berita::where('status', 'published')->count() : 0 }} Dipublikasikan</span>
                <span class="draft">{{ @class_exists('App\Models\Berita') ? \App\Models\Berita::where('status', 'draft')->count() : 0 }} Draft</span>
            </div>
        </div>
        <div class="stat-card">
            <h3>Permohonan</h3>
            <div class="number">{{ @class_exists('App\Models\Permohonan') ? \App\Models\Permohonan::count() : 0 }}</div>
            <div class="stat-detail">
                <span class="baru">{{ @class_exists('App\Models\Permohonan') ? \App\Models\Permohonan::where('status', 'baru')->count() : 0 }} Baru</span>
                <span class="proses">{{ @class_exists('App\Models\Permohonan') ? \App\Models\Permohonan::where('status', 'diproses')->count() : 0 }} Diproses</span>
            </div>
        </div>
        <div class="stat-card">
            <h3>Keberatan</h3>
            <div class="number">{{ @class_exists('App\Models\Keberatan') ? \App\Models\Keberatan::count() : 0 }}</div>
            <div class="stat-detail">
                <span class="baru">{{ @class_exists('App\Models\Keberatan') ? \App\Models\Keberatan::where('status', 'baru')->count() : 0 }} Baru</span>
                <span class="proses">{{ @class_exists('App\Models\Keberatan') ? \App\Models\Keberatan::where('status', 'diproses')->count() : 0 }} Diproses</span>
            </div>
        </div>
        <div class="stat-card">
            <h3>Total Konten</h3>
            <div class="number">{{ 
                (@class_exists('App\Models\Profil') ? \App\Models\Profil::count() : 0) + 
                (@class_exists('App\Models\InformasiPublik') ? \App\Models\InformasiPublik::count() : 0) + 
                (@class_exists('App\Models\StandarLayanan') ? \App\Models\StandarLayanan::count() : 0) + 
                (@class_exists('App\Models\LaporanPublik') ? \App\Models\LaporanPublik::count() : 0) 
            }}</div>
            <div class="stat-detail">
                <span>{{ @class_exists('App\Models\Profil') ? \App\Models\Profil::count() : 0 }} Profil</span>
                <span>{{ @class_exists('App\Models\InformasiPublik') ? \App\Models\InformasiPublik::count() : 0 }} Informasi</span>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="recent-activity">
        <h2>Aktivitas Terkini</h2>
        <ul class="activity-list">
            <!-- Permohonan Terbaru -->
            @if(@class_exists('App\Models\Permohonan'))
                @php
                    $permohonanTerbaru = \App\Models\Permohonan::latest()->first();
                @endphp
                @if($permohonanTerbaru)
                    <li>
                        <div class="activity-item">
                            <span class="activity-title">Permohonan baru dari {{ $permohonanTerbaru->nama_pemohon }}</span>
                            <span class="activity-date">{{ $permohonanTerbaru->created_at->diffForHumans() }}</span>
                        </div>
                    </li>
                @endif
            @endif
            
            <!-- Berita Terbaru -->
            @if(@class_exists('App\Models\Berita'))
                @php
                    $beritaTerbaru = \App\Models\Berita::latest()->first();
                @endphp
                @if($beritaTerbaru)
                    <li>
                        <div class="activity-item">
                            <span class="activity-title">Berita "{{ $beritaTerbaru->judul }}" {{ $beritaTerbaru->status == 'published' ? 'dipublikasikan' : 'dibuat' }}</span>
                            <span class="activity-date">{{ $beritaTerbaru->created_at->diffForHumans() }}</span>
                        </div>
                    </li>
                @endif
            @endif
            
            <!-- Keberatan Terbaru -->
            @if(@class_exists('App\Models\Keberatan'))
                @php
                    $keberatanTerbaru = \App\Models\Keberatan::latest()->first();
                @endphp
                @if($keberatanTerbaru)
                    <li>
                        <div class="activity-item">
                            <span class="activity-title">Keberatan dari {{ $keberatanTerbaru->nama_pemohon }}</span>
                            <span class="activity-date">{{ $keberatanTerbaru->created_at->diffForHumans() }}</span>
                        </div>
                    </li>
                @endif
            @endif
            
            <!-- Statistik Quick Info -->
            <li>
                <div class="activity-item">
                    <span class="activity-title">Total {{ @class_exists('App\Models\LaporanPublik') ? \App\Models\LaporanPublik::count() : 0 }} Laporan Publik & {{ @class_exists('App\Models\StandarLayanan') ? \App\Models\StandarLayanan::count() : 0 }} Standar Layanan tersedia</span>
                    <span class="activity-date">Sekarang</span>
                </div>
            </li>
        </ul>
    </div>
    
    <!-- Quick Actions -->
    <div class="quick-actions">
        <h2>Aksi Cepat</h2>
        <div class="action-buttons">
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita</a>
            <a href="{{ route('admin.permohonan') }}" class="btn btn-info"><i class="fas fa-eye"></i> Lihat Permohonan</a>
            <a href="{{ route('admin.keberatan') }}" class="btn btn-warning"><i class="fas fa-eye"></i> Lihat Keberatan</a>
            <a href="#" class="btn btn-success"><i class="fas fa-upload"></i> Upload Laporan</a>
        </div>
    </div>
    
    <style>
    .stat-detail {
        margin-top: 0.5rem;
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        font-size: 0.8rem;
    }
    
    .stat-detail span {
        background: rgba(255,255,255,0.2);
        padding: 0.2rem 0.5rem;
        border-radius: 10px;
    }
    
    .published { background: rgba(40, 167, 69, 0.2) !important; }
    .draft { background: rgba(255, 193, 7, 0.2) !important; }
    .baru { background: rgba(220, 53, 69, 0.2) !important; }
    .proses { background: rgba(23, 162, 184, 0.2) !important; }
    
    .quick-actions {
        margin-top: 2rem;
        padding: 1.5rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .quick-actions h2 {
        margin: 0 0 1rem 0;
        color: #0f2338;
    }
    
    .action-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .activity-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #eee;
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .activity-title {
        flex: 1;
        color: #333;
    }
    
    .activity-date {
        color: #666;
        font-size: 0.9rem;
    }
    </style>
@endsection