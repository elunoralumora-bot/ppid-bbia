<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Get the comments for the berita.
     */
    public function komentarBerita(): HasMany
    {
        return $this->hasMany(KomentarBerita::class, 'berita_id');
    }

    /**
     * Get the approved comments for the berita.
     */
    public function approvedComments(): HasMany
    {
        return $this->komentarBerita()->approved();
    }

    /**
     * Get the pending comments for the berita.
     */
    public function pendingComments(): HasMany
    {
        return $this->komentarBerita()->pending();
    }
}
