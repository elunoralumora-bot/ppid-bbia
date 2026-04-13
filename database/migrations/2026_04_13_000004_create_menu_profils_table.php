<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menu_profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->string('link');
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['is_active', 'urutan']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_profils');
    }
};
