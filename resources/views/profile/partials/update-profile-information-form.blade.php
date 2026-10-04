<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Perbarui biodata dan informasi profil akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" x-data="{
        jurusan: '{{ old('jurusan', $user->jurusan) }}',
        program_studi: '{{ old('program_studi', $user->program_studi) }}',
        programStudiList: {
            'Teknik Sipil': ['D3 Teknik Sipil', 'D4 Manajemen Rekayasa Konstruksi', 'D4 Perancangan Jalan dan Jembatan', 'D4 Perancangan Irigasi dan Rawa'],
            'Teknik Mesin': ['D3 Teknik Mesin', 'D3 Teknik Alat Berat', 'D4 Teknik Manufaktur', 'D4 Rekayasa Perancangan Mekanik'],
            'Teknik Elektro': ['D3 Teknik Elektronika', 'D3 Teknik Listrik', 'D3 Teknik Telekomunikasi', 'D4 Teknik Elektronika Industri', 'D4 Teknik Telekomunikasi', 'D4 Teknologi Rekayasa Instalasi Listrik'],
            'Teknologi Informasi': ['D3 Teknik Komputer', 'D3 Manajemen Informatika', 'D4 Teknologi Rekayasa Perangkat Lunak', 'D4 Animasi'],
            'Akuntansi': ['D3 Akuntansi', 'D4 Akuntansi'],
            'Administrasi Niaga': ['D3 Administrasi Bisnis', 'D3 Usaha Perjalanan Wisata', 'D4 Bisnis Digital', 'D4 Logistik Perdagangan Internasional', 'D4 Destinasi Pariwisata'],
            'Bahasa Inggris': ['D3 Bahasa Inggris', 'D4 Bahasa Inggris untuk Komunikasi Bisnis dan Profesional']
        },
        get currentProgramStudi() {
            return this.jurusan ? this.programStudiList[this.jurusan] : [];
        }
    }">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" :value="old('nim', $user->nim)" />
            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Alamat email Anda belum terverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        @php
            $wa = old('no_whatsapp', $user->no_whatsapp);
            $wa = preg_replace('/^(\+62|62|0)/', '', $wa);
        @endphp
        <div x-data="{ waValue: '{{ $wa }}' }">
            <x-input-label for="no_whatsapp_visible" :value="__('No. WhatsApp')" />
            <div class="mt-1 flex rounded-xl shadow-sm">
                <span class="inline-flex items-center px-4 rounded-l-xl border border-r-0 border-gray-200 bg-gray-50 text-gray-700 font-medium sm:text-sm">
                    +62
                </span>
                <input type="hidden" name="no_whatsapp" x-bind:value="waValue ? '62' + waValue.replace(/^0+/, '') : ''" />
                <input id="no_whatsapp_visible" type="text" x-model="waValue" class="flex-1 block w-full rounded-none rounded-r-xl border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white transition duration-200 px-4 py-3 sm:text-sm" placeholder="81234567890" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('no_whatsapp')" />
        </div>

        <div>
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                <option value="">— Pilih —</option>
                <option value="L" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'L' ? 'selected' : '' }}>Ikhwan</option>
                <option value="P" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'P' ? 'selected' : '' }}>Akhwat</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
        </div>

        <div>
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <select id="jurusan" name="jurusan" x-model="jurusan" @change="program_studi = ''" class="mt-1 block w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                <option value="">— Pilih Jurusan —</option>
                <template x-for="(prodi, jur) in programStudiList" :key="jur">
                    <option :value="jur" x-text="jur" :selected="jur === '{{ old('jurusan', $user->jurusan) }}'"></option>
                </template>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('jurusan')" />
        </div>

        <div>
            <x-input-label for="program_studi" :value="__('Program Studi')" />
            <select id="program_studi" name="program_studi" x-model="program_studi" class="mt-1 block w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                <option value="">— Pilih Program Studi —</option>
                <template x-for="prodi in currentProgramStudi" :key="prodi">
                    <option :value="prodi" x-text="prodi" :selected="prodi === '{{ old('program_studi', $user->program_studi) }}'"></option>
                </template>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('program_studi')" />
        </div>

        @if($user->role === 'bendahara')
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-md font-semibold text-gray-900 mb-4">Informasi Rekening Bank (Khusus Bendahara)</h3>
                
                <div class="space-y-6">
                    <div>
                        <x-input-label for="nama_bank" :value="__('Nama Bank (contoh: BCA, Mandiri)')" />
                        <x-text-input id="nama_bank" name="nama_bank" type="text" class="mt-1 block w-full" :value="old('nama_bank', $user->nama_bank)" />
                        <x-input-error class="mt-2" :messages="$errors->get('nama_bank')" />
                    </div>

                    <div>
                        <x-input-label for="rekening_bank" :value="__('Nomor Rekening')" />
                        <x-text-input id="rekening_bank" name="rekening_bank" type="text" class="mt-1 block w-full" :value="old('rekening_bank', $user->rekening_bank)" />
                        <x-input-error class="mt-2" :messages="$errors->get('rekening_bank')" />
                    </div>

                    <div>
                        <x-input-label for="atas_nama_bank" :value="__('Atas Nama Rekening')" />
                        <x-text-input id="atas_nama_bank" name="atas_nama_bank" type="text" class="mt-1 block w-full" :value="old('atas_nama_bank', $user->atas_nama_bank)" />
                        <x-input-error class="mt-2" :messages="$errors->get('atas_nama_bank')" />
                    </div>
                </div>
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
