@extends('admin.layout')

@section('title', 'Profil - PPID BBIA')
@section('page-title', 'Manajemen Profil Publik')

@push('styles')
<style>
    .profile-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding: 1.5rem 0;
    }
    
    .profile-title {
        color: #1f2937;
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }
    
    .profile-subtitle {
        color: #6b7280;
        font-size: 0.95rem;
        margin: 0.5rem 0 0 0;
    }
    
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        text-align: center;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 700;
        color: #3b82f6;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: #6b7280;
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    .table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        border: 1px solid #e5e7eb;
    }
    
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }
    
    .table th {
        background: #f8fafc;
        padding: 1rem 1.5rem;
        text-align: left;
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.025em;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .table td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #f3f4f6;
        vertical-align: middle;
    }
    
    .table tbody tr:hover {
        background: #f8fafc;
    }
    
    .table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .category-badge {
        display: inline-flex;
            align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.825rem;
        font-weight: 500;
    }
    
    .kategori-visi { background: #dbeafe; color: #1e40af; }
    .kategori-struktur { background: #dcfce7; color: #166534; }
    .kategori-tugas { background: #fef3c7; color: #92400e; }
    .kategori-pejabat { background: #ede9fe; color: #5b21b6; }
    .kategori-kontak { background: #fee2e2; color: #991b1b; }
    .kategori-maklumat { background: #fee2e2; color: #991b1b; }
    .kategori-hukum { background: #e0e7ff; color: #3730a3; }
    .kategori-program { background: #f0fdf4; color: #166534; }
    .kategori-lainnya { background: #f9fafb; color: #374151; }
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.825rem;
        font-weight: 500;
    }
    
    .status-active {
        background: #dcfce7;
        color: #166534;
    }
    
    .status-inactive {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }
    
    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        font-weight: 500;
    }
    
    .btn-edit {
        background: #3b82f6;
        color: white;
    }
    
    .btn-edit:hover {
        background: #2563eb;
        transform: translateY(-1px);
    }
    
    .btn-delete {
        background: #ef4444;
        color: white;
    }
    
    .btn-delete:hover {
        background: #dc2626;
        transform: translateY(-1px);
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #6b7280;
    }
    
    .empty-icon {
        font-size: 4rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }
    
    .empty-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }
    
    .empty-description {
        margin-bottom: 2rem;
        line-height: 1.6;
    }
    
    .order-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        background: #f3f4f6;
        border-radius: 50%;
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
    }
    
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endpush

@section('content')
<!-- Header Section -->
<div class="profile-header">
    <div>
        <h1 class="profile-title">Manajemen Profil Publik</h1>
        <p class="profile-subtitle">Kelola informasi profil yang akan ditampilkan di website publik PPID BBIA</p>
    </div>
    <a href="{{ route('admin.profil.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Profil Baru
    </a>
</div>

<!-- Statistics Section -->
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-number">{{ $profils->count() }}</div>
        <div class="stat-label">Total Profil</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $profils->where('is_active', true)->count() }}</div>
        <div class="stat-label">Aktif di Publik</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $profils->where('is_active', false)->count() }}</div>
        <div class="stat-label">Tidak Aktif</div>
    </div>
</div>

<!-- Table Section -->
@if($profils->count() > 0)
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Kategori</th>
                    <th>Judul Profil</th>
                    <th style="width: 80px;">Urutan</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profils->sortBy('urutan') as $index => $profil)
                    <tr>
                        <td>
                            <span class="order-number">{{ $index + 1 }}</span>
                        </td>
                        <td>
                            <span class="category-badge kategori-{{ strtolower(str_replace(' ', '-', str_replace(' & ', '-', $profil->kategori))) }}">
                                @switch($profil->kategori)
                                    @case('Visi Misi')
                                        <i class="fas fa-eye"></i> Visi & Misi
                                        @break
                                    @case('Struktur Organisasi')
                                        <i class="fas fa-sitemap"></i> Struktur Organisasi
                                        @break
                                    @case('Tugas dan Fungsi')
                                        <i class="fas fa-tasks"></i> Tugas & Fungsi
                                        @break
                                    @case('Profil Pejabat')
                                        <i class="fas fa-user-tie"></i> Profil Pejabat
                                        @break
                                    @case('Kontak PPID')
                                        <i class="fas fa-phone"></i> Kontak PPID
                                        @break
                                    @case('Maklumat Pelayanan')
                                        <i class="fas fa-file-contract"></i> Maklumat Pelayanan
                                        @break
                                    @case('Dasar Hukum')
                                        <i class="fas fa-gavel"></i> Dasar Hukum
                                        @break
                                    @case('Program Kerja')
                                        <i class="fas fa-chart-line"></i> Program Kerja
                                        @break
                                    @default
                                        <i class="fas fa-folder"></i> {{ $profil->kategori }}
                                @endswitch
                            </span>
                        </td>
                        <td>
                            <div>
                                <strong style="color: #1f2937; display: block; margin-bottom: 0.25rem;">{{ $profil->judul }}</strong>
                                <small style="color: #6b7280; font-size: 0.825rem;">{{ Str::limit(strip_tags($profil->konten), 80) }}</small>
                            </div>
                        </td>
                        <td>
                            <span class="order-number">{{ $profil->urutan }}</span>
                        </td>
                        <td>
                            <span class="status-badge {{ $profil->is_active ? 'status-active' : 'status-inactive' }}">
                                <i class="fas {{ $profil->is_active ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                {{ $profil->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.profil.edit', $profil->id) }}" class="btn-sm btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.profil.destroy', $profil->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-delete" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus profil \''{{ $profil->judul }}'\' ?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">
            <i class="fas fa-folder-open"></i>
        </div>
        <h3 class="empty-title">Belum Ada Profil</h3>
        <p class="empty-description">
            Mulai dengan menambahkan profil pertama untuk website publik PPID BBIA Anda.<br>
            Profil yang ditambahkan akan ditampilkan di halaman publik website.
        </p>
        <a href="{{ route('admin.profil.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Profil Pertama
        </a>
    </div>
@endif
@endsection
