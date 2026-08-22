<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nama_kegiatan',
        'deskripsi',
        'waktu_pelaksanaan',
        'lokasi',
        'kategori',
        'kode_absen',
    ];
    
    protected $casts = [
        'waktu_pelaksanaan' => 'datetime',
    ];

    public function attendances()
    {
        return $this->hasMany(EventAttendance::class);
    }
}
