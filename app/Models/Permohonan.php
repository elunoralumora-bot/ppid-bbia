<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $fillable = [
        'nama_pemohon',
        'email',
        'telepon',
        'alamat',
        'informasi_diminta',
        'tujuan',
        'cara_perolehan',
        'status',
        'tanggal_permohonan',
        'tanggal_proses',
        'tanggal_selesai',
        'catatan',
    ];

    protected $casts = [
        'tanggal_permohonan' => 'date',
        'tanggal_proses' => 'date',
        'tanggal_selesai' => 'date',
    ];
}