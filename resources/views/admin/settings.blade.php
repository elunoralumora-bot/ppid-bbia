@extends('admin.layout')

@section('title', 'Pengaturan - PPID BBIA')
@section('page-title', 'Pengaturan')

@section('content')
<div class="card">
    <h2>Pengaturan Sistem</h2>
    
    <form>
        <div class="form-group">
            <label for="nama_instansi">Nama Instansi</label>
            <input type="text" id="nama_instansi" class="form-control" value="PPID BBIA">
        </div>
        
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" class="form-control" rows="3">Jl. Contoh No. 123, Jakarta</textarea>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" value="info@ppid-bbia.go.id">
        </div>
        
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="tel" id="telepon" class="form-control" value="(021) 1234567">
        </div>
        
        <div class="form-group">
            <label for="jam_operasional">Jam Operasional</label>
            <input type="text" id="jam_operasional" class="form-control" value="Senin - Jumat: 08:00 - 16:00">
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
</div>

<div class="card">
    <h2>Pengaturan Aplikasi</h2>
    
    <form>
        <div class="form-group">
            <label for="max_file_size">Maksimal Ukuran File (MB)</label>
            <input type="number" id="max_file_size" class="form-control" value="10">
        </div>
        
        <div class="form-group">
            <label for="allowed_extensions">Ekstensi File yang Diizinkan</label>
            <input type="text" id="allowed_extensions" class="form-control" value="pdf,doc,docx,jpg,jpeg,png">
        </div>
        
        <div class="form-group">
            <label>
                <input type="checkbox" checked> Aktifkan notifikasi email
            </label>
        </div>
        
        <div class="form-group">
            <label>
                <input type="checkbox" checked> Maintenance mode
            </label>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
</div>
@endsection
