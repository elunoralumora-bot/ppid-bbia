<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('keberatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat');
            $table->text('alasan_keberatan');
            $table->foreignId('permohonan_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->date('tanggal_keberatan');
            $table->date('tanggal_proses')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            
            $table->index('status');
            $table->index('tanggal_keberatan');
            $table->index('email');
            $table->index('permohonan_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('keberatans');
    }
};
