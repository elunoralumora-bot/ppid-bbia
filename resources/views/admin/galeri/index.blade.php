@extends('admin.layout')

@section('title', 'Galeri Foto - PPID BBIA')
@section('page-title', 'Manajemen Galeri Foto')

@push('styles')
<style>
    .gallery-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0rem;
        padding: 0.5rem 0;
    }
    
    .gallery-title {
        color: #1f2937;
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }
    
    .gallery-subtitle {
        color: #6b7280;
        font-size: 0.95rem;
        margin: 0;
    }
    
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
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
    
    .controls-section {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        padding: 2rem;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
        border: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .search-box {
        display: flex;
        flex: 1;
        max-width: 600px;
        align-items: center;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        background: white;
        overflow: hidden;
        height: 44px;
        transition: all 0.3s ease;
    }
    
    .search-input {
        flex: 1;
        padding: 0.75rem 1rem;
        border: none;
        font-size: 0.9rem;
        background: transparent;
        outline: none;
    }
    
    .search-box:focus-within {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .filter-select {
        padding: 0.75rem 1rem;
        padding-right: 2.5rem;
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        font-size: 0.9rem;
        background: white;
        cursor: pointer;
        transition: all 0.3s ease;
        height: 44px;
        min-width: 150px;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3E%3C/svg%3E");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1rem;
    }
    
    .filter-select:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        background-color: #fafbfc;
    }
    
    .filter-select:hover {
        border-color: #d1d5db;
    }
    
    .bulk-actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }
    
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .gallery-item {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
        position: relative;
        min-height: 400px;
    }
    
    .gallery-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
        border-color: #3b82f6;
    }
    
    .gallery-item.selected {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .item-checkbox {
        position: absolute;
        top: 1rem;
        left: 1rem;
        z-index: 10;
        width: 20px;
        height: 20px;
        accent-color: #3b82f6;
        cursor: pointer;
    }
    
    .image-container {
        position: relative;
        width: 100%;
        height: 220px;
        overflow: hidden;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }
    
    .gallery-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover .gallery-image {
        transform: scale(1.05);
    }
    
    .status-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }
    
    .status-active {
        background: #dcfce7;
        color: #166534;
    }
    
    .status-inactive {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .category-badge {
        position: absolute;
        bottom: 1rem;
        left: 1rem;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        backdrop-filter: blur(4px);
    }
    
    .item-content {
        padding: 1.5rem;
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border-top: 1px solid #f1f5f9;
    }
    
    .item-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }
    
    .item-description {
        color: #6b7280;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .item-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 0.8rem;
        color: #9ca3af;
    }
    
    .item-actions {
        display: flex;
        gap: 0.5rem;
    }
    
    .btn-sm {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.375rem;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
        font-weight: 500;
        min-width: 80px;
        height: 36px;
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
    
    .btn-toggle {
        background: #6b7280;
        color: white;
    }
    
    .btn-toggle:hover {
        background: #4b5563;
        transform: translateY(-1px);
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #6b7280;
        background: white;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
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
    
    @media (max-width: 768px) {
        .gallery-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .controls-section {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-box {
            max-width: none;
        }
        
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1rem;
        }
        
        .item-actions {
            flex-direction: column;
        }
    }
</style>
@endpush

@section('content')
<!-- Header Section -->
<div class="gallery-header">
</div>

<!-- Statistics Section -->
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-number">{{ $stats['total'] }}</div>
        <div class="stat-label">Total Foto</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $stats['active'] }}</div>
        <div class="stat-label">Aktif di Publik</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $stats['inactive'] }}</div>
        <div class="stat-label">Tidak Aktif</div>
    </div>
</div>

<!-- Controls Section -->
<div class="controls-section">
    <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap; justify-content: space-between; width: 100%;">
        <div class="search-box">
            <input type="text" id="searchInput" class="search-input" placeholder="Cari foto...">
            <button onclick="searchPhotos()" style="border: none; background: transparent; color: #6b7280; padding: 0.75rem 1rem; cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-search"></i>
            </button>
        </div>
        
        <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
            <select id="categoryFilter" class="filter-select" onchange="filterByCategory()">
                <option value="">Semua Kategori</option>
                @foreach($galeri->pluck('kategori')->unique()->sort() as $kategori)
                    <option value="{{ $kategori }}">{{ $kategori }}</option>
                @endforeach
            </select>
            
            <select id="statusFilter" class="filter-select" onchange="filterByStatus()">
                <option value="">Semua Status</option>
                <option value="active">Aktif</option>
                <option value="inactive">Tidak Aktif</option>
            </select>
            
            <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary" style="height: 44px; padding: 0.75rem 1.5rem; border-radius: 10px; font-size: 0.9rem; font-weight: 600; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);">
                <i class="fas fa-plus"></i> Tambah Foto Baru
            </a>
        </div>
    </div>
    
    <div class="bulk-actions" id="bulkActions" style="display: none;">
        <span style="color: #6b7280; font-size: 0.9rem;">
            <span id="selectedCount">0</span> dipilih
        </span>
        <select id="bulkActionSelect" class="filter-select" style="width: auto;">
            <option value="">Pilih Aksi</option>
            <option value="activate">Aktifkan</option>
            <option value="deactivate">Nonaktifkan</option>
            <option value="delete">Hapus</option>
        </select>
        <button onclick="performBulkAction()" class="btn btn-primary btn-sm">
            <i class="fas fa-play"></i> Eksekusi
        </button>
    </div>
</div>

<!-- Gallery Grid -->
@if($galeri->count() > 0)
    <div class="gallery-grid" id="galleryGrid">
        @foreach($galeri as $foto)
            <div class="gallery-item" data-id="{{ $foto->id }}" data-category="{{ $foto->kategori }}" data-status="{{ $foto->is_active ? 'active' : 'inactive' }}">
                <input type="checkbox" class="item-checkbox" onchange="toggleSelection({{ $foto->id }})">
                
                <div class="image-container">
                    <img src="{{ $foto->thumbnail_url }}" alt="{{ $foto->judul }}" class="gallery-image">
                    
                    <span class="status-badge {{ $foto->is_active ? 'status-active' : 'status-inactive' }}">
                        {{ $foto->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                    
                    <span class="category-badge">
                        {{ $foto->kategori }}
                    </span>
                </div>
                
                <div class="item-content">
                    <h3 class="item-title">{{ $foto->judul }}</h3>
                    
                    @if($foto->deskripsi)
                        <p class="item-description">{{ $foto->deskripsi }}</p>
                    @endif
                    
                    <div class="item-meta">
                        <span><i class="fas fa-sort-numeric-up"></i> Urutan {{ $foto->urutan }}</span>
                        <span><i class="fas fa-file"></i> {{ $foto->formatted_file_size }}</span>
                    </div>
                    
                    <div class="item-actions">
                        <a href="{{ route('admin.galeri.edit', $foto->id) }}" class="btn-sm btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        
                        <form action="{{ route('admin.galeri.toggle', $foto->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn-sm btn-toggle" 
                                    title="{{ $foto->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                <i class="fas {{ $foto->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.galeri.destroy', $foto->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-delete" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus foto \'{{ $foto->judul }}\' ?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">
            <i class="fas fa-images"></i>
        </div>
        <h3 class="empty-title">Belum Ada Foto</h3>
        <p class="empty-description">
            Mulai dengan menambahkan foto pertama untuk website publik PPID BBIA Anda.<br>
            Foto yang ditambahkan akan ditampilkan di halaman galeri publik website.
        </p>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Foto Pertama
        </a>
    </div>
@endif

<!-- Bulk Action Form -->
<form id="bulkActionForm" action="{{ route('admin.galeri.bulk') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="action" id="bulkAction">
    <input type="hidden" name="selected_ids" id="selectedIds">
</form>

<script>
let selectedItems = new Set();

function toggleSelection(id) {
    const item = document.querySelector(`[data-id="${id}"]`);
    const checkbox = item.querySelector('.item-checkbox');
    
    if (checkbox.checked) {
        selectedItems.add(id);
        item.classList.add('selected');
    } else {
        selectedItems.delete(id);
        item.classList.remove('selected');
    }
    
    updateBulkActions();
}

function updateBulkActions() {
    const bulkActions = document.getElementById('bulkActions');
    const selectedCount = document.getElementById('selectedCount');
    
    if (selectedItems.size > 0) {
        bulkActions.style.display = 'flex';
        selectedCount.textContent = selectedItems.size;
    } else {
        bulkActions.style.display = 'none';
    }
}

function selectAll() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const items = document.querySelectorAll('.gallery-item');
    
    checkboxes.forEach((checkbox, index) => {
        checkbox.checked = true;
        const id = items[index].dataset.id;
        selectedItems.add(parseInt(id));
        items[index].classList.add('selected');
    });
    
    updateBulkActions();
}

function deselectAll() {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const items = document.querySelectorAll('.gallery-item');
    
    checkboxes.forEach(checkbox => checkbox.checked = false);
    items.forEach(item => item.classList.remove('selected'));
    selectedItems.clear();
    
    updateBulkActions();
}

function performBulkAction() {
    const action = document.getElementById('bulkActionSelect').value;
    if (!action) {
        alert('Pilih aksi terlebih dahulu');
        return;
    }
    
    if (action === 'delete' && !confirm(`Apakah Anda yakin ingin menghapus ${selectedItems.size} foto?`)) {
        return;
    }
    
    document.getElementById('bulkAction').value = action;
    document.getElementById('selectedIds').value = Array.from(selectedItems).join(',');
    document.getElementById('bulkActionForm').submit();
}

function searchPhotos() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    filterGallery();
}

function filterByCategory() {
    filterGallery();
}

function filterByStatus() {
    filterGallery();
}

function filterGallery() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const items = document.querySelectorAll('.gallery-item');
    
    items.forEach(item => {
        const title = item.querySelector('.item-title').textContent.toLowerCase();
        const description = item.querySelector('.item-description')?.textContent.toLowerCase() || '';
        const category = item.dataset.category;
        const status = item.dataset.status;
        
        const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
        const matchesCategory = !categoryFilter || category === categoryFilter;
        const matchesStatus = !statusFilter || status === statusFilter;
        
        const shouldShow = matchesSearch && matchesCategory && matchesStatus;
        item.style.display = shouldShow ? 'block' : 'none';
    });
}

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'a') {
        e.preventDefault();
        selectAll();
    } else if (e.ctrlKey && e.key === 'd') {
        e.preventDefault();
        deselectAll();
    }
});
</script>
@endsection
