<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\Admin\EventRequest;

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

    public function store(EventRequest $request)
    {
        $validated = $request->validated();
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

    public function update(EventRequest $request, Event $event)
    {
        $validated = $request->validated();
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
