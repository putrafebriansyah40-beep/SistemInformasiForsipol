<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\CashPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashPaymentController extends Controller
{
    public function create()
    {
        // Cari user bendahara untuk mendapatkan rekening bank
        $bendahara = User::where('role', 'bendahara')->first();

        $bulanNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return view('member.cash-payments.create', compact('bendahara', 'bulanNames'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan'          => 'required|integer|between:1,12',
            'tahun'          => 'required|integer|min:2020|max:2099',
            'jumlah'         => 'required|integer|min:0',
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek duplikat
        $exists = CashPayment::where('user_id', Auth::id())
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->first();

        if ($exists) {
            if ($exists->status === 'Menunggu Konfirmasi') {
                return back()->with('info', 'Pembayaran kas untuk bulan ini sedang menunggu konfirmasi.');
            } elseif ($exists->status === 'Lunas') {
                return back()->with('success', 'Pembayaran kas untuk bulan ini sudah lunas.');
            }
            // Jika Belum Lunas atau Ditolak, boleh ditimpa
        }

        // Upload file
        $path = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

        if ($exists) {
            $exists->update([
                'jumlah'         => $request->jumlah,
                'bukti_transfer' => $path,
                'status'         => 'Menunggu Konfirmasi',
                'tanggal_bayar'  => now(),
            ]);
        } else {
            CashPayment::create([
                'user_id'        => Auth::id(),
                'bulan'          => $request->bulan,
                'tahun'          => $request->tahun,
                'jumlah'         => $request->jumlah,
                'bukti_transfer' => $path,
                'status'         => 'Menunggu Konfirmasi',
                'tanggal_bayar'  => now(),
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Bukti pembayaran kas berhasil dikirim dan menunggu konfirmasi bendahara.');
    }
}
