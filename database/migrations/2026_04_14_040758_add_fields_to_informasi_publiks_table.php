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
        Schema::table('informasi_publiks', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->after('konten');
            $table->date('tanggal_publikasi')->nullable()->after('deskripsi');
            $table->string('status')->default('draft')->after('tanggal_publikasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informasi_publiks', function (Blueprint $table) {
            $table->dropColumn(['deskripsi', 'tanggal_publikasi', 'status']);
        });
    }
};
