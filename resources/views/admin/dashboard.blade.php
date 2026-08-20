<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin FORSIPOL') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
        </div>
    </div>
</x-app-layout>
