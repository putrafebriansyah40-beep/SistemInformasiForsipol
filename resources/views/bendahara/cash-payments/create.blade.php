<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('bendahara.cash-payments.index') }}" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Catat Pembayaran Kas') }}
            </h2>
        </div>
    </x-slot>

    <div class="pt-2 pb-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card sm:rounded-2xl border-white/50 p-6 sm:p-8">
                <form method="POST" action="{{ route('bendahara.cash-payments.store') }}">
                    @csrf

                    {{-- Anggota --}}
                    <div class="mb-5">
                        <x-input-label for="user_id" :value="__('Anggota *')" />
                        <select name="user_id" id="user_id" required
                                class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                            <option value="">— Pilih Anggota —</option>
                            @foreach($members as $member)
                                <option value="{{ $member->id }}" {{ old('user_id') == $member->id ? 'selected' : '' }}>
                                    {{ $member->name }} ({{ $member->departemen ?? 'Belum ada departemen' }})
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                    </div>

                    {{-- Bulan & Tahun --}}
                    <div class="grid grid-cols-2 gap-5 mb-5">
                        <div>
                            <x-input-label for="bulan" :value="__('Bulan *')" />
                            <select name="bulan" id="bulan" required
                                    class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                                @foreach($bulanNames as $key => $name)
                                    <option value="{{ $key }}" {{ old('bulan', now()->month) == $key ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('bulan')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="tahun" :value="__('Tahun *')" />
                            <x-text-input id="tahun" class="block mt-1 w-full" type="number" name="tahun" :value="old('tahun', now()->year)" min="2020" max="2099" required />
                            <x-input-error :messages="$errors->get('tahun')" class="mt-2" />
                        </div>
                    </div>

                    {{-- Jumlah --}}
                    <div class="mb-5">
                        <x-input-label for="jumlah" :value="__('Jumlah (Rp) *')" />
                        <x-text-input id="jumlah" class="block mt-1 w-full" type="number" name="jumlah" :value="old('jumlah', 10000)" min="0" required />
                        <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                    </div>

                    {{-- Status --}}
                    <div class="mb-5">
                        <x-input-label for="status" :value="__('Status *')" />
                        <select name="status" id="status" required
                                class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3">
                            <option value="Lunas" {{ old('status') === 'Lunas' ? 'selected' : '' }}>✅ Lunas</option>
                            <option value="Belum Lunas" {{ old('status') === 'Belum Lunas' ? 'selected' : '' }}>❌ Belum Lunas</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    {{-- Tanggal Bayar --}}
                    <div class="mb-5">
                        <x-input-label for="tanggal_bayar" :value="__('Tanggal Bayar')" />
                        <x-text-input id="tanggal_bayar" class="block mt-1 w-full" type="date" name="tanggal_bayar" :value="old('tanggal_bayar', now()->format('Y-m-d'))" />
                        <x-input-error :messages="$errors->get('tanggal_bayar')" class="mt-2" />
                    </div>

                    {{-- Keterangan --}}
                    <div class="mb-6">
                        <x-input-label for="keterangan" :value="__('Keterangan')" />
                        <textarea id="keterangan" name="keterangan" rows="3"
                                  class="block mt-1 w-full border-gray-200 bg-gray-50/50 backdrop-blur-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 focus:bg-white rounded-xl shadow-sm transition duration-200 px-4 py-3"
                                  placeholder="Catatan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                    </div>

                    {{-- Submit --}}
                    <div class="flex items-center justify-between">
                        <a href="{{ route('bendahara.cash-payments.index') }}" class="text-sm text-gray-500 hover:text-gray-700 transition">
                            &larr; Batal
                        </a>
                        <x-primary-button>
                            {{ __('Simpan Pembayaran') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
