<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama_lengkap')->after('id');
            $table->string('nik')->unique()->after('nama_lengkap');
            $table->string('no_telepon')->after('email');
            $table->text('alamat')->after('no_telepon');
            $table->string('role')->default('user')->after('alamat');
            $table->boolean('is_active')->default(true)->after('role');
            
            // Drop the name column since we're using nama_lengkap
            $table->dropColumn('name');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nama_lengkap', 'nik', 'no_telepon', 'alamat', 'role', 'is_active']);
            $table->string('name')->after('id');
        });
    }
};
