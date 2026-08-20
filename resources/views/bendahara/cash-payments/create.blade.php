<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('bendahara.cash-payments.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Catat Pembayaran Kas
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <form method="POST" action="{{ route('bendahara.cash-payments.store') }}" class="space-y-5">
                        @csrf

                        {{-- Anggota --}}
                        <div>
                            <label for="user_id" class="block text-sm font-medium text-gray-700">Anggota <span class="text-red-500">*</span></label>
                            <select name="user_id" id="user_id" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                <option value="">— Pilih Anggota —</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ old('user_id') == $member->id ? 'selected' : '' }}>
                                        {{ $member->name }} ({{ $member->departemen ?? 'Belum ada departemen' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Bulan & Tahun --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan <span class="text-red-500">*</span></label>
                                <select name="bulan" id="bulan" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                    @foreach($bulanNames as $key => $name)
                                        <option value="{{ $key }}" {{ old('bulan', now()->month) == $key ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('bulan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun <span class="text-red-500">*</span></label>
                                <input type="number" name="tahun" id="tahun" value="{{ old('tahun', now()->year) }}" min="2020" max="2099" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                @error('tahun') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        {{-- Jumlah --}}
                        <div>
                            <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah (Rp) <span class="text-red-500">*</span></label>
                            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', 10000) }}" min="0" required
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                            @error('jumlah') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Status --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
                            <select name="status" id="status" required
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                                <option value="Lunas" {{ old('status') === 'Lunas' ? 'selected' : '' }}>✅ Lunas</option>
                                <option value="Belum Lunas" {{ old('status') === 'Belum Lunas' ? 'selected' : '' }}>❌ Belum Lunas</option>
                            </select>
                            @error('status') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Tanggal Bayar --}}
                        <div>
                            <label for="tanggal_bayar" class="block text-sm font-medium text-gray-700">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" id="tanggal_bayar" value="{{ old('tanggal_bayar', now()->format('Y-m-d')) }}"
                                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm">
                            @error('tanggal_bayar') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Keterangan --}}
                        <div>
                            <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="3"
                                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 text-sm"
                                      placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                            @error('keterangan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="flex items-center gap-3 pt-2">
                            <button type="submit"
                                    class="px-6 py-2.5 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition shadow-sm">
                                Simpan Pembayaran
                            </button>
                            <a href="{{ route('bendahara.cash-payments.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
