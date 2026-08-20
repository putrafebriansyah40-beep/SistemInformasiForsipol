<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengaturan Rekening Bendahara
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 sm:p-8">
                    @if(session('success'))
                        <div class="bg-green-50 text-green-700 p-4 rounded-xl mb-6 text-sm flex gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-900">Informasi Bank</h3>
                        <p class="text-sm text-gray-500">Silakan masukkan data rekening yang akan digunakan untuk menerima pembayaran uang kas dari anggota.</p>
                    </div>

                    <form method="POST" action="{{ route('bendahara.profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="nama_bank" class="block text-sm font-medium text-gray-700">Nama Bank <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_bank" id="nama_bank" value="{{ old('nama_bank', $user->nama_bank) }}" required placeholder="Contoh: Bank Syariah Indonesia (BSI)"
                                   class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            @error('nama_bank') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="rekening_bank" class="block text-sm font-medium text-gray-700">Nomor Rekening <span class="text-red-500">*</span></label>
                            <input type="text" name="rekening_bank" id="rekening_bank" value="{{ old('rekening_bank', $user->rekening_bank) }}" required placeholder="Contoh: 1234567890"
                                   class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            @error('rekening_bank') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="atas_nama_bank" class="block text-sm font-medium text-gray-700">Atas Nama <span class="text-red-500">*</span></label>
                            <input type="text" name="atas_nama_bank" id="atas_nama_bank" value="{{ old('atas_nama_bank', $user->atas_nama_bank) }}" required placeholder="Contoh: Fulan bin Fulan"
                                   class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            @error('atas_nama_bank') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-4 flex items-center justify-end">
                            <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-xl hover:bg-primary-700 transition shadow-sm">
                                Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
