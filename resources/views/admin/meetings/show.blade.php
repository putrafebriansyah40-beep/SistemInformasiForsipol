<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.meetings.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Rekap Kehadiran Rapat
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Info Rapat --}}
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl shadow-sm text-white p-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 opacity-10">
                    <svg class="w-48 h-48 transform translate-x-8 -translate-y-8" fill="currentColor" viewBox="0 0 24 24"><path d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>
                </div>
                
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <h3 class="text-2xl font-bold mb-1">{{ $meeting->nama_rapat }}</h3>
                        <p class="text-blue-100">{{ \Carbon\Carbon::parse($meeting->waktu_rapat)->format('l, d M Y - H:i') }} WIB • {{ $meeting->lokasi ?? 'Lokasi tidak ditentukan' }}</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 text-center min-w-[200px]">
                        <p class="text-xs text-blue-100 uppercase tracking-wider mb-1">Kode Presensi</p>
                        <p class="text-3xl font-mono font-bold tracking-widest">{{ $meeting->kode_absen }}</p>
                    </div>
                </div>
                
                @if($meeting->agenda)
                <div class="mt-6 pt-4 border-t border-white/20 relative z-10">
                    <p class="text-xs text-blue-100 uppercase tracking-wider mb-2">Agenda / Catatan</p>
                    <p class="text-sm leading-relaxed">{{ $meeting->agenda }}</p>
                </div>
                @endif
            </div>

            {{-- Tabel Kehadiran --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="font-semibold text-gray-800">Daftar Hadir ({{ $meeting->attendances->count() }} Anggota)</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="p-4 w-12 text-center">No</th>
                                <th class="p-4">Anggota</th>
                                <th class="p-4">Waktu Presensi</th>
                                <th class="p-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($meeting->attendances as $index => $attendance)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-4 text-center text-gray-500 text-sm">{{ $index + 1 }}</td>
                                    <td class="p-4">
                                        <p class="font-medium text-gray-900">{{ $attendance->user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $attendance->user->departemen ?? 'Belum ada departemen' }} • {{ $attendance->user->jabatan ?? 'Anggota' }}</p>
                                    </td>
                                    <td class="p-4 text-sm text-gray-600">
                                        {{ $attendance->created_at->format('d/m/Y H:i:s') }}
                                    </td>
                                    <td class="p-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Hadir
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-12 text-center text-gray-400">
                                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                        Belum ada anggota yang melakukan presensi.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
