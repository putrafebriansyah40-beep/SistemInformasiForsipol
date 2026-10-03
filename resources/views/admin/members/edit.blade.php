<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota') }}
        </h2>
    </x-slot>

    <div class="pt-2 pb-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card sm:rounded-2xl border-white/50 p-6 sm:p-8">
                <form method="POST" action="{{ route('admin.members.update', $member) }}">
                    @csrf
                    @method('PUT')

                    <!-- Informasi Statis (Tidak dapat diedit oleh Presidium) -->
                    <div class="mb-8 bg-gray-50 p-5 rounded-xl border border-gray-100 space-y-4">
                        <div>
                            <x-input-label :value="__('Nama Lengkap')" class="text-xs text-gray-500" />
                            <p class="font-medium text-gray-900 mt-1">{{ $member->name }}</p>
                        </div>
                        <div>
                            <x-input-label :value="__('Nomor Induk Mahasiswa (NIM)')" class="text-xs text-gray-500" />
                            <p class="font-medium text-gray-900 mt-1">{{ $member->nim ?? '-' }}</p>
                        </div>
                        <div>
                            <x-input-label :value="__('Email')" class="text-xs text-gray-500" />
                            <p class="font-medium text-gray-900 mt-1">{{ $member->email }}</p>
                        </div>
                        <div>
                            <x-input-label :value="__('No. WhatsApp')" class="text-xs text-gray-500" />
                            <p class="font-medium text-gray-900 mt-1">{{ $member->no_whatsapp ?? '-' }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label :value="__('Jenis Kelamin')" class="text-xs text-gray-500" />
                                <p class="font-medium text-gray-900 mt-1">{{ $member->jenis_kelamin === 'L' ? 'Ikhwan' : ($member->jenis_kelamin === 'P' ? 'Akhwat' : '-') }}</p>
                            </div>
                            <div>
                                <x-input-label :value="__('Status Keanggotaan')" class="text-xs text-gray-500" />
                                <p class="font-medium text-gray-900 mt-1">
                                    @if($member->role === 'calon_anggota') Calon Anggota
                                    @elseif($member->role === 'member') Anggota Penuh
                                    @elseif($member->role === 'bendahara') Bendahara
                                    @elseif($member->role === 'admin') Presidium
                                    @else {{ ucfirst($member->role) }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Jabatan -->
                    <div class="mb-5">
                        <x-input-label for="jabatan" :value="__('Jabatan')" />
                        <select id="jabatan" name="jabatan" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="Koordinator" {{ old('jabatan', $member->jabatan) == 'Koordinator' ? 'selected' : '' }}>Koordinator</option>
                            <option value="Koordinator Akhwat" {{ old('jabatan', $member->jabatan) == 'Koordinator Akhwat' ? 'selected' : '' }}>Koordinator Akhwat</option>
                            <option value="Anggota" {{ old('jabatan', $member->jabatan) == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                        </select>
                        <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                    </div>

                    <!-- Departemen -->
                    <div class="mb-5">
                        <x-input-label for="departemen" :value="__('Departemen')" />
                        <select id="departemen" name="departemen" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                            <option value="">-- Pilih Departemen --</option>
                            <option value="Departemen Keputrian" {{ old('departemen', $member->departemen) == 'Departemen Keputrian' ? 'selected' : '' }}>Departemen Keputrian</option>
                            <option value="Departemen KPSDM" {{ old('departemen', $member->departemen) == 'Departemen KPSDM' ? 'selected' : '' }}>Departemen KPSDM</option>
                            <option value="Departemen Biro Humas & Kestari" {{ old('departemen', $member->departemen) == 'Departemen Biro Humas & Kestari' ? 'selected' : '' }}>Departemen Biro Humas &amp; Kestari</option>
                            <option value="Departemen Syi'ar Islam" {{ old('departemen', $member->departemen) == "Departemen Syi'ar Islam" ? 'selected' : '' }}>Departemen Syi'ar Islam</option>
                            <option value="Departemen Multimedia" {{ old('departemen', $member->departemen) == 'Departemen Multimedia' ? 'selected' : '' }}>Departemen Multimedia</option>
                            <option value="Departemen Produksi" {{ old('departemen', $member->departemen) == 'Departemen Produksi' ? 'selected' : '' }}>Departemen Produksi</option>
                        </select>
                        <x-input-error :messages="$errors->get('departemen')" class="mt-2" />
                    </div>

                    <!-- Angkatan -->
                    <div class="mb-8 bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <x-input-label :value="__('Angkatan')" class="text-xs text-gray-500" />
                        <p class="font-medium text-gray-900 mt-1">{{ $member->angkatan ?? '-' }}</p>
                    </div>

                    <!-- Status Kaderisasi (Otomatis) -->
                    <div class="mb-8 bg-gray-50 p-5 rounded-xl border border-gray-100">
                        <x-input-label :value="__('Status Lulus Pengkaderan')" class="text-xs text-gray-500 mb-3" />
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 cursor-not-allowed opacity-70">
                                <input type="checkbox" disabled class="rounded border-gray-300 text-primary-600 shadow-sm" {{ $member->role !== 'calon_anggota' || $member->lulus_simba ? 'checked' : '' }}> 
                                <span class="text-sm text-gray-700">SIMBA</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-not-allowed opacity-70">
                                <input type="checkbox" disabled class="rounded border-gray-300 text-primary-600 shadow-sm" {{ $member->role !== 'calon_anggota' || $member->lulus_panda ? 'checked' : '' }}> 
                                <span class="text-sm text-gray-700">PANDA</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-not-allowed opacity-70">
                                <input type="checkbox" disabled class="rounded border-gray-300 text-primary-600 shadow-sm" {{ $member->role !== 'calon_anggota' || $member->lulus_imt ? 'checked' : '' }}> 
                                <span class="text-sm text-gray-700">IMT</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-not-allowed opacity-70">
                                <input type="checkbox" disabled class="rounded border-gray-300 text-primary-600 shadow-sm" {{ $member->role !== 'calon_anggota' || $member->lulus_mukhayyam ? 'checked' : '' }}> 
                                <span class="text-sm text-gray-700">Mukhayyam</span>
                            </label>
                        </div>
                        <p class="text-[11px] text-gray-500 mt-3 italic">*Status kaderisasi diperbarui secara otomatis berdasarkan sistem presensi. Anggota Penuh otomatis tervalidasi.</p>
                    </div>

                    <!-- Password tidak bisa diubah oleh admin -->

                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.members.index') }}" class="text-gray-600 hover:text-gray-800 text-sm transition">
                            &larr; Kembali
                        </a>
                        <x-primary-button>
                            {{ __('Simpan Perubahan') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
