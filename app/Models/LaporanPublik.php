<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPublik extends Model
{
    protected $fillable = [
        'tahun',
        'judul',
        'file_path',
        'kategori',
        'is_active'
    ];
}