<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;

class StrukturOrganisasiSeeder extends Seeder
{
    public function run()
    {
        $strukturData = [
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Kepala BBIA',
                'konten' => 'Menetapkan PPID dan bertanggung jawab atas pelaksanaan tugas PPID',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Pejabat Pengelola Informasi dan Dokumentasi',
                'konten' => 'Merupakan pejabat yang ditetapkan untuk melaksanakan tugas PPID sehari-hari',
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Koordinator PPID',
                'konten' => 'Membantu PPID dalam koordinasi dan pelaksanaan tugas',
                'urutan' => 3,
                'is_active' => true,
            ],
            [
                'kategori' => 'Struktur Organisasi',
                'judul' => 'Staf PPID',
                'konten' => 'Melaksanakan tugas teknis dan administratif layanan informasi',
                'urutan' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($strukturData as $data) {
            Profil::updateOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
        }

        // Data Unit Pelaksana
        $unitPelaksanaData = [
            [
                'kategori' => 'Unit Pelaksana',
                'judul' => 'Unit Pelaksana PPID',
                'konten' => 'Unit Pelayanan Informasi: Melayani permohonan informasi langsung
Unit Dokumentasi: Mengelola dokumen dan arsip informasi
Unit Verifikasi: Memverifikasi kebenaran informasi
Unit Publikasi: Memublikasikan informasi berkala',
                'urutan' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($unitPelaksanaData as $data) {
            Profil::updateOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
        }
    }
}
