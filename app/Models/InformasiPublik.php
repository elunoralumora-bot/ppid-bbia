<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiPublik extends Model
{
    protected $fillable = [
        'kategori',
        'judul',
        'konten',
        'file_path',
        'urutan',
        'is_active'
    ];
}