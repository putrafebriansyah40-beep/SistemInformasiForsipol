<!-- Galeri Section -->
<section id="galeri" class="relative py-24 sm:py-32 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-white to-gray-50"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 reveal">
            <span class="inline-block px-4 py-1.5 rounded-full glass text-xs font-semibold text-secondary-700 uppercase tracking-wider mb-4">Galeri</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-display text-gray-900 mb-6">
                Dokumentasi <span class="text-gradient-gold">Kegiatan</span>
            </h2>
            <p class="max-w-2xl mx-auto text-gray-500 leading-relaxed">
                Momen-momen berharga dari berbagai kegiatan yang telah kami selenggarakan.
            </p>
            <div class="w-20 h-1 bg-gradient-to-r from-secondary-500 to-primary-500 rounded-full mx-auto mt-6"></div>
        </div>

        <!-- Gallery Grid - Masonry style -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

            <!-- Image 1 - Large -->
            <div class="reveal sm:col-span-2 lg:col-span-2 lg:row-span-2 group relative rounded-2xl overflow-hidden shadow-lg" style="transition-delay: 0.1s;">
                <div class="aspect-[16/10] lg:aspect-auto lg:h-full">
                    <img src="{{ asset('images/kajian-keislaman.png') }}" alt="Kajian Keislaman"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end">
                    <div class="p-6">
                        <span class="inline-block px-3 py-1 rounded-full bg-primary-500/80 text-white text-xs font-medium mb-2">Kajian</span>
                        <h3 class="text-white font-bold text-lg font-display">Kajian Rutin Keislaman</h3>
                        <p class="text-gray-200 text-sm mt-1">Halaqah mingguan membahas tema-tema keislaman</p>
                    </div>
                </div>
            </div>

            <!-- Image 2 -->
            <div class="reveal group relative rounded-2xl overflow-hidden shadow-lg" style="transition-delay: 0.2s;">
                <div class="aspect-[4/3]">
                    <img src="{{ asset('images/bakti-sosial.png') }}" alt="Bakti Sosial"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end">
                    <div class="p-5">
                        <span class="inline-block px-3 py-1 rounded-full bg-secondary-500/80 text-white text-xs font-medium mb-2">Sosial</span>
                        <h3 class="text-white font-bold font-display">Bakti Sosial</h3>
                        <p class="text-gray-200 text-xs mt-1">Pengabdian kepada masyarakat</p>
                    </div>
                </div>
            </div>

            <!-- Image 3 -->
            <div class="reveal group relative rounded-2xl overflow-hidden shadow-lg" style="transition-delay: 0.3s;">
                <div class="aspect-[4/3]">
                    <img src="{{ asset('images/seminar-islam.png') }}" alt="Seminar Islam"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end">
                    <div class="p-5">
                        <span class="inline-block px-3 py-1 rounded-full bg-primary-500/80 text-white text-xs font-medium mb-2">Seminar</span>
                        <h3 class="text-white font-bold font-display">Seminar Nasional</h3>
                        <p class="text-gray-200 text-xs mt-1">Diskusi dan pembelajaran bersama</p>
                    </div>
                </div>
            </div>

            <!-- Image 4 -->
            <div class="reveal group relative rounded-2xl overflow-hidden shadow-lg" style="transition-delay: 0.4s;">
                <div class="aspect-[4/3]">
                    <img src="{{ asset('images/kaderisasi-event.png') }}" alt="Kaderisasi"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end">
                    <div class="p-5">
                        <span class="inline-block px-3 py-1 rounded-full bg-secondary-500/80 text-white text-xs font-medium mb-2">Kaderisasi</span>
                        <h3 class="text-white font-bold font-display">Leadership Camp</h3>
                        <p class="text-gray-200 text-xs mt-1">Pembinaan anggota baru</p>
                    </div>
                </div>
            </div>

            <!-- Image 5 -->
            <div class="reveal group relative rounded-2xl overflow-hidden shadow-lg" style="transition-delay: 0.5s;">
                <div class="aspect-[4/3]">
                    <img src="{{ asset('images/baca-quran.png') }}" alt="Baca Tulis Al-Qur'an"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end">
                    <div class="p-5">
                        <span class="inline-block px-3 py-1 rounded-full bg-primary-500/80 text-white text-xs font-medium mb-2">BTQ</span>
                        <h3 class="text-white font-bold font-display">Baca Tulis Al-Qur'an</h3>
                        <p class="text-gray-200 text-xs mt-1">Pelatihan tilawah dan tajwid</p>
                    </div>
                </div>
            </div>

            <!-- Image 6 -->
            <div class="reveal group relative rounded-2xl overflow-hidden shadow-lg" style="transition-delay: 0.6s;">
                <div class="aspect-[4/3]">
                    <img src="{{ asset('images/foto-bersama.png') }}" alt="Foto Bersama"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                </div>
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end">
                    <div class="p-5">
                        <span class="inline-block px-3 py-1 rounded-full bg-secondary-500/80 text-white text-xs font-medium mb-2">Kebersamaan</span>
                        <h3 class="text-white font-bold font-display">Foto Bersama</h3>
                        <p class="text-gray-200 text-xs mt-1">Keluarga besar FORSIPOL PNP</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
