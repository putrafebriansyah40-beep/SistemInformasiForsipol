<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\CashPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashPaymentController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', now()->year);
        $bulan = $request->get('bulan');

        $query = CashPayment::with('user', 'recorder')
            ->where('tahun', $tahun);

        if ($bulan) {
            $query->where('bulan', $bulan);
        }

        $payments = $query->orderBy('bulan')->orderBy('user_id')->get();

        // Statistik ringkasan
        $members = User::where('role', '!=', 'admin')->get();
        $totalMembers = $members->count();

        $bulanNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return view('bendahara.cash-payments.index', compact(
            'payments', 'tahun', 'bulan', 'totalMembers', 'members', 'bulanNames'
        ));
    }

    public function create()
    {
        $members = User::where('role', '!=', 'admin')
            ->orderBy('name')
            ->get();

        $bulanNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return view('bendahara.cash-payments.create', compact('members', 'bulanNames'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'       => 'required|exists:users,id',
            'bulan'         => 'required|integer|between:1,12',
            'tahun'         => 'required|integer|min:2020|max:2099',
            'jumlah'        => 'required|integer|min:0',
            'status'        => 'required|in:Lunas,Belum Lunas,Menunggu Konfirmasi',
            'tanggal_bayar' => 'nullable|date',
            'keterangan'    => 'nullable|string|max:500',
        ]);

        // Cek duplikat
        $exists = CashPayment::where('user_id', $request->user_id)
            ->where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->exists();

        if ($exists) {
            return back()->withErrors(['bulan' => 'Data kas untuk anggota ini pada bulan dan tahun tersebut sudah ada.'])->withInput();
        }

        CashPayment::create([
            'user_id'       => $request->user_id,
            'bulan'         => $request->bulan,
            'tahun'         => $request->tahun,
            'jumlah'        => $request->jumlah,
            'status'        => $request->status,
            'tanggal_bayar' => $request->status === 'Lunas' ? ($request->tanggal_bayar ?? now()) : null,
            'recorded_by'   => Auth::id(),
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()->route('bendahara.cash-payments.index')
            ->with('success', 'Data pembayaran kas berhasil dicatat.');
    }

    public function edit(CashPayment $cashPayment)
    {
        $members = User::where('role', '!=', 'admin')
            ->orderBy('name')
            ->get();

        $bulanNames = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return view('bendahara.cash-payments.edit', compact('cashPayment', 'members', 'bulanNames'));
    }

    public function update(Request $request, CashPayment $cashPayment)
    {
        $request->validate([
            'jumlah'        => 'required|integer|min:0',
            'status'        => 'required|in:Lunas,Belum Lunas,Menunggu Konfirmasi',
            'tanggal_bayar' => 'nullable|date',
            'keterangan'    => 'nullable|string|max:500',
        ]);

        $cashPayment->update([
            'jumlah'        => $request->jumlah,
            'status'        => $request->status,
            'tanggal_bayar' => $request->status === 'Lunas' ? ($request->tanggal_bayar ?? now()) : null,
            'recorded_by'   => Auth::id(),
            'keterangan'    => $request->keterangan,
        ]);

        return redirect()->route('bendahara.cash-payments.index')
            ->with('success', 'Data pembayaran kas berhasil diperbarui.');
    }

    public function destroy(CashPayment $cashPayment)
    {
        $cashPayment->delete();

        return redirect()->route('bendahara.cash-payments.index')
            ->with('success', 'Data pembayaran kas berhasil dihapus.');
    }

    public function approve(CashPayment $cashPayment)
    {
        $cashPayment->update([
            'status' => 'Lunas',
            'recorded_by' => Auth::id(),
        ]);

        return back()->with('success', 'Pembayaran kas berhasil dikonfirmasi (Lunas).');
    }
}
