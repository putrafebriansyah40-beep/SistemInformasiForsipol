<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'nim',
        'email',
        'password',
        'no_whatsapp',
        'jenis_kelamin',
        'jabatan',
        'departemen',
        'angkatan',
        'otp_code',
        'otp_expires_at',
        'nama_bank',
        'rekening_bank',
        'atas_nama_bank',
        'jurusan',
        'program_studi',
        'lulus_simba',
        'lulus_panda',
        'lulus_imt',
        'lulus_mukhayyam',
        'role',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function cashPayments()
    {
        return $this->hasMany(CashPayment::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_verified' => 'boolean',
            'otp_expires_at' => 'datetime',
            'lulus_simba' => 'boolean',
            'lulus_panda' => 'boolean',
            'lulus_imt' => 'boolean',
            'lulus_mukhayyam' => 'boolean',
        ];
    }
}
