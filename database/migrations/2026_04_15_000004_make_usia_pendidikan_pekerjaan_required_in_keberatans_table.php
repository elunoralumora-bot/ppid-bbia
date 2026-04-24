<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Update existing NULL values to default values
        DB::statement("UPDATE keberatans SET usia = 0 WHERE usia IS NULL");
        DB::statement("UPDATE keberatans SET pendidikan_terakhir = '-' WHERE pendidikan_terakhir IS NULL");
        DB::statement("UPDATE keberatans SET pekerjaan = '-' WHERE pekerjaan IS NULL");
        
        Schema::table('keberatans', function (Blueprint $table) {
            $table->integer('usia')->nullable(false)->default(0)->change();
            $table->string('pendidikan_terakhir')->nullable(false)->default('-')->change();
            $table->string('pekerjaan')->nullable(false)->default('-')->change();
        });
    }

    public function down()
    {
        Schema::table('keberatans', function (Blueprint $table) {
            $table->integer('usia')->nullable()->change();
            $table->string('pendidikan_terakhir')->nullable()->change();
            $table->string('pekerjaan')->nullable()->change();
        });
    }
};
