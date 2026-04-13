<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('konten_webs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_konten'); // profil, informasi_publik, standar_layanan, laporan
            $table->string('slug')->unique();
            $table->string('judul');
            $table->text('konten');
            $table->json('meta_data')->nullable(); // untuk data tambahan seperti statistik, link download, dll
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_webs');
    }
};
