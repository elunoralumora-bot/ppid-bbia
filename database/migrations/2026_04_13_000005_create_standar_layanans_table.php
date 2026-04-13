<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('standar_layanans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('waktu');
            $table->string('biaya');
            $table->text('produk');
            $table->text('prosedur');
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['jenis', 'is_active']);
            $table->index('urutan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('standar_layanans');
    }
};
