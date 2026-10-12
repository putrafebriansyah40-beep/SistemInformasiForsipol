<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORSIPOL KM PNP | Forum Studi Islam Politeknik Negeri Padang</title>
    
    <!-- Favicon & Icons (Google Search & Mobile Devices) -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon-192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/logo-forsipol-square.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="canonical" href="https://forsipol-km-pnp.vercel.app/">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Website Resmi FORSIPOL (Forum Studi Islam Politeknik) KM PNP - Unit Kegiatan Mahasiswa Kerohanian Islam di Politeknik Negeri Padang. Wadah dakwah, ukhuwah, dan pembinaan karakter Islami mahasiswa.">
    <meta name="keywords" content="FORSIPOL, FORSIPOL PNP, FORSIPOL KM PNP, Forum Studi Islam Politeknik, Politeknik Negeri Padang, UKM Kerohanian Islam PNP, Mahasiswa PNP, Kampus PNP">
    <meta name="author" content="FORSIPOL KM PNP">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://forsipol-km-pnp.vercel.app/">
    <meta property="og:title" content="FORSIPOL KM PNP | Forum Studi Islam Politeknik Negeri Padang">
    <meta property="og:description" content="Website Resmi FORSIPOL KM PNP - Unit Kegiatan Mahasiswa Kerohanian Islam Politeknik Negeri Padang.">
    <meta property="og:image" content="{{ asset('images/logo-forsipol-square.png') }}">
    <meta property="og:site_name" content="FORSIPOL KM PNP">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://forsipol-km-pnp.vercel.app/">
    <meta name="twitter:title" content="FORSIPOL KM PNP | Forum Studi Islam Politeknik Negeri Padang">
    <meta name="twitter:description" content="Website Resmi FORSIPOL KM PNP - Unit Kegiatan Mahasiswa Kerohanian Islam Politeknik Negeri Padang.">
    <meta name="twitter:image" content="{{ asset('images/logo-forsipol-square.png') }}">
    
    <!-- Structured Data (JSON-LD) for Google Site Name & Organization -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "WebSite",
        "name": "FORSIPOL KM PNP",
        "alternateName": ["FORSIPOL", "FORSIPOL PNP", "Forum Studi Islam Politeknik Negeri Padang"],
        "url": "https://forsipol-km-pnp.vercel.app/"
    }
    </script>
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Organization",
        "name": "FORSIPOL KM PNP",
        "url": "https://forsipol-km-pnp.vercel.app/",
        "logo": "{{ asset('images/logo-forsipol-square.png') }}"
    }
    </script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 antialiased selection:bg-primary-500 selection:text-white">
    <!-- Navbar -->
    <x-navbar />
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- Animations Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Counter animation
            const counters = document.querySelectorAll('.counter');
            
            const animateCounter = (counter) => {
                const target = +counter.getAttribute('data-target');
                const suffix = counter.getAttribute('data-suffix') || '';
                const duration = 2000; // 2 seconds
                
                // Avoid division by zero
                if (target === 0) {
                    counter.innerText = '0' + suffix;
                    return;
                }

                const increment = target / (duration / 16); 
                let current = 0;
                
                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current) + suffix;
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target + suffix;
                    }
                };
                
                updateCounter();
            };

            const observerOptions = {
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if (entry.target.classList.contains('counter-trigger')) {
                            const targetCounters = entry.target.querySelectorAll('.counter');
                            targetCounters.forEach(c => animateCounter(c));
                            observer.unobserve(entry.target);
                        }
                    }
                });
            }, observerOptions);

            const statsSection = document.getElementById('stats');
            if (statsSection) {
                statsSection.classList.add('counter-trigger');
                observer.observe(statsSection);
            }

            // Reveal animations
            const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active', 'animate-fade-in-up');
                        entry.target.style.opacity = 1;
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            revealElements.forEach(el => revealObserver.observe(el));
        });
    </script>
</body>
</html>
