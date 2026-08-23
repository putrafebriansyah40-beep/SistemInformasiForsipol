<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengkaderan;
use App\Http\Requests\Admin\PengkaderanRequest;
use Illuminate\Http\Request;

class PengkaderanController extends Controller
{
    public function index()
    {
        $pengkaderans = Pengkaderan::latest()->paginate(10);
        return view('admin.pengkaderans.index', compact('pengkaderans'));
    }

    public function create()
    {
        return view('admin.pengkaderans.create');
    }

    public function store(PengkaderanRequest $request)
    {
        $validated = $request->validated();
        
        Pengkaderan::create($validated);

        return redirect()->route('admin.pengkaderans.index')
            ->with('success', 'Pengkaderan berhasil ditambahkan.');
    }

    public function show(Pengkaderan $pengkaderan)
    {
        $pengkaderan->load(['sesis' => function($query) {
            $query->orderBy('waktu_mulai');
        }, 'sesis.attendances.user']);
        
        return view('admin.pengkaderans.show', compact('pengkaderan'));
    }

    public function edit(Pengkaderan $pengkaderan)
    {
        return view('admin.pengkaderans.edit', compact('pengkaderan'));
    }

    public function update(PengkaderanRequest $request, Pengkaderan $pengkaderan)
    {
        $validated = $request->validated();
        $pengkaderan->update($validated);

        return redirect()->route('admin.pengkaderans.index')
            ->with('success', 'Pengkaderan berhasil diperbarui.');
    }

    public function destroy(Pengkaderan $pengkaderan)
    {
        $pengkaderan->delete();

        return redirect()->route('admin.pengkaderans.index')
            ->with('success', 'Pengkaderan berhasil dihapus.');
    }
}
