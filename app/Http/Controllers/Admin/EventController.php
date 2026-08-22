<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'waktu_pelaksanaan' => 'required|date',
            'lokasi' => 'nullable|string|max:255',
            'kategori' => 'required|in:Internal,Eksternal',
        ]);

        $validated['kode_absen'] = strtoupper(\Illuminate\Support\Str::random(6));

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Kegiatan berhasil ditambahkan dengan kode presensi: ' . $validated['kode_absen']);
    }

    public function show(Event $event)
    {
        $event->load(['attendances.user' => function($query) {
            $query->orderBy('name');
        }]);
        
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'waktu_pelaksanaan' => 'required|date',
            'lokasi' => 'nullable|string|max:255',
            'kategori' => 'required|in:Internal,Eksternal',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}
