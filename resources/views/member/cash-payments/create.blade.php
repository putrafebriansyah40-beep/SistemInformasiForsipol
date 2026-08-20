<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bayar Uang Kas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Info Rekening Bendahara --}}
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl shadow-sm text-white p-6 lg:p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 opacity-10">
                    <svg class="w-48 h-48 transform translate-x-8 -translate-y-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.64-2.1 1.64-1.71 0-2.28-.92-2.36-1.64H8.01c.08 1.56 1.07 2.76 2.89 3.14V19h2.5v-1.67c1.61-.27 2.89-1.28 2.89-2.92 0-2.35-1.99-3.08-3.98-3.55z"/></svg>
                </div>
                
                <h3 class="text-xl font-bold mb-4">Informasi Rekening Bendahara</h3>
                @if($bendahara && $bendahara->rekening_bank)
                    <div class="bg-white/10 rounded-xl p-5 border border-white/20 backdrop-blur-sm">
                        <p class="text-sm text-blue-100 uppercase tracking-wide mb-1">Bank Tujuan</p>
                        <p class="text-2xl font-bold tracking-wider">{{ $bendahara->nama_bank }}</p>
                        
                        <p class="text-sm text-blue-100 uppercase tracking-wide mt-4 mb-1">Nomor Rekening</p>
                        <div class="flex items-center gap-3">
                            <p class="text-3xl font-mono tracking-widest font-bold">{{ $bendahara->rekening_bank }}</p>
                        </div>
                        
                        <p class="text-sm text-blue-100 uppercase tracking-wide mt-4 mb-1">Atas Nama</p>
                        <p class="text-lg font-semibold">{{ $bendahara->atas_nama_bank }}</p>
                    </div>
                @else
                    <div class="bg-white/10 rounded-xl p-5 border border-white/20">
                        <p class="text-blue-100">Maaf, informasi rekening bendahara belum tersedia saat ini. Silakan hubungi pengurus.</p>
                    </div>
                @endif
            </div>

            {{-- Form Pembayaran --}}
            @if($bendahara && $bendahara->rekening_bank)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 lg:p-8">
                        @if(session('info'))
                            <div class="bg-blue-50 text-blue-700 p-4 rounded-xl mb-6 text-sm flex gap-2">
                                <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="{{ route('member.cash-payments.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Bulan --}}
                                <div>
                                    <label for="bulan" class="block text-sm font-medium text-gray-700">Untuk Pembayaran Bulan <span class="text-red-500">*</span></label>
                                    <select name="bulan" id="bulan" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                        @foreach($bulanNames as $key => $name)
                                            <option value="{{ $key }}" {{ old('bulan', now()->month) == $key ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('bulan') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>

                                {{-- Tahun --}}
                                <div>
                                    <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun <span class="text-red-500">*</span></label>
                                    <input type="number" name="tahun" id="tahun" value="{{ old('tahun', now()->year) }}" min="2020" max="2099" required class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                    @error('tahun') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{-- Nominal --}}
                            <div>
                                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Transfer (Rp) <span class="text-red-500">*</span></label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm font-semibold">Rp</span>
                                    </div>
                                    <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', 10000) }}" min="0" required class="block w-full pl-12 rounded-xl border-gray-300 focus:border-primary-500 focus:ring-primary-500 py-3 text-lg font-semibold text-gray-900" placeholder="0">
                                </div>
                                @error('jumlah') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            {{-- Bukti Transfer --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Bukti Transfer <span class="text-red-500">*</span></label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-primary-500 transition-colors bg-gray-50">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="bukti_transfer" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none px-1">
                                                <span>Pilih gambar</span>
                                                <input id="bukti_transfer" name="bukti_transfer" type="file" class="sr-only" required accept="image/jpeg,image/png,image/jpg">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                                    </div>
                                </div>
                                @error('bukti_transfer') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-base font-semibold text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                                    Kirim Bukti Pembayaran
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
