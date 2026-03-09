<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'kategori',
        'judul',
        'konten',
        'urutan',
        'is_active'
    ];
}