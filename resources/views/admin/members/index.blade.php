<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-4 flex justify-between items-center">
                <p class="text-gray-600">Daftar semua anggota FORSIPOL</p>
                <div class="flex gap-2">
                    <a href="{{ route('admin.members.export', ['tab' => $tab]) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow-sm flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Export CSV
                    </a>
                    <a href="{{ route('admin.members.create') }}" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition shadow-sm">
                        + Tambah Anggota
                    </a>
                </div>
            </div>

            <!-- Tabs -->
            <div class="mb-6 flex space-x-1 bg-white p-1 rounded-xl shadow-sm border border-gray-100 max-w-md">
                <a href="{{ route('admin.members.index', ['tab' => 'anggota_penuh']) }}" 
                   class="w-1/2 flex items-center justify-center py-2.5 text-sm font-medium leading-5 rounded-lg transition-colors {{ $tab === 'anggota_penuh' ? 'bg-primary-50 text-primary-700 shadow' : 'text-gray-600 hover:text-gray-800 hover:bg-gray-50' }}">
                    Anggota Penuh
                </a>
                <a href="{{ route('admin.members.index', ['tab' => 'calon_anggota']) }}" 
                   class="w-1/2 flex items-center justify-center py-2.5 text-sm font-medium leading-5 rounded-lg transition-colors {{ $tab === 'calon_anggota' ? 'bg-primary-50 text-primary-700 shadow' : 'text-gray-600 hover:text-gray-800 hover:bg-gray-50' }}">
                    Calon Anggota
                </a>
            </div>

            <div class="glass-card sm:rounded-2xl border-white/50 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-sm font-semibold text-gray-600">
                                <th class="p-4">Nama Lengkap</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">No. WhatsApp</th>
                                <th class="p-4">Kaderisasi & Status</th>
                                <th class="p-4">Departemen</th>
                                <th class="p-4">Jabatan</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($members as $member)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-medium text-gray-900">{{ $member->name }}</td>
                                <td class="p-4 text-gray-600">{{ $member->email }}</td>
                                <td class="p-4">
                                    @if($member->no_whatsapp)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $member->no_whatsapp) }}" target="_blank" class="text-green-600 hover:text-green-800 flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825 0 6.938 3.112 6.938 6.937 0 3.824-3.113 6.938-6.938 6.938z"/></svg>
                                            {{ $member->no_whatsapp }}
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">Belum diisi</span>
                                    @endif
                                </td>
                                <td class="p-4">
                                    <div class="flex flex-wrap gap-1 mb-2">
                                        @if($member->lulus_simba) <span class="text-[10px] bg-green-50 text-green-700 border border-green-200 px-1.5 py-0.5 rounded">SIMBA</span> @endif
                                        @if($member->lulus_panda) <span class="text-[10px] bg-green-50 text-green-700 border border-green-200 px-1.5 py-0.5 rounded">PANDA</span> @endif
                                        @if($member->lulus_imt) <span class="text-[10px] bg-green-50 text-green-700 border border-green-200 px-1.5 py-0.5 rounded">IMT</span> @endif
                                        @if($member->lulus_mukhayyam) <span class="text-[10px] bg-green-50 text-green-700 border border-green-200 px-1.5 py-0.5 rounded">Mukhayyam</span> @endif
                                        @if(!$member->lulus_simba && !$member->lulus_panda && !$member->lulus_imt && !$member->lulus_mukhayyam)
                                            <span class="text-[10px] text-gray-400 italic">Belum ada pengkaderan</span>
                                        @endif
                                    </div>
                                    @if($member->role === 'calon_anggota')
                                        <span class="inline-block text-[10px] bg-orange-100 text-orange-700 border border-orange-200 font-medium px-2 py-0.5 rounded-full">Calon Anggota</span>
                                    @else
                                        <span class="inline-block text-[10px] bg-blue-100 text-blue-700 border border-blue-200 font-medium px-2 py-0.5 rounded-full">
                                            @if($member->role === 'member')
                                                Anggota Aktif
                                            @elseif($member->role === 'admin')
                                                Presidium
                                            @else
                                                {{ ucfirst($member->role) }}
                                            @endif
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 text-gray-600">{{ $member->departemen ?? '-' }}</td>
                                <td class="p-4 text-gray-600">{{ $member->jabatan ?? '-' }}</td>
                                <td class="p-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.members.edit', $member) }}" class="text-primary-600 hover:text-primary-900 bg-primary-50 hover:bg-primary-100 px-3 py-1 rounded text-sm transition">Edit</a>
                                        <form action="{{ route('admin.members.destroy', $member) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 px-3 py-1 rounded text-sm transition">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">
                                    Belum ada anggota yang terdaftar.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="mt-4">
                {{ $members->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
