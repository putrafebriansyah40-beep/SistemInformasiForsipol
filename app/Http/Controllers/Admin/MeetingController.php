<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Http\Requests\Admin\MeetingRequest;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::latest()->paginate(10);
        return view('admin.meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('admin.meetings.create');
    }

    public function store(MeetingRequest $request)
    {
        $validated = $request->validated();
        $validated['kode_absen'] = strtoupper(\Illuminate\Support\Str::random(6));

        Meeting::create($validated);

        return redirect()->route('admin.meetings.index')
            ->with('success', 'Rapat berhasil dijadwalkan dengan kode presensi: ' . $validated['kode_absen']);
    }

    public function show(Meeting $meeting)
    {
        $meeting->load(['attendances.user' => function($query) {
            $query->orderBy('name');
        }]);
        
        return view('admin.meetings.show', compact('meeting'));
    }

    public function edit(Meeting $meeting)
    {
        return view('admin.meetings.edit', compact('meeting'));
    }

    public function update(MeetingRequest $request, Meeting $meeting)
    {
        $validated = $request->validated();
        $meeting->update($validated);

        return redirect()->route('admin.meetings.index')
            ->with('success', 'Data rapat berhasil diperbarui.');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        return redirect()->route('admin.meetings.index')
            ->with('success', 'Rapat berhasil dihapus.');
    }
}
