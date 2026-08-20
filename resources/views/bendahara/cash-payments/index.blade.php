<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                💰 Manajemen Uang Kas
            </h2>
            <a href="{{ route('bendahara.cash-payments.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white text-sm font-semibold rounded-lg hover:bg-primary-700 transition shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                Catat Pembayaran
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- Filter --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <form method="GET" action="{{ route('bendahara.cash-payments.index') }}" class="flex flex-wrap gap-4 items-end">
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase">Tahun</label>
                        <select name="tahun" class="mt-1 block rounded-lg border-gray-300 text-sm focus:border-primary-500 focus:ring-primary-500">
                            @for($y = now()->year; $y >= 2020; $y--)
                                <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-medium text-gray-500 uppercase">Bulan</label>
                        <select name="bulan" class="mt-1 block rounded-lg border-gray-300 text-sm focus:border-primary-500 focus:ring-primary-500">
                            <option value="">Semua Bulan</option>
                            @foreach($bulanNames as $key => $name)
                                <option value="{{ $key }}" {{ $bulan == $key ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-gray-800 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition">
                        Filter
                    </button>
                </form>
            </div>

            {{-- Tabel Pembayaran --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Anggota</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Bulan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Tahun</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Tgl Bayar</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Dicatat Oleh</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($payments as $payment)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $payment->user->name }}</div>
                                        <div class="text-xs text-gray-400">{{ $payment->user->departemen ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $payment->nama_bulan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $payment->tahun }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rp {{ number_format($payment->jumlah, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            {{ $payment->status === 'Lunas' ? 'bg-green-100 text-green-800' : ($payment->status === 'Menunggu Konfirmasi' ? 'bg-amber-100 text-amber-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $payment->status }}
                                        </span>
                                        @if($payment->bukti_transfer)
                                            <div class="mt-1">
                                                <a href="{{ asset('storage/' . $payment->bukti_transfer) }}" target="_blank" class="text-xs text-blue-600 hover:underline">
                                                    Lihat Bukti
                                                </a>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $payment->tanggal_bayar ? $payment->tanggal_bayar->format('d/m/Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $payment->recorder->name ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm space-x-2">
                                        @if($payment->status === 'Menunggu Konfirmasi')
                                            <form method="POST" action="{{ route('bendahara.cash-payments.approve', $payment) }}" class="inline">
                                                @csrf @method('PUT')
                                                <button type="submit" class="text-green-600 hover:text-green-800 font-medium">Konfirmasi</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('bendahara.cash-payments.edit', $payment) }}"
                                           class="text-primary-600 hover:text-primary-800 font-medium">Edit</a>
                                        <form method="POST" action="{{ route('bendahara.cash-payments.destroy', $payment) }}" class="inline"
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-12 text-center text-gray-400">
                                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        Belum ada data pembayaran kas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
