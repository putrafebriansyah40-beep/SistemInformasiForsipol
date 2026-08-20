<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Terima kasih telah mendaftar! Kami telah mengirimkan 6 digit kode OTP ke nomor WhatsApp Anda. Silakan masukkan kode tersebut di bawah ini untuk memverifikasi akun Anda.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-4 rounded-lg">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 font-medium text-sm text-red-600 bg-red-50 p-4 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify.post') }}">
        @csrf

        <!-- OTP Code -->
        <div>
            <x-input-label for="otp" :value="__('Kode OTP')" />
            <x-text-input id="otp" class="block mt-1 w-full tracking-widest text-center text-xl font-bold" type="text" name="otp" required autofocus maxlength="6" placeholder="------" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="w-full justify-center text-lg">
                {{ __('Verifikasi OTP') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-8 pt-6 border-t border-gray-100 text-center">
        <p class="text-sm text-gray-600 mb-4">Tidak menerima pesan WhatsApp?</p>
        <form method="POST" action="{{ route('otp.resend') }}">
            @csrf
            <button type="submit" class="text-sm text-primary-600 hover:text-primary-900 font-semibold underline">
                {{ __('Kirim Ulang Kode OTP') }}
            </button>
        </form>
    </div>
</x-guest-layout>
