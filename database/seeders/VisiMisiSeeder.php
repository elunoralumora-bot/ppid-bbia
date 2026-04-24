<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;

class VisiMisiSeeder extends Seeder
{
    public function run()
    {
        $visiMisiData = [
            [
                'kategori' => 'Visi Misi',
                'judul' => 'Visi',
                'konten' => 'Menjadi PPID yang terdepan dalam penyediaan layanan informasi publik yang transparan, akuntabel, dan berkualitas untuk mendukung good governance di lingkungan Balai Besar Industri Agro.',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Visi Misi',
                'judul' => 'Misi',
                'konten' => 'Menyediakan informasi publik yang mudah diakses, cepat, dan terbuka untuk seluruh masyarakat.
Memastikan setiap informasi yang disediakan akurat, terkini, dan dapat dipertanggungjawabkan.
Menyediakan layanan informasi publik yang profesional, ramah, dan sesuai standar yang berlaku.
Terus berinovasi dalam penyediaan layanan informasi publik untuk meningkatkan kualitas dan kemudahan akses.',
                'urutan' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($visiMisiData as $data) {
            Profil::updateOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
        }
    }
}
