<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Selamat Datang, {{ $user->name }} 👋
        </h2>
    </x-slot>

    <div class="py-6 sm:py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">

            {{-- ═══════════════════════════════════════════ --}}
            {{-- INFORMASI OPREC & PENGKADERAN --}}
            {{-- ═══════════════════════════════════════════ --}}
            @if($user->role === 'calon_anggota')
            <div class="bg-white rounded-2xl shadow-sm border border-orange-200 overflow-hidden mb-6 sm:mb-8">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-4 sm:px-6 py-3 sm:py-4">
                    <h3 class="text-base sm:text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="truncate">Rekap Kehadiran Kegiatan Pengkaderan</span>
                    </h3>
                </div>
                <div class="p-4 sm:p-6">
                        @if($whatsappLink)
                        <div class="mb-6 p-3 sm:p-4 bg-green-50 rounded-xl border border-green-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-4">
                            <div>
                                <h4 class="font-semibold text-green-800 text-sm sm:text-base">Grup WhatsApp Calon Anggota</h4>
                                <p class="text-xs sm:text-sm text-green-700">Silakan bergabung ke grup WhatsApp untuk mendapatkan informasi terbaru seputar pengkaderan.</p>
                            </div>
                            <a href="{{ $whatsappLink }}" target="_blank" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors whitespace-nowrap w-full sm:w-auto text-center">
                                Gabung Grup WA
                            </a>
                        </div>
                        @endif

                        <h4 class="font-semibold text-gray-800 mb-4 text-sm sm:text-base">Progress Pengkaderan Anda</h4>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4">
                            @php
                                $kaderStatus = [
                                    ['nama' => 'SIMBA', 'lulus' => $user->lulus_simba],
                                    ['nama' => 'PANDA', 'lulus' => $user->lulus_panda],
                                    ['nama' => 'IMT', 'lulus' => $user->lulus_imt],
                                    ['nama' => 'Mukhayyam', 'lulus' => $user->lulus_mukhayyam],
                                ];
                            @endphp
                            @foreach($kaderStatus as $kader)
                            <div class="p-3 sm:p-4 rounded-xl border {{ $kader['lulus'] ? 'bg-green-50 border-green-200' : 'bg-gray-50 border-gray-200' }} flex flex-col items-center justify-center text-center">
                                @if($kader['lulus'])
                                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-green-500 mb-1 sm:mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span class="font-medium text-green-700 text-xs sm:text-sm">{{ $kader['nama'] }}</span>
                                    <span class="text-[10px] sm:text-xs text-green-600">Lulus</span>
                                @else
                                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-gray-400 mb-1 sm:mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span class="font-medium text-gray-600 text-xs sm:text-sm">{{ $kader['nama'] }}</span>
                                    <span class="text-[10px] sm:text-xs text-gray-500">Belum Lulus</span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <p class="text-[10px] sm:text-xs text-gray-500 mt-4 text-center">
                            *Anda harus lulus minimal 3 kegiatan di atas untuk menjadi Anggota Aktif Forsipol.
                        </p>
                </div>
            </div>
            @endif

            {{-- ═══════════════════════════════════════════ --}}
            {{-- BIODATA CARD --}}
            {{-- ═══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-4 sm:px-6 py-3 sm:py-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                    <h3 class="text-base sm:text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Biodata Anggota
                    </h3>
                    <a href="{{ route('profile.edit') }}" class="text-sm bg-white/20 hover:bg-white/30 text-white px-3 py-1.5 rounded-lg transition flex items-center gap-1.5 w-fit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit Biodata
                    </a>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 sm:gap-x-8 gap-y-4">
                        {{-- Nama --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Lengkap</label>
                            <p class="mt-1 text-gray-900 font-medium text-sm sm:text-base truncate">{{ $user->name }}</p>
                        </div>
                        {{-- Email --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Email</label>
                            <p class="mt-1 text-gray-900 text-sm sm:text-base truncate">{{ $user->email }}</p>
                        </div>
                        {{-- WhatsApp --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">No. WhatsApp</label>
                            <p class="mt-1 text-gray-900 text-sm sm:text-base">{{ $user->no_whatsapp ?? '-' }}</p>
                        </div>
                        {{-- Jenis Kelamin --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Jenis Kelamin</label>
                            <p class="mt-1 text-gray-900 text-sm sm:text-base">
                                @if($user->jenis_kelamin === 'L') Laki-laki
                                @elseif($user->jenis_kelamin === 'P') Perempuan
                                @else -
                                @endif
                            </p>
                        </div>
                        {{-- Jurusan --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Jurusan</label>
                            <p class="mt-1 text-gray-900 font-medium text-sm sm:text-base truncate">{{ $user->jurusan ?? '-' }}</p>
                        </div>
                        {{-- Program Studi --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Program Studi</label>
                            <p class="mt-1 text-gray-900 font-medium text-sm sm:text-base truncate">{{ $user->program_studi ?? '-' }}</p>
                        </div>
                        {{-- Departemen (read-only) --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Departemen</label>
                            <div class="mt-1 flex flex-wrap items-center gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-primary-50 text-primary-700 border border-primary-200">
                                    {{ $user->departemen ?? 'Belum ditetapkan' }}
                                </span>
                                <span class="text-[10px] sm:text-xs text-gray-400 italic">
                                    <svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    Hanya admin
                                </span>
                            </div>
                        </div>
                        {{-- Jabatan (read-only) --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Jabatan</label>
                            <div class="mt-1 flex flex-wrap items-center gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                    {{ $user->jabatan ?? 'Anggota' }}
                                </span>
                                <span class="text-[10px] sm:text-xs text-gray-400 italic">
                                    <svg class="w-3 h-3 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    Hanya admin
                                </span>
                            </div>
                        </div>
                        {{-- Angkatan --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Angkatan</label>
                            <p class="mt-1 text-gray-900 text-sm sm:text-base">{{ $user->angkatan ?? '-' }}</p>
                        </div>
                        {{-- Role --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Status Keanggotaan</label>
                            <p class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-medium
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
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-4 sm:px-6 py-3 sm:py-4">
                    <h3 class="text-base sm:text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        Rekap Kehadiran
                    </h3>
                </div>
                <div class="p-4 sm:p-6">
                    {{-- Progress Bar --}}
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-xs sm:text-sm font-medium text-gray-600">Persentase Kehadiran</span>
                            <span class="text-xl sm:text-2xl font-bold {{ $rekapKehadiran['persentase'] >= 75 ? 'text-green-600' : ($rekapKehadiran['persentase'] >= 50 ? 'text-amber-600' : 'text-red-600') }}">
                                {{ $rekapKehadiran['persentase'] }}%
                            </span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 sm:h-3 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-500
                                {{ $rekapKehadiran['persentase'] >= 75 ? 'bg-gradient-to-r from-green-400 to-green-600' : ($rekapKehadiran['persentase'] >= 50 ? 'bg-gradient-to-r from-amber-400 to-amber-600' : 'bg-gradient-to-r from-red-400 to-red-600') }}"
                                style="width: {{ $rekapKehadiran['persentase'] }}%"></div>
                        </div>
                    </div>

                    {{-- Stats Grid --}}
                    <div class="grid grid-cols-3 sm:grid-cols-5 gap-2 sm:gap-4">
                        <div class="text-center p-3 sm:p-4 rounded-xl bg-gray-50 border border-gray-100">
                            <p class="text-lg sm:text-2xl font-bold text-gray-800">{{ $rekapKehadiran['total'] }}</p>
                            <p class="text-[10px] sm:text-xs text-gray-500 mt-1">{{ $user->role === 'calon_anggota' ? 'Total Kegiatan' : 'Total Rapat' }}</p>
                        </div>
                        <div class="text-center p-3 sm:p-4 rounded-xl bg-green-50 border border-green-100">
                            <p class="text-lg sm:text-2xl font-bold text-green-600">{{ $rekapKehadiran['hadir'] }}</p>
                            <p class="text-[10px] sm:text-xs text-green-600 mt-1">Hadir</p>
                        </div>
                        <div class="text-center p-3 sm:p-4 rounded-xl bg-blue-50 border border-blue-100">
                            <p class="text-lg sm:text-2xl font-bold text-blue-600">{{ $rekapKehadiran['izin'] }}</p>
                            <p class="text-[10px] sm:text-xs text-blue-600 mt-1">Izin</p>
                        </div>
                        <div class="text-center p-3 sm:p-4 rounded-xl bg-amber-50 border border-amber-100">
                            <p class="text-lg sm:text-2xl font-bold text-amber-600">{{ $rekapKehadiran['sakit'] }}</p>
                            <p class="text-[10px] sm:text-xs text-amber-600 mt-1">Sakit</p>
                        </div>
                        <div class="text-center p-3 sm:p-4 rounded-xl bg-red-50 border border-red-100">
                            <p class="text-lg sm:text-2xl font-bold text-red-600">{{ $rekapKehadiran['alpa'] }}</p>
                            <p class="text-[10px] sm:text-xs text-red-600 mt-1">Alpa</p>
                        </div>
                    </div>
                </div>
            </div>

            @if($user->role !== 'calon_anggota')
            {{-- ═══════════════════════════════════════════ --}}
            {{-- STATUS PEMBAYARAN KAS --}}
            {{-- ═══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-4 sm:px-6 py-3 sm:py-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
                    <h3 class="text-base sm:text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        <span class="truncate">Status Pembayaran Kas — {{ $tahun }}</span>
                    </h3>
                    <span class="text-white text-xs sm:text-sm bg-white/20 px-3 py-1 rounded-full w-fit whitespace-nowrap">
                        {{ $totalLunas }}/12 Bulan Lunas
                    </span>
                </div>
                <div class="p-4 sm:p-6">
                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-2 sm:gap-3">
                        @foreach($statusKas as $bln => $kas)
                            <div class="relative p-2.5 sm:p-4 rounded-xl border-2 transition-all
                                {{ $kas['status'] === 'Lunas'
                                    ? 'bg-green-50 border-green-300'
                                    : 'bg-gray-50 border-gray-200' }}">
                                <p class="text-xs sm:text-sm font-semibold text-gray-700">{{ $kas['nama_bulan'] }}</p>
                                @if($kas['status'] === 'Lunas')
                                    <div class="mt-1.5 sm:mt-2">
                                        <span class="inline-flex items-center gap-1 text-[10px] sm:text-xs font-medium text-green-700">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            Lunas
                                        </span>
                                        <p class="text-[10px] sm:text-xs text-gray-500 mt-0.5 sm:mt-1">Rp {{ number_format($kas['jumlah'], 0, ',', '.') }}</p>
                                        <p class="text-[10px] sm:text-xs text-gray-400 hidden sm:block">{{ $kas['tanggal'] }}</p>
                                    </div>
                                @else
                                    <div class="mt-1.5 sm:mt-2">
                                        <span class="inline-flex items-center gap-1 text-[10px] sm:text-xs font-medium text-red-500">
                                            <svg class="w-3 h-3 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                                            Belum
                                        </span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>
