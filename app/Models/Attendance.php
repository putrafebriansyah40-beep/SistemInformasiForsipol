<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'meeting_id',
        'user_id',
        'status_kehadiran',
        'waktu_absen',
    ];
    
    protected $casts = [
        'waktu_absen' => 'datetime',
    ];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
