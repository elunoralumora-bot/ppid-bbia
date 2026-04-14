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
        'is_active',
        'deskripsi',
        'tanggal_publikasi',
        'status'
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
        'is_active' => 'boolean',
    ];

    // Accessor for default values
    protected $attributes = [
        'status' => 'draft',
    ];
}
