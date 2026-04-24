<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\KomentarBerita;

class KomentarBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first berita to add comments to
        $berita = Berita::where('status', 'published')->first();
        
        if ($berita) {
            $comments = [
                [
                    'berita_id' => $berita->id,
                    'nama' => 'Ahmad Wijaya',
                    'email' => 'ahmad@email.com',
                    'komentar' => 'Terima kasih atas informasinya, sangat bermanfaat untuk masyarakat.',
                    'status' => 'approved',
                    'created_at' => now()->subDays(2),
                ],
                [
                    'berita_id' => $berita->id,
                    'nama' => 'Siti Nurhaliza',
                    'email' => 'siti@email.com',
                    'komentar' => 'Berita yang sangat menarik, semoga PPID BBIA terus memberikan informasi yang bermanfaat.',
                    'status' => 'approved',
                    'created_at' => now()->subDays(1),
                ],
                [
                    'berita_id' => $berita->id,
                    'nama' => 'Budi Santoso',
                    'email' => 'budi@email.com',
                    'komentar' => 'Mohon informasi lebih lanjut mengenai cara mengajukan permohonan informasi.',
                    'status' => 'pending',
                    'created_at' => now()->subHours(6),
                ],
            ];

            foreach ($comments as $comment) {
                KomentarBerita::create($comment);
            }
        }
    }
}
