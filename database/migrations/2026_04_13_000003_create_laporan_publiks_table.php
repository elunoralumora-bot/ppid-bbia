<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('laporan_publiks', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('judul');
            $table->string('file_path');
            $table->string('kategori');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['tahun', 'kategori']);
            $table->index('is_active');
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_publiks');
    }
};
