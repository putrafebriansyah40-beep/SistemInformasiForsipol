<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.events.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Kegiatan') }}
            </h2>
        </div>
    </x-slot>

    <div class="pt-2 pb-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card sm:rounded-2xl border-white/50 p-6 sm:p-8">
                <form action="{{ route('admin.events.update', $event) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-5">
                        <x-input-label for="nama_kegiatan" :value="__('Nama Kegiatan *')" />
                        <x-text-input id="nama_kegiatan" class="block mt-1 w-full" type="text" name="nama_kegiatan" :value="old('nama_kegiatan', $event->nama_kegiatan)" required autofocus />
                        <x-input-error :messages="$errors->get('nama_kegiatan')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <x-input-label for="waktu_pelaksanaan" :value="__('Waktu Pelaksanaan *')" />
                            <x-text-input id="waktu_pelaksanaan" class="block mt-1 w-full" type="datetime-local" name="waktu_pelaksanaan" 
                                        :value="old('waktu_pelaksanaan', $event->waktu_pelaksanaan ? \Carbon\Carbon::parse($event->waktu_pelaksanaan)->format('Y-m-d\TH:i') : '')" required />
                            <x-input-error :messages="$errors->get('waktu_pelaksanaan')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="kategori" :value="__('Kategori *')" />
                            <select id="kategori" name="kategori" required class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                                <option value="Internal" {{ old('kategori', $event->kategori) == 'Internal' ? 'selected' : '' }}>Internal</option>
                                <option value="Eksternal" {{ old('kategori', $event->kategori) == 'Eksternal' ? 'selected' : '' }}>Eksternal</option>
                            </select>
                            <x-input-error :messages="$errors->get('kategori')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mb-5">
                        <x-input-label for="lokasi" :value="__('Lokasi')" />
                        <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi" :value="old('lokasi', $event->lokasi)" placeholder="Contoh: Gedung A / Link Zoom" />
                        <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3" placeholder="Detail kegiatan...">{{ old('deskripsi', $event->deskripsi) }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.events.index') }}" class="text-gray-600 hover:text-gray-800 text-sm transition">
                            &larr; Batal
                        </a>
                        <x-primary-button>
                            {{ __('Perbarui Kegiatan') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
