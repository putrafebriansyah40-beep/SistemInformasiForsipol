<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('bendahara.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_bank'      => 'required|string|max:100',
            'rekening_bank'  => 'required|string|max:100',
            'atas_nama_bank' => 'required|string|max:100',
        ]);

        $user = Auth::user();
        $user->update([
            'nama_bank'      => $request->nama_bank,
            'rekening_bank'  => $request->rekening_bank,
            'atas_nama_bank' => $request->atas_nama_bank,
        ]);

        return back()->with('success', 'Rekening kas berhasil diperbarui.');
    }
}
