@extends('admin.layout')

@section('title', 'Visi Misi - PPID BBIA')
@section('page-title', 'Visi dan Misi')

@push('styles')
<style>
    .edit-container {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 2rem;
    }
    
    .form-section {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    .preview-section {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 20px;
        height: fit-content;
        max-height: 80vh;
        overflow-y: auto;
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
        font-family: 'Inter', sans-serif;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    textarea.form-control {
        resize: vertical;
        min-height: 150px;
        line-height: 1.6;
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        padding-top: 2rem;
        border-top: 2px solid #e5e7eb;
        margin-top: 2rem;
    }
    
    .preview-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .preview-content {
        color: #4b5563;
        line-height: 1.6;
        font-size: 0.9rem;
    }
    
    .preview-content h2 {
        color: #1a3a5f;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        margin-top: 1.5rem;
    }
    
    .preview-content h3 {
        color: #1a3a5f;
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        margin-top: 1rem;
    }
    
    .vision-box {
        background: linear-gradient(135deg, rgba(26, 82, 130, 0.1), rgba(44, 130, 201, 0.1));
        border: 1px solid rgba(26, 82, 130, 0.2);
        border-radius: 15px;
        padding: 1rem;
        text-align: center;
        margin: 1rem 0;
    }
    
    .vision-box p {
        color: #1a3a5f;
        font-size: 0.9rem;
        line-height: 1.4;
        margin: 0;
    }
    
    .mission-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.5rem;
        margin-top: 1rem;
    }
    
    .mission-item {
        background: rgba(26, 82, 130, 0.05);
        border: 1px solid rgba(26, 82, 130, 0.1);
        border-radius: 8px;
        padding: 0.75rem;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
    }
    
    .mission-number {
        background: #1a3a5f;
        color: white;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: 700;
        flex-shrink: 0;
    }
    
    .mission-content h3 {
        color: #1a3a5f;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
    
    .mission-content p {
        color: #333;
        font-size: 0.8rem;
        line-height: 1.4;
        margin: 0;
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
    
    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        border-left: 4px solid #ef4444;
    }
    
    .section-header {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        border-left: 4px solid #3b82f6;
    }
    
    .section-header h3 {
        margin: 0;
        color: #1e40af;
        font-size: 1.2rem;
        font-weight: 600;
    }
    
    .visi-item {
        background: #eff6ff;
        border: 1px solid #dbeafe;
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
    }
    
    .visi-item h4 {
        margin: 0 0 0.5rem 0;
        color: #1e40af;
        font-size: 1rem;
        font-weight: 600;
    }
    
    .help-text {
        font-size: 0.85rem;
        color: #6b7280;
        margin-top: 0.25rem;
    }
    
    @media (max-width: 1024px) {
        .edit-container {
            grid-template-columns: 1fr;
        }
        
        .preview-section {
            position: static;
        }
    }
</style>
@endpush

@section('content')
<div class="edit-container">
    <!-- Form Section -->
    <div class="form-section">
        <div class="section-header">
            <h3>👁️ Edit Halaman Visi dan Misi PPID</h3>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

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

        <form action="{{ route('admin.visi-misi.update') }}" method="POST" id="visiForm">
            @csrf
            @method('PUT')
            
            @php
                $profils = \App\Models\Profil::where('is_active', true)
                    ->where('kategori', 'Visi Misi')
                    ->orderBy('urutan')
                    ->get();
            @endphp
            
            @forelse($profils as $profil)
                <div class="visi-item">
                    <h4>{{ $profil->judul }}</h4>
                    <div class="form-group">
                        <label class="form-label" for="konten_{{ $profil->id }}">
                            <i class="fas fa-edit"></i> Konten
                        </label>
                        <textarea name="konten_{{ $profil->id }}" id="konten_{{ $profil->id }}" 
                                  class="form-control" rows="8">{{ $profil->konten }}</textarea>
                        <div class="help-text">Detail konten untuk {{ $profil->judul }}</div>
                    </div>
                </div>
            @empty
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i>
                    <div>
                        <strong>Belum ada data Visi dan Misi</strong>
                        <p style="margin: 0.5rem 0 0 0;">Silakan tambahkan data Visi dan Misi terlebih dahulu melalui menu Profil.</p>
                    </div>
                </div>
            @endforelse

            @if($profils->count() > 0)
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            @endif
        </form>
    </div>
    
    <!-- Preview Section -->
    <div class="preview-section">
        <div class="preview-title">
            <i class="fas fa-eye"></i> Preview Tampilan Publik
        </div>
        <div class="preview-content" id="preview">
            @forelse($profils as $profil)
                <h2>{{ $profil->judul }}</h2>
                @if(strtolower($profil->judul) == 'visi')
                    <div class="vision-box">
                        <p id="preview_{{ $profil->id }}">{!! nl2br(e($profil->konten)) !!}</p>
                    </div>
                @else
                    <div class="mission-grid">
                        <div class="mission-item">
                            <div class="mission-number">1</div>
                            <div class="mission-content">
                                <h3>{{ $profil->judul }}</h3>
                                <div id="preview_{{ $profil->id }}">{!! nl2br(e(Str::limit($profil->konten, 100))) !!}</div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="vision-box">
                    <p>Informasi visi dan misi sedang dalam pembaruan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
// Live preview functionality
document.querySelectorAll('[id^="konten_"]').forEach(textarea => {
    textarea.addEventListener('input', function() {
        const previewId = 'preview_' + this.id.replace('konten_', '');
        const previewElement = document.getElementById(previewId);
        if (previewElement) {
            previewElement.innerHTML = this.value.replace(/\n/g, '<br>') || 'Konten akan tampil di sini...';
        }
    });
});

// Form validation
document.getElementById('visiForm').addEventListener('submit', function(e) {
    const textareas = document.querySelectorAll('[id^="konten_"]');
    let hasContent = false;
    
    textareas.forEach(textarea => {
        if (textarea.value.trim().length > 0) {
            hasContent = true;
        }
    });
    
    if (!hasContent) {
        e.preventDefault();
        alert('Minimal satu konten harus diisi!');
        return;
    }
});
</script>
@endsection
