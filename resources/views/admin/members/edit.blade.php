<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota') }}
        </h2>
    </x-slot>

    <div class="pt-2 pb-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card sm:rounded-2xl border-white/50 p-6 sm:p-8">
                <form method="POST" action="{{ route('admin.members.update', $member) }}">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $member->name)" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- NIM -->
                    <div class="mb-5">
                        <x-input-label for="nim" :value="__('Nomor Induk Mahasiswa (NIM)')" />
                        <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim', $member->nim)" />
                        <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-5">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $member->email)" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- No WhatsApp -->
                    <div class="mb-5">
                        <x-input-label for="no_whatsapp" :value="__('No. WhatsApp')" />
                        <x-text-input id="no_whatsapp" class="block mt-1 w-full" type="text" name="no_whatsapp" :value="old('no_whatsapp', $member->no_whatsapp)" />
                        <x-input-error :messages="$errors->get('no_whatsapp')" class="mt-2" />
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-5">
                        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                        <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $member->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
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
                    <div class="mb-5">
                        <x-input-label for="angkatan" :value="__('Angkatan')" />
                        <x-text-input id="angkatan" class="block mt-1 w-full" type="text" name="angkatan" :value="old('angkatan', $member->angkatan)" />
                        <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
                    </div>

                    <!-- Password (opsional) -->
                    <div class="mb-5">
                        <x-input-label for="password" :value="__('Password Baru (kosongkan jika tidak diubah)')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-6">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

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
