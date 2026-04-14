<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        $profilData = [
            // Visi Misi
            [
                'kategori' => 'Visi Misi',
                'judul' => 'Visi PPID BBIA',
                'konten' => 'Terwujudnya Balai Besar Industri Agro yang menjadi rujukan dan pelayanan industri agro nasional yang berdaya saing global.',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Visi Misi',
                'judul' => 'Misi PPID BBIA',
                'konten' => '1. Melaksanakan penelitian, pengembangan, dan pelayanan teknologi industri agro.\n2. Meningkatkan kapasitas industri agro melalui alih teknologi dan informasi.\n3. Menjadi pusat data dan informasi industri agro yang terpercaya.\n4. Memberikan pelayanan prima kepada stakeholders industri agro.',
                'urutan' => 2,
                'is_active' => true,
            ],
            
            // Struktur Organisasi
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Struktur Organisasi PPID',
                'konten' => 'Struktur organisasi PPID BBIA terdiri dari:\n\n1. Kepala Balai Besar Industri Agro\n2. Pejabat Pengelola Informasi dan Dokumentasi (PPID)\n3. Sekretariat\n4. Bidang Teknologi dan Informasi\n5. Bidang Pelayanan Informasi\n6. Unit Pelaksana Teknis\n\nSetiap unit memiliki tanggung jawab dalam penyediaan dan pengelolaan informasi publik sesuai dengan bidang tugas masing-masing.',
                'urutan' => 1,
                'is_active' => true,
            ],
            
            // Tugas dan Fungsi
            [
                'kategori' => 'Tugas dan Fungsi',
                'judul' => 'Tugas PPID',
                'konten' => 'PPID BBIA mempunyai tugas:\n1. Mengkoordinasikan pengumpulan, pengolahan, dan penyimpanan informasi publik.\n2. Memberikan layanan informasi publik yang cepat, tepat, dan akurat.\n3. Melakukan verifikasi dan validasi informasi sebelum disediakan kepada publik.\n4. Membuat laporan pelaksanaan layanan informasi publik secara berkala.',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Tugas dan Fungsi',
                'judul' => 'Fungsi PPID',
                'konten' => 'PPID BBIA menjalankan fungsi:\n1. Fungsi koordinasi internal dalam pengelolaan informasi.\n2. Fungsi layanan informasi kepada masyarakat.\n3. Fungsi dokumentasi dan arsip informasi publik.\n4. Fungsi advokasi dan sosialisasi keterbukaan informasi.\n5. Fungsi monitoring dan evaluasi layanan informasi publik.',
                'urutan' => 2,
                'is_active' => true,
            ],
            
            // Profil Pejabat
            [
                'kategori' => 'Profil Pejabat',
                'judul' => 'Kepala PPID BBIA',
                'konten' => 'Nama: Dr. Ir. Budi Santoso, M.Si.\nNIP: 197501011998031001\nJabatan: Kepala Balai Besar Industri Agro\n\nSebagai Kepala PPID BBIA, beliau bertanggung jawab atas penyelenggaraan layanan informasi publik di lingkungan BBIA dan memastikan ketersediaan informasi yang akurat dan terkini bagi masyarakat.',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Profil Pejabat',
                'judul' => 'Koordinator PPID',
                'konten' => 'Nama: Ir. Siti Nurjanah, M.T.\nNIP: 198003152006042001\nJabatan: Koordinator PPID BBIA\n\nBertanggung jawab atas koordinasi layanan informasi publik, pengelolaan database informasi, dan pelaporan layanan informasi publik.',
                'urutan' => 2,
                'is_active' => true,
            ],
            
            // Kontak PPID
            [
                'kategori' => 'Kontak PPID',
                'judul' => 'Alamat Kantor',
                'konten' => 'Balai Besar Industri Agro (BBIA)\nKementerian Perindustrian\nJl. Ir. H. Juanda No. 11, Lebak Gede\nCoblong, Bandung 40135\nJawa Barat, Indonesia',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Kontak PPID',
                'judul' => 'Kontak Person',
                'konten' => 'Telepon: (022) 2504123\nFax: (022) 2504124\nEmail: ppid.bbia@kemenperin.go.id\nWebsite: https://bbia.kemenperin.go.id\n\nJam Layanan:\nSenin - Kamis: 08.00 - 15.30\nJumat: 08.00 - 12.00\nSabtu - Minggu: Tutup',
                'urutan' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($profilData as $profil) {
            Profil::create($profil);
        }
    }
}
