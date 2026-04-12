@extends('admin.layout')

@section('title', 'Menu Profil - PPID BBIA')
@section('page-title', 'Kelola Menu Profil')

@push('styles')
<style>
    .menu-container {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    .menu-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #e5e7eb;
    }
    
    .menu-list {
        display: grid;
        gap: 1rem;
    }
    
    .menu-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
    }
    
    .menu-item:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .menu-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .menu-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
    }
    
    .menu-details h4 {
        margin: 0 0 0.25rem 0;
        color: #1e293b;
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .menu-details p {
        margin: 0;
        color: #64748b;
        font-size: 0.9rem;
    }
    
    .menu-order {
        background: #e2e8f0;
        color: #475569;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-right: 1rem;
    }
    
    .menu-actions {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-action {
        padding: 0.5rem 0.75rem;
        border: none;
        border-radius: 6px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
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
        background: #10b981;
        color: white;
    }
    
    .btn-toggle:hover {
        background: #059669;
        transform: translateY(-1px);
    }
    
    .btn-toggle.inactive {
        background: #6b7280;
    }
    
    .btn-toggle.inactive:hover {
        background: #4b5563;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }
    
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #64748b;
    }
    
    .empty-state i {
        font-size: 3rem;
        color: #cbd5e1;
        margin-bottom: 1rem;
    }
    
    .alert {
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .alert-success {
        background: #dcfce7;
        color: #166534;
        border-left: 4px solid #22c55e;
    }
    
    .drag-handle {
        cursor: move;
        color: #94a3b8;
        font-size: 1.2rem;
        margin-right: 0.5rem;
    }
    
    .drag-handle:hover {
        color: #64748b;
    }
</style>
@endpush

@section('content')
<div class="menu-container">
    <div class="menu-header">
        <div>
            <h2 style="margin: 0; color: #1e293b;">📋 Menu Profil Dropdown</h2>
            <p style="margin: 0.5rem 0 0 0; color: #64748b;">Kelola menu yang muncul di dropdown Profil pada website publik</p>
        </div>
        <a href="{{ route('admin.menu-profil.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Menu
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($menus->count() > 0)
        <div class="menu-list" id="menuList">
            @foreach($menus as $menu)
                <div class="menu-item" data-id="{{ $menu->id }}">
                    <div class="menu-info">
                        <i class="fas fa-grip-vertical drag-handle"></i>
                        <div class="menu-icon">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="menu-details">
                            <h4>{{ $menu->nama_menu }}</h4>
                            <p>{{ $menu->link }}</p>
                        </div>
                        <span class="menu-order">#{{ $menu->urutan }}</span>
                    </div>
                    <div class="menu-actions">
                        <form action="{{ route('admin.menu-profil.toggle', $menu->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn-action btn-toggle {{ $menu->is_active ? '' : 'inactive' }}">
                                <i class="fas {{ $menu->is_active ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                {{ $menu->is_active ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                        <a href="{{ route('admin.menu-profil.edit', $menu->id) }}" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                        <form action="{{ route('admin.menu-profil.destroy', $menu->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-action btn-delete">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-menu"></i>
            <h3>Belum Ada Menu Profil</h3>
            <p>Tambahkan menu pertama untuk dropdown Profil pada website publik</p>
            <br>
            <a href="{{ route('admin.menu-profil.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Menu Pertama
            </a>
        </div>
    @endif
</div>

<script>
// Drag and drop functionality
document.addEventListener('DOMContentLoaded', function() {
    const menuList = document.getElementById('menuList');
    if (!menuList) return;
    
    let draggedItem = null;
    
    menuList.addEventListener('dragstart', function(e) {
        if (e.target.classList.contains('menu-item')) {
            draggedItem = e.target;
            e.target.style.opacity = '0.5';
        }
    });
    
    menuList.addEventListener('dragend', function(e) {
        if (e.target.classList.contains('menu-item')) {
            e.target.style.opacity = '';
        }
    });
    
    menuList.addEventListener('dragover', function(e) {
        e.preventDefault();
        const afterElement = getDragAfterElement(menuList, e.clientY);
        if (afterElement == null) {
            menuList.appendChild(draggedItem);
        } else {
            menuList.insertBefore(draggedItem, afterElement);
        }
    });
    
    menuList.addEventListener('drop', function(e) {
        e.preventDefault();
        updateOrder();
    });
    
    function getDragAfterElement(container, y) {
        const draggableElements = [...container.querySelectorAll('.menu-item:not(.dragging)')];
        
        return draggableElements.reduce((closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        }, { offset: Number.NEGATIVE_INFINITY }).element;
    }
    
    function updateOrder() {
        const items = menuList.querySelectorAll('.menu-item');
        const orders = [];
        
        items.forEach((item, index) => {
            orders.push({
                id: item.dataset.id,
                urutan: index + 1
            });
        });
        
        // Send AJAX request to update order
        fetch('{{ route("admin.menu-profil.update-order") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ orders: orders })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update order numbers in UI
                items.forEach((item, index) => {
                    const orderElement = item.querySelector('.menu-order');
                    if (orderElement) {
                        orderElement.textContent = '#' + (index + 1);
                    }
                });
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>
@endsection
