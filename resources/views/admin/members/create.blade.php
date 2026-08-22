<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card sm:rounded-2xl border-white/50 p-6 sm:p-8">
                <form method="POST" action="{{ route('admin.members.store') }}">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-5">
                        <x-input-label for="name" :value="__('Nama Lengkap')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="mb-5">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- No WhatsApp -->
                    <div class="mb-5">
                        <x-input-label for="no_whatsapp" :value="__('No. WhatsApp')" />
                        <x-text-input id="no_whatsapp" class="block mt-1 w-full" type="text" name="no_whatsapp" :value="old('no_whatsapp')" />
                        <x-input-error :messages="$errors->get('no_whatsapp')" class="mt-2" />
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-5">
                        <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                        <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
                    </div>

                    <!-- Jabatan -->
                    <div class="mb-5">
                        <x-input-label for="jabatan" :value="__('Jabatan')" />
                        <x-text-input id="jabatan" class="block mt-1 w-full" type="text" name="jabatan" :value="old('jabatan')" />
                        <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                    </div>

                    <!-- Departemen -->
                    <div class="mb-5">
                        <x-input-label for="departemen" :value="__('Departemen')" />
                        <x-text-input id="departemen" class="block mt-1 w-full" type="text" name="departemen" :value="old('departemen')" />
                        <x-input-error :messages="$errors->get('departemen')" class="mt-2" />
                    </div>

                    <!-- Angkatan -->
                    <div class="mb-5">
                        <x-input-label for="angkatan" :value="__('Angkatan')" />
                        <x-text-input id="angkatan" class="block mt-1 w-full" type="text" name="angkatan" :value="old('angkatan')" />
                        <x-input-error :messages="$errors->get('angkatan')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-6">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.members.index') }}" class="text-gray-600 hover:text-gray-800 text-sm transition">
                            &larr; Kembali
                        </a>
                        <x-primary-button>
                            {{ __('Tambah Anggota') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
