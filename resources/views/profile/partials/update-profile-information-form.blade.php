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

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
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

        <div>
            <x-input-label for="no_whatsapp" :value="__('No. WhatsApp')" />
            <x-text-input id="no_whatsapp" name="no_whatsapp" type="text" class="mt-1 block w-full" :value="old('no_whatsapp', $user->no_whatsapp)" />
            <x-input-error class="mt-2" :messages="$errors->get('no_whatsapp')" />
        </div>

        <div>
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                <option value="">— Pilih —</option>
                <option value="Ikhwan" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Ikhwan' ? 'selected' : '' }}>Ikhwan</option>
                <option value="Akhwat" {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Akhwat' ? 'selected' : '' }}>Akhwat</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
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
