<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\CashPayment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Bendahara\StoreCashPaymentRequest;
use App\Http\Requests\Bendahara\UpdateCashPaymentRequest;
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

    public function store(StoreCashPaymentRequest $request)
    {
        $validated = $request->validated();

        CashPayment::create([
            'user_id'       => $validated['user_id'],
            'bulan'         => $validated['bulan'],
            'tahun'         => $validated['tahun'],
            'jumlah'        => $validated['jumlah'],
            'status'        => $validated['status'],
            'tanggal_bayar' => $validated['status'] === 'Lunas' ? ($validated['tanggal_bayar'] ?? now()) : null,
            'recorded_by'   => Auth::id(),
            'keterangan'    => $validated['keterangan'] ?? null,
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

    public function update(UpdateCashPaymentRequest $request, CashPayment $cashPayment)
    {
        $validated = $request->validated();

        $cashPayment->update([
            'jumlah'        => $validated['jumlah'],
            'status'        => $validated['status'],
            'tanggal_bayar' => $validated['status'] === 'Lunas' ? ($validated['tanggal_bayar'] ?? now()) : null,
            'recorded_by'   => Auth::id(),
            'keterangan'    => $validated['keterangan'] ?? null,
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
