<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Meeting;
use App\Models\Event;
use App\Models\EventAttendance;
use App\Models\PengkaderanSesi;
use App\Models\PengkaderanAttendance;
use Illuminate\Http\Request;
use App\Http\Requests\Member\AttendanceRequest;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function create()
    {
        return view('member.attendances.create');
    }

    public function store(AttendanceRequest $request)
    {
        $validated = $request->validated();
        $kode_absen = $validated['kode_absen'];

        $meeting = Meeting::where('kode_absen', $kode_absen)->first();

        if ($meeting) {
            // Logika presensi rapat
            $attendance = Attendance::where('meeting_id', $meeting->id)
                ->where('user_id', Auth::id())
                ->first();

            if ($attendance) {
                if ($attendance->status_kehadiran === 'Hadir') {
                    return back()->with('info', 'Anda sudah melakukan presensi untuk rapat ini.');
                } else {
                    $attendance->update(['status_kehadiran' => 'Hadir']);
                    return back()->with('success', 'Status kehadiran rapat berhasil diperbarui menjadi Hadir.');
                }
            }

            Attendance::create([
                'meeting_id' => $meeting->id,
                'user_id' => Auth::id(),
                'status_kehadiran' => 'Hadir',
            ]);

            return back()->with('success', "Presensi berhasil! Anda tercatat hadir pada rapat: {$meeting->nama_rapat}.");
        }

        $event = Event::where('kode_absen', $kode_absen)->first();

        if ($event) {
            // Logika presensi kegiatan
            $attendance = EventAttendance::where('event_id', $event->id)
                ->where('user_id', Auth::id())
                ->first();

            if ($attendance) {
                if ($attendance->status_kehadiran === 'Hadir') {
                    return back()->with('info', 'Anda sudah melakukan presensi untuk kegiatan ini.');
                } else {
                    $attendance->update(['status_kehadiran' => 'Hadir']);
                    return back()->with('success', 'Status kehadiran kegiatan berhasil diperbarui menjadi Hadir.');
                }
            }

            EventAttendance::create([
                'event_id' => $event->id,
                'user_id' => Auth::id(),
                'status_kehadiran' => 'Hadir',
            ]);

            return back()->with('success', "Presensi berhasil! Anda tercatat hadir pada kegiatan: {$event->nama_kegiatan}.");
        }

        $sesi = PengkaderanSesi::where('kode_absen', $kode_absen)->first();

        if ($sesi) {
            $pengkaderan = $sesi->pengkaderan;
            
            // Logika presensi pengkaderan
            if (Auth::user()->role !== 'calon_anggota') {
                return back()->with('error', 'Kode presensi ini khusus untuk kegiatan pengkaderan Calon Anggota.');
            }

            $attendance = PengkaderanAttendance::where('pengkaderan_sesi_id', $sesi->id)
                ->where('user_id', Auth::id())
                ->first();

            if ($attendance) {
                if ($attendance->status_kehadiran === 'Hadir') {
                    return back()->with('info', 'Anda sudah melakukan presensi untuk sesi ini.');
                } else {
                    $attendance->update(['status_kehadiran' => 'Hadir']);
                }
            } else {
                PengkaderanAttendance::create([
                    'pengkaderan_sesi_id' => $sesi->id,
                    'user_id' => Auth::id(),
                    'status_kehadiran' => 'Hadir',
                ]);
            }

            // --- Logika Otomatis Lulus (75%) ---
            $totalSesi = $pengkaderan->sesis()->count();
            if ($totalSesi > 0) {
                $sesiIds = $pengkaderan->sesis()->pluck('id');
                $totalHadir = PengkaderanAttendance::whereIn('pengkaderan_sesi_id', $sesiIds)
                                ->where('user_id', Auth::id())
                                ->where('status_kehadiran', 'Hadir')
                                ->count();
                
                $persentase = ($totalHadir / $totalSesi) * 100;
                
                if ($persentase >= 75) {
                    $user = Auth::user();
                    $tipe = strtolower($pengkaderan->nama_pengkaderan); // simba, panda, imt, dll.
                    $fieldLulus = "lulus_{$tipe}";
                    
                    // Cek jika field ada di tabel users (untuk menghindari error kalau 'Lainnya' atau beda nama)
                    if (\Illuminate\Support\Facades\Schema::hasColumn('users', $fieldLulus)) {
                        if (!$user->$fieldLulus) {
                            $user->update([$fieldLulus => true]);
                            
                            $user->refresh();
                            $passedCount = ($user->lulus_simba ? 1 : 0) + ($user->lulus_panda ? 1 : 0) + ($user->lulus_imt ? 1 : 0) + ($user->lulus_mukhayyam ? 1 : 0);
                            
                            if ($passedCount >= 3 && $user->role === 'calon_anggota') {
                                $user->update(['role' => 'member']);
                                return back()->with('success', "Presensi berhasil di sesi {$sesi->nama_sesi}! Selamat, kehadiran Anda telah mencapai " . round($persentase) . "%. Anda dinyatakan LULUS {$pengkaderan->nama_pengkaderan} dan RESMI menjadi Anggota Aktif!");
                            }
                            
                            return back()->with('success', "Presensi berhasil di sesi {$sesi->nama_sesi}! Selamat, kehadiran Anda telah mencapai " . round($persentase) . "%. Anda dinyatakan LULUS " . $pengkaderan->nama_pengkaderan . ".");
                        }
                    }
                }
            }

            return back()->with('success', "Presensi berhasil! Anda tercatat hadir pada sesi: {$sesi->nama_sesi}.");
        }

        return back()->with('error', 'Kode presensi tidak valid atau tidak ditemukan.');
    }
}
