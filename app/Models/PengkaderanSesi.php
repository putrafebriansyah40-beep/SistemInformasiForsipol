<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengkaderanSesi extends Model
{
    protected $fillable = [
        'pengkaderan_id',
        'nama_sesi',
        'waktu_mulai',
        'waktu_selesai',
        'kode_absen',
    ];

    protected $casts = [
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    public function pengkaderan()
    {
        return $this->belongsTo(Pengkaderan::class);
    }

    public function attendances()
    {
        return $this->hasMany(PengkaderanAttendance::class, 'pengkaderan_sesi_id');
    }
}
