<!-- Hero Section -->
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">

    <!-- Background Layers -->
    <div class="absolute inset-0">
        <!-- Base gradient - light -->
        <div class="absolute inset-0 bg-gradient-to-br from-white via-primary-50/50 to-secondary-50/30"></div>

        <!-- Geometric patterns -->
        <div class="absolute inset-0 islamic-pattern opacity-50"></div>

        <!-- Animated gradient orbs -->
        <div class="absolute top-1/4 -left-20 sm:-left-32 w-64 sm:w-96 h-64 sm:h-96 bg-primary-200/30 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 -right-20 sm:-right-32 w-64 sm:w-96 h-64 sm:h-96 bg-secondary-200/30 rounded-full blur-3xl animate-float" style="animation-delay: 3s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[350px] sm:w-[600px] h-[350px] sm:h-[600px] bg-primary-100/20 rounded-full blur-3xl"></div>

        <!-- Decorative lines -->
        <div class="absolute top-0 left-1/4 w-px h-full bg-gradient-to-b from-transparent via-primary-300/15 to-transparent"></div>
        <div class="absolute top-0 right-1/3 w-px h-full bg-gradient-to-b from-transparent via-secondary-300/10 to-transparent"></div>

        <!-- Stars / particles -->
        <div class="absolute top-20 left-10 w-1 h-1 bg-primary-400/40 rounded-full animate-pulse"></div>
        <div class="absolute top-40 right-20 w-1.5 h-1.5 bg-secondary-400/30 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-40 left-1/3 w-1 h-1 bg-primary-300/30 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
        <div class="absolute top-60 right-1/4 w-1 h-1 bg-secondary-300/20 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex flex-col items-center">

            <!-- Logo with glow effect -->
            <div class="relative mb-8 animate-fade-in">
                <div class="absolute inset-0 bg-primary-300/20 rounded-full blur-2xl scale-150 animate-pulse-glow"></div>
                <img src="{{ asset('images/logo-forsipol.png') }}" alt="Logo FORSIPOL PNP"
                     class="relative w-36 h-36 sm:w-44 sm:h-44 lg:w-52 lg:h-52 object-contain drop-shadow-2xl">
            </div>

            <!-- Badge -->
            <div class="animate-fade-in-up" style="animation-delay: 0.2s; opacity: 0;">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass text-xs sm:text-sm font-medium text-primary-700 mb-6">
                    <span class="w-2 h-2 rounded-full bg-primary-500 animate-pulse"></span>
                    Unit Kegiatan Mahasiswa — Politeknik Negeri Padang
                </span>
            </div>

            <!-- Main Title -->
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black font-display leading-tight mb-6 animate-fade-in-up" style="animation-delay: 0.4s; opacity: 0;">
                <span class="text-gray-900">Forum Studi</span>
                <br>
                <span class="text-gradient">Islam Politeknik Negeri Padang</span>
            </h1>

            <!-- Subtitle -->
            <p class="max-w-2xl mx-auto text-base sm:text-lg md:text-xl text-gray-500 leading-relaxed mb-4 animate-fade-in-up" style="animation-delay: 0.6s; opacity: 0;">
                Mewujudkan mahasiswa berkarakter Islami, berilmu, dan berakhlak mulia di lingkungan Politeknik Negeri Padang
            </p>

            <!-- Slogan -->
            <p class="text-xl sm:text-2xl font-bold font-display text-gradient mb-10 animate-fade-in-up" style="animation-delay: 0.7s; opacity: 0;">
                #SatuMenyatukan
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center gap-4 animate-fade-in-up" style="animation-delay: 0.8s; opacity: 0;">
                <a href="#tentang" class="group px-8 py-4 rounded-full bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold text-sm sm:text-base shadow-lg shadow-primary-500/20 hover:shadow-primary-500/40 hover:scale-105 transition-all duration-300 flex items-center gap-2">
                    Kenali Kami
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>
                <a href="#kontak" class="px-8 py-4 rounded-full border border-gray-200 bg-white/60 text-gray-700 font-semibold text-sm sm:text-base hover:bg-white hover:border-primary-200 transition-all duration-300 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <a href="#tentang" class="flex flex-col items-center gap-2 text-gray-400 hover:text-primary-500 transition-colors">
            <span class="text-xs font-medium tracking-widest uppercase">Scroll</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>
