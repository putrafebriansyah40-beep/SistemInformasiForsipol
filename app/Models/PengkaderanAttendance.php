<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengkaderanAttendance extends Model
{
    protected $fillable = [
        'pengkaderan_sesi_id',
        'user_id',
        'status_kehadiran',
        'waktu_absen',
    ];

    protected $casts = [
        'waktu_absen' => 'datetime',
    ];

    public function sesi()
    {
        return $this->belongsTo(PengkaderanSesi::class, 'pengkaderan_sesi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
