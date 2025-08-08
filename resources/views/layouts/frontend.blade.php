<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    {{-- VIEWPORT DIPERBAIKI UNTUK IPHONE --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- META TAGS KHUSUS IPHONE --}}
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-touch-fullscreen" content="yes">

    <title>@yield('title', 'SMK Siding Puri')</title>

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    {{-- Konfigurasi kustom untuk Tailwind --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    {{-- Alpine.js untuk interaktivitas --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- CSS FIXES UNTUK IPHONE --}}
    <style>
        /* RESET CSS UNTUK MOBILE */
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        html {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            /* Menghilangkan kursor kustom untuk mobile */
            cursor: auto;
            /* Padding untuk safe area iPhone */
            padding: env(safe-area-inset-top) env(safe-area-inset-right) env(safe-area-inset-bottom) env(safe-area-inset-left);
        }

        /* HANYA TAMPILKAN KURSOR KUSTOM DI DESKTOP */
        @media (min-width: 1024px) {
            body {
                cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><circle cx="16" cy="16" r="10" stroke="%23667eea" stroke-width="2" fill="none"/></svg>') 16 16, auto;
            }

            a, button, input[type="submit"], .stat-item, [onclick] {
                cursor: url("{{ asset('images/cursor-pointer.png') }}") 4 0, pointer !important;
            }
        }

        /* MOBILE FIXES */
        @media (max-width: 768px) {
            /* Reset semua transformasi kompleks */
            .principal-card {
                transform: none !important;
            }

            .principal-image {
                transform: none !important;
            }

            /* Simplifikasi backdrop-filter untuk iOS */
            .stat-card,
            .program-card,
            .testimonial-card,
            .principal-card {
                background: rgba(255, 255, 255, 0.9) !important;
                backdrop-filter: none !important;
                -webkit-backdrop-filter: none !important;
            }

            /* Fix overflow issues */
            .luxury-hero {
                overflow: hidden;
                min-height: auto !important;
            }

            /* Disable complex animations on mobile */
            .hero-particles,
            .testimonial-card::before {
                display: none !important;
            }

            /* Fix text rendering */
            .hero-title {
                -webkit-text-fill-color: white !important;
                background: none !important;
                color: white !important;
            }

            .highlight-text {
                -webkit-text-fill-color: #ffd89b !important;
                background: none !important;
                color: #ffd89b !important;
            }

            .stat-number {
                -webkit-text-fill-color: #667eea !important;
                background: none !important;
                color: #667eea !important;
            }
        }

        /* IPHONE SPECIFIC FIXES */
        @media (max-width: 480px) {
            /* Container fixes */
            .container {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }

            /* Hero section fixes */
            .luxury-hero {
                padding: 3rem 0 2rem !important;
            }

            .hero-title {
                font-size: 2rem !important;
                line-height: 1.2 !important;
                margin-bottom: 1rem !important;
            }

            .hero-subtitle {
                font-size: 1rem !important;
                margin-bottom: 2rem !important;
            }

            /* Button fixes */
            .hero-buttons {
                flex-direction: column !important;
                gap: 0.75rem !important;
            }

            .btn-primary,
            .btn-secondary {
                width: 100% !important;
                max-width: none !important;
                padding: 0.875rem 1.5rem !important;
                font-size: 0.9rem !important;
            }

            /* Card fixes */
            .stat-card,
            .program-card,
            .news-card,
            .testimonial-card {
                margin-bottom: 1rem !important;
                border-radius: 1rem !important;
                padding: 1.5rem !important;
            }

            /* Grid fixes */
            .grid {
                gap: 1rem !important;
            }

            /* Text size fixes */
            .section-title {
                font-size: 1.875rem !important;
                line-height: 1.3 !important;
            }

            .section-subtitle {
                font-size: 1rem !important;
                line-height: 1.5 !important;
            }

            /* Stats section */
            .stat-number {
                font-size: 2.5rem !important;
            }

            .stat-label {
                font-size: 0.9rem !important;
            }

            /* Program cards */
            .program-icon {
                width: 60px !important;
                height: 60px !important;
                font-size: 1.5rem !important;
            }

            /* News cards */
            .news-image {
                height: 200px !important;
            }
        }

        /* FIX UNTUK IPHONE X DAN YANG LEBIH BARU */
        @supports (padding: env(safe-area-inset-top)) {
            body {
                padding-top: env(safe-area-inset-top);
                padding-bottom: env(safe-area-inset-bottom);
            }

            .luxury-hero {
                padding-top: calc(3rem + env(safe-area-inset-top));
            }
        }

        /* LOADING STATE FIXES */
        @media (max-width: 768px) {
            .loading-shimmer {
                animation: none !important;
            }
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50 font-inter text-gray-800">

    {{-- Memasukkan komponen Header Publik --}}
    @include('layouts.partials.header')

    {{-- Konten Utama Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Memasukkan komponen Footer Publik --}}
    @include('layouts.partials.footer')

    {{-- JAVASCRIPT FIXES UNTUK MOBILE --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Detect iOS
            const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);

            if (isIOS) {
                // Add iOS-specific class
                document.body.classList.add('ios-device');

                // Fix viewport height issues
                const setViewportHeight = () => {
                    document.documentElement.style.setProperty('--vh', `${window.innerHeight * 0.01}px`);
                };

                setViewportHeight();
                window.addEventListener('resize', setViewportHeight);
                window.addEventListener('orientationchange', setViewportHeight);

                // Disable zoom on double tap
                let lastTouchEnd = 0;
                document.addEventListener('touchend', function (event) {
                    const now = (new Date()).getTime();
                    if (now - lastTouchEnd <= 300) {
                        event.preventDefault();
                    }
                    lastTouchEnd = now;
                }, false);
            }

            // Simplified counter animation for mobile
            const counters = document.querySelectorAll('.counter');
            const isMobile = window.innerWidth <= 768;

            if (isMobile) {
                // Instant counter for mobile
                counters.forEach(counter => {
                    const target = counter.getAttribute('data-target');
                    const isPercent = counter.innerText.includes('%');
                    counter.innerText = target + (isPercent ? '%' : '');
                });
            } else {
                // Animated counter for desktop
                const speed = 100;

                const animateCounter = (counter) => {
                    const target = +counter.getAttribute('data-target');
                    const isPercent = counter.innerText.includes('%');
                    let count = 0;

                    const updateCount = () => {
                        const increment = target / speed;
                        count += increment;

                        if (count < target) {
                            counter.innerText = Math.ceil(count) + (isPercent ? '%' : '');
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target + (isPercent ? '%' : '');
                        }
                    };
                    updateCount();
                };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.5
                });

                counters.forEach(counter => {
                    observer.observe(counter);
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
