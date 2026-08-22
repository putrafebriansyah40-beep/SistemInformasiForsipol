<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Meeting;
use App\Models\Event;
use App\Models\EventAttendance;
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

        return back()->with('error', 'Kode presensi tidak valid atau tidak ditemukan.');
    }
}
