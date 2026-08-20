<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Selamat Datang, {{ $user->name }} 👋
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- ═══════════════════════════════════════════ --}}
            {{-- BIODATA CARD --}}
            {{-- ═══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Biodata Anggota
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                        {{-- Nama --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Lengkap</label>
                            <p class="mt-1 text-gray-900 font-medium">{{ $user->name }}</p>
                        </div>
                        {{-- Email --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Email</label>
                            <p class="mt-1 text-gray-900">{{ $user->email }}</p>
                        </div>
                        {{-- WhatsApp --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">No. WhatsApp</label>
                            <p class="mt-1 text-gray-900">{{ $user->no_whatsapp ?? '-' }}</p>
                        </div>
                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Jenis Kelamin</label>
                            <p class="mt-1 text-gray-900">
                                @if($user->jenis_kelamin === 'L') Laki-laki
                                @elseif($user->jenis_kelamin === 'P') Perempuan
                                @else -
                                @endif
                            </p>
                        </div>
                        {{-- Departemen (read-only) --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Departemen</label>
                            <div class="mt-1 flex items-center gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-50 text-primary-700 border border-primary-200">
                                    {{ $user->departemen ?? 'Belum ditetapkan' }}
                                </span>
                                <span class="text-xs text-gray-400 italic">
                                    <svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    Hanya admin yang dapat mengubah
                                </span>
                            </div>
                        </div>
                        {{-- Jabatan (read-only) --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Jabatan</label>
                            <div class="mt-1 flex items-center gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                    {{ $user->jabatan ?? 'Anggota' }}
                                </span>
                                <span class="text-xs text-gray-400 italic">
                                    <svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    Hanya admin yang dapat mengubah
                                </span>
                            </div>
                        </div>
                        {{-- Angkatan --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Angkatan</label>
                            <p class="mt-1 text-gray-900">{{ $user->angkatan ?? '-' }}</p>
                        </div>
                        {{-- Role --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Status Keanggotaan</label>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    {{ $user->role === 'admin' ? 'bg-red-50 text-red-700 border border-red-200' : ($user->role === 'bendahara' ? 'bg-blue-50 text-blue-700 border border-blue-200' : 'bg-green-50 text-green-700 border border-green-200') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════ --}}
            {{-- REKAP KEHADIRAN --}}
            {{-- ═══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        Rekap Kehadiran
                    </h3>
                </div>
                <div class="p-6">
                    {{-- Progress Bar --}}
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-gray-600">Persentase Kehadiran</span>
                            <span class="text-2xl font-bold {{ $rekapKehadiran['persentase'] >= 75 ? 'text-green-600' : ($rekapKehadiran['persentase'] >= 50 ? 'text-amber-600' : 'text-red-600') }}">
                                {{ $rekapKehadiran['persentase'] }}%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                            <div class="h-3 rounded-full transition-all duration-500
                                {{ $rekapKehadiran['persentase'] >= 75 ? 'bg-gradient-to-r from-green-400 to-green-600' : ($rekapKehadiran['persentase'] >= 50 ? 'bg-gradient-to-r from-amber-400 to-amber-600' : 'bg-gradient-to-r from-red-400 to-red-600') }}"
                                style="width: {{ $rekapKehadiran['persentase'] }}%"></div>
                        </div>
                    </div>

                    {{-- Stats Grid --}}
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        <div class="text-center p-4 rounded-xl bg-gray-50 border border-gray-100">
                            <p class="text-2xl font-bold text-gray-800">{{ $rekapKehadiran['total'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">Total Rapat</p>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-green-50 border border-green-100">
                            <p class="text-2xl font-bold text-green-600">{{ $rekapKehadiran['hadir'] }}</p>
                            <p class="text-xs text-green-600 mt-1">Hadir</p>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-blue-50 border border-blue-100">
                            <p class="text-2xl font-bold text-blue-600">{{ $rekapKehadiran['izin'] }}</p>
                            <p class="text-xs text-blue-600 mt-1">Izin</p>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-amber-50 border border-amber-100">
                            <p class="text-2xl font-bold text-amber-600">{{ $rekapKehadiran['sakit'] }}</p>
                            <p class="text-xs text-amber-600 mt-1">Sakit</p>
                        </div>
                        <div class="text-center p-4 rounded-xl bg-red-50 border border-red-100">
                            <p class="text-2xl font-bold text-red-600">{{ $rekapKehadiran['alpa'] }}</p>
                            <p class="text-xs text-red-600 mt-1">Alpa</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════ --}}
            {{-- STATUS PEMBAYARAN KAS --}}
            {{-- ═══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        Status Pembayaran Kas — {{ $tahun }}
                    </h3>
                    <span class="text-white text-sm bg-white/20 px-3 py-1 rounded-full">
                        {{ $totalLunas }}/12 Bulan Lunas
                    </span>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                        @foreach($statusKas as $bln => $kas)
                            <div class="relative p-4 rounded-xl border-2 transition-all
                                {{ $kas['status'] === 'Lunas'
                                    ? 'bg-green-50 border-green-300'
                                    : 'bg-gray-50 border-gray-200' }}">
                                <p class="text-sm font-semibold text-gray-700">{{ $kas['nama_bulan'] }}</p>
                                @if($kas['status'] === 'Lunas')
                                    <div class="mt-2">
                                        <span class="inline-flex items-center gap-1 text-xs font-medium text-green-700">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            Lunas
                                        </span>
                                        <p class="text-xs text-gray-500 mt-1">Rp {{ number_format($kas['jumlah'], 0, ',', '.') }}</p>
                                        <p class="text-xs text-gray-400">{{ $kas['tanggal'] }}</p>
                                    </div>
                                @else
                                    <div class="mt-2">
                                        <span class="inline-flex items-center gap-1 text-xs font-medium text-red-500">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                                            Belum Lunas
                                        </span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
