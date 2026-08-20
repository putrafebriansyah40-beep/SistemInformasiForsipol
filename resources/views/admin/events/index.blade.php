<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-between items-center">
                <p class="text-gray-600">Daftar agenda dan acara FORSIPOL</p>
                <a href="{{ route('admin.events.create') }}" class="px-4 py-2 bg-secondary-600 text-white rounded-lg hover:bg-secondary-700 transition shadow-sm">
                    + Tambah Kegiatan
                </a>
            </div>

            <div class="glass-card sm:rounded-2xl border-white/50 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-sm font-semibold text-gray-600">
                                <th class="p-4">Nama Kegiatan</th>
                                <th class="p-4">Tanggal & Waktu</th>
                                <th class="p-4">Lokasi</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($events as $event)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-medium text-gray-900">{{ $event->title }}</td>
                                <td class="p-4 text-gray-600">
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}<br>
                                    <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($event->time)->format('H:i') }} WIB</span>
                                </td>
                                <td class="p-4 text-gray-600">{{ $event->location }}</td>
                                <td class="p-4">
                                    @if(\Carbon\Carbon::parse($event->date . ' ' . $event->time)->isPast())
                                        <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs font-semibold">Selesai</span>
                                    @else
                                        <span class="px-2 py-1 bg-green-100 text-green-600 rounded text-xs font-semibold">Akan Datang</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.events.edit', $event) }}" class="text-primary-600 hover:text-primary-900 bg-primary-50 hover:bg-primary-100 px-3 py-1 rounded text-sm transition">Edit</a>
                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini?');">
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
                                    Belum ada kegiatan yang dijadwalkkan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-4">
                {{ $events->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
