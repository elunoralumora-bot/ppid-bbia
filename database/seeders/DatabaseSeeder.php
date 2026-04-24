<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Commented out User factory to avoid fake() error in production
        // User::factory()->create([
        //     'nama_lengkap' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            KontenWebSeeder::class,
            GaleriFotoSeeder::class,
            ProfilSeeder::class,
            ProsedurSeeder::class,
        ]);
    }
}
