<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'nama_rapat',
        'agenda',
        'waktu_rapat',
        'lokasi',
        'kode_absen',
    ];
    
    protected $casts = [
        'waktu_rapat' => 'datetime',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
