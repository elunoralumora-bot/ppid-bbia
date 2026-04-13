<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('galeri_fotos', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('kategori');
            $table->string('file_path');
            $table->string('file_name');
            $table->integer('file_size')->unsigned();
            $table->string('mime_type');
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['kategori', 'is_active']);
            $table->index('urutan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('galeri_fotos');
    }
};
