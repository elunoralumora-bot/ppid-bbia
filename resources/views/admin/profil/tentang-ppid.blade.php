@extends('admin.layout')

@section('title', 'Tentang PPID - PPID BBIA')
@section('page-title', 'Tentang PPID')

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
        color: #0f2338;
        border-bottom: 3px solid #3498db;
        padding-bottom: 10px;
        margin: 1.5rem 0 1rem 0;
        font-size: 1.1rem;
    }
    
    .preview-content h3 {
        color: #2c5282;
        margin: 1rem 0 0.5rem 0;
        font-size: 1rem;
    }
    
    .preview-content p {
        margin-bottom: 0.75rem;
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
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        border-left: 4px solid #3b82f6;
    }
    
    .section-header h3 {
        margin: 0;
        color: #1f2937;
        font-size: 1.1rem;
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
            <h3>Tentang PPID</h3>
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

        <form action="{{ route('admin.tentang-ppid.update') }}" method="POST" id="tentangForm">
            @csrf
            @method('PUT')
            
            <!-- Pengantar Section -->
            <div class="form-group">
                <label class="form-label" for="pengantar">
                    <i class="fas fa-info-circle"></i> Pengantar Tentang PPID
                </label>
                <textarea name="pengantar" id="pengantar" class="form-control" rows="4" 
                          placeholder="Teks pengantar tentang apa itu PPID...">{{ $pengantar ?? '' }}</textarea>
                <div class="help-text">Teks pembuka yang menjelaskan apa itu PPID BBIA</div>
            </div>

            <!-- Dynamic Profil Sections -->
            <div id="profilSections">
                @php
                    $profils = \App\Models\Profil::where('is_active', true)
                        ->where('kategori', '!=', 'Pengantar')
                        ->orderBy('kategori')
                        ->orderBy('urutan')
                        ->get()
                        ->groupBy('kategori');
                @endphp
                
                @foreach($profils as $kategori => $items)
                    <div class="kategori-section" data-kategori="{{ $kategori }}">
                        <div class="section-header">
                            <h3>
                                @switch($kategori)
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
                                    @default
                                        <i class="fas fa-folder"></i> {{ $kategori }}
                                @endswitch
                            </h3>
                        </div>
                        
                        @foreach($items as $profil)
                            <div class="form-group">
                                <label class="form-label" for="profil_{{ $profil->id }}">
                                    <i class="fas fa-edit"></i> {{ $profil->judul }}
                                </label>
                                <textarea name="profil_{{ $profil->id }}" id="profil_{{ $profil->id }}" 
                                          class="form-control" rows="6">{{ $profil->konten }}</textarea>
                                <div class="help-text">Konten untuk {{ $profil->judul }}</div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </form>
    </div>
    
    <!-- Preview Section -->
    <div class="preview-section">
        <div class="preview-title">
            <i class="fas fa-eye"></i> Preview Tampilan Publik
        </div>
        <div class="preview-content" id="preview">
            <h2>Apa itu PPID?</h2>
            <div id="previewPengantar">{{ $pengantar ?: 'Teks pengantar akan tampil di sini...' }}</div>
            
            @foreach($profils as $kategori => $items)
                <h2>{{ $kategori }}</h2>
                @foreach($items as $profil)
                    <h3>{{ $profil->judul }}</h3>
                    <div id="preview_{{ $profil->id }}">{!! nl2br(e($profil->konten)) !!}</div>
                    @if(!$loop->last)<hr style="margin: 1rem 0;">@endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>

<script>
// Live preview functionality
document.getElementById('pengantar').addEventListener('input', function() {
    document.getElementById('previewPengantar').innerHTML = this.value.replace(/\n/g, '<br>') || 'Teks pengantar akan tampil di sini...';
});

// Add event listeners for all profil textareas
document.querySelectorAll('[id^="profil_"]').forEach(textarea => {
    textarea.addEventListener('input', function() {
        const previewId = 'preview_' + this.id.replace('profil_', '');
        const previewElement = document.getElementById(previewId);
        if (previewElement) {
            previewElement.innerHTML = this.value.replace(/\n/g, '<br>') || 'Konten akan tampil di sini...';
        }
    });
});

// Form validation
document.getElementById('tentangForm').addEventListener('submit', function(e) {
    const pengantar = document.getElementById('pengantar').value.trim();
    
    if (pengantar.length < 10) {
        e.preventDefault();
        alert('Pengantar minimal 10 karakter!');
        return;
    }
});
</script>
@endsection
