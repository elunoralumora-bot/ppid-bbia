<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profil;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kontakData = [
            [
                'kategori' => 'Kontak PPID',
                'judul' => 'Telepon',
                'konten' => '(0251) 8324068<br>Senin - Jumat, 08:00 - 16:00 WIB',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Kontak PPID',
                'judul' => 'Email',
                'konten' => 'cabi@bbia.go.id<br>ppid@bbia.go.id',
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'kategori' => 'Kontak PPID',
                'judul' => 'Alamat',
                'konten' => 'Jl. Ir. H. Juanda No. 11<br>Bogor 16122<br>Jawa Barat, Indonesia',
                'urutan' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($kontakData as $data) {
            Profil::firstOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
        }
    }
}
