<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashPayment extends Model
{
    protected $fillable = [
        'user_id',
        'bulan',
        'tahun',
        'jumlah',
        'bukti_transfer',
        'status',
        'tanggal_bayar',
        'recorded_by',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recorder()
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }

    /**
     * Helper: Nama bulan dalam Bahasa Indonesia
     */
    public function getNamaBulanAttribute(): string
    {
        $bulanNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
        return $bulanNames[$this->bulan] ?? '-';
    }
}
