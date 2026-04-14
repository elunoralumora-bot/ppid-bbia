<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('keberatans', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['permohonan_id']);
            // Make the column nullable
            $table->unsignedBigInteger('permohonan_id')->nullable()->change();
            // Add back foreign key but nullable
            $table->foreign('permohonan_id')->references('id')->on('permohonans')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('keberatans', function (Blueprint $table) {
            $table->dropForeign(['permohonan_id']);
            $table->unsignedBigInteger('permohonan_id')->nullable(false)->change();
            $table->foreign('permohonan_id')->references('id')->on('permohonans')->onDelete('cascade');
        });
    }
};
