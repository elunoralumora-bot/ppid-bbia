<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KontenWeb;

class KontenWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Profil Contents
        KontenWeb::create([
            'jenis_konten' => 'profil',
            'slug' => 'tentang-ppid',
            'judul' => 'Tentang PPID',
            'konten' => '<h2>Apa itu PPID?</h2>
<p>Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab atas penyediaan layanan dan informasi publik di lingkungan Balai Besar Industri Agro (BBIA). PPID BBIA berfungsi sebagai jembatan antara institusi dengan masyarakat dalam hal akses informasi publik.</p>
<h2>Tugas dan Tanggung Jawab</h2>
<p>Sesuai Peraturan Pemerintah No. 61 Tahun 2010 Tentang Pelaksanaan Undang-Undang No. 14 Tahun 2008, tugas dan tanggung jawab PPID adalah:</p>
<ol>
    <li>Penyediaan, penyimpanan, pendokumentasian dan pengamanan informasi;</li>
    <li>Pelayanan Informasi Publik sesuai aturan yang berlaku;</li>
    <li>Pelayanan Informasi Publik yang cepat, tepat, sederhana;</li>
    <li>Penetapan prosedur operasional dalam penyebarluasan Informasi Publik;</li>
    <li>Pengujian konsekuensi;</li>
    <li>Pengklasifikasian informasi dan/atau pengubahannya;</li>
    <li>Penetapan informasi yang dikecualikan yang telah habis jangka waktu pengecualiannya sebagai Informasi Publik yang dapat diakses; dan</li>
    <li>Penetapan pertimbangan tertulis atas setiap kebijakan yang diambil untuk memenuhi hak setiap orang atas Informasi Publik.</li>
</ol>
<h2>Operasional PPID</h2>
<p>Pemohon informasi publik dapat memperoleh informasi publik secara langsung maupun melalui media, yaitu sebagai berikut:</p>
<h3>Layanan Informasi Langsung</h3>
<p>Untuk layanan langsung, pemohon Informasi Publik dapat datang langsung ke Desk Layanan Informasi Balai Besar Industri Agro di Ruang CSO (Customer Service Officer) Jl. Ir. H. Juanda No. 11, Bogor.</p>
<h3>Layanan Informasi Melalui Media</h3>
<p>Untuk Layanan Informasi melalui media, Pemohon Informasi Publik dapat menghubungi:</p>
<div class="contact-info">
    <p><strong>WA :</strong> 0812 1390 0044</p>
    <p><strong>Telp. :</strong> (0251) 8324068</p>
    <p><strong>Fax. :</strong> (0251) 8323339</p>
    <p><strong>Email :</strong> cabi@bbia.go.id</p>
    <p><strong>Website :</strong> http://www.bbia.go.id</p>
</div>',
            'is_active' => true,
        ]);

        // Informasi Publik Contents
        KontenWeb::create([
            'jenis_konten' => 'informasi_publik',
            'slug' => 'informasi-publik',
            'judul' => 'Informasi Publik',
            'konten' => '<h2>Apa itu Informasi Publik?</h2>
<p>Informasi publik adalah semua informasi yang dihasilkan, disimpan, dikelola, dan/atau dimiliki oleh lembaga publik yang berkaitan dengan penyelenggara dan/atau kegiatan penyelenggara negara dan/atau lembaga publik lainnya sesuai dengan Undang-Undang No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</p>
<h2>Hak Pemohon Informasi</h2>
<p>Setiap pemohon informasi publik memiliki hak untuk:</p>
<ul>
    <li>Memperoleh informasi publik yang tersedia</li>
    <li>Mengajukan permohonan informasi secara tertulis</li>
    <li>Memperoleh informasi tanpa biaya (untuk informasi dasar)</li>
    <li>Memperoleh salinan informasi dalam bentuk hard copy atau soft copy</li>
    <li>Mengajukan keberatan atas pelayanan informasi</li>
</ul>
<h2>Kewajiban PPID</h2>
<p>PPID BBIA memiliki kewajiban untuk:</p>
<ul>
    <li>Menyediakan dan memberikan akses informasi publik</li>
    <li>Melakukan pemutakhiran informasi secara berkala</li>
    <li>Memberikan pelayanan prima kepada pemohon</li>
    <li>Menjaga keamanan dan kerahasiaan informasi tertentu</li>
    <li>Membuat laporan tahunan tentang pelayanan informasi</li>
</ul>
<div class="action-section">
    <h2>Akses Informasi Publik</h2>
    <p>Silakan akses informasi publik yang tersedia melalui link berikut:</p>
    <div class="action-links">
        <a href="/daftar-informasi-publik" class="btn btn-outline">Daftar Informasi Lengkap</a>
        <a href="/form-permohonan" class="btn btn-outline">Ajukan Permohonan</a>
        <a href="/prosedur-permohonan" class="btn btn-outline">Prosedur Lengkap</a>
    </div>
</div>',
            'is_active' => true,
        ]);

        // Standar Layanan Contents
        KontenWeb::create([
            'jenis_konten' => 'standar_layanan',
            'slug' => 'standar-layanan',
            'judul' => 'Standar Layanan',
            'konten' => '<h2>Standar Layanan PPID BBIA</h2>
<p>PPID BBIA menetapkan standar layanan informasi publik yang harus dipatuhi oleh seluruh unit kerja di lingkungan Balai Besar Industri Agro sesuai dengan peraturan perundang-undangan.</p>
<div class="info-grid">
    <div class="info-box">
        <h3>Dasar Hukum</h3>
        <ul>
            <li>Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik</li>
            <li>Peraturan Pemerintah Nomor 61 Tahun 2010 tentang Pelaksanaan UU KIP</li>
            <li>Peraturan Komisi Informasi Nomor 1 Tahun 2010 tentang Standar Layanan Informasi Publik</li>
            <li>Peraturan internal Kementerian Perindustrian terkait PPID</li>
        </ul>
    </div>
    <div class="info-box">
        <h3>Jangka Waktu Pelayanan</h3>
        <ul>
            <li><strong>Pemohonan Informasi:</strong> Maksimal 10 hari kerja sejak permohonan diterima</li>
            <li><strong>Keberatan:</strong> Maksimal 14 hari kerja sejak permohonan keberatan diterima</li>
            <li><strong>Biaya:</strong> Tidak dipungut biaya untuk pemohonan informasi publik</li>
        </ul>
    </div>
    <div class="info-box">
        <h3>Jam Pelayanan</h3>
        <ul>
            <li>Senin - Kamis: 08:00 - 16:00 WIB</li>
            <li>Jumat: 08:00 - 16:00 WIB</li>
            <li>Sabtu-Minggu: Libur</li>
        </ul>
    </div>
    <div class="info-box">
        <h3>Sarana dan Cara Pelayanan</h3>
        <ul>
            <li><strong>Langsung:</strong> Permohonan dapat diajukan langsung di kantor PPID BBIA</li>
            <li><strong>Online:</strong> Permohonan dapat diajukan melalui website atau email</li>
            <li><strong>Telepon:</strong> Permohonan informasi dapat diajukan melalui telepon</li>
            <li><strong>Fax:</strong> Permohonan informasi dapat diajukan melalui fax</li>
        </ul>
    </div>
</div>',
            'is_active' => true,
        ]);

        // Laporan Contents
        KontenWeb::create([
            'jenis_konten' => 'laporan',
            'slug' => 'laporan-tahunan',
            'judul' => 'Laporan Tahunan PPID',
            'konten' => '<h2>Laporan Tahunan PPID BBIA</h2>
<p>Berikut adalah laporan tahunan PPID BBIA yang berisi ringkasan kegiatan dan pencapaian kinerja dalam penyediaan layanan informasi publik.</p>
<div class="report-grid">
    <div class="report-item">
        <div class="report-header">
            <h3>Laporan Tahunan 2025</h3>
            <span class="report-year">2025</span>
        </div>
        <div class="report-stats">
            <div class="stat">
                <span class="stat-number">1,234</span>
                <span class="stat-label">Total Permohonan</span>
            </div>
            <div class="stat">
                <span class="stat-number">1,189</span>
                <span class="stat-label">Diproses</span>
            </div>
            <div class="stat">
                <span class="stat-number">98.5%</span>
                <span class="stat-label">Tingkat Kepuasan</span>
            </div>
        </div>
        <div class="report-actions">
            <a href="#" class="btn-link">Download PDF</a>
            <a href="#" class="btn-link">Ringkasan</a>
        </div>
    </div>
</div>
<h2>Informasi Tambahan</h2>
<div class="info-box">
    <h3> Catatan Laporan</h3>
    <ul>
        <li>Laporan tahunan dibuat sesuai dengan Peraturan Komisi Informasi Nomor 1 Tahun 2010</li>
        <li>Data dikumpulkan dari sistem informasi PPID BBIA</li>
        <li>Laporan diverifikasi oleh internal audit BBIA</li>
        <li>Laporan disetujui oleh Kepala BBIA</li>
        <li>Laporan tersedia untuk umum sesuai prinsip keterbukaan informasi</li>
    </ul>
</div>',
            'is_active' => true,
        ]);
    }
}
