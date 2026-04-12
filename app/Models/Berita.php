<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'status',
        'tanggal_publikasi',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
    ];
}
