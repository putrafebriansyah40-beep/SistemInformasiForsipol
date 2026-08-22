<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Event;
use App\Models\Meeting;
use App\Models\CashPayment;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $memberCount = User::where('role', 'member')->count();
        $eventCount = Event::count();
        $user = \Illuminate\Support\Facades\Auth::user();

        // ── Rekap Kehadiran ──
        $totalMeetings = Meeting::count();
        $attendances = Attendance::where('user_id', $user->id)->get();

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

        return view('admin.dashboard', compact('user', 'rekapKehadiran', 'tahun', 'statusKas', 'totalLunas'));
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
