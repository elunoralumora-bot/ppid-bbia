@extends('layouts.app')

@section('content')
<div class="page-header">
    <div class="page-header-content">
        <h1>Dashboard User</h1>
        <div class="breadcrumb">
            <a href="{{ url('/ppid') }}">Beranda</a> / Dashboard User
        </div>
    </div>
</div>

<div class="content-section">
    <div class="content-full">
        <div class="dashboard-welcome">
            <h2>Selamat datang, {{ Auth::user()->nama_lengkap }}!</h2>
            <p>Dashboard pengguna layanan informasi publik PPID BBIA</p>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="{{ asset('images/permohonan.png') }}" alt="Permohonan">
                </div>
                <div class="card-content">
                    <h3>Permohonan Informasi</h3>
                    <p>Ajukan permohonan informasi publik yang Anda butuhkan</p>
                    <a href="{{ url('/ajukan-permohonan') }}" class="btn btn-primary">Ajukan Permohonan</a>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="{{ asset('images/keberatan.png') }}" alt="Keberatan">
                </div>
                <div class="card-content">
                    <h3>Pengajuan Keberatan</h3>
                    <p>Ajukan keberatan atas tanggapan permohonan informasi</p>
                    <a href="{{ url('/ajukan-keberatan') }}" class="btn btn-primary">Ajukan Keberatan</a>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="{{ asset('images/status.png') }}" alt="Status">
                </div>
                <div class="card-content">
                    <h3>Cek Status</h3>
                    <p>Periksa status permohonan dan keberatan Anda</p>
                    <a href="{{ url('/pemeriksaan-permohonan') }}" class="btn btn-outline">Cek Permohonan</a>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-icon">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile">
                </div>
                <div class="card-content">
                    <h3>Profil Saya</h3>
                    <p>Kelola informasi profil dan data pribadi Anda</p>
                    <a href="{{ url('/user/profile') }}" class="btn btn-outline">Lihat Profil</a>
                </div>
            </div>
        </div>

        <div class="dashboard-stats">
            <h3>Statistik Permohonan Anda</h3>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Total Permohonan</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Sedang Diproses</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Selesai</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Keberatan</div>
                </div>
            </div>
        </div>
    </div>
</div>

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
}

.dashboard-welcome {
    text-align: center;
    margin-bottom: 50px;
}

.dashboard-welcome h2 {
    color: #1a3a5f;
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 10px;
}

.dashboard-welcome p {
    color: #666;
    font-size: 18px;
    margin-bottom: 0;
}

.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    margin-bottom: 50px;
}

.dashboard-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 2px solid rgba(26, 58, 95, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.card-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: linear-gradient(135deg, #1a3a5f, #2c5282);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-icon img {
    width: 40px;
    height: 40px;
    filter: brightness(0) invert(1);
}

.card-content h3 {
    color: #1a3a5f;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 10px;
}

.card-content p {
    color: #666;
    font-size: 14px;
    margin-bottom: 20px;
    line-height: 1.5;
}

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    font-size: 14px;
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

.btn-outline {
    background: transparent;
    color: #1a3a5f;
    border: 2px solid #1a3a5f;
}

.btn-outline:hover {
    background: #1a3a5f;
    color: white;
    transform: translateY(-2px);
}

.dashboard-stats {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    border: 2px solid rgba(26, 58, 95, 0.1);
}

.dashboard-stats h3 {
    color: #1a3a5f;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 30px;
    text-align: center;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
}

.stat-item {
    text-align: center;
    padding: 20px;
    background: rgba(26, 58, 95, 0.05);
    border-radius: 10px;
    border: 1px solid rgba(26, 58, 95, 0.1);
}

.stat-number {
    font-size: 32px;
    font-weight: 700;
    color: #1a3a5f;
    margin-bottom: 5px;
}

.stat-label {
    font-size: 14px;
    color: #666;
    font-weight: 600;
}

@media (max-width: 768px) {
    .content-full {
        padding: 40px 20px;
    }
    
    .dashboard-welcome h2 {
        font-size: 28px;
    }
    
    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .dashboard-card {
        padding: 25px 20px;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
@endsection
