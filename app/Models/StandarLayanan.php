<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandarLayanan extends Model
{
    protected $fillable = [
        'jenis',
        'waktu',
        'biaya',
        'produk',
        'prosedur',
        'urutan',
        'is_active'
    ];
}