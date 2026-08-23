<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\CashPayment;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ── Rekap Kehadiran ──
        if ($user->role === 'calon_anggota') {
            $totalMeetings = \App\Models\PengkaderanSesi::count();
            $attendances = \App\Models\PengkaderanAttendance::where('user_id', $user->id)->get();
        } else {
            $totalMeetings = Meeting::count();
            $attendances = Attendance::where('user_id', $user->id)->get();
        }

        $hadir = $attendances->where('status_kehadiran', 'Hadir')->count();
        $izin  = $attendances->where('status_kehadiran', 'Izin')->count();
        $sakit = $attendances->where('status_kehadiran', 'Sakit')->count();
        $alpa  = $attendances->where('status_kehadiran', 'Alpa')->count();
        $persentase = $totalMeetings > 0 ? round(($hadir / $totalMeetings) * 100) : 0;

        $rekapKehadiran = [
            'total'      => $totalMeetings,
            'hadir'      => $hadir,
            'izin'       => $izin,
            'sakit'      => $sakit,
            'alpa'       => $alpa,
            'persentase' => $persentase,
        ];

        // ── Status Kas (tahun berjalan) ──
        $tahun = now()->year;
        $kasPayments = CashPayment::where('user_id', $user->id)
            ->where('tahun', $tahun)
            ->orderBy('bulan')
            ->get()
            ->keyBy('bulan');

        $statusKas = [];
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $payment = $kasPayments->get($bulan);
            $statusKas[$bulan] = [
                'nama_bulan' => $this->namaBulan($bulan),
                'status'     => $payment ? $payment->status : 'Belum Lunas',
                'jumlah'     => $payment ? $payment->jumlah : 0,
                'tanggal'    => $payment && $payment->tanggal_bayar ? $payment->tanggal_bayar->format('d/m/Y') : '-',
            ];
        }

        $totalLunas = collect($statusKas)->where('status', 'Lunas')->count();

        $whatsappLink = null;
        if ($user->role === 'calon_anggota') {
            $whatsappLink = \App\Models\Setting::get('whatsapp_group_link', '');
        }

        return view('dashboard', compact(
            'user',
            'rekapKehadiran',
            'statusKas',
            'tahun',
            'totalLunas',
            'whatsappLink'
        ));
    }

    private function namaBulan(int $bulan): string
    {
        $names = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
        return $names[$bulan] ?? '-';
    }
}
