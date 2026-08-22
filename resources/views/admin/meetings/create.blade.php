<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.meetings.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Jadwalkan Rapat Baru
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin.meetings.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Rapat -->
                            <div class="md:col-span-2">
                                <label for="nama_rapat" class="block text-sm font-medium text-gray-700">Nama/Topik Rapat <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_rapat" id="nama_rapat" value="{{ old('nama_rapat') }}" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                @error('nama_rapat') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Waktu Pelaksanaan -->
                            <div>
                                <label for="waktu_rapat" class="block text-sm font-medium text-gray-700">Waktu Rapat <span class="text-red-500">*</span></label>
                                <input type="datetime-local" name="waktu_rapat" id="waktu_rapat" value="{{ old('waktu_rapat') }}" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                @error('waktu_rapat') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Lokasi -->
                            <div>
                                <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Sekretariat / Link Zoom"
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                @error('lokasi') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Agenda -->
                            <div class="md:col-span-2">
                                <label for="agenda" class="block text-sm font-medium text-gray-700">Agenda / Catatan Tambahan</label>
                                <textarea name="agenda" id="agenda" rows="4"
                                          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm"
                                          placeholder="Detail poin-poin yang akan dibahas...">{{ old('agenda') }}</textarea>
                                @error('agenda') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                            <button type="submit" class="px-6 py-2.5 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700 transition shadow-sm">
                                Jadwalkan Rapat
                            </button>
                            <a href="{{ route('admin.meetings.index') }}" class="text-sm text-gray-500 hover:text-gray-700 font-medium">Batal</a>
                        </div>
                        <p class="text-xs text-gray-500 mt-3 flex items-center gap-1">
                            <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Kode Presensi akan digenerate otomatis secara acak (6 karakter) setelah disimpan.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
