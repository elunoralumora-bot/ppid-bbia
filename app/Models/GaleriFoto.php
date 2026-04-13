<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'file_path',
        'file_name',
        'file_size',
        'mime_type',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
        'file_size' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('created_at', 'desc');
    }

    public function getFormattedFileSizeAttribute()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 2) . ' ' . $units[$i];
    }

    public function getImageUrlAttribute()
    {
        if ($this->file_path) {
            return asset($this->file_path);
        }
        return asset('images/default-image.jpg');
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->file_path) {
            // Check if thumbnail exists
            $thumbnailPath = str_replace('/images/', '/images/thumbnails/', $this->file_path);
            if (file_exists(public_path($thumbnailPath))) {
                return asset($thumbnailPath);
            }
        }
        return $this->image_url;
    }
}
