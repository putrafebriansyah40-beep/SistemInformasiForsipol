<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- NIM -->
        <div class="mt-4">
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <div x-data="{
            jurusan: '{{ old('jurusan') }}',
            programStudiList: {
                'Teknik Sipil': ['D3 Teknik Sipil', 'D4 Manajemen Rekayasa Konstruksi', 'D4 Perancangan Jalan dan Jembatan'],
                'Teknik Mesin': ['D3 Teknik Mesin', 'D3 Teknik Alat Berat', 'D4 Teknik Manufaktur', 'D4 Rekayasa Perancangan Mekanik'],
                'Teknik Elektro': ['D3 Teknik Elektronika', 'D3 Teknik Listrik', 'D3 Teknik Telekomunikasi', 'D4 Teknik Elektronika Industri', 'D4 Teknik Telekomunikasi'],
                'Teknologi Informasi': ['D3 Teknik Komputer', 'D3 Manajemen Informatika', 'D4 Teknologi Rekayasa Perangkat Lunak', 'D4 Animasi'],
                'Akuntansi': ['D3 Akuntansi', 'D4 Akuntansi'],
                'Administrasi Niaga': ['D3 Administrasi Bisnis', 'D3 Usaha Perjalanan Wisata', 'D4 Bisnis Digital', 'D4 Logistik Perdagangan Internasional', 'D4 Destinasi Pariwisata'],
                'Bahasa Inggris': ['D3 Bahasa Inggris', 'D4 Bahasa Inggris untuk Komunikasi Bisnis dan Profesional']
            },
            get currentProgramStudi() {
                return this.jurusan ? this.programStudiList[this.jurusan] : [];
            }
        }">
            <!-- Jurusan -->
            <div class="mt-4">
                <x-input-label for="jurusan" :value="__('Jurusan')" />
                <select id="jurusan" name="jurusan" x-model="jurusan" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3" required>
                    <option value="">Pilih Jurusan</option>
                    <template x-for="(prodi, jur) in programStudiList" :key="jur">
                        <option :value="jur" x-text="jur" :selected="jur === '{{ old('jurusan') }}'"></option>
                    </template>
                </select>
                <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
            </div>

            <!-- Program Studi -->
            <div class="mt-4">
                <x-input-label for="program_studi" :value="__('Program Studi')" />
                <select id="program_studi" name="program_studi" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3" required>
                    <option value="">Pilih Program Studi</option>
                    <template x-for="prodi in currentProgramStudi" :key="prodi">
                        <option :value="prodi" x-text="prodi" :selected="prodi === '{{ old('program_studi') }}'"></option>
                    </template>
                </select>
                <x-input-error :messages="$errors->get('program_studi')" class="mt-2" />
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- WhatsApp Number -->
        <div class="mt-4">
            <x-input-label for="whatsapp" :value="__('Nomor WhatsApp')" />
            <x-text-input id="whatsapp" class="block mt-1 w-full" type="text" name="whatsapp" :value="old('whatsapp')" required placeholder="Contoh: 081234567890" />
            <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col-reverse sm:flex-row sm:items-center justify-between mt-8 gap-4">
            <a class="text-sm text-center sm:text-left text-primary-600 hover:text-primary-800 transition-colors focus:outline-none focus:underline" href="{{ route('login') }}">
                {{ __('Sudah punya akun? Log in') }}
            </a>

            <x-primary-button class="w-full sm:w-auto">
                {{ __('Daftar (Register)') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
