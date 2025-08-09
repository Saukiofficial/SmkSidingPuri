@extends('layouts.frontend')

@section('title', 'Visi & Misi Sekolah')

@section('content')
<style>
/* Premium Variables */
:root {
    --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    --gradient-text: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --glass-bg: rgba(255, 255, 255, 0.08);
    --glass-border: rgba(255, 255, 255, 0.2);
    --shadow-primary: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    --shadow-glass: 0 8px 32px rgba(31, 38, 135, 0.37);
}

/* Background Gradient & Particles */
.premium-bg {
    background: var(--gradient-primary);
    min-height: 100vh;
    position: relative;
    overflow: hidden;
}

.particles {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    top: 0;
    left: 0;
    z-index: 1;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 50%;
    animation: float 15s infinite linear;
}

@keyframes float {
    0% {
        transform: translateY(100vh) translateX(0px);
        opacity: 0;
    }
    10% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        transform: translateY(-100vh) translateX(100px);
        opacity: 0;
    }
}

/* Content Container */
.content-container {
    position: relative;
    z-index: 2;
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

/* Premium Typography */
.premium-title {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-align: center;
    margin-bottom: 4rem;
    letter-spacing: -0.025em;
    animation: titleGlow 3s ease-in-out infinite alternate;
}

@keyframes titleGlow {
    from {
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    }
    to {
        text-shadow: 0 0 30px rgba(255, 255, 255, 0.8);
    }
}

/* Glassmorphism Cards */
.glass-card {
    background: var(--glass-bg);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 24px;
    padding: 3rem;
    box-shadow: var(--shadow-glass);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    position: relative;
    overflow: hidden;
    animation: cardSlideIn 0.8s ease-out forwards;
    opacity: 0;
}

.glass-card:nth-child(1) {
    animation-delay: 0.2s;
}

.glass-card:nth-child(2) {
    animation-delay: 0.4s;
}

@keyframes cardSlideIn {
    from {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

/* 3D Hover Effects */
.glass-card:hover {
    transform: translateY(-15px) rotateX(5deg) rotateY(5deg) scale(1.02);
    box-shadow:
        var(--shadow-glass),
        0 35px 80px rgba(31, 38, 135, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.3);
    border-color: rgba(255, 255, 255, 0.4);
}

/* Card Glow Effect */
.glass-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.glass-card:hover::before {
    opacity: 1;
}

/* Card Icons */
.card-icon {
    width: 60px;
    height: 60px;
    background: var(--gradient-text);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    position: relative;
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    transition: all 0.3s ease;
}

.glass-card:hover .card-icon {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 15px 35px rgba(102, 126, 234, 0.5);
}

/* Card Titles */
.card-title {
    font-size: 2rem;
    font-weight: 700;
    background: var(--gradient-text);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1.5rem;
    letter-spacing: -0.02em;
}

/* Card Content */
.card-content {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.7;
    font-size: 1rem;
    font-weight: 400;
}

/* Grid Layout */
.cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 3rem;
    max-width: 1200px;
    margin: 0 auto;
    perspective: 1000px;
}

/* Loading Animation */
.loading-shimmer {
    background: linear-gradient(
        90deg,
        rgba(255, 255, 255, 0.1) 25%,
        rgba(255, 255, 255, 0.3) 50%,
        rgba(255, 255, 255, 0.1) 75%
    );
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% {
        background-position: -200% 0;
    }
    100% {
        background-position: 200% 0;
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .cards-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding: 0 1rem;
    }

    .glass-card {
        padding: 2rem;
    }

    .premium-title {
        margin-bottom: 3rem;
    }

    .content-container {
        padding: 2rem 0;
    }
}

@media (max-width: 480px) {
    .glass-card {
        padding: 1.5rem;
    }

    .cards-grid {
        gap: 1.5rem;
    }

    .card-title {
        font-size: 1.5rem;
    }
}

/* Performance Optimizations */
.glass-card {
    will-change: transform;
    transform-style: preserve-3d;
    backface-visibility: hidden;
}
</style>

<div class="premium-bg">
    <!-- Particle Animation Background -->
    <div class="particles" id="particles"></div>

    <div class="content-container">
        <div class="container mx-auto px-6">
            <!-- Premium Title -->
            <h1 class="premium-title">Visi & Misi</h1>

            <!-- Cards Grid -->
            <div class="cards-grid">
                <!-- Visi Card -->
                <div class="glass-card">
                    <div class="card-icon">
                        <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Visi</h2>
                    <div class="card-content">
                        {{ $profile->vision ?? 'Visi sekolah belum diatur.' }}
                    </div>
                </div>

                <!-- Misi Card -->
                <div class="glass-card">
                    <div class="card-icon">
                        <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Misi</h2>
                    <div class="card-content">
                        {!! nl2br(e($profile->mission ?? 'Misi sekolah belum diatur.')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Particle System
document.addEventListener('DOMContentLoaded', function() {
    const particlesContainer = document.getElementById('particles');
    const particleCount = 50;

    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';

        // Random positioning
        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
        particle.style.animationDelay = Math.random() * 15 + 's';

        // Random size
        const size = Math.random() * 4 + 2;
        particle.style.width = size + 'px';
        particle.style.height = size + 'px';

        particlesContainer.appendChild(particle);

        // Remove particle after animation
        setTimeout(() => {
            if (particle.parentNode) {
                particle.parentNode.removeChild(particle);
            }
        }, 25000);
    }

    // Create initial particles
    for (let i = 0; i < particleCount; i++) {
        setTimeout(() => createParticle(), Math.random() * 15000);
    }

    // Continuously create new particles
    setInterval(createParticle, 300);
});

// Enhanced 3D Card Effects
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.glass-card');

    cards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;

            card.style.transform = `translateY(-15px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
        });

        card.addEventListener('mouseleave', function() {
            card.style.transform = 'translateY(0) rotateX(0deg) rotateY(0deg) scale(1)';
        });
    });
});

// Loading States
window.addEventListener('load', function() {
    document.body.classList.add('loaded');
});

// Smooth Scroll Enhancement
document.documentElement.style.scrollBehavior = 'smooth';
</script>
@endsection
