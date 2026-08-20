<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function create()
    {
        return view('member.attendances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_absen' => 'required|string|max:255',
        ]);

        $meeting = Meeting::where('kode_absen', $request->kode_absen)->first();

        if (!$meeting) {
            return back()->with('error', 'Kode presensi tidak valid atau tidak ditemukan.');
        }

        // Cek apakah sudah pernah presensi
        $attendance = Attendance::where('meeting_id', $meeting->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($attendance) {
            if ($attendance->status_kehadiran === 'Hadir') {
                return back()->with('info', 'Anda sudah melakukan presensi untuk kegiatan ini.');
            } else {
                // Update ke Hadir jika sebelumnya Izin/Sakit/Alpa
                $attendance->update(['status_kehadiran' => 'Hadir']);
                return back()->with('success', 'Status kehadiran berhasil diperbarui menjadi Hadir.');
            }
        }

        // Buat record baru
        Attendance::create([
            'meeting_id' => $meeting->id,
            'user_id' => Auth::id(),
            'status_kehadiran' => 'Hadir',
        ]);

        return back()->with('success', "Presensi berhasil! Anda tercatat hadir pada: {$meeting->nama_rapat}.");
    }
}
