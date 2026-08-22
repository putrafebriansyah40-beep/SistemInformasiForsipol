<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.events.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tambah Kegiatan Baru
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('admin.events.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Kegiatan -->
                            <div class="md:col-span-2">
                                <label for="nama_kegiatan" class="block text-sm font-medium text-gray-700">Nama Kegiatan <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                @error('nama_kegiatan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Waktu Pelaksanaan -->
                            <div>
                                <label for="waktu_pelaksanaan" class="block text-sm font-medium text-gray-700">Waktu Pelaksanaan <span class="text-red-500">*</span></label>
                                <input type="datetime-local" name="waktu_pelaksanaan" id="waktu_pelaksanaan" value="{{ old('waktu_pelaksanaan') }}" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                @error('waktu_pelaksanaan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori <span class="text-red-500">*</span></label>
                                <select name="kategori" id="kategori" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                    <option value="Internal" {{ old('kategori') == 'Internal' ? 'selected' : '' }}>Internal</option>
                                    <option value="Eksternal" {{ old('kategori') == 'Eksternal' ? 'selected' : '' }}>Eksternal</option>
                                </select>
                                @error('kategori') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Lokasi -->
                            <div class="md:col-span-2">
                                <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" placeholder="Contoh: Gedung A / Link Zoom"
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                @error('lokasi') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm"
                                          placeholder="Detail kegiatan...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex items-center gap-3 pt-4">
                            <button type="submit" class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition shadow-sm">
                                Simpan Kegiatan
                            </button>
                            <a href="{{ route('admin.events.index') }}" class="text-sm text-gray-500 hover:text-gray-700 font-medium">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
