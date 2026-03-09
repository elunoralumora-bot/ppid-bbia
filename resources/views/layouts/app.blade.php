<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPID BBIA - Pejabat Pengelola Informasi dan Dokumentasi')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo BBIA" class="logo-img">
                    <div class="logo-text">
                        <h1>PPID | BBIA</h1>
                        <p>Pejabat Pengelola Informasi dan Dokumentasi</p>
                        <p>Balai Besar Industri Agro</p>
                    </div>
                </div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ url('/ppid') }}" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle">Profil</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/tentang-ppid') }}">Tentang PPID</a></li>
                            <li><a href="{{ url('/tugas-dan-fungsi') }}">Tugas dan Fungsi</a></li>
                            <li><a href="{{ url('/struktur-organisasi') }}">Struktur Organisasi</a></li>
                            <li><a href="{{ url('/profil-pejabat') }}">Profil Pejabat</a></li>
                            <li><a href="{{ url('/visi-misi') }}">Visi Misi</a></li>
                            <li><a href="{{ url('/kontak-ppid') }}">Kontak PPID</a></li>
                            <li><a href="{{ url('/galeri-foto') }}">Galeri Foto</a></li>
                            <li><a href="{{ url('/ppid-pelaksana-upt') }}">PPID Pelaksana UPT</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle">Informasi Publik</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/informasi-berkala') }}">Informasi Berkala</a></li>
                            <li><a href="{{ url('/informasi-serta-merta') }}">Informasi Serta Merta</a></li>
                            <li><a href="{{ url('/informasi-setiap-saat') }}">Informasi Setiap Saat</a></li>
                            <li><a href="{{ url('/daftar-informasi-publik') }}">Daftar Informasi Publik Online</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle">Standar Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/regulasi') }}">Regulasi</a></li>
                            <li><a href="{{ url('/prosedur-permohonan') }}">Prosedur Permohonan Informasi</a></li>
                            <li><a href="{{ url('/prosedur-keberatan') }}">Prosedur Pengajuan Keberatan</a></li>
                            <li><a href="{{ url('/mekanisme-sengketa') }}">Mekanisme Penanganan Sengketa Informasi</a></li>
                            <li><a href="{{ url('/sop-ppid') }}">SOP PPID</a></li>
                            <li><a href="{{ url('/kanal-layanan') }}">Kanal Layanan Informasi</a></li>
                            <li><a href="{{ url('/waktu-biaya-layanan') }}">Waktu & Biaya Layanan</a></li>
                            <li><a href="{{ url('/maklumat-informasi-publik') }}">Maklumat Informasi Publik</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle">Laporan</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/laporan-tahunan') }}">Laporan Tahunan PPID</a></li>
                            <li><a href="{{ url('/survey-kepuasan-masyarakat') }}">Laporan Survey Kepuasan Masyarakat</a></li>
                            <li><a href="{{ url('/statistik-layanan') }}">Statistik Layanan Informasi Publik</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        @guest
                            <a href="{{ url('/login') }}" class="btn btn-primary">Permohonan Informasi</a>
                        @else
                            <a href="{{ url('/user/dashboard') }}" class="btn btn-primary">Dashboard User</a>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>PPID BBIA</h3>
                    <p>Pejabat Pengelola Informasi dan Dokumentasi<br>Balai Besar Industri Agro</p>
                    <div class="contact-info-footer">
                        <p><img src="{{ asset('images/phone.jpg') }}" alt="Phone" class="contact-icon"> (0251) 8324068</p>
                        <p><img src="{{ asset('images/email.jpg') }}" alt="Email" class="contact-icon"> cabi@bbia.go.id</p>
                        <p><img src="{{ asset('images/location.jpg') }}" alt="Location" class="contact-icon"> Jl. Ir. H. Juanda No. 11, Bogor</p>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ url('/tentang-ppid') }}">Tentang PPID</a></li>
                        <li><a href="{{ url('/informasi-berkala') }}">Informasi Publik</a></li>
                        <li><a href="{{ url('/prosedur-permohonan') }}">Permohonan Informasi</a></li>
                        <li><a href="{{ url('/laporan-tahunan') }}">Laporan</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="{{ url('/informasi-berkala') }}">Informasi Berkala</a></li>
                        <li><a href="{{ url('/informasi-serta-merta') }}">Informasi Serta Merta</a></li>
                        <li><a href="{{ url('/informasi-setiap-saat') }}">Informasi Setiap Saat</a></li>
                        <li><a href="{{ url('/daftar-informasi-publik') }}">Daftar Informasi Publik</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Ikuti Kami</h4>
                    <div class="social-links-footer">
                        <a href="https://www.facebook.com/bbia.kemenperin" target="_blank" class="social-link"><img src="{{ asset('images/facebook.jpg') }}" alt="Facebook"></a>
                        <a href="https://twitter.com/bbia_kemenperin" target="_blank" class="social-link"><img src="{{ asset('images/twitter.jpg') }}" alt="Twitter"></a>
                        <a href="https://www.instagram.com/bbia.kemenperin" target="_blank" class="social-link"><img src="{{ asset('images/instagram.jpg') }}" alt="Instagram"></a>
                        <a href="https://www.youtube.com/c/BalaiBesarIndustriAgro" target="_blank" class="social-link"><img src="{{ asset('images/youtube.jpg') }}" alt="YouTube"></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 PPID BBIA. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Dropdown menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const dropdown = this.nextElementSibling;
                    const parent = this.parentElement;
                    
                    // Close other dropdowns
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        if (menu !== dropdown) {
                            menu.style.display = 'none';
                        }
                    });
                    
                    // Toggle current dropdown
                    if (dropdown.style.display === 'block') {
                        dropdown.style.display = 'none';
                    } else {
                        dropdown.style.display = 'block';
                    }
                });
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.matches('.dropdown-toggle')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.style.display = 'none';
                    });
                }
            });
        });
    </script>
</body>
</html>
