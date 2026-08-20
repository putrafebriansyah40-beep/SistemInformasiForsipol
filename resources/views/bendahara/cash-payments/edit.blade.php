<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('bendahara.cash-payments.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Pembayaran Kas
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                {{-- Info anggota --}}
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                    <p class="text-sm text-gray-500">Anggota</p>
                    <p class="font-semibold text-gray-800">{{ $cashPayment->user->name }}</p>
                    <p class="text-xs text-gray-400">{{ $cashPayment->nama_bulan }} {{ $cashPayment->tahun }}</p>
                </div>

                <div class="p-6">
                    <form method="POST" action="{{ route('bendahara.cash-payments.update', $cashPayment) }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        {{-- Jumlah --}}
                        <div>
                            <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah (Rp) <span class="text-red-500">*</span></label>
                            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $cashPayment->jumlah) }}" min="0" required
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                            @error('jumlah') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Status --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
                            <select name="status" id="status" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                <option value="Lunas" {{ old('status', $cashPayment->status) === 'Lunas' ? 'selected' : '' }}>✅ Lunas</option>
                                <option value="Belum Lunas" {{ old('status', $cashPayment->status) === 'Belum Lunas' ? 'selected' : '' }}>❌ Belum Lunas</option>
                            </select>
                            @error('status') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Tanggal Bayar --}}
                        <div>
                            <label for="tanggal_bayar" class="block text-sm font-medium text-gray-700">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" id="tanggal_bayar"
                                   value="{{ old('tanggal_bayar', $cashPayment->tanggal_bayar ? $cashPayment->tanggal_bayar->format('Y-m-d') : '') }}"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                            @error('tanggal_bayar') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Keterangan --}}
                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3"
                                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm"
                                      placeholder="Catatan tambahan (opsional)">{{ old('keterangan', $cashPayment->keterangan) }}</textarea>
                            @error('keterangan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="flex items-center gap-3 pt-2">
                            <button type="submit"
                                    class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition shadow-sm">
                                Perbarui Data
                            </button>
                            <a href="{{ route('bendahara.cash-payments.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
