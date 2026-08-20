<!-- Program Kerja Section -->
<section id="program" class="relative py-24 sm:py-32 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-primary-50/20 to-gray-50"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary-100/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-secondary-100/20 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 reveal">
            <span class="inline-block px-4 py-1.5 rounded-full glass text-xs font-semibold text-primary-700 uppercase tracking-wider mb-4">Program Kerja</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-display text-gray-900 mb-6">
                Kegiatan <span class="text-gradient">Unggulan</span>
            </h2>
            <p class="max-w-2xl mx-auto text-gray-500 leading-relaxed">
                Berbagai program kerja yang kami selenggarakan untuk membina dan mengembangkan potensi mahasiswa muslim Politeknik Negeri Padang.
            </p>
            <div class="w-20 h-1 bg-gradient-to-r from-primary-500 to-secondary-500 rounded-full mx-auto mt-6"></div>
        </div>

        <!-- Programs Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

            @php
            $programs = [
                [
                    'title' => 'Kajian Rutin',
                    'desc' => 'Halaqah dan liqo mingguan yang membahas berbagai tema keislaman, mulai dari aqidah, fiqih, sirah nabawiyah, hingga muamalah kontemporer.',
                    'freq' => 'Setiap Minggu',
                    'delay' => '0.1s',
                    'theme' => 'primary',
                    'icon_bg' => 'from-primary-500 to-primary-700',
                    'icon_path' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                    'freq_icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                ],
                [
                    'title' => 'Peringatan Hari Besar Islam',
                    'desc' => 'Memperingati dan merayakan hari-hari besar Islam seperti Maulid Nabi, Isra Mi\'raj, Nuzulul Qur\'an, dan Tahun Baru Hijriyah dengan berbagai kegiatan.',
                    'freq' => 'Sesuai Kalender Hijriyah',
                    'delay' => '0.2s',
                    'theme' => 'secondary',
                    'icon_bg' => 'from-secondary-500 to-secondary-700',
                    'icon_path' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                    'freq_icon' => 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z',
                ],
                [
                    'title' => 'Baca Tulis Al-Qur\'an',
                    'desc' => 'Program pelatihan baca tulis Al-Qur\'an (BTQ) untuk meningkatkan kemampuan tilawah, tajwid, dan pemahaman Al-Qur\'an bagi mahasiswa.',
                    'freq' => '2x Seminggu',
                    'delay' => '0.3s',
                    'theme' => 'primary',
                    'icon_bg' => 'from-primary-600 to-primary-800',
                    'icon_path' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
                    'freq_icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                ],
                [
                    'title' => 'Bakti Sosial',
                    'desc' => 'Kegiatan sosial dan pengabdian kepada masyarakat seperti santunan anak yatim, donor darah, bersih-bersih masjid, dan bantuan bencana.',
                    'freq' => 'Rutin & Insidental',
                    'delay' => '0.4s',
                    'theme' => 'secondary',
                    'icon_bg' => 'from-secondary-500 to-secondary-700',
                    'icon_path' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                    'freq_icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                ],
                [
                    'title' => 'Kaderisasi',
                    'desc' => 'Program rekrutmen dan pembinaan anggota baru melalui training, mentoring, dan leadership camp untuk mencetak kader dakwah kampus.',
                    'freq' => 'Setiap Awal Semester',
                    'delay' => '0.5s',
                    'theme' => 'primary',
                    'icon_bg' => 'from-primary-500 to-primary-700',
                    'icon_path' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
                    'freq_icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                ],
                [
                    'title' => 'Seminar & Workshop',
                    'desc' => 'Mengadakan seminar nasional, workshop public speaking, pelatihan kepemimpinan Islam, dan diskusi tematik bersama narasumber kompeten.',
                    'freq' => 'Bulanan',
                    'delay' => '0.6s',
                    'theme' => 'secondary',
                    'icon_bg' => 'from-secondary-600 to-secondary-800',
                    'icon_path' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
                    'freq_icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                ],
            ];
            @endphp

            @foreach($programs as $program)
            <!-- Program Card -->
            <div class="reveal glass-card rounded-2xl p-6 sm:p-8 group relative overflow-hidden" style="transition-delay: {{ $program['delay'] }};">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-{{ $program['theme'] }}-100/30 to-transparent rounded-bl-full group-hover:from-{{ $program['theme'] }}-100/50 transition-all duration-500"></div>
                <div class="relative">
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $program['icon_bg'] }} flex items-center justify-center mb-6 group-hover:scale-110 group-hover:shadow-lg group-hover:shadow-{{ $program['theme'] }}-300/30 transition-all duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{!! $program['icon_path'] !!}"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 font-display">{{ $program['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $program['desc'] }}</p>
                    <div class="flex items-center gap-2 text-{{ $program['theme'] }}-600 text-xs font-medium">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{!! $program['freq_icon'] !!}"/>
                        </svg>
                        <span>{{ $program['freq'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
