<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Pengkaderan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex justify-between items-center">
                <p class="text-gray-600">Daftar agenda dan acara FORSIPOL</p>
                <a href="{{ route('admin.pengkaderans.create') }}" class="px-4 py-2 bg-secondary-600 text-white rounded-lg hover:bg-secondary-700 transition shadow-sm">
                    + Tambah Pengkaderan
                </a>
            </div>

            <div class="glass-card sm:rounded-2xl border-white/50 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-sm font-semibold text-gray-600">
                                <th class="p-4">Nama Pengkaderan</th>
                                <th class="p-4">Lokasi</th>
                                <th class="p-4">Jumlah Sesi</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($pengkaderans as $pengkaderan)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-medium text-gray-900">{{ $pengkaderan->nama_pengkaderan }}</td>
                                <td class="p-4 text-gray-600">{{ $pengkaderan->lokasi }}</td>
                                <td class="p-4 font-bold text-primary-600">{{ $pengkaderan->sesis->count() ?? 0 }} Sesi</td>
                                <td class="p-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.pengkaderans.show', $pengkaderan) }}" class="text-secondary-600 hover:text-secondary-900 bg-secondary-50 hover:bg-secondary-100 px-3 py-1 rounded text-sm transition">Kelola Sesi & Presensi</a>
                                        <a href="{{ route('admin.pengkaderans.edit', $pengkaderan) }}" class="text-primary-600 hover:text-primary-900 bg-primary-50 hover:bg-primary-100 px-3 py-1 rounded text-sm transition">Edit</a>
                                        <form action="{{ route('admin.pengkaderans.destroy', $pengkaderan) }}" method="POST" onsubmit="return confirm('Hapus Pengkaderan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded text-sm transition">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-500">
                                    Belum ada Pengkaderan yang dijadwalkkan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-4">
                {{ $pengkaderans->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

