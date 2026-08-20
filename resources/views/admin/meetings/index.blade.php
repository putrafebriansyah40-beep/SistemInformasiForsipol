<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Rapat & Presensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-between items-center">
                <p class="text-gray-600">Daftar rapat dan rekap kehadiran anggota</p>
                <a href="{{ route('admin.meetings.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow-sm">
                    + Jadwalkan Rapat
                </a>
            </div>

            <div class="glass-card sm:rounded-2xl border-white/50 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-sm font-semibold text-gray-600">
                                <th class="p-4">Agenda Rapat</th>
                                <th class="p-4">Waktu Pelaksanaan</th>
                                <th class="p-4">Kode Presensi</th>
                                <th class="p-4">Hadir</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($meetings as $meeting)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-medium text-gray-900">{{ $meeting->title }}</td>
                                <td class="p-4 text-gray-600">
                                    {{ \Carbon\Carbon::parse($meeting->datetime)->format('d M Y, H:i') }} WIB
                                </td>
                                <td class="p-4">
                                    <span class="px-3 py-1 bg-gray-100 font-mono tracking-widest font-bold text-gray-800 rounded">
                                        {{ $meeting->attendance_code ?? '-----' }}
                                    </span>
                                </td>
                                <td class="p-4 text-gray-600">
                                    {{ $meeting->attendances()->count() }} Orang
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.meetings.show', $meeting) }}" class="text-white bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-sm transition shadow-sm">Rekap Hadir</a>
                                        <a href="{{ route('admin.meetings.edit', $meeting) }}" class="text-primary-600 hover:text-primary-900 bg-primary-50 hover:bg-primary-100 px-3 py-1 rounded text-sm transition">Edit</a>
                                        <form action="{{ route('admin.meetings.destroy', $meeting) }}" method="POST" onsubmit="return confirm('Hapus rapat ini? Data presensi juga akan hilang.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded text-sm transition">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">
                                    Belum ada data rapat.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-4">
                {{ $meetings->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
