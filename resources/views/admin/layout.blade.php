<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - PPID BBIA')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 70px;
            background: #0f2338;
            color: white;
            transition: width 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar:hover {
            width: 250px;
        }
        
        .sidebar-header {
            padding: 1rem;
            background: #0a1825;
            border-bottom: 1px solid #2c5282;
            white-space: nowrap;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 70px;
            overflow: hidden;
        }
        
        .bbia-icon {
            width: 24px;
            height: 24px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .bbia-icon svg {
            width: 24px !important;
            height: 24px !important;
            fill: white !important;
            transition: all 0.3s ease;
        }
        
        .sidebar:hover .bbia-icon {
            margin-right: 0.75rem !important;
        }
        
        .sidebar:hover .bbia-icon svg {
            width: 32px !important;
            height: 32px !important;
        }
        
        .sidebar:hover .sidebar-header {
            justify-content: flex-start;
            padding: 1rem 1.5rem;
        }
        
        .sidebar-header h2 {
            margin: 0;
            font-size: 0;
            font-weight: 600;
            transition: font-size 0.3s ease;
            opacity: 0;
        }
        
        .sidebar:hover .sidebar-header h2 {
            font-size: 1.2rem;
            opacity: 1;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            /* Remove border separator */
        }
        
        .sidebar-menu li.divider {
            border-top: 1px solid rgba(255,255,255,0.2);
            margin: 0.5rem 0;
        }
        
        .sidebar-menu li.divider:first-child {
            display: none;
        }
        
        .admin-profile {
            padding: 1rem;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.2);
            margin-top: 0.5rem;
        }
        
        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3498db, #2980b9);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
            margin: 0 auto 0.5rem;
            transition: all 0.3s ease;
        }
        
        .sidebar:hover .admin-avatar {
            width: 50px;
            height: 50px;
            font-size: 18px;
        }
        
        .admin-name {
            font-size: 0;
            color: white;
            font-weight: 500;
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .sidebar:hover .admin-name {
            font-size: 0.9rem;
            opacity: 1;
        }
        
        .admin-actions {
            margin-top: 0.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
        
        .admin-actions a {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 0;
            opacity: 0;
            transition: all 0.3s ease;
            gap: 0.5rem;
        }
        
        .sidebar:hover .admin-actions a {
            font-size: 0.8rem;
            opacity: 1;
            padding: 0.5rem;
        }
        
        .admin-actions a:hover {
            color: white;
            background: rgba(255,255,255,0.1);
            border-radius: 4px;
        }
        
        .admin-actions a i {
            font-size: 12px;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 1rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            gap: 0.75rem;
            justify-content: center;
            position: relative;
        }
        
        .sidebar:hover .sidebar-menu a {
            justify-content: flex-start;
            padding: 1rem 1.5rem;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #2c5282;
        }
        
        .sidebar-menu a i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            flex-shrink: 0;
            z-index: 2;
            position: relative;
        }
        
        .sidebar-menu a span {
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }
        
        .sidebar:hover .sidebar-menu a span {
            opacity: 1;
            visibility: visible;
            position: static;
            left: auto;
            transform: none;
        }
        
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }
        
        .top-bar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .top-bar h1 {
            margin: 0;
            color: #0f2338;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .content {
            padding: 2rem;
            flex: 1;
        }
        
        .card {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .card h2 {
            margin: 0 0 1.5rem 0;
            color: #0f2338;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: #3498db;
            color: white;
        }
        
        .btn-primary:hover {
            background: #2980b9;
        }
        
        .btn-success {
            background: #27ae60;
            color: white;
        }
        
        .btn-success:hover {
            background: #229954;
        }
        
        .btn-warning {
            background: #f39c12;
            color: white;
        }
        
        .btn-warning:hover {
            background: #e67e22;
        }
        
        .btn-danger {
            background: #e74c3c;
            color: white;
        }
        
        .btn-danger:hover {
            background: #c0392b;
        }
        
        .btn-info {
            background: #17a2b8;
            color: white;
        }
        
        .btn-info:hover {
            background: #138496;
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid #3498db;
            color: #3498db;
        }
        
        .btn-outline:hover {
            background: #3498db;
            color: white;
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        .table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #0f2338;
        }
        
        .table tbody tr:hover {
            background: #f8f9fa;
        }
        
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .stat-card h3 {
            margin: 0 0 0.5rem 0;
            color: #0f2338;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #3498db;
            margin-bottom: 0.5rem;
        }
        
        .stat-detail {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
            font-size: 0.8rem;
        }
        
        .stat-detail span {
            background: #f8f9fa;
            padding: 0.25rem 0.5rem;
            border-radius: 10px;
            color: #666;
        }
        
        .published { background: #d4edda !important; color: #155724 !important; }
        .draft { background: #fff3cd !important; color: #856404 !important; }
        .baru { background: #f8d7da !important; color: #721c24 !important; }
        .proses { background: #d1ecf1 !important; color: #0c5460 !important; }
        
        .recent-activity {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .recent-activity h2 {
            margin: 0 0 1rem 0;
            color: #0f2338;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .activity-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #eee;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-title {
            flex: 1;
            color: #333;
            font-size: 0.9rem;
        }
        
        .activity-date {
            color: #666;
            font-size: 0.8rem;
        }
        
        .quick-actions {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 2rem;
        }
        
        .quick-actions h2 {
            margin: 0 0 1rem 0;
            color: #0f2338;
            font-size: 1.2rem;
            font-weight: 600;
        }
        
        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -70px;
                z-index: 1000;
                height: 100vh;
            }
            
            .sidebar.show {
                left: 0;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .dashboard-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="bbia-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <!-- Shield shape for authority -->
                        <path d="M12 1L3 5V11C3 16 12 21 12 21S21 16 21 11V5L12 1Z" fill="currentColor"/>
                        <!-- BB text inside shield -->
                        <text x="12" y="14" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="7" font-weight="bold">BB</text>
                        <!-- Small decoration -->
                        <circle cx="12" cy="17" r="1" fill="white"/>
                    </svg>
                </div>
                <h2>PPID ADMIN</h2>
            </div>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i>
                        <span>Kelola Berita</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profil') }}" class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                        <i class="fas fa-building"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.informasi-publik') }}" class="{{ request()->routeIs('admin.informasi-publik.*') ? 'active' : '' }}">
                        <i class="fas fa-info-circle"></i>
                        <span>Informasi Publik</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.standar-layanan') }}" class="{{ request()->routeIs('admin.standar-layanan.*') ? 'active' : '' }}">
                        <i class="fas fa-cogs"></i>
                        <span>Standar Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.laporan-publik') }}" class="{{ request()->routeIs('admin.laporan-publik.*') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Laporan Publik</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.permohonan') }}" class="{{ request()->routeIs('admin.permohonan') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Permohonan Informasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.keberatan') }}" class="{{ request()->routeIs('admin.keberatan') ? 'active' : '' }}">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Pengajuan Keberatan</span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('admin.reports') }}" class="{{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        <i class="fas fa-chart-line"></i>
                        <span>Laporan Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
            </ul>
            
            <!-- Admin Profile Section -->
            <div class="admin-profile">
                <div class="admin-avatar">{{ strtoupper(substr(auth()->guard('admin')->user()->name, 0, 1)) }}</div>
                <div class="admin-name">{{ auth()->guard('admin')->user()->name }}</div>
                <div class="admin-actions">
                    <a href="{{ url('/') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        <span>View Site</span>
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: rgba(255,255,255,0.8); padding: 0.5rem; font-size: 0; opacity: 0; transition: all 0.3s ease; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 0.5rem;" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <style>
            .sidebar:hover .logout-btn {
                font-size: 0.8rem !important;
                opacity: 1 !important;
                padding: 0.5rem !important;
            }
            .logout-btn:hover {
                color: white !important;
                background: rgba(255,255,255,0.1) !important;
                border-radius: 4px !important;
            }
        </style>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <h1>@yield('page-title', 'Dashboard')</h1>
            </div>
            
            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    
    <script>
        // Mobile sidebar toggle
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
    @stack('scripts')
</body>
</html>