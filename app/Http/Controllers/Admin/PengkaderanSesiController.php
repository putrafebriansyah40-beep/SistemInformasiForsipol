<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengkaderan;
use App\Models\PengkaderanSesi;

class PengkaderanSesiController extends Controller
{
    public function store(Request $request, Pengkaderan $pengkaderan)
    {
        $validated = $request->validate([
            'nama_sesi' => 'required|string|max:255',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'nullable|date|after_or_equal:waktu_mulai',
        ]);

        $validated['pengkaderan_id'] = $pengkaderan->id;
        $validated['kode_absen'] = strtoupper(\Illuminate\Support\Str::random(6));

        PengkaderanSesi::create($validated);

        return redirect()->route('admin.pengkaderans.show', $pengkaderan)
            ->with('success', 'Sesi berhasil ditambahkan dengan kode presensi: ' . $validated['kode_absen']);
    }

    public function destroy(Pengkaderan $pengkaderan, PengkaderanSesi $sesi)
    {
        $sesi->delete();
        return redirect()->route('admin.pengkaderans.show', $pengkaderan)
            ->with('success', 'Sesi berhasil dihapus.');
    }
}
