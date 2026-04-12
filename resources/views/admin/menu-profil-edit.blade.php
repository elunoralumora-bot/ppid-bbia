@extends('admin.layout')

@section('title', 'Edit Menu Profil - PPID BBIA')
@section('page-title', 'Edit Menu Profil')

@push('styles')
<style>
    .form-container {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        max-width: 600px;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #374151;
        font-size: 0.95rem;
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        padding-top: 2rem;
        border-top: 2px solid #e5e7eb;
        margin-top: 2rem;
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
    
    .btn-outline {
        background: transparent;
        color: #6b7280;
        padding: 0.75rem 1.5rem;
        border: 2px solid #e5e7eb;
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
    
    .btn-outline:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        transform: translateY(-2px);
    }
    
    .alert {
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border-left: 4px solid #ef4444;
    }
    
    .help-text {
        font-size: 0.85rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }
    
    .preview-section {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1rem;
        margin-top: 1rem;
    }
    
    .preview-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }
    
    .preview-link {
        color: #3b82f6;
        text-decoration: none;
        font-size: 0.9rem;
    }
    
    .preview-link:hover {
        text-decoration: underline;
    }
    
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .status-active {
        background: #dcfce7;
        color: #166534;
    }
    
    .status-inactive {
        background: #f3f4f6;
        color: #6b7280;
    }
</style>
@endpush

@section('content')
<div class="form-container">
    <div style="margin-bottom: 2rem;">
        <h2 style="margin: 0; color: #1e293b;">✏️ Edit Menu Profil</h2>
        <p style="margin: 0.5rem 0 0 0; color: #64748b;">Edit menu yang muncul di dropdown Profil pada website publik</p>
        
        <div style="margin-top: 1rem;">
            <span class="status-badge {{ $menu->is_active ? 'status-active' : 'status-inactive' }}">
                <i class="fas {{ $menu->is_active ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                {{ $menu->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
        </div>
    </div>
    
    @if($errors->any())
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i>
            <div>
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin: 0.5rem 0 0 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.menu-profil.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="nama_menu">
                <i class="fas fa-tag"></i> Nama Menu
            </label>
            <input type="text" id="nama_menu" name="nama_menu" class="form-control" 
                   value="{{ old('nama_menu', $menu->nama_menu) }}" required placeholder="Contoh: Tentang PPID">
            <div class="help-text">Nama menu yang akan ditampilkan di dropdown</div>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="link">
                <i class="fas fa-link"></i> Link/URL
            </label>
            <input type="text" id="link" name="link" class="form-control" 
                   value="{{ old('link', $menu->link) }}" required placeholder="Contoh: /tentang-ppid">
            <div class="help-text">
                Link halaman yang akan dibuka saat menu diklik.<br>
                <strong>Format:</strong> /nama-halaman untuk internal link
            </div>
            
            <div class="preview-section">
                <div class="preview-title">🔗 Preview Link:</div>
                <div id="linkPreview" class="preview-link">
                    @if($menu->link)
                        @if(str_starts_with($menu->link, 'http'))
                            {{ $menu->link }}
                        @else
                            {{ url('/') }}{{ $menu->link }}
                        @endif
                    @else
                        {{ url('/tentang-ppid') }}
                    @endif
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="urutan">
                <i class="fas fa-sort-numeric-up"></i> Urutan
            </label>
            <input type="number" id="urutan" name="urutan" class="form-control" 
                   value="{{ old('urutan', $menu->urutan) }}" required min="0" placeholder="1">
            <div class="help-text">
                Urutan tampilan menu (angka kecil = tampil lebih atas)<br>
                Contoh: 1 (paling atas), 2, 3, dst.
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                <i class="fas fa-save"></i>
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.menu-profil') }}" class="btn-outline">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </form>
</div>

<script>
// Live preview link
document.getElementById('link').addEventListener('input', function() {
    const preview = document.getElementById('linkPreview');
    const link = this.value.trim();
    
    if (link) {
        if (link.startsWith('http')) {
            preview.textContent = link;
        } else {
            preview.textContent = '{{ url('/') }}' + link;
        }
    } else {
        preview.textContent = '{{ url('/tentang-ppid') }}';
    }
});
</script>
@endsection
