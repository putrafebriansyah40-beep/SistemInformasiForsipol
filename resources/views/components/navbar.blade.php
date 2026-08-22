<!-- Navbar -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-in-out navbar-floating">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="#hero" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo-forsipol.png') }}" alt="Logo FORSIPOL"
                     class="h-12 w-12 object-contain transition-transform duration-300 group-hover:scale-110">
                <div class="hidden sm:block">
                    <span class="text-lg font-bold font-display text-gradient leading-tight block">FORSIPOL</span>
                    <span class="text-xs text-gray-500 leading-tight block">Politeknik Negeri Padang</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-1">
                <a href="/#hero" class="nav-link-liquid nav-item px-4 py-2 rounded-lg text-sm font-medium text-gray-600 transition-all duration-300">Beranda</a>
                <a href="/#tentang" class="nav-link-liquid nav-item px-4 py-2 rounded-lg text-sm font-medium text-gray-600 transition-all duration-300">Tentang</a>
                <a href="/#visi-misi" class="nav-link-liquid nav-item px-4 py-2 rounded-lg text-sm font-medium text-gray-600 transition-all duration-300">Visi & Misi</a>
                <a href="/#struktur" class="nav-link-liquid nav-item px-4 py-2 rounded-lg text-sm font-medium text-gray-600 transition-all duration-300">Struktur</a>
                <a href="/#program" class="nav-link-liquid nav-item px-4 py-2 rounded-lg text-sm font-medium text-gray-600 transition-all duration-300">Program</a>
                <a href="/#galeri" class="nav-link-liquid nav-item px-4 py-2 rounded-lg text-sm font-medium text-gray-600 transition-all duration-300">Galeri</a>
                <a href="/#kontak" class="ml-2 px-5 py-2.5 rounded-full text-sm font-semibold bg-gradient-to-r from-primary-600 to-primary-700 text-white hover:from-primary-500 hover:to-primary-600 transition-all duration-300 shadow-lg shadow-primary-500/20 hover:shadow-primary-500/40 hover:scale-105">Kontak</a>
                
                <div class="h-6 w-px bg-gray-300 mx-2"></div>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link-liquid px-4 py-2 rounded-lg text-sm font-bold text-primary-700 transition-all duration-300">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link-liquid px-4 py-2 rounded-lg text-sm font-bold text-gray-800 transition-all duration-300 {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>

                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="md:hidden relative w-10 h-10 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors" aria-label="Toggle menu">
                <div class="flex flex-col gap-1.5" id="hamburger">
                    <span class="block w-6 h-0.5 bg-gray-700 transition-all duration-300 origin-center" id="line1"></span>
                    <span class="block w-6 h-0.5 bg-gray-700 transition-all duration-300" id="line2"></span>
                    <span class="block w-4 h-0.5 bg-gray-700 transition-all duration-300 origin-center" id="line3"></span>
                </div>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white/95 backdrop-blur-lg border-t border-gray-100">
        <div class="px-4 py-6 space-y-1">
            <a href="/#hero" class="mobile-nav-item block px-4 py-3 rounded-lg text-base font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 transition-all duration-300">🏠 Beranda</a>
            <a href="/#tentang" class="mobile-nav-item block px-4 py-3 rounded-lg text-base font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 transition-all duration-300">📖 Tentang</a>
            <a href="/#visi-misi" class="mobile-nav-item block px-4 py-3 rounded-lg text-base font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 transition-all duration-300">🎯 Visi & Misi</a>
            <a href="/#struktur" class="mobile-nav-item block px-4 py-3 rounded-lg text-base font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 transition-all duration-300">👥 Struktur</a>
            <a href="/#program" class="mobile-nav-item block px-4 py-3 rounded-lg text-base font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 transition-all duration-300">📋 Program</a>
            <a href="/#galeri" class="mobile-nav-item block px-4 py-3 rounded-lg text-base font-medium text-gray-600 hover:text-primary-700 hover:bg-primary-50 transition-all duration-300">🖼️ Galeri</a>
            <a href="/#kontak" class="block mx-4 mt-4 px-5 py-3 rounded-full text-center text-base font-semibold bg-gradient-to-r from-primary-600 to-primary-700 text-white">Hubungi Kami</a>
            
            <div class="h-px bg-gray-200 my-4 mx-4"></div>
            
            @auth
                <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-lg text-base font-bold text-primary-700 hover:bg-primary-50 transition-all duration-300">📱 Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-3 rounded-lg text-base font-bold transition-all duration-300 {{ request()->routeIs('login') ? 'bg-primary-50 text-primary-700' : 'text-gray-800 hover:bg-gray-50' }}">🔑 Login</a>

            @endauth
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('menu-toggle').addEventListener('click', function () {
        const menu = document.getElementById('mobile-menu');
        const line1 = document.getElementById('line1');
        const line2 = document.getElementById('line2');
        const line3 = document.getElementById('line3');

        menu.classList.toggle('hidden');

        if (!menu.classList.contains('hidden')) {
            line1.style.transform = 'rotate(45deg) translate(3px, 3px)';
            line2.style.opacity = '0';
            line3.style.transform = 'rotate(-45deg) translate(3px, -3px)';
            line3.style.width = '1.5rem';
        } else {
            line1.style.transform = '';
            line2.style.opacity = '1';
            line3.style.transform = '';
            line3.style.width = '1rem';
        }
    });

    // Scroll spy for liquid glass indicator
    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('section');
        const navItems = document.querySelectorAll('.nav-item');
        const mobileNavItems = document.querySelectorAll('.mobile-nav-item');

        window.addEventListener('scroll', () => {
            let current = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollY >= (sectionTop - sectionHeight / 3)) {
                    current = section.getAttribute('id');
                }
            });

            navItems.forEach(item => {
                item.classList.remove('active');
                if (item.getAttribute('href') === `#${current}` || item.getAttribute('href') === `/#${current}`) {
                    item.classList.add('active');
                }
            });
            
            mobileNavItems.forEach(item => {
                item.classList.remove('bg-primary-50', 'text-primary-700');
                if (item.getAttribute('href') === `#${current}` || item.getAttribute('href') === `/#${current}`) {
                    item.classList.add('bg-primary-50', 'text-primary-700');
                }
            });
        });
        
        // Trigger scroll event on load to apply initial active link state
        window.dispatchEvent(new Event('scroll'));
    });
</script>
