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
            background: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* ===================== SIDEBAR ===================== */
        .sidebar {
            width: 70px;
            background: linear-gradient(180deg, #0f2338 0%, #0a1825 100%);
            color: white;
            transition: width 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow: hidden;
            overflow-y: auto;
            z-index: 100;
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 15px rgba(0,0,0,0.2);
        }

        .sidebar:hover {
            width: 275px;
        }

        /* Custom scrollbar for sidebar */
        .sidebar::-webkit-scrollbar { width: 3px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.2); border-radius: 3px; }

        .sidebar-header {
            padding: 1rem;
            background: rgba(0,0,0,0.2);
            border-bottom: 1px solid rgba(255,255,255,0.08);
            white-space: nowrap;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 70px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .bbia-icon {
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .bbia-icon svg {
            width: 32px;
            height: 32px;
            fill: white;
        }

        .sidebar-header h2 {
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: white;
            margin: 0 0 0 0.75rem;
            opacity: 0;
            white-space: nowrap;
            transition: opacity 0.2s ease;
        }

        .sidebar:hover .sidebar-header h2 {
            opacity: 1;
        }

        .sidebar:hover .sidebar-header {
            justify-content: flex-start;
        }

        /* ===================== SIDEBAR MENU ===================== */
        .sidebar-menu {
            list-style: none;
            padding: 0.75rem 0;
            margin: 0;
            flex: 1;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 0.8rem 1.2rem;
            color: rgba(255, 255, 255, 0.65);
            text-decoration: none;
            transition: all 0.25s ease;
            white-space: nowrap;
            font-size: 0.875rem;
            border-left: 3px solid transparent;
            gap: 0.85rem;
        }

        .sidebar-menu li a i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .sidebar-menu li a span {
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .sidebar:hover .sidebar-menu li a span {
            opacity: 1;
        }

        .sidebar-menu li a:hover {
            background: rgba(255, 255, 255, 0.08);
            color: white;
            border-left-color: rgba(59, 130, 246, 0.6);
        }

        .sidebar-menu li a.active {
            background: rgba(59, 130, 246, 0.18);
            color: #60a5fa;
            border-left-color: #3b82f6;
        }

        .sidebar-menu li a.active i {
            color: #60a5fa;
        }

        .sidebar-menu li.divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.07);
            margin: 0.5rem 1rem;
        }

        /* ===================== DROPDOWN PROFIL ===================== */
        .dropdown-toggle {
            position: relative;
            cursor: pointer;
        }

        .dropdown-arrow {
            margin-left: auto !important;
            transition: transform 0.3s ease;
            font-size: 11px !important;
            opacity: 0;
            width: auto !important;
        }

        .sidebar:hover .dropdown-arrow {
            opacity: 1;
        }

        .dropdown-toggle.open .dropdown-arrow {
            transform: rotate(180deg);
        }

        /* Submenu */
        .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease, opacity 0.3s ease;
            opacity: 0;
            background: rgba(0, 0, 0, 0.15);
        }

        .submenu.show {
            max-height: 600px;
            opacity: 1;
        }

        .submenu li a {
            padding: 0.65rem 1.2rem 0.65rem 3.2rem !important;
            font-size: 0.82rem !important;
            color: rgba(255, 255, 255, 0.55) !important;
            border-left: 3px solid transparent !important;
            white-space: normal !important;
            line-height: 1.4;
        }

        .submenu li a i {
            font-size: 8px !important;
            width: 10px !important;
        }

        .submenu li a:hover {
            background: rgba(255, 255, 255, 0.06) !important;
            color: rgba(255, 255, 255, 0.9) !important;
            padding-left: 3.5rem !important;
            border-left-color: rgba(59, 130, 246, 0.4) !important;
        }

        .submenu li a.active {
            background: rgba(59, 130, 246, 0.15) !important;
            color: #60a5fa !important;
            border-left-color: #3b82f6 !important;
        }

        /* Hide submenu when sidebar is collapsed */
        .sidebar:not(:hover) .submenu {
            max-height: 0 !important;
            opacity: 0 !important;
        }

        /* Active parent state */
        li a.dropdown-toggle.open {
            background: rgba(59, 130, 246, 0.1);
            color: rgba(255, 255, 255, 0.9);
        }

        /* ===================== ADMIN PROFILE ===================== */
        .admin-profile {
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            white-space: nowrap;
            flex-shrink: 0;
        }

        .admin-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            color: white;
            flex-shrink: 0;
            margin: 0 auto;
            transition: margin 0.3s ease;
        }

        .sidebar:hover .admin-avatar {
            margin: 0;
        }

        .admin-profile-inner {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .admin-info {
            opacity: 0;
            transition: opacity 0.2s ease;
            overflow: hidden;
        }

        .sidebar:hover .admin-info {
            opacity: 1;
        }

        .admin-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: white;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 160px;
        }

        .admin-role {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.5);
        }

        .admin-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.6rem;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .sidebar:hover .admin-actions {
            opacity: 1;
        }

        .admin-actions a,
        .admin-actions button {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.6rem;
            border-radius: 6px;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            background: rgba(255,255,255,0.07);
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
            font-family: 'Inter', sans-serif;
        }

        .admin-actions a:hover,
        .admin-actions button:hover {
            background: rgba(255,255,255,0.14);
            color: white;
        }

        .admin-actions .logout-btn {
            color: rgba(248, 113, 113, 0.8);
        }

        .admin-actions .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
        }

        /* ===================== MAIN CONTENT ===================== */
        .main-content {
            margin-left: 70px;
            flex: 1;
            transition: margin-left 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: margin-left;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar:hover ~ .main-content {
            margin-left: 275px;
        }

        .top-bar {
            background: white;
            padding: 1rem 1.75rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .top-bar h1 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f2338;
            margin: 0;
        }

        .content {
            padding: 1.75rem;
            flex: 1;
        }

        /* ===================== STATS & CARDS ===================== */
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.25rem;
            margin-bottom: 1.75rem;
        }

        .stat-card {
            background: linear-gradient(135deg, #1e3a5f 0%, #0f2338 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(15,35,56,0.2);
        }

        .stat-card h3 {
            margin: 0 0 0.5rem 0;
            font-size: 0.85rem;
            opacity: 0.75;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-card .number {
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1;
        }

        /* ===================== BUTTONS ===================== */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 1.1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary { background: #3b82f6; color: white; }
        .btn-primary:hover { background: #2563eb; box-shadow: 0 4px 12px rgba(59,130,246,0.4); }
        .btn-success { background: #10b981; color: white; }
        .btn-success:hover { background: #059669; }
        .btn-warning { background: #f59e0b; color: white; }
        .btn-warning:hover { background: #d97706; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }
        .btn-info { background: #06b6d4; color: white; }
        .btn-info:hover { background: #0891b2; }
        .btn-secondary { background: #64748b; color: white; }
        .btn-secondary:hover { background: #475569; }
        .btn-sm { padding: 0.35rem 0.7rem; font-size: 0.8rem; }

        /* ===================== TABLES ===================== */
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #f8fafc;
            padding: 0.85rem 1rem;
            text-align: left;
            font-size: 0.8rem;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            border-bottom: 2px solid #e2e8f0;
        }

        table td {
            padding: 0.85rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.875rem;
            color: #374151;
            vertical-align: middle;
        }

        table tr:last-child td { border-bottom: none; }
        table tr:hover td { background: #f8fafc; }

        /* ===================== FORMS ===================== */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.4rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.65rem 0.85rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            color: #374151;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            background: #fff;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.1);
        }

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 1.75rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }

        /* ===================== ALERTS ===================== */
        .alert {
            padding: 0.85rem 1.1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-success { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-danger  { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
        .alert-warning { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .alert-info    { background: #eff6ff; color: #1e40af; border: 1px solid #bfdbfe; }

        /* ===================== BADGES ===================== */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.6rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success  { background: #d1fae5; color: #065f46; }
        .badge-danger   { background: #fee2e2; color: #991b1b; }
        .badge-warning  { background: #fef3c7; color: #92400e; }
        .badge-info     { background: #dbeafe; color: #1e40af; }
        .badge-secondary{ background: #f1f5f9; color: #475569; }

        /* ===================== RECENT ACTIVITY ===================== */
        .recent-activity {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }

        .recent-activity h2 {
            margin: 0 0 1rem 0;
            font-size: 1rem;
            font-weight: 700;
            color: #0f2338;
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
            border-bottom: 1px solid #f1f5f9;
        }

        .activity-item:last-child { border-bottom: none; }

        .activity-title {
            flex: 1;
            color: #374151;
            font-size: 0.875rem;
        }

        .activity-date {
            color: #94a3b8;
            font-size: 0.8rem;
            white-space: nowrap;
            margin-left: 1rem;
        }

        /* ===================== RESPONSIVE ===================== */
        @media (max-width: 768px) {
            .sidebar {
                left: -70px;
            }

            .sidebar.show {
                left: 0;
                width: 275px;
            }

            .sidebar:hover ~ .main-content,
            .sidebar.show ~ .main-content {
                margin-left: 0;
            }

            .sidebar.show .sidebar-menu li a span,
            .sidebar.show .sidebar-header h2,
            .sidebar.show .admin-info,
            .sidebar.show .admin-actions,
            .sidebar.show .dropdown-arrow {
                opacity: 1;
            }

            .sidebar.show .admin-avatar {
                margin: 0;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="admin-container">

        <!-- ===================== SIDEBAR ===================== -->
        <div class="sidebar" id="sidebar">

            <!-- Header -->
            <div class="sidebar-header">
                <div class="bbia-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 1L3 5V11C3 16 12 21 12 21S21 16 21 11V5L12 1Z" fill="currentColor"/>
                        <text x="12" y="14" text-anchor="middle" fill="white" font-family="Arial, sans-serif" font-size="7" font-weight="bold">BB</text>
                        <circle cx="12" cy="17" r="1" fill="white"/>
                    </svg>
                </div>
                <h2>PPID ADMIN</h2>
            </div>

            <!-- Menu -->
            <ul class="sidebar-menu">

                <!-- Dashboard -->
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Kelola Berita -->
                <li>
                    <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper"></i>
                        <span>Kelola Berita</span>
                    </a>
                </li>

                <li class="divider"></li>

                <!-- PROFIL - Collapsible Dropdown -->
                @php
                    $profilRoutes = [
                        'admin.tentang-ppid', 'admin.tentang-ppid.*',
                        'admin.tugas-dan-fungsi', 'admin.tugas-dan-fungsi.*',
                        'admin.struktur-organisasi', 'admin.struktur-organisasi.*',
                        'admin.profil-pejabat', 'admin.profil-pejabat.*',
                        'admin.visi-misi', 'admin.visi-misi.*',
                        'admin.kontak-ppid', 'admin.kontak-ppid.*',
                    ];
                    $isProfilActive = request()->routeIs(...$profilRoutes);
                @endphp
                <li>
                    <a href="javascript:void(0)"
                       onclick="toggleDropdown('profilMenu', 'profilBtn', 'arrowProfil')"
                       id="profilBtn"
                       class="dropdown-toggle {{ $isProfilActive ? 'open active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Profil</span>
                        <i class="fas fa-chevron-down dropdown-arrow" id="arrowProfil"></i>
                    </a>
                    <ul id="profilMenu" class="submenu {{ $isProfilActive ? 'show' : '' }}">
                        <li>
                            <a href="{{ route('admin.tentang-ppid') }}"
                               class="{{ request()->routeIs('admin.tentang-ppid', 'admin.tentang-ppid.*') ? 'active' : '' }}">
                                <i class="fas fa-angle-right"></i>
                                <span>Tentang PPID</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.tugas-dan-fungsi') }}"
                               class="{{ request()->routeIs('admin.tugas-dan-fungsi', 'admin.tugas-dan-fungsi.*') ? 'active' : '' }}">
                                <i class="fas fa-angle-right"></i>
                                <span>Tugas & Fungsi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.struktur-organisasi') }}"
                               class="{{ request()->routeIs('admin.struktur-organisasi', 'admin.struktur-organisasi.*') ? 'active' : '' }}">
                                <i class="fas fa-angle-right"></i>
                                <span>Struktur Organisasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.profil-pejabat') }}"
                               class="{{ request()->routeIs('admin.profil-pejabat', 'admin.profil-pejabat.*') ? 'active' : '' }}">
                                <i class="fas fa-angle-right"></i>
                                <span>Profil Pejabat</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.visi-misi') }}"
                               class="{{ request()->routeIs('admin.visi-misi', 'admin.visi-misi.*') ? 'active' : '' }}">
                                <i class="fas fa-angle-right"></i>
                                <span>Visi & Misi</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.kontak-ppid') }}"
                               class="{{ request()->routeIs('admin.kontak-ppid', 'admin.kontak-ppid.*') ? 'active' : '' }}">
                                <i class="fas fa-angle-right"></i>
                                <span>Kontak PPID</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- INFORMASI PUBLIK - Dropdown -->
                @php
                    $isInfoPubActive = request()->routeIs('admin.informasi-publik', 'admin.informasi-publik.*');
                    $infoPubKat = request()->query('kategori');
                @endphp
                <li>
                    <a href="javascript:void(0)"
                       onclick="toggleDropdown('infoPubMenu', 'infoPubBtn', 'arrowInfoPub')"
                       id="infoPubBtn"
                       class="dropdown-toggle {{ $isInfoPubActive ? 'open active' : '' }}">
                        <i class="fas fa-folder-open"></i>
                        <span>Informasi Publik</span>
                        <i class="fas fa-chevron-down dropdown-arrow" id="arrowInfoPub"></i>
                    </a>
                    <ul id="infoPubMenu" class="submenu {{ $isInfoPubActive ? 'show' : '' }}">
                        <li><a href="{{ route('admin.informasi-publik') }}" class="{{ $isInfoPubActive && !$infoPubKat && !request()->routeIs('admin.informasi-publik.*') ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Semua Informasi</span></a></li>
                        <li><a href="{{ route('admin.informasi-publik') }}?kategori=Berkala" class="{{ $isInfoPubActive && $infoPubKat === 'Berkala' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Informasi Berkala</span></a></li>
                        <li><a href="{{ route('admin.informasi-publik') }}?kategori=Serta+Merta" class="{{ $isInfoPubActive && $infoPubKat === 'Serta Merta' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Informasi Serta Merta</span></a></li>
                        <li><a href="{{ route('admin.informasi-publik') }}?kategori=Setiap+Saat" class="{{ $isInfoPubActive && $infoPubKat === 'Setiap Saat' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Informasi Setiap Saat</span></a></li>
                        <li><a href="{{ route('admin.informasi-publik') }}?kategori=DIP+Online" class="{{ $isInfoPubActive && $infoPubKat === 'DIP Online' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Daftar Informasi Publik Online</span></a></li>
                        <li><a href="{{ route('admin.informasi-publik.create') }}" class="{{ request()->routeIs('admin.informasi-publik.create') ? 'active' : '' }}"><i class="fas fa-plus"></i><span>Tambah Informasi</span></a></li>
                    </ul>
                </li>

                <!-- STANDAR LAYANAN - Dropdown -->
                @php
                    $isStandarActive = request()->routeIs('admin.standar-layanan', 'admin.standar-layanan.*');
                    $standarJenis = request()->query('jenis');
                @endphp
                <li>
                    <a href="javascript:void(0)"
                       onclick="toggleDropdown('standarMenu', 'standarBtn', 'arrowStandar')"
                       id="standarBtn"
                       class="dropdown-toggle {{ $isStandarActive ? 'open active' : '' }}">
                        <i class="fas fa-shield-alt"></i>
                        <span>Standar Layanan</span>
                        <i class="fas fa-chevron-down dropdown-arrow" id="arrowStandar"></i>
                    </a>
                    <ul id="standarMenu" class="submenu {{ $isStandarActive ? 'show' : '' }}">
                        <li><a href="{{ route('admin.standar-layanan') }}" class="{{ $isStandarActive && !$standarJenis && !request()->routeIs('admin.standar-layanan.*') ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Semua Dokumen</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan') }}?jenis=Regulasi" class="{{ $isStandarActive && $standarJenis === 'Regulasi' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Regulasi</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan') }}?jenis=Prosedur+Permohonan" class="{{ $isStandarActive && $standarJenis === 'Prosedur Permohonan' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Prosedur Permohonan Informasi</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan') }}?jenis=Prosedur+Keberatan" class="{{ $isStandarActive && $standarJenis === 'Prosedur Keberatan' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Prosedur Pengajuan Keberatan</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan') }}?jenis=Mekanisme+Sengketa" class="{{ $isStandarActive && $standarJenis === 'Mekanisme Sengketa' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Mekanisme Penanganan Sengketa Informasi</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan') }}?jenis=SOP+PPID" class="{{ $isStandarActive && $standarJenis === 'SOP PPID' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>SOP PPID</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan') }}?jenis=Kanal+Layanan" class="{{ $isStandarActive && $standarJenis === 'Kanal Layanan' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Kanal Layanan Informasi</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan') }}?jenis=Waktu+Biaya" class="{{ $isStandarActive && $standarJenis === 'Waktu Biaya' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Waktu &amp; Biaya Layanan</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan') }}?jenis=Maklumat" class="{{ $isStandarActive && $standarJenis === 'Maklumat' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Maklumat Informasi Publik</span></a></li>
                        <li><a href="{{ route('admin.standar-layanan.create') }}" class="{{ request()->routeIs('admin.standar-layanan.create') ? 'active' : '' }}"><i class="fas fa-plus"></i><span>Tambah Dokumen</span></a></li>
                    </ul>
                </li>

                <!-- LAPORAN - Dropdown -->
                @php
                    $isLaporanActive = request()->routeIs('admin.laporan-publik', 'admin.laporan-publik.*');
                    $laporanKat = request()->query('kategori');
                @endphp
                <li>
                    <a href="javascript:void(0)"
                       onclick="toggleDropdown('laporanMenu', 'laporanBtn', 'arrowLaporan')"
                       id="laporanBtn"
                       class="dropdown-toggle {{ $isLaporanActive ? 'open active' : '' }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Laporan</span>
                        <i class="fas fa-chevron-down dropdown-arrow" id="arrowLaporan"></i>
                    </a>
                    <ul id="laporanMenu" class="submenu {{ $isLaporanActive ? 'show' : '' }}">
                        <li><a href="{{ route('admin.laporan-publik') }}" class="{{ $isLaporanActive && !$laporanKat && !request()->routeIs('admin.laporan-publik.*') ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Semua Laporan</span></a></li>
                        <li><a href="{{ route('admin.laporan-publik') }}?kategori=Laporan+Tahunan" class="{{ $isLaporanActive && $laporanKat === 'Laporan Tahunan' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Laporan Tahunan PPID</span></a></li>
                        <li><a href="{{ route('admin.laporan-publik') }}?kategori=Survey+Kepuasan" class="{{ $isLaporanActive && $laporanKat === 'Survey Kepuasan' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Laporan Survey Kepuasan Masyarakat</span></a></li>
                        <li><a href="{{ route('admin.laporan-publik') }}?kategori=Statistik+Layanan" class="{{ $isLaporanActive && $laporanKat === 'Statistik Layanan' ? 'active' : '' }}"><i class="fas fa-angle-right"></i><span>Statistik Layanan Informasi Publik</span></a></li>
                        <li><a href="{{ route('admin.laporan-publik.create') }}" class="{{ request()->routeIs('admin.laporan-publik.create') ? 'active' : '' }}"><i class="fas fa-plus"></i><span>Tambah Laporan</span></a></li>
                    </ul>
                </li>

                <li class="divider"></li>

                <!-- Permohonan Informasi -->
                <li>
                    <a href="{{ route('admin.permohonan') }}"
                       class="{{ request()->routeIs('admin.permohonan') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Permohonan Informasi</span>
                    </a>
                </li>

                <!-- Pengajuan Keberatan -->
                <li>
                    <a href="{{ route('admin.keberatan') }}"
                       class="{{ request()->routeIs('admin.keberatan') ? 'active' : '' }}">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Pengajuan Keberatan</span>
                    </a>
                </li>

                <li class="divider"></li>

                <!-- Laporan Admin -->
                <li>
                    <a href="{{ route('admin.reports') }}"
                       class="{{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        <i class="fas fa-chart-line"></i>
                        <span>Laporan Admin</span>
                    </a>
                </li>

                <!-- Pengguna -->
                <li>
                    <a href="{{ route('admin.users') }}"
                       class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Pengguna</span>
                    </a>
                </li>

            </ul>

            <!-- Admin Profile Section -->
            <div class="admin-profile">
                <div class="admin-profile-inner">
                    <div class="admin-avatar">
                        {{ strtoupper(substr(auth()->guard('admin')->user()->name, 0, 1)) }}
                    </div>
                    <div class="admin-info">
                        <div class="admin-name">{{ auth()->guard('admin')->user()->name }}</div>
                        <div class="admin-role">Administrator</div>
                    </div>
                </div>
                <div class="admin-actions">
                    <a href="{{ url('/') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i>
                        <span>View Site</span>
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
        <!-- ===================== END SIDEBAR ===================== -->

        <!-- Main Content -->
        <div class="main-content">

            <!-- Top Bar -->
            <div class="top-bar">
                <h1>@yield('page-title', 'Dashboard')</h1>
                <div style="display:flex; align-items:center; gap:1rem;">
                    @yield('top-bar-actions')
                </div>
            </div>

            <!-- Alert Messages -->
            <div style="padding: 1.25rem 1.75rem 0;">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-times-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ session('warning') }}
                    </div>
                @endif
            </div>

            <!-- Page Content -->
            <div class="content">
                @yield('content')
            </div>

        </div>

    </div>

    <!-- ===================== JAVASCRIPT ===================== -->
    <script>
        /**
         * Generic dropdown toggle untuk sidebar
         */
        function toggleDropdown(menuId, btnId, arrowId) {
            const menu = document.getElementById(menuId);
            const btn  = document.getElementById(btnId);

            const isOpen = menu.classList.contains('show');

            // Tutup semua submenu dulu
            document.querySelectorAll('.submenu').forEach(m => {
                m.classList.remove('show');
            });
            document.querySelectorAll('.dropdown-toggle').forEach(b => {
                b.classList.remove('open');
                // Hanya hapus 'active' jika bukan halaman yang sedang aktif
                if (!b.classList.contains('page-active')) {
                    b.classList.remove('active');
                }
            });

            // Toggle yang diklik
            if (!isOpen) {
                menu.classList.add('show');
                btn.classList.add('open', 'active');
            }
        }

        /**
         * Auto-buka submenu saat sidebar di-hover jika ada item aktif
         */
        document.addEventListener('DOMContentLoaded', function () {
            // Jika ada submenu yang aktif, tandai parent btn sebagai page-active
            document.querySelectorAll('.submenu a.active').forEach(function(activeLink) {
                const submenu = activeLink.closest('.submenu');
                if (submenu) {
                    const parentLi = submenu.closest('li');
                    if (parentLi) {
                        const parentBtn = parentLi.querySelector('.dropdown-toggle');
                        if (parentBtn) {
                            parentBtn.classList.add('page-active');
                        }
                    }
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>