<x-guest-layout>
    <div class="text-center p-6">
        <div class="mb-4 inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-100 text-red-500">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>
        
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Mohon Maaf, Pendaftaran Ditutup!</h2>
        
        <p class="text-gray-600 mb-8">
            Saat ini kami tidak menerima pendaftaran anggota baru. Terima kasih atas antusiasme Anda untuk bergabung dengan Forsipol. Silakan pantau terus informasi selanjutnya.
        </p>

        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
            Kembali ke Halaman Login
        </a>
    </div>
</x-guest-layout>
