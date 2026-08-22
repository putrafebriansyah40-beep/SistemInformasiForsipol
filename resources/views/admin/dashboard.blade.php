<x-app-layout>
    <div class="pt-28 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1: Total Anggota -->
                <div class="glass-card sm:rounded-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Anggota Biasa</p>
                                <p class="text-3xl font-bold text-primary-600">{{ $memberCount }}</p>
                            </div>
                            <div class="p-3 bg-primary-100 rounded-full">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Total Kegiatan -->
                <div class="glass-card sm:rounded-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Kegiatan</p>
                                <p class="text-3xl font-bold text-secondary-600">{{ $eventCount }}</p>
                            </div>
                            <div class="p-3 bg-secondary-100 rounded-full">
                                <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Total Rapat -->
                <div class="glass-card sm:rounded-2xl">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Rapat</p>
                                <p class="text-3xl font-bold text-green-600">{{ $meetingCount }}</p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-full">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Welcome Message -->
            <div class="mt-8 glass-card sm:rounded-2xl border-white/50">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">Anda login sebagai Admin ({{ Auth::user()->jabatan }}). Di sini Anda dapat mengelola Anggota, Kegiatan, Rapat, dan memantau rekapan kehadiran dari anggota FORSIPOL.</p>
                    
                    <div class="mt-6 flex flex-wrap gap-4">
                        <a href="{{ route('admin.members.index') }}" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">Manajemen Anggota</a>
                        <a href="{{ route('admin.events.index') }}" class="px-4 py-2 bg-secondary-600 text-white rounded-lg hover:bg-secondary-700 transition">Kelola Kegiatan</a>
                        <a href="{{ route('admin.meetings.index') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Kelola Rapat</a>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════ --}}
            {{-- BIODATA CARD --}}
            {{-- ═══════════════════════════════════════════ --}}
            <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Biodata Admin (Presidium)
                    </h3>
                    <a href="{{ route('profile.edit') }}" class="text-sm bg-white/20 hover:bg-white/30 text-white px-3 py-1.5 rounded-lg transition flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Edit Biodata
                    </a>
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
                                @if($user->jenis_kelamin === 'Laki-laki' || $user->jenis_kelamin === 'L') Laki-laki
                                @elseif($user->jenis_kelamin === 'Perempuan' || $user->jenis_kelamin === 'P') Perempuan
                                @else -
                                @endif
                            </p>
                        </div>
                        {{-- Departemen --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Departemen</label>
                            <div class="mt-1 flex items-center gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-50 text-primary-700 border border-primary-200">
                                    {{ $user->departemen ?? 'Presidium' }}
                                </span>
                            </div>
                        </div>
                        {{-- Jabatan --}}
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Jabatan</label>
                            <div class="mt-1 flex items-center gap-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                    {{ $user->jabatan ?? 'Ketua Umum' }}
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
        </div>
    </div>
</x-app-layout>
