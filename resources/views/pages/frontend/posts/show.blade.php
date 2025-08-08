@extends('layouts.frontend')

@section('title', $post->title)

@section('content')
<style>
    /* Premium Background & Base Styles */
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 1;
    }

    /* Particle Animation */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        pointer-events: none;
    }

    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(255, 255, 255, 0.4);
        border-radius: 50%;
        animation: float 8s infinite ease-in-out;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.2;
        }
        50% {
            transform: translateY(-30px) rotate(180deg);
            opacity: 0.8;
        }
    }

    /* Main Content Container */
    .py-16 {
        position: relative;
        z-index: 3;
        padding: 4rem 0;
        animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Glassmorphism Cards */
    .glass-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow:
            0 8px 32px rgba(0, 0, 0, 0.12),
            0 0 0 1px rgba(255, 255, 255, 0.05),
            inset 0 1px 0 rgba(255, 255, 255, 0.15);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .glass-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
    }

    .glass-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow:
            0 32px 64px rgba(0, 0, 0, 0.2),
            0 0 0 1px rgba(255, 255, 255, 0.1),
            inset 0 1px 0 rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.3);
    }

    /* Main Article Styles */
    .lg\\:col-span-2.glass-card {
        padding: 2.5rem;
    }

    /* Premium Typography */
    .glass-card h1 {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 40%, #c7d2fe 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        background-size: 200% 200%;
        animation: shimmer 4s ease-in-out infinite;
        text-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
    }

    @keyframes shimmer {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    /* Meta Information */
    .text-gray-500 {
        color: rgba(255, 255, 255, 0.75) !important;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        margin-bottom: 2rem;
    }

    .text-gray-500 span {
        background: rgba(255, 255, 255, 0.12);
        padding: 0.5rem 1rem;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .text-gray-500 span:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    /* Featured Image */
    .glass-card img:not(.sidebar img) {
        border-radius: 16px;
        box-shadow:
            0 20px 40px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.1);
        transition: all 0.4s ease;
        margin-bottom: 2rem;
    }

    .glass-card img:hover:not(.sidebar img) {
        transform: scale(1.03);
        box-shadow:
            0 30px 60px rgba(0, 0, 0, 0.25),
            0 0 0 1px rgba(255, 255, 255, 0.2);
    }

    /* Content Text */
    .prose {
        color: rgba(255, 255, 255, 0.9) !important;
        font-size: 1.125rem;
        line-height: 1.8;
    }

    .prose p {
        margin-bottom: 1.5rem;
    }

    .prose strong {
        color: rgba(255, 255, 255, 0.95);
        font-weight: 600;
    }

    /* Sidebar Styles */
    .lg\\:col-span-1 .glass-card {
        padding: 2rem;
    }

    .sidebar h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        background: linear-gradient(135deg, #ffffff 0%, #e0e7ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Sidebar List */
    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .sidebar li {
        background: rgba(255, 255, 255, 0.06);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        overflow: hidden;
        position: relative;
    }

    .sidebar li::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .sidebar li:hover::before {
        left: 100%;
    }

    .sidebar li:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateX(8px) translateY(-2px);
        border-color: rgba(255, 255, 255, 0.25);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    /* Sidebar Images */
    .sidebar img {
        width: 5rem;
        height: 5rem;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .sidebar li:hover img {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Sidebar Text */
    .sidebar .font-semibold {
        color: rgba(255, 255, 255, 0.95) !important;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 0.5rem;
        transition: color 0.3s ease;
        line-height: 1.4;
    }

    .sidebar li:hover .font-semibold {
        color: #e0e7ff !important;
    }

    .sidebar .text-sm {
        color: rgba(255, 255, 255, 0.65) !important;
        font-size: 0.875rem;
    }

    /* Link Hover Effects */
    .sidebar a {
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .sidebar a:hover {
        color: inherit;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .grid-cols-1.lg\\:grid-cols-3 {
            gap: 2rem;
        }

        .glass-card {
            margin-bottom: 1.5rem;
        }
    }

    @media (max-width: 768px) {
        .py-16 {
            padding: 2rem 0;
        }

        .glass-card {
            padding: 1.5rem !important;
            border-radius: 16px;
        }

        .glass-card h1 {
            font-size: 2rem;
        }

        .text-gray-500 {
            flex-direction: column;
            gap: 0.5rem;
        }

        .sidebar li {
            flex-direction: column;
            text-align: center;
            padding: 1rem;
        }

        .sidebar img {
            width: 100%;
            height: 8rem;
            margin-bottom: 1rem;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .glass-card {
            padding: 1rem !important;
        }

        .glass-card h1 {
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .prose {
            font-size: 1rem;
        }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #764ba2, #f093fb);
    }

    /* Loading Animation */
    .glass-card {
        animation: slideInUp 0.8s ease-out;
    }

    .lg\\:col-span-2 {
        animation-delay: 0.2s;
    }

    .lg\\:col-span-1 {
        animation-delay: 0.4s;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Particles Background -->
<div class="particles" id="particles"></div>

<div class="py-16">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Konten Utama Berita --}}
            <div class="lg:col-span-2 glass-card">
                <h1>{{ $post->title }}</h1>
                <div class="text-gray-500 mb-6">
                    <span>Dipublikasikan pada: {{ \Carbon\Carbon::parse($post->published_at)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                    <span>Oleh: {{ $post->author->name }}</span>
                </div>
                @if($post->featured_image_path)
                <img src="{{ asset('storage/' . $post->featured_image_path) }}" alt="{{ $post->title }}" class="w-full rounded-md mb-8">
                @endif
                <div class="prose max-w-none text-gray-700">
                    {!! $post->content !!}
                </div>
            </div>

            {{-- Sidebar Berita Terbaru --}}
            <div class="lg:col-span-1 sidebar">
                <div class="glass-card">
                    <h3 class="text-2xl font-bold mb-6 border-b pb-4">Berita Lainnya</h3>
                    <ul class="space-y-4">
                        @forelse ($latestPosts as $latestPost)
                        <li class="flex items-center space-x-4">
                             <a href="{{ route('posts.show', $latestPost->slug) }}">
                                <img src="{{ $latestPost->featured_image_path ? asset('storage/' . $latestPost->featured_image_path) : 'https://placehold.co/100x100/e2e8f0/6366f1?text=Thumb' }}" class="w-20 h-20 rounded-md object-cover">
                            </a>
                            <div>
                                <a href="{{ route('posts.show', $latestPost->slug) }}" class="font-semibold text-gray-800 hover:text-indigo-600">{{ $latestPost->title }}</a>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($latestPost->published_at)->locale('id')->isoFormat('D MMMM Y') }}</p>
                            </div>
                        </li>
                        @empty
                        <p class="text-gray-500">Tidak ada berita lain.</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 40;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 8 + 's';
                particle.style.animationDuration = (6 + Math.random() * 8) + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // 3D tilt effect for cards
        function addTiltEffect() {
            const cards = document.querySelectorAll('.glass-card');

            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateX = (y - centerY) / 25;
                    const rotateY = (centerX - x) / 25;

                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
                });
            });
        }

        // Smooth scroll reveal animation
        function animateOnScroll() {
            const elements = document.querySelectorAll('.glass-card');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < window.innerHeight - elementVisible) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        }

        // Initialize all effects
        createParticles();
        addTiltEffect();
        animateOnScroll();

        // Listen for scroll events
        window.addEventListener('scroll', animateOnScroll);
    });
</script>

@endsection
