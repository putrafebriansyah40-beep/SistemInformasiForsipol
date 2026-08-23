<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengkaderan extends Model
{
    protected $fillable = [
        'nama_pengkaderan',
        'deskripsi',
        'lokasi',
    ];

    public function sesis()
    {
        return $this->hasMany(PengkaderanSesi::class);
    }
    
    // Helper to get all attendances across all sessions
    public function attendances()
    {
        return $this->hasManyThrough(PengkaderanAttendance::class, PengkaderanSesi::class);
    }
}
