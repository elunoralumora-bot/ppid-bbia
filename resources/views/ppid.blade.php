<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPID BBIA - Pejabat Pengelola Informasi dan Dokumentasi</title>
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
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Banner -->
    <section class="hero-banner">
        <div class="container">
            <div class="hero-content-centered">
                <div class="hero-text">
                    <h2>PPID BALAI BESAR INDUSTRI AGRO</h2>
                    <h1>Pejabat Pengelola Informasi dan Dokumentasi</h1>
                    <p>Menyediakan informasi publik yang transparan dan akuntabel untuk masyarakat</p>
                    <a href="https://bbia.go.id" target="_blank" class="btn btn-outline">
                        <i class="icon-external"></i> Kunjungi Website Resmi BBIA
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Service Section -->
            <section class="service-section">
                <h2>Layanan PPID BBIA</h2>
                
                <!-- Top Services -->
                <div class="top-services">
                    <div class="service-box">
                        <h3>AJUKAN</h3>
                        <p>Ajukan permohonan informasi publik</p>
                        <a href="{{ url('/form-permohonan') }}" class="service-link">Form Permohonan →</a>
                    </div>
                    <div class="service-box">
                        <h3>KEBERATAN</h3>
                        <p>Ajukan keberatan atas layanan informasi</p>
                        <a href="{{ url('/form-keberatan') }}" class="service-link">Form Keberatan →</a>
                    </div>
                </div>
                
                <!-- Divider -->
                <div class="divider">
                    <div class="divider-line"></div>
                    <div class="divider-diamond"></div>
                    <div class="divider-line"></div>
                </div>
                
                <!-- Service Icons -->
                <div class="service-icons">
                    <div class="service-icon-item">
                        <a href="{{ url('/informasi-publik') }}">
                            <div class="icon-box">
                                <img src="{{ asset('images/informasi publik.png') }}" alt="Informasi Publik">
                            </div>
                            <span>Informasi Publik</span>
                        </a>
                    </div>
                    <div class="service-icon-item">
                        <a href="{{ url('/periksa-permohonan') }}">
                            <div class="icon-box">
                                <img src="{{ asset('images/periksa permohonan.png') }}" alt="Periksa Permohonan">
                            </div>
                            <span>Periksa Permohonan</span>
                        </a>
                    </div>
                    <div class="service-icon-item">
                        <a href="{{ url('/periksa-keberatan') }}">
                            <div class="icon-box">
                                <img src="{{ asset('images/periksa keberatan.png') }}" alt="Periksa Keberatan">
                            </div>
                            <span>Periksa Keberatan</span>
                        </a>
                    </div>
                    <div class="service-icon-item">
                        <a href="{{ url('/statistik-layanan') }}">
                            <div class="icon-box">
                                <img src="{{ asset('images/statistik layanan.png') }}" alt="Statistik Layanan">
                            </div>
                            <span>Statistik Layanan</span>
                        </a>
                    </div>
                    <div class="service-icon-item">
                        <a href="{{ url('/kanal-pengaduan') }}">
                            <div class="icon-box">
                                <img src="{{ asset('images/kanal pengaduan.png') }}" alt="Kanal Pengaduan">
                            </div>
                            <span>Kanal Pengaduan</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- News Section -->
            <section class="news-section">
                <h2>Berita Terkini</h2>
                <div class="news-grid">
                    @php
                        $beritas = \App\Models\Berita::where('status', 'published')->latest()->take(3)->get();
                    @endphp
                    
                    @forelse ($beritas as $berita)
                    <article class="news-card">
                        <div class="news-image">
                            @if ($berita->gambar)
                                <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}">
                            @else
                                <img src="{{ asset('images/news-1.jpg') }}" alt="{{ $berita->judul }}">
                            @endif
                        </div>
                        <div class="news-content">
                            <span class="news-date">{{ $berita->tanggal_publikasi ? $berita->tanggal_publikasi->format('d F Y') : $berita->created_at->format('d F Y') }}</span>
                            <h3>{{ $berita->judul }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 100) }}</p>
                            <a href="{{ url('/berita/detail/' . $berita->slug) }}" class="read-more">Baca Selengkapnya →</a>
                        </div>
                    </article>
                    @empty
                    <div class="no-berita">
                        <p>Belum ada berita yang tersedia saat ini.</p>
                    </div>
                    @endforelse
                </div>
                <div class="news-actions">
                    <a href="{{ url('/berita') }}" class="btn btn-primary">Lihat Semua Berita</a>
                </div>
            </section>

            <!-- Social Media Section -->
            <section class="social-media-section">
                <h2>Media Sosial</h2>
                <div class="social-grid">
                    <div class="social-card">
                        <div class="social-icon facebook">
                            <img src="{{ asset('images/facebook.jpg') }}" alt="Facebook">
                        </div>
                        <h3>Facebook</h3>
                        <p>Ikuti kami di Facebook untuk informasi PPID terkini</p>
                        <a href="https://www.facebook.com/share/1HjneEvdFG/" target="_blank" class="social-link">Ikuti</a>
                    </div>
                    <div class="social-card">
                        <div class="social-icon twitter">
                            <img src="{{ asset('images/twitter.jpg') }}" alt="Twitter">
                        </div>
                        <h3>Twitter</h3>
                        <p>Dapatkan update cepat tentang layanan PPID BBIA</p>
                        <a href="https://x.com/bbia_kemenperin" target="_blank" class="social-link">Ikuti</a>
                    </div>
                    <div class="social-card">
                        <div class="social-icon instagram">
                            <img src="{{ asset('images/instagram.jpg') }}" alt="Instagram">
                        </div>
                        <h3>Instagram</h3>
                        <p>Galeri foto dan kegiatan PPID BBIA</p>
                        <a href="https://www.instagram.com/bbia_kemenperin?igsh=MXU3bG5jcXdmYWo2eQ==" target="_blank" class="social-link">Ikuti</a>
                    </div>
                    <div class="social-card">
                        <div class="social-icon youtube">
                            <img src="{{ asset('images/youtube.jpg') }}" alt="YouTube">
                        </div>
                        <h3>YouTube</h3>
                        <p>Video sosialisasi dan informasi PPID BBIA</p>
                        <a href="https://youtube.com/@tibbia9891?si=ugeJraY4aIZ6BbLF" target="_blank" class="social-link">Ikuti</a>
                    </div>
                </div>
            </section>
        </div>
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
                        <li><a href="#">Tentang PPID</a></li>
                        <li><a href="#">Informasi Publik</a></li>
                        <li><a href="#">Permohonan Informasi</a></li>
                        <li><a href="#">Laporan</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="#">Informasi Berkala</a></li>
                        <li><a href="#">Informasi Serta Merta</a></li>
                        <li><a href="#">Informasi Setiap Saat</a></li>
                        <li><a href="#">Pengajuan Keberatan</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Ikuti Kami</h4>
                    <div class="social-links-footer">
                        <a href="https://www.facebook.com/share/1HjneEvdFG/" target="_blank" class="social-link"><img src="{{ asset('images/facebook.jpg') }}" alt="Facebook"></a>
                        <a href="https://x.com/bbia_kemenperin" target="_blank" class="social-link"><img src="{{ asset('images/twitter.jpg') }}" alt="Twitter"></a>
                        <a href="https://www.instagram.com/bbia_kemenperin?igsh=MXU3bG5jcXdmYWo2eQ==" target="_blank" class="social-link"><img src="{{ asset('images/instagram.jpg') }}" alt="Instagram"></a>
                        <a href="https://youtube.com/@tibbia9891?si=ugeJraY4aIZ6BbLF" target="_blank" class="social-link"><img src="{{ asset('images/youtube.jpg') }}" alt="YouTube"></a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 PPID BBIA. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
