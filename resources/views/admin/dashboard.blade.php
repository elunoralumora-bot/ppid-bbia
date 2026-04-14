@extends('admin.layout')

@section('title', 'Dashboard Admin - PPID BBIA')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Dashboard Stats -->
    <div class="dashboard-stats">
        <div class="stat-card berita-card">
            <div class="stat-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-content">
                <h3>Total Berita</h3>
                <div class="number">{{ App\Models\Berita::count() }}</div>
                <div class="stat-detail">
                    <span class="published">{{ App\Models\Berita::where('status', 'published')->count() }} Dipublikasikan</span>
                    <span class="draft">{{ App\Models\Berita::where('status', 'draft')->count() }} Draft</span>
                </div>
            </div>
        </div>
        <div class="stat-card permohonan-card">
            <div class="stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-content">
                <h3>Permohonan</h3>
                <div class="number">{{ App\Models\Permohonan::count() }}</div>
                <div class="stat-detail">
                    <span class="baru">{{ App\Models\Permohonan::where('status', 'baru')->count() }} Baru</span>
                    <span class="proses">{{ App\Models\Permohonan::where('status', 'diproses')->count() }} Diproses</span>
                </div>
            </div>
        </div>
        <div class="stat-card keberatan-card">
            <div class="stat-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-content">
                <h3>Keberatan</h3>
                <div class="number">{{ App\Models\Keberatan::count() }}</div>
                <div class="stat-detail">
                    <span class="baru">{{ App\Models\Keberatan::where('status', 'baru')->count() }} Baru</span>
                    <span class="proses">{{ App\Models\Keberatan::where('status', 'diproses')->count() }} Diproses</span>
                </div>
            </div>
        </div>
        <div class="stat-card konten-card">
            <div class="stat-icon">
                <i class="fas fa-database"></i>
            </div>
            <div class="stat-content">
                <h3>Total Konten</h3>
                <div class="number">{{ App\Models\Profil::count() + App\Models\InformasiPublik::count() + App\Models\StandarLayanan::count() + App\Models\LaporanPublik::count() }}</div>
                <div class="stat-detail">
                    <span class="profil">{{ App\Models\Profil::count() }} Profil</span>
                    <span class="informasi">{{ App\Models\InformasiPublik::count() }} Informasi</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="recent-activity">
        <div class="section-header">
            <h2><i class="fas fa-clock"></i> Aktivitas Terkini</h2>
        </div>
        <ul class="activity-list">
            <!-- Permohonan Terbaru -->
            @php
                $permohonanTerbaru = App\Models\Permohonan::latest()->first();
            @endphp
            @if($permohonanTerbaru)
                <li>
                    <div class="activity-item">
                        <div class="activity-icon permohonan-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="activity-content">
                            <span class="activity-title">Permohonan baru dari {{ $permohonanTerbaru->nama_pemohon }}</span>
                            <span class="activity-date">{{ $permohonanTerbaru->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </li>
            @endif
            
            <!-- Berita Terbaru -->
            @php
                $beritaTerbaru = App\Models\Berita::latest()->first();
            @endphp
            @if($beritaTerbaru)
                <li>
                    <div class="activity-item">
                        <div class="activity-icon berita-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="activity-content">
                            <span class="activity-title">Berita "{{ $beritaTerbaru->judul }}" {{ $beritaTerbaru->status == 'published' ? 'dipublikasikan' : 'dibuat' }}</span>
                            <span class="activity-date">{{ $beritaTerbaru->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </li>
            @endif
            
            <!-- Keberatan Terbaru -->
            @php
                $keberatanTerbaru = App\Models\Keberatan::latest()->first();
            @endphp
            @if($keberatanTerbaru)
                <li>
                    <div class="activity-item">
                        <div class="activity-icon keberatan-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <span class="activity-title">Keberatan dari {{ $keberatanTerbaru->nama_pemohon }}</span>
                            <span class="activity-date">{{ $keberatanTerbaru->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </li>
            @endif
            
            <!-- Statistik Quick Info -->
            <li>
                <div class="activity-item">
                    <div class="activity-icon info-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="activity-content">
                        <span class="activity-title">Total {{ App\Models\LaporanPublik::count() }} Laporan Publik & {{ App\Models\StandarLayanan::count() }} Standar Layanan tersedia</span>
                        <span class="activity-date">Sekarang</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    
    <!-- Quick Actions -->
    <div class="quick-actions">
        <div class="section-header">
            <h2><i class="fas fa-bolt"></i> Aksi Cepat</h2>
        </div>
        <div class="action-grid">
            <a href="{{ route('admin.berita.create') }}" class="action-card primary-action">
                <div class="action-icon">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="action-content">
                    <h4>Tambah Berita</h4>
                    <p>Buat berita baru</p>
                </div>
            </a>
            <a href="{{ route('admin.permohonan') }}" class="action-card info-action">
                <div class="action-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="action-content">
                    <h4>Lihat Permohonan</h4>
                    <p>Kelola permohonan</p>
                </div>
            </a>
            <a href="{{ route('admin.keberatan') }}" class="action-card warning-action">
                <div class="action-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="action-content">
                    <h4>Lihat Keberatan</h4>
                    <p>Kelola keberatan</p>
                </div>
            </a>
            <a href="{{ route('admin.laporan-tahunan-ppid.create') }}" class="action-card success-action">
                <div class="action-icon">
                    <i class="fas fa-upload"></i>
                </div>
                <div class="action-content">
                    <h4>Upload Laporan</h4>
                    <p>Tambah laporan baru</p>
                </div>
            </a>
        </div>
    </div>
    
    <style>
    /* Dashboard Stats */
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
        border-radius: 12px;
        padding: 1rem;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: white;
    }
    
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }
    
    .berita-card { border-left-color: #28a745; }
    .permohonan-card { border-left-color: #007bff; }
    .keberatan-card { border-left-color: #ffc107; }
    .konten-card { border-left-color: #6f42c1; }
    
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
        flex-shrink: 0;
    }
    
    .berita-card .stat-icon { background: linear-gradient(135deg, #28a745, #20c997); }
    .permohonan-card .stat-icon { background: linear-gradient(135deg, #007bff, #0056b3); }
    .keberatan-card .stat-icon { background: linear-gradient(135deg, #ffc107, #e0a800); }
    .konten-card .stat-icon { background: linear-gradient(135deg, #6f42c1, #5a2d82); }
    
    .stat-content {
        flex: 1;
    }
    
    .stat-content h3 {
        margin: 0 0 0.25rem 0;
        color: white;
        font-size: 0.875rem;
        font-weight: 600;
        opacity: 0.9;
    }
    
    .number {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        line-height: 1;
    }
    
    .stat-detail {
        display: flex;
        gap: 0.25rem;
        flex-wrap: wrap;
    }
    
    .stat-detail span {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.125rem 0.5rem;
        border-radius: 12px;
        font-size: 0.625rem;
        font-weight: 500;
    }
    
    .published { background: rgba(40, 167, 69, 0.3) !important; color: white !important; }
    .draft { background: rgba(255, 193, 7, 0.3) !important; color: white !important; }
    .baru { background: rgba(220, 53, 69, 0.3) !important; color: white !important; }
    .proses { background: rgba(23, 162, 184, 0.3) !important; color: white !important; }
    .profil { background: rgba(111, 66, 193, 0.3) !important; color: white !important; }
    .informasi { background: rgba(108, 117, 125, 0.3) !important; color: white !important; }
    
    /* Recent Activity */
    .recent-activity {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }
    
    .section-header {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f8f9fa;
    }
    
    .section-header h2 {
        margin: 0;
        color: #2c3e50;
        font-size: 1.25rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .section-header h2 i {
        color: #007bff;
    }
    
    .activity-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 1px solid #f8f9fa;
        transition: all 0.2s ease;
    }
    
    .activity-item:hover {
        background: #f8f9fa;
        margin: 0 -1rem;
        padding: 1rem;
    }
    
    .activity-item:last-child {
        border-bottom: none;
    }
    
    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
        margin-top: 0.25rem;
    }
    
    .permohonan-icon { background: linear-gradient(135deg, #007bff, #0056b3); }
    .berita-icon { background: linear-gradient(135deg, #28a745, #20c997); }
    .keberatan-icon { background: linear-gradient(135deg, #ffc107, #e0a800); }
    .info-icon { background: linear-gradient(135deg, #17a2b8, #138496); }
    
    .activity-content {
        flex: 1;
    }
    
    .activity-title {
        display: block;
        color: #2c3e50;
        font-weight: 500;
        margin-bottom: 0.25rem;
    }
    
    .activity-date {
        color: #6c757d;
        font-size: 0.875rem;
    }
    
    /* Quick Actions */
    .quick-actions {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }
    
    .action-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .action-card:hover {
        transform: translateY(-2px);
        text-decoration: none;
    }
    
    .primary-action {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
    }
    
    .primary-action:hover {
        background: linear-gradient(135deg, #0056b3, #007bff);
    }
    
    .info-action {
        background: linear-gradient(135deg, #17a2b8, #138496);
        color: white;
    }
    
    .info-action:hover {
        background: linear-gradient(135deg, #138496, #17a2b8);
    }
    
    .warning-action {
        background: linear-gradient(135deg, #ffc107, #e0a800);
        color: white;
    }
    
    .warning-action:hover {
        background: linear-gradient(135deg, #e0a800, #ffc107);
    }
    
    .success-action {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
    }
    
    .success-action:hover {
        background: linear-gradient(135deg, #20c997, #28a745);
    }
    
    .action-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .action-content h4 {
        margin: 0 0 0.25rem 0;
        font-size: 1rem;
        font-weight: 600;
    }
    
    .action-content p {
        margin: 0;
        font-size: 0.875rem;
        opacity: 0.9;
    }
    
    /* Responsive */
    @media (max-width: 1200px) {
        .dashboard-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-stats {
            grid-template-columns: 1fr;
        }
        
        .stat-card {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .stat-icon {
            margin: 0 auto;
        }
        
        .action-grid {
            grid-template-columns: 1fr;
        }
        
        .action-card {
            flex-direction: column;
            text-align: center;
        }
        
        .action-icon {
            margin: 0 auto 0.5rem auto;
        }
    }
    </style>
@endsection
