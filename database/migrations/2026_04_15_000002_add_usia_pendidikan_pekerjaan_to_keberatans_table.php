<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('keberatans', function (Blueprint $table) {
            $table->integer('usia')->nullable()->after('alamat');
            $table->string('pendidikan_terakhir')->nullable()->after('usia');
            $table->string('pekerjaan')->nullable()->after('pendidikan_terakhir');
        });
    }

    public function down()
    {
        Schema::table('keberatans', function (Blueprint $table) {
            $table->dropColumn(['usia', 'pendidikan_terakhir', 'pekerjaan']);
        });
    }
};
