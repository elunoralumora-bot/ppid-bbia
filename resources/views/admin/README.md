# Struktur Folder Admin Views

## Organisasi File:

### 1. **informasi-publik/** (4 kategori)
- `informasi-berkala.blade.php` - List data
- `informasi-berkala-create.blade.php` - Form tambah
- `informasi-berkala-edit.blade.php` - Form edit
- `informasi-serta-merta.blade.php` - List data
- `informasi-serta-merta-create.blade.php` - Form tambah
- `informasi-serta-merta-edit.blade.php` - Form edit
- `informasi-setiap-saat.blade.php` - List data
- `informasi-setiap-saat-create.blade.php` - Form tambah
- `informasi-setiap-saat-edit.blade.php` - Form edit
- `daftar-informasi-publik-online.blade.php` - List data

### 2. **standar-layanan/** (8 kategori)
- `regulasi.blade.php` - List data
- `regulasi-create.blade.php` - Form tambah
- `regulasi-edit.blade.php` - Form edit
- `prosedur-permohonan-informasi.blade.php` - List data
- `prosedur-pengajuan-keberatan.blade.php` - List data
- `mekanisme-sengketa-informasi.blade.php` - List data
- `sop-ppid.blade.php` - List data
- `kanal-layanan-informasi.blade.php` - List data
- `waktu-biaya-layanan.blade.php` - List data
- `waktu-biaya-layanan-create.blade.php` - Form tambah
- `waktu-biaya-layanan-edit.blade.php` - Form edit
- `maklumat-informasi-publik.blade.php` - List data
- `maklumat-informasi-publik-create.blade.php` - Form tambah
- `maklumat-informasi-publik-edit.blade.php` - Form edit

### 3. **laporan/** (3 kategori)
- `laporan-tahunan-ppid.blade.php` - List data
- `laporan-tahunan-ppid-create.blade.php` - Form tambah
- `laporan-tahunan-ppid-edit.blade.php` - Form edit
- `laporan-survey-kepuasan.blade.php` - List data
- `laporan-survey-kepuasan-create.blade.php` - Form tambah
- `statistik-layanan-informasi.blade.php` - List data

### 4. **profil/** (8 kategori)
- `profil.blade.php` - List data profil
- `profil-create.blade.php` - Form tambah profil
- `profil-edit.blade.php` - Form edit profil
- `tentang-ppid.blade.php` - Halaman Tentang PPID
- `tugas-dan-fungsi.blade.php` - Halaman Tugas dan Fungsi
- `struktur-organisasi.blade.php` - Halaman Struktur Organisasi
- `profil-pejabat.blade.php` - Halaman Profil Pejabat
- `visi-misi.blade.php` - Halaman Visi dan Misi
- `kontak-ppid.blade.php` - Halaman Kontak PPID
- `galeri.blade.php` - Galeri Foto/Video

### 5. **permohonan/** (4 file)
- `permohonan.blade.php` - List data permohonan
- `permohonan-detail.blade.php` - Detail permohonan
- `show-permohonan.blade.php` - Show permohonan
- `manage-permohonan.blade.php` - Management permohonan

### 6. **keberatan/** (4 file)
- `keberatan.blade.php` - List data keberatan
- `keberatan-detail.blade.php` - Detail keberatan
- `show-keberatan.blade.php` - Show keberatan
- `manage-keberatan.blade.php` - Management keberatan

### 7. **Root Admin Files**
- `layout.blade.php` - Main layout
- `dashboard.blade.php` - Dashboard
- `berita.blade.php` - Berita management
- `users.blade.php` - User management
- dll.

## Update yang Dilakukan:
1. Semua route di AdminController sudah diupdate untuk mengarah ke folder baru
2. Struktur folder lebih rapi dan mudah dikelola
3. Tidak ada lagi file yang berserakan di root admin folder

## Cara Akses:
- Informasi Publik: `admin.informasi-publik.nama-file`
- Standar Layanan: `admin.standar-layanan.nama-file`
- Laporan: `admin.laporan.nama-file`
- Profil: `admin.profil.nama-file`
- Permohonan: `admin.permohonan.nama-file`
- Keberatan: `admin.keberatan.nama-file`
