<!-- Tentang Section -->
<section id="tentang" class="relative py-24 sm:py-32 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-white to-gray-50"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100/30 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary-100/30 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16 reveal">
            <span class="inline-block px-4 py-1.5 rounded-full glass text-xs font-semibold text-primary-700 uppercase tracking-wider mb-4">Tentang Kami</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold font-display text-gray-900 mb-6">
                Mengenal <span class="text-gradient">FORSIPOL</span>
            </h2>
            <div class="w-20 h-1 bg-gradient-to-r from-primary-500 to-secondary-500 rounded-full mx-auto"></div>
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <!-- Left: Image / Visual -->
            <div class="reveal-left">
                <div class="relative">
                    <!-- Main card -->
                    <div class="glass-card rounded-3xl p-8 sm:p-10 relative overflow-hidden">
                        <!-- Decorative corner -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-primary-100/50 to-transparent rounded-bl-full"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-secondary-100/50 to-transparent rounded-tr-full"></div>

                        <div class="relative text-center">
                            <img src="{{ asset('images/logo-forsipol.png') }}" alt="Logo FORSIPOL" class="w-40 h-40 mx-auto mb-6 object-contain">
                            <h3 class="text-2xl font-bold font-display text-gradient-gold mb-2">FORSIPOL - KM - PNP</h3>
                            <p class="text-gray-500 text-sm">Forum Studi Islam Politeknik Negeri Padang</p>

                            <!-- Decorative Islamic pattern -->
                            <div class="mt-6 flex items-center justify-center gap-3">
                                <div class="w-12 h-px bg-gradient-to-r from-transparent to-primary-400/50"></div>
                                <span class="text-primary-500 text-lg">☪</span>
                                <div class="w-12 h-px bg-gradient-to-l from-transparent to-primary-400/50"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating accent card -->
                    <div class="absolute -bottom-4 -right-4 sm:-bottom-6 sm:-right-6 glass-card rounded-2xl px-5 py-3 animate-float" style="animation-delay: 1s;">
                        <div class="flex items-center gap-2">
                            <span class="text-2xl">🕌</span>
                            <div>
                                <p class="text-gray-800 text-sm font-semibold">UKM Kerohanian</p>
                                <p class="text-gray-500 text-xs">Sejak berdirinya PNP</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Text Content -->
            <div class="reveal-right space-y-6">
                <div>
                    <h3 class="text-2xl sm:text-3xl font-bold font-display text-gray-900 mb-4">
                        Wadah Pembinaan <span class="text-primary-600">Keislaman</span> Mahasiswa
                    </h3>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        <strong class="text-gray-800">FORSIPOL (Forum Studi Islam Politeknik)</strong> adalah Unit Kegiatan Mahasiswa (UKM) yang bergerak di bidang kerohanian Islam di bawah naungan Keluarga Mahasiswa (KM) Politeknik Negeri Padang.
                    </p>
                    <p class="text-gray-500 leading-relaxed">
                        Sebagai organisasi kemahasiswaan, FORSIPOL menjadi wadah bagi seluruh mahasiswa muslim PNP untuk mendalami ilmu agama, mengembangkan karakter Islami, serta mempererat ukhuwah Islamiyah di lingkungan kampus. Dalam menjalankan kegiatannya, FORSIPOL berkoordinasi dengan BEM KM-PNP dan dibina langsung oleh bagian Kemahasiswaan Politeknik Negeri Padang.
                    </p>
                </div>

                <!-- Key Points -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-start gap-3 glass-card rounded-xl p-4">
                        <div class="w-10 h-10 rounded-lg bg-primary-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 font-semibold text-sm">Kajian Islami</h4>
                            <p class="text-gray-500 text-xs mt-1">Rutin & mendalam</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 glass-card rounded-xl p-4">
                        <div class="w-10 h-10 rounded-lg bg-secondary-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 font-semibold text-sm">Ukhuwah</h4>
                            <p class="text-gray-500 text-xs mt-1">Persaudaraan erat</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 glass-card rounded-xl p-4">
                        <div class="w-10 h-10 rounded-lg bg-primary-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 font-semibold text-sm">Dakwah Kampus</h4>
                            <p class="text-gray-500 text-xs mt-1">Syiar kebaikan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 glass-card rounded-xl p-4">
                        <div class="w-10 h-10 rounded-lg bg-secondary-100 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-gray-800 font-semibold text-sm">Bakti Sosial</h4>
                            <p class="text-gray-500 text-xs mt-1">Peduli sesama</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section id="stats" class="relative py-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-primary-600 via-primary-700 to-primary-600"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center reveal">
                <div class="text-3xl sm:text-4xl font-black font-display text-white mb-2">
                    <span class="counter" data-target="{{ \App\Models\User::count() }}" data-suffix="">0</span>
                </div>
                <p class="text-primary-100 text-sm">Anggota Aktif</p>
            </div>
            <div class="text-center reveal" style="transition-delay: 0.1s;">
                <div class="text-3xl sm:text-4xl font-black font-display text-white mb-2">
                    <span class="counter" data-target="50" data-suffix="+">0</span>
                </div>
                <p class="text-primary-100 text-sm">Kegiatan / Tahun</p>
            </div>
            <div class="text-center reveal" style="transition-delay: 0.2s;">
                <div class="text-3xl sm:text-4xl font-black font-display text-white mb-2">
                    <span class="counter" data-target="{{ date('Y') - 1998 }}" data-suffix=" Tahun">0</span>
                </div>
                <p class="text-primary-100 text-sm">Berdiri Sejak 1998</p>
            </div>
            <div class="text-center reveal" style="transition-delay: 0.3s;">
                <div class="text-3xl sm:text-4xl font-black font-display text-white mb-2">
                    <span class="counter" data-target="6" data-suffix="">0</span>
                </div>
                <p class="text-primary-100 text-sm">Divisi Kerja</p>
            </div>
        </div>
    </div>
</section>
