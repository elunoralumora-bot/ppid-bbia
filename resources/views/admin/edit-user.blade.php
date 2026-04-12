@extends('admin.layout')

@section('title', 'Edit User - PPID BBIA')
@section('page-title', 'Edit User')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 1.5rem;">Edit User</h2>
    
    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.5rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.update-user', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display: grid; gap: 1rem; max-width: 500px;">
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Nama Lengkap *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>
            
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Email *</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>
            
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
                <small style="color: #666;">Minimal 6 karakter. Kosongkan jika tidak ingin mengubah password.</small>
            </div>
            
            <div>
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
            </div>
            
            <div style="display: flex; gap: 1rem; margin-top: 1rem;">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('admin.manage-users') }}" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </form>
</div>
@endsection
