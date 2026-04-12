@extends('admin.layout')

@section('title', 'Tambah Standar Layanan - PPID BBIA')
@section('page-title', 'Tambah Standar Layanan')

@section('content')
<div class="card">
    <h2>Tambah Standar Layanan Baru</h2>
    
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.standar-layanan.store') }}" method="POST">
        @csrf
        <div style="display: grid; gap: 1rem;">
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Jenis Layanan *</label>
                <input type="text" name="jenis" class="form-control" value="{{ old('jenis') }}" required>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Waktu Pelayanan *</label>
                <input type="text" name="waktu" class="form-control" value="{{ old('waktu') }}" placeholder="Contoh: 1 hari kerja" required>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Biaya *</label>
                <input type="text" name="biaya" class="form-control" value="{{ old('biaya') }}" placeholder="Contoh: Gratis, Rp 50.000" required>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Produk Layanan *</label>
                <input type="text" name="produk" class="form-control" value="{{ old('produk') }}" required>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Prosedur Pelayanan *</label>
                <textarea name="prosedur" class="form-control" rows="6" required>{{ old('prosedur') }}</textarea>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Urutan *</label>
                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}" min="0" required>
                <small style="color: #666;">Nomor urutan untuk pengurutan tampilan</small>
            </div>

            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                    Aktif
                </label>
            </div>

            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.standar-layanan') }}" class="btn btn-outline">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection
