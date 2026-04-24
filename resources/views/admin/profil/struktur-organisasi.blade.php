@extends('admin.layout')

@section('title', 'Struktur Organisasi - PPID BBIA')
@section('page-title', 'Struktur Organisasi')

@section('content')
<!-- Success Alert -->
@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
@endif

<!-- Daftar Struktur Organisasi Section -->
@if($profils->count() > 0)
<div class="card">
    <h2>Daftar Struktur Organisasi</h2>
    
    <div class="struktur-list">
        @foreach($profils as $item)
            <div class="struktur-item">
                <div class="struktur-info">
                    <div class="struktur-title">
                        <i class="fas fa-sitemap"></i>
                        {{ $item->judul }}
                    </div>
                    <div class="struktur-text">{{ Str::limit(strip_tags($item->konten), 80) }}</div>
                </div>
                <div class="struktur-meta">
                    <span class="status {{ $item->is_active ? 'active' : 'inactive' }}">
                        {{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- Edit Struktur Organisasi Section -->
<div class="card">
    <h2>Edit Struktur Organisasi</h2>

    <form method="POST" action="{{ route('admin.struktur-organisasi.update') }}">
        @csrf
        @method('PUT')
        
        <div class="form-grid">
            <!-- Kepala BBIA Field -->
            <div class="form-group">
                <label for="kepala_bbia">
                    <i class="fas fa-user-tie me-1"></i>Kepala BBIA
                </label>
                <textarea 
                    id="kepala_bbia" 
                    name="kepala_bbia" 
                    rows="3" 
                    placeholder="Masukkan deskripsi Kepala BBIA..."
                    required
                >{{ old('kepala_bbia', $profils->where('judul', 'Kepala BBIA')->first()?->konten ?? '') }}</textarea>
            </div>
            
            <!-- PPID Field -->
            <div class="form-group">
                <label for="ppid">
                    <i class="fas fa-user-cog me-1"></i>Pejabat Pengelola Informasi dan Dokumentasi
                </label>
                <textarea 
                    id="ppid" 
                    name="ppid" 
                    rows="3" 
                    placeholder="Masukkan deskripsi PPID..."
                    required
                >{{ old('ppid', $profils->where('judul', 'Pejabat Pengelola Informasi dan Dokumentasi')->first()?->konten ?? '') }}</textarea>
            </div>
            
            <!-- Koordinator Field -->
            <div class="form-group">
                <label for="koordinator">
                    <i class="fas fa-users me-1"></i>Koordinator PPID
                </label>
                <textarea 
                    id="koordinator" 
                    name="koordinator" 
                    rows="3" 
                    placeholder="Masukkan deskripsi Koordinator PPID..."
                    required
                >{{ old('koordinator', $profils->where('judul', 'Koordinator PPID')->first()?->konten ?? '') }}</textarea>
            </div>
            
            <!-- Staf Field -->
            <div class="form-group">
                <label for="staf">
                    <i class="fas fa-user me-1"></i>Staf PPID
                </label>
                <textarea 
                    id="staf" 
                    name="staf" 
                    rows="3" 
                    placeholder="Masukkan deskripsi Staf PPID..."
                    required
                >{{ old('staf', $profils->where('judul', 'Staf PPID')->first()?->konten ?? '') }}</textarea>
            </div>
            
            </div>
        
        <!-- Hidden fields untuk existing data -->
        @foreach($profils as $profil)
            <input type="hidden" name="existing_ids[]" value="{{ $profil->id }}">
        @endforeach
        
        <div class="form-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<!-- Unit Pelaksana PPID Section -->
<div class="card">
    <h2>Edit Unit Pelaksana PPID</h2>

    <form method="POST" action="{{ route('admin.unit-pelaksana.update') }}">
        @csrf
        @method('PUT')
        
        @php
            $unitProfils = \App\Models\Profil::where('is_active', true)
                ->where('kategori', 'Unit Pelaksana')
                ->orderBy('urutan')
                ->get();
        @endphp
        
        <div class="form-grid">
            <!-- Unit Pelaksana Field -->
            <div class="form-group">
                <label for="unit_pelaksana">
                    <i class="fas fa-cogs me-1"></i>Unit Pelaksana PPID
                </label>
                <textarea 
                    id="unit_pelaksana" 
                    name="unit_pelaksana" 
                    rows="6" 
                    placeholder="Masukkan deskripsi Unit Pelaksana PPID (pisahkan setiap unit dengan baris baru)..."
                    required
                >{{ old('unit_pelaksana', $unitProfils->where('judul', 'Unit Pelaksana PPID')->first()?->konten ?? '') }}</textarea>
                <div class="help-text">Setiap baris baru akan menjadi unit terpisah</div>
            </div>
        </div>
        
        <!-- Hidden fields untuk existing data -->
        @foreach($unitProfils as $profil)
            <input type="hidden" name="existing_unit_ids[]" value="{{ $profil->id }}">
        @endforeach
        
        <div class="form-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

<style>
/* Card */
.card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 24px;
    margin-bottom: 24px;
}

.card h2 {
    margin: 0 0 20px 0;
    font-size: 18px;
    font-weight: 600;
    color: #374151;
}

/* Alert */
.alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.alert-success {
    background-color: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #166534;
}

/* Struktur List */
.struktur-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.struktur-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
}

.struktur-info {
    flex: 1;
}

.struktur-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 4px;
}

.struktur-title i {
    color: #6b7280;
    width: 16px;
}

.struktur-text {
    color: #6b7280;
    font-size: 14px;
}

.struktur-meta {
    display: flex;
    align-items: center;
}

.status {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 500;
}

.status.active {
    background-color: #dcfce7;
    color: #166534;
}

.status.inactive {
    background-color: #fef2f2;
    color: #dc2626;
}

/* Form */
.form-grid {
    display: grid;
    gap: 20px;
    margin-bottom: 24px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: 500;
    color: #374151;
    margin-bottom: 8px;
    font-size: 14px;
    display: flex;
    align-items: center;
}

.form-group label i {
    color: #6b7280;
    margin-right: 8px;
    width: 16px;
}

.form-group textarea {
    padding: 10px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 14px;
    font-family: inherit;
    resize: vertical;
    transition: border-color 0.15s ease;
}

.form-group textarea:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.help-text {
    font-size: 11px;
    color: #6b7280;
    margin-top: 4px;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
    padding-top: 20px;
    border-top: 1px solid #e5e7eb;
}

.btn {
    padding: 10px 16px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.15s ease;
}

.btn-primary {
    background-color: #3b82f6;
    color: white;
}

.btn-primary:hover {
    background-color: #2563eb;
}

.btn-secondary {
    background-color: #6b7280;
    color: white;
}

.btn-secondary:hover {
    background-color: #4b5563;
}

/* Responsive */
@media (max-width: 768px) {
    .struktur-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>
