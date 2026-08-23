<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.pengkaderans.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kelola Sesi & Kehadiran Pengkaderan
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Info Pengkaderan --}}
            <div class="bg-gradient-to-r from-secondary-600 to-secondary-800 rounded-2xl shadow-sm text-white p-6 relative overflow-hidden">
                <div class="absolute top-0 right-0 opacity-10">
                    <svg class="w-48 h-48 transform translate-x-8 -translate-y-8" fill="currentColor" viewBox="0 0 24 24"><path d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>
                </div>
                
                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <h3 class="text-2xl font-bold mb-1">{{ $pengkaderan->nama_pengkaderan }}</h3>
                        <p class="text-secondary-100">{{ $pengkaderan->lokasi ?? 'Lokasi tidak ditentukan' }}</p>
                    </div>
                </div>
                
                @if($pengkaderan->deskripsi)
                <div class="mt-6 pt-4 border-t border-white/20 relative z-10">
                    <p class="text-xs text-secondary-100 uppercase tracking-wider mb-2">Deskripsi</p>
                    <p class="text-sm leading-relaxed">{{ $pengkaderan->deskripsi }}</p>
                </div>
                @endif
            </div>

            {{-- Form Tambah Sesi --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-6">
                <h3 class="font-semibold text-gray-800 mb-4">Tambah Sesi Baru</h3>
                <form action="{{ route('admin.pengkaderans.sesis.store', $pengkaderan) }}" method="POST" class="flex flex-wrap gap-4 items-end">
                    @csrf
                    <div class="flex-1 min-w-[200px]">
                        <x-input-label for="nama_sesi" :value="__('Nama Sesi *')" />
                        <x-text-input id="nama_sesi" class="block mt-1 w-full" type="text" name="nama_sesi" placeholder="Misal: Hari 1 - Pagi" required />
                    </div>
                    <div class="w-full sm:w-auto">
                        <x-input-label for="waktu_mulai" :value="__('Waktu Mulai *')" />
                        <x-text-input id="waktu_mulai" class="block mt-1 w-full" type="datetime-local" name="waktu_mulai" required />
                    </div>
                    <div class="w-full sm:w-auto">
                        <x-input-label for="waktu_selesai" :value="__('Waktu Selesai')" />
                        <x-text-input id="waktu_selesai" class="block mt-1 w-full" type="datetime-local" name="waktu_selesai" />
                    </div>
                    <div>
                        <x-primary-button type="submit" class="h-[42px]">Tambah Sesi</x-primary-button>
                    </div>
                </form>
            </div>

            {{-- Tabel Sesi --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <h3 class="font-semibold text-gray-800">Daftar Sesi ({{ $pengkaderan->sesis->count() }})</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-gray-200 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="p-4 w-12 text-center">No</th>
                                <th class="p-4">Sesi</th>
                                <th class="p-4">Waktu</th>
                                <th class="p-4 text-center">Kode Presensi</th>
                                <th class="p-4 text-center">Hadir</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($pengkaderan->sesis as $index => $sesi)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-4 text-center text-gray-500 text-sm">{{ $index + 1 }}</td>
                                    <td class="p-4 font-medium text-gray-900">{{ $sesi->nama_sesi }}</td>
                                    <td class="p-4 text-sm text-gray-600">
                                        {{ \Carbon\Carbon::parse($sesi->waktu_mulai)->format('d M Y, H:i') }}
                                        @if($sesi->waktu_selesai)
                                            - {{ \Carbon\Carbon::parse($sesi->waktu_selesai)->format('H:i') }}
                                        @endif
                                    </td>
                                    <td class="p-4 text-center">
                                        <span class="font-mono bg-gray-100 text-gray-800 px-2 py-1 rounded font-bold tracking-wider">{{ $sesi->kode_absen }}</span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-bold">{{ $sesi->attendances->count() }} orang</span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <form action="{{ route('admin.pengkaderans.sesis.destroy', [$pengkaderan, $sesi]) }}" method="POST" onsubmit="return confirm('Hapus sesi ini? Semua data presensi sesi ini akan hilang!');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-8 text-center text-gray-400">Belum ada sesi yang dibuat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

