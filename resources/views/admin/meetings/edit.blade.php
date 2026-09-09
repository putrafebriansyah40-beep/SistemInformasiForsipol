<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.meetings.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Jadwal Rapat
            </h2>
        </div>
    </x-slot>

    <div class="pt-2 pb-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card sm:rounded-2xl border-white/50 p-6 sm:p-8">
                <form action="{{ route('admin.meetings.update', $meeting) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-5 bg-gray-50/80 backdrop-blur-sm p-4 rounded-xl border border-gray-200 shadow-sm">
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wider">Kode Presensi (Tidak dapat diubah)</label>
                        <p class="mt-1 text-2xl font-mono font-bold tracking-widest text-primary-700">{{ $meeting->kode_absen }}</p>
                    </div>

                    <div class="mb-5">
                        <x-input-label for="nama_rapat" :value="__('Nama/Topik Rapat *')" />
                        <x-text-input id="nama_rapat" class="block mt-1 w-full" type="text" name="nama_rapat" :value="old('nama_rapat', $meeting->nama_rapat)" required autofocus />
                        <x-input-error :messages="$errors->get('nama_rapat')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <x-input-label for="waktu_rapat" :value="__('Waktu Rapat *')" />
                            <x-text-input id="waktu_rapat" class="block mt-1 w-full" type="datetime-local" name="waktu_rapat" 
                                        value="{{ old('waktu_rapat', $meeting->waktu_rapat ? \Carbon\Carbon::parse($meeting->waktu_rapat)->format('Y-m-d\TH:i') : '') }}" required />
                            <x-input-error :messages="$errors->get('waktu_rapat')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="lokasi" :value="__('Lokasi')" />
                            <x-text-input id="lokasi" class="block mt-1 w-full" type="text" name="lokasi" :value="old('lokasi', $meeting->lokasi)" placeholder="Contoh: Sekretariat / Link Zoom" />
                            <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mb-6">
                        <x-input-label for="agenda" :value="__('Agenda / Catatan Tambahan')" />
                        <textarea id="agenda" name="agenda" rows="4" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3" placeholder="Detail poin-poin yang akan dibahas...">{{ old('agenda', $meeting->agenda) }}</textarea>
                        <x-input-error :messages="$errors->get('agenda')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.meetings.index') }}" class="text-gray-600 hover:text-gray-800 text-sm transition">
                            &larr; Batal
                        </a>
                        <x-primary-button>
                            {{ __('Perbarui Rapat') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
