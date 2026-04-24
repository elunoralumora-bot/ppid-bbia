<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KomentarBerita extends Model
{
    protected $table = 'komentar_berita';
    
    protected $fillable = [
        'berita_id',
        'nama',
        'email',
        'komentar',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the berita that owns the komentar.
     */
    public function berita(): BelongsTo
    {
        return $this->belongsTo(Berita::class, 'berita_id');
    }

    /**
     * Scope to get only approved comments
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope to get only pending comments
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
