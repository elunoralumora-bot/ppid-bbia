<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;

class TentangPpidSeeder extends Seeder
{
    public function run()
    {
        $tentangPpidData = [
            [
                'kategori' => 'Tentang PPID',
                'judul' => 'Apa itu PPID?',
                'konten' => 'Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab atas penyediaan layanan dan informasi publik di lingkungan Balai Besar Industri Agro (BBIA). PPID BBIA berfungsi sebagai jembatan antara institusi dengan masyarakat dalam hal akses informasi publik.',
                'urutan' => 1,
                'is_active' => true,
            ],
            [
                'kategori' => 'Tentang PPID',
                'judul' => 'Tugas dan Tanggung Jawab',
                'konten' => 'Sesuai Peraturan Pemerintah No. 61 Tahun 2010 Tentang Pelaksanaan Undang-Undang No. 14 Tahun 2008, tugas dan tanggung jawab PPID adalah:

1. Penyediaan, penyimpanan, pendokumentasian dan pengamanan informasi;
2. Pelayanan Informasi Publik sesuai aturan yang berlaku;
3. Pelayanan Informasi Publik yang cepat, tepat, sederhana;
4. Penetapan prosedur operasional dalam penyebarluasan Informasi Publik;
5. Pengujian konsekuensi;
6. Pengklasifikasian informasi dan/atau pengubahannya;
7. Penetapan informasi yang dikecualikan yang telah habis jangka waktu pengecualiannya sebagai Informasi Publik yang dapat diakses; dan
8. Penetapan pertimbangan tertulis atas setiap kebijakan yang diambil untuk memenuhi hak setiap orang atas Informasi Publik.',
                'urutan' => 2,
                'is_active' => true,
            ],
            [
                'kategori' => 'Tentang PPID',
                'judul' => 'Operasional PPID',
                'konten' => 'Pemohon informasi publik dapat memperoleh informasi publik secara langsung maupun melalui media, yaitu sebagai berikut:

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
                'urutan' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($tentangPpidData as $data) {
            Profil::updateOrCreate(
                ['kategori' => $data['kategori'], 'judul' => $data['judul']],
                $data
            );
        }
    }
}
