<x-guest-layout>
    <!-- Header Login -->
    <div class="text-center mb-8">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logo-forsipol.png') }}" alt="Logo Forsipol" class="h-16 w-auto">
        </div>
        <h2 class="text-2xl font-bold font-display text-gray-900">Login</h2>
        <p class="text-sm text-gray-500 mt-2">Masuk ke <span class="font-semibold text-primary-600">SiSiPol</span></p>
        <p class="text-xs text-gray-400 mt-1">(Sistem Informasi Forsipol)</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- NIM -->
        <div>
            <x-input-label for="nim" :value="__('Nomor Induk Mahasiswa (NIM)')" />
            <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4" x-data="{ show: false }">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative mt-1">
                <x-text-input id="password" class="block w-full pr-12"
                                x-bind:type="show ? 'text' : 'password'"
                                name="password"
                                required autocomplete="current-password" />
                                
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-primary-600 focus:outline-none transition-colors">
                    <!-- Eye Icon -->
                    <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <!-- Eye Slash Icon -->
                    <svg x-show="show" x-cloak class="h-5 w-5" style="display: none;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:ring-primary-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-8">
            @if (Route::has('password.request'))
                <a class="text-sm text-primary-600 hover:text-primary-800 transition-colors focus:outline-none focus:underline" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 w-full sm:w-auto">
                {{ __('Masuk (Log In)') }}
            </x-primary-button>
        </div>
        

    </form>
</x-guest-layout>
