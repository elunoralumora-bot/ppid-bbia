@extends('layouts.auth')

@section('content')
<div class="auth-header">
    <h2>Daftar Akun User</h2>
    <p>Buat akun untuk mengakses layanan permohonan informasi publik</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form class="register-form" method="POST" action="{{ url('/register') }}">
    @csrf
    
    <div class="form-row">
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
        </div>
        
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" id="nik" name="nik" class="form-control" value="{{ old('nik') }}" required>
        </div>
    </div>
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    
    <div class="form-group">
        <label for="no_telepon">Nomor Telepon</label>
        <input type="tel" id="no_telepon" name="no_telepon" class="form-control" value="{{ old('no_telepon') }}" required>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>
    </div>
    
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
    </div>
    
    <div class="form-options">
        <label class="checkbox-label">
            <input type="checkbox" name="terms" {{ old('terms') ? 'checked' : '' }}>
            <span class="checkmark"></span>
            Saya setuju dengan <a href="#" class="terms-link">syarat dan ketentuan</a>
        </label>
    </div>
    
    <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    
    <div class="auth-footer">
        <p>Sudah punya akun? <a href="{{ url('/login') }}" class="login-link">Login sekarang</a></p>
    </div>
</form>
@endsection
