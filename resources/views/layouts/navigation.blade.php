<nav x-data="{ open: false }" class="bg-white/70 backdrop-blur-md border-b border-white/40 shadow-sm sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                        <img src="{{ asset('images/logo-forsipol.png') }}" alt="Logo" class="h-10 w-10 object-contain transition-transform group-hover:scale-110">
                        <span class="font-bold text-lg text-gradient font-display hidden sm:block">FORSIPOL</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link-liquid">
                        {{ __('Dasbor') }}
                    </x-nav-link>
                    
                    @if(Auth::user()->role === 'admin')
                        <x-nav-link :href="route('admin.members.index')" :active="request()->routeIs('admin.members.*')" class="nav-link-liquid">
                            {{ __('Anggota') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.*')" class="nav-link-liquid">
                            {{ __('Kegiatan') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.meetings.index')" :active="request()->routeIs('admin.meetings.*')" class="nav-link-liquid">
                            {{ __('Rapat & Presensi') }}
                        </x-nav-link>
                    @endif

                    <x-nav-link :href="route('member.attendances.create')" :active="request()->routeIs('member.attendances.*')" class="nav-link-liquid">
                        {{ __('Presensi') }}
                    </x-nav-link>
                    <x-nav-link :href="route('member.cash-payments.create')" :active="request()->routeIs('member.cash-payments.*')" class="nav-link-liquid">
                        {{ __('Bayar Kas') }}
                    </x-nav-link>
                    @if(in_array(Auth::user()->role, ['bendahara', 'admin']))
                        <x-nav-link :href="route('bendahara.cash-payments.index')" :active="request()->routeIs('bendahara.cash-payments.*')" class="nav-link-liquid">
                            {{ __('Keuangan Kas') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->role === 'bendahara')
                        <x-nav-link :href="route('bendahara.profile.edit')" :active="request()->routeIs('bendahara.profile.*')" class="nav-link-liquid">
                            {{ __('Rekening Kas') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-semibold rounded-full text-primary-700 bg-primary-50 hover:bg-primary-100 hover:text-primary-800 focus:outline-none transition ease-in-out duration-150 shadow-sm">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-primary-200 flex items-center justify-center text-primary-800">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm text-gray-500">Login sebagai</p>
                            <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->jabatan }}</p>
                        </div>
                        
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil Saya') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="text-red-600 hover:text-red-700 hover:bg-red-50">
                                {{ __('Keluar (Log Out)') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-primary-600 hover:text-primary-800 hover:bg-primary-50 focus:outline-none focus:bg-primary-50 focus:text-primary-800 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white/90 backdrop-blur-lg border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dasbor') }}
            </x-responsive-nav-link>
            
            @if(Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.members.index')" :active="request()->routeIs('admin.members.*')">
                    {{ __('Anggota') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.*')">
                    {{ __('Kegiatan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.meetings.index')" :active="request()->routeIs('admin.meetings.*')">
                    {{ __('Rapat & Presensi') }}
                </x-responsive-nav-link>
            @endif

            <x-responsive-nav-link :href="route('member.attendances.create')" :active="request()->routeIs('member.attendances.*')">
                {{ __('Presensi') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('member.cash-payments.create')" :active="request()->routeIs('member.cash-payments.*')">
                {{ __('Bayar Kas') }}
            </x-responsive-nav-link>
            @if(in_array(Auth::user()->role, ['bendahara', 'admin']))
                <x-responsive-nav-link :href="route('bendahara.cash-payments.index')" :active="request()->routeIs('bendahara.cash-payments.*')">
                    {{ __('Keuangan Kas') }}
                </x-responsive-nav-link>
            @endif

            @if(Auth::user()->role === 'bendahara')
                <x-responsive-nav-link :href="route('bendahara.profile.edit')" :active="request()->routeIs('bendahara.profile.*')">
                    {{ __('Rekening Kas') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-primary-600">{{ Auth::user()->jabatan }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil Saya') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-red-600">
                        {{ __('Keluar (Log Out)') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
