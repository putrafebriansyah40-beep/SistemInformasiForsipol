<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" x-data="{
        name: '{{ old('name') }}',
        nim: '{{ old('nim') }}',
        jenis_kelamin: '{{ old('jenis_kelamin') }}',
        jurusan: '{{ old('jurusan') }}',
        program_studi: '{{ old('program_studi') }}',
        email: '{{ old('email') }}',
        whatsapp: '{{ old('whatsapp') }}',
        password: '',
        password_confirmation: '',
        
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
        },
        get isFormValid() {
            return this.name !== '' && this.nim !== '' && this.jenis_kelamin !== '' && 
                   this.jurusan !== '' && this.program_studi !== '' && this.email !== '' && 
                   this.whatsapp !== '' && this.password !== '' && this.password_confirmation !== '' && 
                   this.password === this.password_confirmation;
        }
    }">
        @csrf

        <!-- Status Box -->
        <div class="mb-6 p-4 text-sm rounded-xl border-2 flex items-start shadow-sm transition-colors duration-300"
             :class="isFormValid ? 'bg-green-50 border-green-400 text-green-900' : 'bg-red-50 border-red-400 text-red-900'">
            <div class="flex-shrink-0 mt-[2px]">
                <svg x-show="isFormValid" class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <svg x-show="!isFormValid" class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div class="ml-3 w-full">
                <span class="font-bold block mb-3 text-base" x-text="isFormValid ? 'Formulir Siap Dikirim!' : 'Status Pengisian Formulir (Wajib Lengkap)'"></span>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                    <template x-for="field in [
                        { key: name, label: 'Nama Lengkap' },
                        { key: nim, label: 'NIM' },
                        { key: jenis_kelamin, label: 'Jenis Kelamin' },
                        { key: jurusan, label: 'Jurusan' },
                        { key: program_studi, label: 'Program Studi' },
                        { key: email, label: 'Email' },
                        { key: whatsapp, label: 'Nomor WhatsApp' },
                        { key: password, label: 'Password' },
                        { key: password_confirmation, label: 'Konfirmasi Password' }
                    ]">
                        <div class="flex items-center space-x-1.5">
                            <!-- Check icon -->
                            <svg x-show="field.key !== '' && (field.label !== 'Konfirmasi Password' || password === password_confirmation)" class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <!-- Cross icon -->
                            <svg x-show="field.key === '' || (field.label === 'Konfirmasi Password' && password !== password_confirmation)" class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                            
                            <span :class="(field.key !== '' && (field.label !== 'Konfirmasi Password' || password === password_confirmation)) ? 'text-green-700 font-semibold' : 'text-red-600'" x-text="field.label"></span>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" x-model="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- NIM -->
        <div class="mt-4">
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required x-model="nim" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3" required x-model="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Ikhwan" {{ old('jenis_kelamin') == 'Ikhwan' ? 'selected' : '' }}>Ikhwan</option>
                <option value="Akhwat" {{ old('jenis_kelamin') == 'Akhwat' ? 'selected' : '' }}>Akhwat</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <!-- Jurusan -->
        <div class="mt-4">
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <select id="jurusan" name="jurusan" x-model="jurusan" @change="program_studi = ''" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3" required>
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
            <select id="program_studi" name="program_studi" x-model="program_studi" class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3" required>
                <option value="">Pilih Program Studi</option>
                <template x-for="prodi in currentProgramStudi" :key="prodi">
                    <option :value="prodi" x-text="prodi" :selected="prodi === '{{ old('program_studi') }}'"></option>
                </template>
            </select>
            <x-input-error :messages="$errors->get('program_studi')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" x-model="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- WhatsApp Number -->
        <div class="mt-4">
            <x-input-label for="whatsapp" :value="__('Nomor WhatsApp')" />
            <x-text-input id="whatsapp" class="block mt-1 w-full" type="text" name="whatsapp" :value="old('whatsapp')" required placeholder="Contoh: 081234567890" x-model="whatsapp" />
            <x-input-error :messages="$errors->get('whatsapp')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" x-model="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" x-model="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col-reverse sm:flex-row sm:items-center justify-between mt-8 gap-4">
            <a class="text-sm text-center sm:text-left text-primary-600 hover:text-primary-800 transition-colors focus:outline-none focus:underline" href="{{ route('login') }}">
                {{ __('Sudah punya akun? Log in') }}
            </a>

            <x-primary-button class="w-full sm:w-auto transition-all duration-300" x-bind:disabled="!isFormValid" x-bind:class="{'opacity-50 cursor-not-allowed bg-gray-400 hover:bg-gray-400': !isFormValid}">
                {{ __('Daftar (Register)') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
