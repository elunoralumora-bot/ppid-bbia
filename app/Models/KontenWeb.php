<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontenWeb extends Model
{
    protected $fillable = [
        'jenis_konten',
        'slug',
        'judul',
        'konten',
        'meta_data',
        'is_active',
    ];

    protected $casts = [
        'meta_data' => 'array',
        'is_active' => 'boolean',
    ];

    // Scope untuk jenis konten
    public function scopeProfil($query)
    {
        return $query->where('jenis_konten', 'profil');
    }

    public function scopeInformasiPublik($query)
    {
        return $query->where('jenis_konten', 'informasi_publik');
    }

    public function scopeStandarLayanan($query)
    {
        return $query->where('jenis_konten', 'standar_layanan');
    }

    public function scopeLaporan($query)
    {
        return $query->where('jenis_konten', 'laporan');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
