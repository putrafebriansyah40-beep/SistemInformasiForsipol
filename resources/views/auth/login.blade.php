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
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

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
