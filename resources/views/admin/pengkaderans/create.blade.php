<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.pengkaderans.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Pengkaderan Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="pt-2 pb-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card sm:rounded-2xl border-white/50 p-6 sm:p-8">
                <form action="{{ route('admin.pengkaderans.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-5">
                        <div>
                            <x-input-label for="nama_pengkaderan" :value="__('Nama Pengkaderan *')" />
                            <select id="nama_pengkaderan" name="nama_pengkaderan" required class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                                <option value="SIMBA" {{ old('nama_pengkaderan', $pengkaderan->nama_pengkaderan ?? '') == 'SIMBA' ? 'selected' : '' }}>SIMBA</option><option value="PANDA" {{ old('nama_pengkaderan', $pengkaderan->nama_pengkaderan ?? '') == 'PANDA' ? 'selected' : '' }}>PANDA</option><option value="IMT" {{ old('nama_pengkaderan', $pengkaderan->nama_pengkaderan ?? '') == 'IMT' ? 'selected' : '' }}>IMT</option><option value="Mukhayyam" {{ old('nama_pengkaderan', $pengkaderan->nama_pengkaderan ?? '') == 'Mukhayyam' ? 'selected' : '' }}>Mukhayyam</option>
                                <option value="Lainnya" {{ old('nama_pengkaderan', $pengkaderan->nama_pengkaderan ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            <x-input-error :messages="$errors->get('nama_pengkaderan')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mb-5">
                        <x-input-label for="lokasi" :value="__('Lokasi')" />
                        <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi" :value="old('lokasi')" placeholder="Contoh: Gedung A / Link Zoom" />
                        <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3" placeholder="Detail Pengkaderan...">{{ old('deskripsi') }}</textarea>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.pengkaderans.index') }}" class="text-gray-600 hover:text-gray-800 text-sm transition">
                            &larr; Batal
                        </a>
                        <x-primary-button>
                            {{ __('Simpan Pengkaderan') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

