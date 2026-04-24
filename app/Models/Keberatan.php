<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keberatan extends Model
{
    protected $fillable = [
        'nama_pemohon',
        'email',
        'telepon',
        'alamat',
        'usia',
        'pendidikan_terakhir',
        'pekerjaan',
        'alasan_keberatan',
        'permohonan_id',
        'status',
        'tanggal_keberatan',
        'tanggal_proses',
        'tanggal_selesai',
        'catatan',
    ];

    protected $casts = [
        'tanggal_keberatan' => 'date',
        'tanggal_proses' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }
}
