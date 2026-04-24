@extends('admin.layout')

@section('title', 'Tentang PPID - PPID BBIA')
@section('page-title', 'Tentang PPID')

@section('content')
<!-- Success Alert -->
@if(session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
    </div>
@endif

<!-- Daftar Tentang PPID Section -->
@if($profils->count() > 0)
<div class="card">
    <h2>Daftar Konten Tentang PPID</h2>
    
    <div class="tentang-list">
        @foreach($profils as $item)
            <div class="tentang-item">
                <div class="tentang-info">
                    <div class="tentang-title">
                        <i class="fas fa-info-circle"></i>
                        {{ $item->judul }}
                    </div>
                    <div class="tentang-text">{{ Str::limit(strip_tags($item->konten), 100) }}</div>
                </div>
                <div class="tentang-meta">
                    <span class="status {{ $item->is_active ? 'active' : 'inactive' }}">
                        {{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

<!-- Edit Tentang PPID Section -->
<div class="card">
    <h2>Edit Tentang PPID</h2>

    <form method="POST" action="{{ route('admin.tentang-ppid.update') }}">
        @csrf
        @method('PUT')
        
        <div class="form-grid">
            @foreach($profils as $profil)
                <div class="form-group">
                    <label for="tentang_{{ $profil->id }}">
                        <i class="fas fa-info-circle me-1"></i>{{ $profil->judul }}
                    </label>
                    <textarea 
                        id="tentang_{{ $profil->id }}" 
                        name="tentang_{{ $profil->id }}" 
                        rows="6" 
                        placeholder="Masukkan konten {{ $profil->judul }}..."
                        required
                    >{{ old('tentang_' . $profil->id, $profil->konten) }}</textarea>
                </div>
            @endforeach
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

/* Tentang List */
.tentang-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.tentang-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
}

.tentang-info {
    flex: 1;
}

.tentang-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 4px;
}

.tentang-title i {
    color: #6b7280;
    width: 16px;
}

.tentang-text {
    color: #6b7280;
    font-size: 14px;
}

.tentang-meta {
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
    .tentang-item {
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
