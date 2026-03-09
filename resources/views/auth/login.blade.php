@extends('layouts.auth')

@section('content')
<div class="auth-header">
    <h2>Login User</h2>
    <p>Login untuk mengakses layanan permohonan informasi publik</p>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form class="login-form" method="POST" action="{{ url('/login') }}">
    @csrf
    
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    
    <div class="form-options">
        <label class="checkbox-label">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="checkmark"></span>
            Ingat saya
        </label>
        <a href="#" class="forgot-password">Lupa password?</a>
    </div>
    
    <button type="submit" class="btn btn-primary">Login sebagai User</button>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    
    <div class="auth-footer">
        <p>Belum punya akun? <a href="{{ url('/register') }}" class="register-link">Daftar sekarang</a></p>
        <p><small>Admin? <a href="{{ url('/admin/login') }}" class="admin-link">Login sebagai Admin</a></small></p>
    </div>
</form>
@endsection

<style>
.page-header {
    background: linear-gradient(135deg, #0f2338 0%, #2c5282 35%, #1a3a5f 100%);
    color: white;
    padding: 40px 0;
    margin: 0;
    width: 100vw;
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
}

.page-header-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 60px;
}

.page-header h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 10px;
}

.breadcrumb {
    font-size: 14px;
    opacity: 0.8;
}

.breadcrumb a {
    color: white;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.content-section {
    width: 100%;
    padding: 0 20px;
    min-height: 60vh;
}

.content-full {
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 40px;
    background: transparent;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    width: 100%;
    max-width: 450px;
}

.login-card {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 2px solid rgba(26, 58, 95, 0.1);
}

.auth-header {
    text-align: center;
    margin-bottom: 30px;
}

.auth-header h2 {
    color: #1a3a5f;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 10px;
}

.auth-header p {
    color: #666;
    font-size: 16px;
    margin-bottom: 0;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #1a3a5f;
    font-weight: 600;
    font-size: 14px;
}

.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 14px;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.form-control:focus {
    outline: none;
    border-color: #1a3a5f;
    box-shadow: 0 0 0 3px rgba(26, 58, 95, 0.1);
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    color: #666;
    font-size: 14px;
    cursor: pointer;
}

.checkbox-label input[type="checkbox"] {
    display: none;
}

.checkmark {
    width: 18px;
    height: 18px;
    border: 2px solid #e9ecef;
    border-radius: 4px;
    margin-right: 8px;
    position: relative;
    transition: all 0.3s ease;
}

.checkbox-label input[type="checkbox"]:checked + .checkmark {
    background: #1a3a5f;
    border-color: #1a3a5f;
}

.checkbox-label input[type="checkbox"]:checked + .checkmark::after {
    content: '✓';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 12px;
}

.forgot-password {
    color: #1a3a5f;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
}

.forgot-password:hover {
    text-decoration: underline;
}

.btn {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-block;
}

.btn-primary {
    background: linear-gradient(135deg, #1a3a5f, #2c5282);
    color: white;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #102841, #1e3d5a);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(26, 58, 95, 0.3);
}

.auth-footer {
    text-align: center;
    margin-top: 25px;
    padding-top: 20px;
    border-top: 1px solid #e9ecef;
}

.auth-footer p {
    color: #666;
    font-size: 14px;
    margin-bottom: 0;
}

.register-link {
    color: #1a3a5f;
    text-decoration: none;
    font-weight: 600;
}

.register-link:hover {
    text-decoration: underline;
}

.admin-link {
    color: #e74c3c;
    text-decoration: none;
    font-weight: 600;
}

.admin-link:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .content-full {
        padding: 40px 20px;
    }
    
    .login-card {
        padding: 30px 20px;
    }
    
    .form-options {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }
}
</style>
