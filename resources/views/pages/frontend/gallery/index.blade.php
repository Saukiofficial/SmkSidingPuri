@extends('layouts.frontend')

@section('title', 'Galeri Sekolah')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

    * {
        font-family: 'Inter', sans-serif;
    }

    /* Custom Gradient Background */
    .luxury-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 75%, #f5576c 100%);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Glassmorphism Effect */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
    }

    .glass-card-strong {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* 3D Hover Effects */
    .card-3d {
        transform-style: preserve-3d;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .card-3d:hover {
        transform: rotateY(5deg) rotateX(5deg) translateY(-20px) scale(1.05);
        box-shadow: 0 35px 70px rgba(0, 0, 0, 0.2);
    }

    .card-3d:hover .card-image {
        transform: scale(1.1);
    }

    .card-image {
        transition: transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Premium Shadows */
    .premium-shadow {
        box-shadow:
            0 4px 8px rgba(0, 0, 0, 0.04),
            0 8px 16px rgba(0, 0, 0, 0.06),
            0 16px 32px rgba(0, 0, 0, 0.08),
            0 32px 64px rgba(0, 0, 0, 0.10);
    }

    /* Particle Animation */
    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) scale(1); opacity: 0.7; }
        50% { transform: translateY(-20px) scale(1.1); opacity: 1; }
    }

    /* Photo Count Badge */
    .photo-badge {
        background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0.1) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.3);
    }

    /* Hover Overlay Effect */
    .hover-overlay {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.8) 0%, rgba(118, 75, 162, 0.8) 100%);
        opacity: 0;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .card-3d:hover .hover-overlay {
        opacity: 1;
    }

    /* Fade In Animation */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Mobile Optimizations */
    @media (max-width: 768px) {
        .card-3d:hover {
            transform: translateY(-10px) scale(1.02);
        }
    }

    /* Laravel Pagination Styling */
    .pagination-wrapper .pagination {
        @apply flex items-center space-x-2;
    }

    .pagination-wrapper .pagination li {
        @apply inline-block;
    }

    .pagination-wrapper .pagination a,
    .pagination-wrapper .pagination span {
        @apply w-10 h-10 flex items-center justify-center rounded-xl text-white/70 transition-all duration-300;
        background: rgba(255, 255, 255, 0.1);
    }

    .pagination-wrapper .pagination a:hover {
        @apply text-white;
        background: rgba(255, 255, 255, 0.2);
    }

    .pagination-wrapper .pagination .active span {
        @apply text-white font-bold;
        background: linear-gradient(135deg, #667eea, #764ba2);
    }
</style>
@endpush

@section('content')
<!-- Background with Particles -->
<div class="min-h-screen luxury-gradient relative overflow-hidden">
    <!-- Floating Particles -->
    <div class="particle" style="top: 10%; left: 10%; width: 4px; height: 4px; animation-delay: 0s;"></div>
    <div class="particle" style="top: 20%; left: 80%; width: 6px; height: 6px; animation-delay: 1s;"></div>
    <div class="particle" style="top: 60%; left: 20%; width: 3px; height: 3px; animation-delay: 2s;"></div>
    <div class="particle" style="top: 80%; left: 70%; width: 5px; height: 5px; animation-delay: 3s;"></div>
    <div class="particle" style="top: 30%; left: 60%; width: 4px; height: 4px; animation-delay: 4s;"></div>
    <div class="particle" style="top: 70%; left: 40%; width: 6px; height: 6px; animation-delay: 5s;"></div>

    <!-- Main Content -->
    <div class="relative z-10 py-20">
        <div class="container mx-auto px-6">
            <!-- Title Section -->
            <div class="text-center mb-16 fade-in">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold gradient-text mb-6">
                    Galeri Kegiatan Sekolah
                </h1>
                <p class="text-xl md:text-2xl text-white/80 font-light">
                    Koleksi Momen Berharga Sekolah Kami
                </p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
                {{-- Menampilkan data album dari database --}}
                @forelse ($albums as $index => $album)
                <div class="glass-card rounded-3xl overflow-hidden card-3d premium-shadow fade-in" style="animation-delay: {{ $index * 0.1 }}s">
                    {{-- Link ke halaman detail album --}}
                    <a href="#" class="block">
                        <div class="relative group">
                            <div class="overflow-hidden">
                                <img src="{{ $album->galleries->first() ? asset('storage/' . $album->galleries->first()->file_path) : 'https://placehold.co/600x400/e2e8f0/6366f1?text=No+Image' }}"
                                     alt="{{ $album->name }}"
                                     class="w-full h-64 md:h-72 object-cover card-image">
                            </div>
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 hover-overlay flex items-center justify-center">
                                <div class="text-center">
                                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4 mx-auto backdrop-blur-sm">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-white text-xl font-bold">Lihat Album</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="font-bold text-xl text-white/90 leading-tight">{{ $album->name }}</h3>
                                <div class="photo-badge px-3 py-1 rounded-full">
                                    <span class="text-white/80 text-sm font-medium">{{ $album->galleries->count() }} Foto</span>
                                </div>
                            </div>
                            <p class="text-white/60 text-sm">{{ Str::limit($album->description ?? 'Koleksi foto kegiatan sekolah', 50) }}</p>
                        </div>
                    </a>
                </div>
                @empty
                    <div class="glass-card rounded-3xl overflow-hidden card-3d premium-shadow fade-in col-span-full">
                        <div class="p-12 text-center">
                            <div class="w-20 h-20 bg-white/10 rounded-full flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-10 h-10 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-white/70 text-lg">Belum ada album yang dipublikasikan.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- Pagination Links --}}
            @if($albums->hasPages())
            <div class="mt-16 flex justify-center fade-in" style="animation-delay: 0.5s">
                <div class="glass-card-strong rounded-2xl p-4 pagination-wrapper">
                    {{ $albums->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Add loading animation and smooth interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize cards with fade-in animation
        const cards = document.querySelectorAll('.card-3d');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';

            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });

        // Add smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';

        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observe all animatable elements
        document.querySelectorAll('.fade-in').forEach(element => {
            observer.observe(element);
        });

        // Add loading state for images
        const images = document.querySelectorAll('.card-image');
        images.forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });

            img.addEventListener('error', function() {
                this.style.opacity = '0.5';
                this.parentElement.innerHTML += '<div class="absolute inset-0 flex items-center justify-center bg-white/10"><span class="text-white/60">Gambar tidak tersedia</span></div>';
            });
        });

        // Enhanced hover effects for mobile
        if ('ontouchstart' in window) {
            cards.forEach(card => {
                card.addEventListener('touchstart', function() {
                    this.classList.add('touch-active');
                });

                card.addEventListener('touchend', function() {
                    setTimeout(() => {
                        this.classList.remove('touch-active');
                    }, 300);
                });
            });
        }
    });

    // Performance optimization: Reduce animations on low-end devices
    if (navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4) {
        document.documentElement.style.setProperty('--animation-duration', '0.3s');
    }
</script>

<style>
    .touch-active {
        transform: scale(0.98) !important;
        transition: transform 0.2s ease;
    }

    /* Loading state for images */
    .card-image {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card-image.loaded {
        opacity: 1;
    }

    /* Enhanced mobile responsiveness */
    @media (max-width: 640px) {
        .luxury-gradient {
            padding: 1rem 0;
        }

        .gradient-text {
            font-size: 2.5rem;
            line-height: 1.1;
        }

        .card-3d {
            margin-bottom: 1rem;
        }

        .glass-card {
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
        }
    }

    /* Improved accessibility */
    @media (prefers-reduced-motion: reduce) {
        .card-3d,
        .card-image,
        .particle {
            animation: none !important;
            transition: none !important;
        }

        .luxury-gradient {
            animation: none;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    }
</style>
@endpush
@endsection
