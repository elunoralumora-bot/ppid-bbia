<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat');
            $table->text('informasi_diminta');
            $table->text('tujuan');
            $table->string('cara_perolehan');
            $table->string('status')->default('pending');
            $table->date('tanggal_permohonan');
            $table->date('tanggal_proses')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            
            $table->index('status');
            $table->index('tanggal_permohonan');
            $table->index('email');
        });
    }

    public function down()
    {
        Schema::dropIfExists('permohonans');
    }
};
