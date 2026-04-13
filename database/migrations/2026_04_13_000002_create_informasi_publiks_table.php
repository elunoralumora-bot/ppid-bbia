<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('informasi_publiks', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('judul');
            $table->text('konten');
            $table->string('file_path')->nullable();
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['kategori', 'is_active']);
            $table->index('urutan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi_publiks');
    }
};
