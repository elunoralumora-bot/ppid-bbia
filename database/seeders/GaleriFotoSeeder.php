<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GaleriFoto;

class GaleriFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samplePhotos = [
            [
                'judul' => 'Kantor PPID BBIA',
                'deskripsi' => 'Tampak depan kantor Pejabat Pengelola Informasi dan Dokumentasi Balai Besar Industri Agro',
                'kategori' => 'Fasilitas',
                'file_path' => 'images/galeri/kantor-ppid.jpg',
                'file_name' => 'kantor-ppid.jpg',
                'file_size' => 1024000,
                'mime_type' => 'image/jpeg',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'judul' => 'Ruang Layanan Informasi',
                'deskripsi' => 'Ruang layanan informasi publik untuk masyarakat yang ingin mengajukan permohonan informasi',
                'kategori' => 'Fasilitas',
                'file_path' => 'images/galeri/ruang-layanan.jpg',
                'file_name' => 'ruang-layanan.jpg',
                'file_size' => 980000,
                'mime_type' => 'image/jpeg',
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'judul' => 'Workshop Layanan Publik',
                'deskripsi' => 'Kegiatan workshop tentang peningkatan layanan publik PPID BBIA',
                'kategori' => 'Kegiatan',
                'file_path' => 'images/galeri/workshop-layanan.jpg',
                'file_name' => 'workshop-layanan.jpg',
                'file_size' => 1200000,
                'mime_type' => 'image/jpeg',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'judul' => 'Sosialisasi Keterbukaan Informasi',
                'deskripsi' => 'Kegiatan sosialisasi keterbukaan informasi publik kepada masyarakat',
                'kategori' => 'Kegiatan',
                'file_path' => 'images/galeri/sosialisasi-informasi.jpg',
                'file_name' => 'sosialisasi-informasi.jpg',
                'file_size' => 1100000,
                'mime_type' => 'image/jpeg',
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'judul' => 'Struktur Organisasi PPID',
                'deskripsi' => 'Struktur organisasi PPID BBIA beserta penanggung jawab masing-masing bidang',
                'kategori' => 'Struktur',
                'file_path' => 'images/galeri/struktur-organisasi.jpg',
                'file_name' => 'struktur-organisasi.jpg',
                'file_size' => 850000,
                'mime_type' => 'image/jpeg',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'judul' => 'Tim PPID BBIA',
                'deskripsi' => 'Tim Pejabat Pengelola Informasi dan Dokumentasi BBIA periode 2024',
                'kategori' => 'Struktur',
                'file_path' => 'images/galeri/tim-ppid.jpg',
                'file_name' => 'tim-ppid.jpg',
                'file_size' => 1300000,
                'mime_type' => 'image/jpeg',
                'urutan' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($samplePhotos as $photo) {
            GaleriFoto::create($photo);
        }
    }
}
