@extends('layouts.frontend')

@section('title', 'Selamat Datang di SMK Siding Puri')

@push('styles')
<style>
    html, body {
    height: 100%;
    overflow-x: hidden;
}

/* Hero Section - Optimized Layout */
.luxury-hero {
    position: relative;
    min-height: 70vh; /* Reduced from 75vh for tighter spacing */
    padding: 2rem 0; /* Reduced padding for tighter layout */
    background: var(--primary-gradient);
    overflow: hidden;
    display: flex;
    align-items: center;
}

/* Mobile specific adjustments */
@media (max-width: 767px) {
    .luxury-hero {
        min-height: 60vh; /* Smaller on mobile for tighter spacing */
        min-height: 60dvh; /* Dynamic viewport height */
        padding: 1.5rem 0; /* Minimal padding */
    }

    /* Ensure content is properly spaced */
    .luxury-hero .container {
        display: flex;
        align-items: center;
        min-height: auto; /* Remove min-height constraint */
        padding: 0 1rem;
    }

    .luxury-hero .grid {
        width: 100%;
        align-items: center;
        gap: 1rem; /* Reduced gap for tighter spacing */
    }

    /* Adjust hero title for mobile */
    .hero-title {
        font-size: clamp(1.8rem, 7vw, 3rem); /* Slightly smaller for better proportion */
        margin-bottom: 0.75rem; /* Reduced margin */
        line-height: 1.1;
    }

    .hero-subtitle {
        font-size: clamp(0.95rem, 3.5vw, 1.1rem); /* Slightly smaller */
        margin-bottom: 1.5rem; /* Reduced margin */
        line-height: 1.5;
    }

    /* Button adjustments for mobile */
    .hero-buttons {
        gap: 0.5rem; /* Reduced gap between buttons */
        margin-top: 0.75rem; /* Reduced top margin */
    }

    .btn-primary, .btn-secondary {
        padding: 0.75rem 1.75rem; /* Slightly smaller padding */
        font-size: 0.9rem;
        max-width: 200px;
    }
}

/* Tablet adjustments */
@media (min-width: 768px) and (max-width: 1023px) {
    .luxury-hero {
        min-height: 65vh; /* Further reduced for tighter spacing */
        padding: 2.5rem 0;
    }
}

/* Desktop adjustments */
@media (min-width: 1024px) {
    .luxury-hero {
        min-height: 75vh; /* Reduced for tighter desktop layout */
        padding: 3rem 0; /* Reduced padding */
    }
}

/* Fix untuk browser mobile yang memiliki masalah dengan 100vh */
@supports (-webkit-touch-callout: none) {
    .luxury-hero {
        min-height: -webkit-fill-available;
    }
}

/* Additional mobile optimizations */
@media (max-width: 767px) {
    /* Ensure no horizontal scroll */
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    /* Hide character image on very small screens if needed */
    .hero-character {
        display: none;
    }

    /* Make sure text is readable */
    .hero-title, .hero-subtitle {
        text-align: center;
    }

    /* Optimize button layout */
    .hero-buttons {
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .btn-primary, .btn-secondary {
        width: 100%;
        max-width: 250px;
    }
}
    /* Global Luxury Variables */
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
        --secondary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 35%, #db2777 70%, #f59e0b 100%);
        --glass-bg: rgba(255, 255, 255, 0.12);
        --glass-border: rgba(255, 255, 255, 0.18);
    }

    .hero-bg-overlay {
        position: absolute;
        inset: 0;
        background-image: url('{{ asset('images/gedung-sekolah2.png') }}');
        background-size: cover;
        background-position: center;
        opacity: 0.15;
        filter: blur(1px);
    }

    .hero-particles {
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255,255,255,0.05) 0%, transparent 50%),
            radial-gradient(circle at 40% 70%, rgba(255,255,255,0.08) 0%, transparent 50%);
        animation: particleFloat 20s ease-in-out infinite;
    }

    @keyframes particleFloat {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-20px, -20px) rotate(120deg); }
        66% { transform: translate(20px, -10px) rotate(240deg); }
    }

    .hero-title {
        font-size: clamp(2.2rem, 6vw, 4.5rem); /* Slightly reduced max size for tighter layout */
        font-weight: 900;
        background: linear-gradient(135deg, #ffffff, #f8fafc, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        line-height: 1.1;
        margin-bottom: 1.25rem; /* Reduced margin for tighter spacing */
    }

    .highlight-text {
        background: linear-gradient(135deg, #ffd89b 0%, #19547b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
    }

    .hero-subtitle {
        font-size: clamp(1rem, 2.8vw, 1.25rem); /* Slightly reduced for tighter layout */
        color: rgba(255, 255, 255, 0.9);
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        line-height: 1.6;
        margin-bottom: 2rem; /* Reduced margin for tighter spacing */
    }

    .hero-buttons {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: center;
    }

    @media (min-width: 640px) {
        .hero-buttons {
            flex-direction: row;
            justify-content: center;
        }
    }

    @media (min-width: 768px) {
        .hero-buttons {
            justify-content: flex-start;
        }
    }

    .btn-primary {
        background: linear-gradient(135deg, #ffffff, #f8fafc);
        color: #4c1d95;
        font-weight: 700;
        padding: 1rem 2.5rem;
        border-radius: 9999px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        width: 100%;
        max-width: 250px;
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, #f8fafc, #e2e8f0);
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: inherit;
    }

    .btn-primary:hover::before {
        opacity: 1;
    }

    .btn-primary:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .btn-secondary {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 2px solid var(--glass-border);
        color: white;
        font-weight: 600;
        padding: 1rem 2.5rem;
        border-radius: 9999px;
        transition: all 0.4s ease;
        width: 100%;
        max-width: 250px;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.4);
        transform: translateY(-3px);
    }

    .hero-character {
        position: relative;
        animation: gentleBounce 6s ease-in-out infinite;
        filter: drop-shadow(0 25px 50px rgba(0, 0, 0, 0.3));
    }

    @keyframes gentleBounce {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    /* Statistics Section */
    .stats-section {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #cbd5e1 100%);
        position: relative;
        overflow: hidden;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(circle at 25% 25%, rgba(102, 126, 234, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(118, 75, 162, 0.05) 0%, transparent 50%);
    }

    .stat-card {
        background: var(--glass-bg);
        backdrop-filter: blur(25px);
        border: 1px solid var(--glass-border);
        border-radius: 2rem;
        padding: 3rem 2rem;
        text-align: center;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
    }

    .stat-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 30px 60px rgba(102, 126, 234, 0.3);
        background: rgba(255, 255, 255, 0.25);
    }

    .stat-card:hover::after {
        opacity: 1;
    }

    .stat-number {
        font-size: 4rem;
        font-weight: 900;
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .stat-label {
        color: #64748b;
        font-weight: 600;
        font-size: 1.2rem;
        margin-top: 1rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Principal Section */
    .principal-section {
        background: linear-gradient(135deg, #1e293b 0%, #334155 50%, #475569 100%);
        position: relative;
        overflow: hidden;
    }

    .principal-card {
        background: var(--glass-bg);
        backdrop-filter: blur(25px);
        border: 1px solid var(--glass-border);
        border-radius: 2rem;
        padding: 3rem;
        transform: rotate(-3deg);
        transition: all 0.4s ease;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    }

    .principal-card:hover {
        transform: rotate(0deg) scale(1.02);
    }

    .principal-image {
        border-radius: 1.5rem;
        transform: rotate(3deg);
        transition: transform 0.4s ease;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .principal-card:hover .principal-image {
        transform: rotate(0deg);
    }

    /* Programs Section */
    .programs-section {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 50%, #e2e8f0 100%);
    }

    .program-card {
        background: var(--glass-bg);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 2rem;
        padding: 2.5rem;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .program-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: var(--primary-gradient);
        border-radius: inherit;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .program-card:hover::before {
        opacity: 1;
    }

    .program-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        background: rgba(255, 255, 255, 0.9);
    }

    .program-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }

    .program-card:hover .program-icon {
        transform: scale(1.1) rotate(5deg);
    }

    /* News Section */
    .news-section {
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    }

    .news-card {
        background: white;
        border-radius: 1.5rem;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        position: relative;
    }

    .news-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: var(--primary-gradient);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .news-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 30px 60px rgba(102, 126, 234, 0.2);
    }

    .news-card:hover::before {
        opacity: 0.05;
    }

    .news-image {
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .news-card:hover .news-image {
        transform: scale(1.1);
    }

    /* Testimonial Section */
        /* Additional CSS for horizontal testimonials */
    .testimonial-container {
        max-width: 100%;
    }

    .testimonial-slider {
        position: relative;
    }

    .testimonial-track {
        display: flex;
        will-change: transform;
    }

    .testimonial-item {
        flex: 0 0 auto;
    }

    .testimonial-card {
        background: var(--glass-bg);
        backdrop-filter: blur(25px);
        border: 1px solid var(--glass-border);
        border-radius: 2rem;
        padding: 3rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        height: auto;
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .nav-btn {
        cursor: pointer;
        transition: all 0.3s ease;
        user-select: none;
    }

    .nav-btn:hover {
        transform: scale(1.1);
    }

    .nav-btn:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }

    .nav-btn:disabled:hover {
        transform: none;
    }

    .dot-indicator {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .dot-indicator.active {
        background: rgba(255, 255, 255, 0.8);
        transform: scale(1.2);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .testimonial-container .nav-btn {
            display: none;
        }

        .testimonial-slider {
            margin: 0 1rem;
        }

        .testimonial-card {
            padding: 2rem;
            min-height: 250px;
        }
    }

    @media (min-width: 768px) {
        .testimonial-item {
            min-width: 500px;
        }
    }

    @media (min-width: 1024px) {
        .testimonial-item {
            min-width: 600px;
        }
    }

    /* Section Headers */
    .section-badge {
        background: var(--glass-bg);
        backdrop-filter: blur(15px);
        border: 1px solid var(--glass-border);
        color: #4c1d95;
        font-weight: 700;
        padding: 0.75rem 2rem;
        border-radius: 9999px;
        font-size: 0.9rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: clamp(2rem, 5vw, 3.5rem);
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .section-subtitle {
        color: #64748b;
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .stat-card {
            padding: 2rem 1.5rem;
        }

        .stat-number {
            font-size: 3rem;
        }

        .program-card, .testimonial-card {
            padding: 2rem;
        }

        .principal-card {
            padding: 2rem;
            transform: rotate(0deg);
        }

        .principal-image {
            transform: rotate(0deg);
        }
    }

    /* Loading States */
    .loading-shimmer {
        background: linear-gradient(90deg,
            transparent,
            rgba(255, 255, 255, 0.4),
            transparent
        );
        animation: shimmerLoad 2s ease-in-out infinite;
    }

    @keyframes shimmerLoad {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
</style>
@endpush

@section('content')
    <!-- Luxury Hero Section -->
    <section class="luxury-hero flex items-center">
        <div class="hero-bg-overlay"></div>
        <div class="hero-particles"></div>

        <div class="container mx-auto px-6 relative z-10 max-w-7xl">
            <div class="grid md:grid-cols-2 gap-8 items-center py-6">
                <!-- Content Column -->
                <div class="text-center md:text-left text-white">
                    <h1 class="hero-title">
                        Membangun <span class="highlight-text">Generasi</span><br>
                        Unggul Berkarakter
                    </h1>
                    <p class="hero-subtitle">
                        Pendidikan berkualitas untuk masa depan cerah anak bangsa dengan teknologi modern dan nilai-nilai luhur yang mendalam.
                    </p>
                    <div class="hero-buttons">
                        <a href="{{ route('admission.index') }}" class="btn-primary relative z-10">
                            <span class="relative z-10">Daftar Sekarang</span>
                        </a>
                        <a href="{{ route('profile.vision-mission') }}" class="btn-secondary">
                            Tentang Kami
                        </a>
                    </div>
                </div>

                <!-- Character Column -->
                <div class="hidden md:flex justify-center">
                    <img src="{{ asset('images/siswa-siswi.png') }}"
                         alt="Karakter Siswa SMK"
                         class="hero-character max-w-lg lg:max-w-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Luxury Statistics Section -->
    <section class="stats-section py-24 relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="stat-card">
                    <div class="stat-number counter" data-target="{{ $studentCount ?? 0 }}">0</div>
                    <p class="stat-label">Siswa Terdaftar</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number counter" data-target="{{ $teacherCount ?? 0 }}">0</div>
                    <p class="stat-label">Tenaga Pengajar</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number counter" data-target="{{ $extracurricularCount ?? 0 }}">0</div>
                    <p class="stat-label">Ekstrakurikuler</p>
                </div>
                <div class="stat-card">
                    <div class="stat-number counter" data-target="98">0%</div>
                    <p class="stat-label">Tingkat Kelulusan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Principal Message Section -->
    <section class="principal-section py-24 text-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="flex justify-center">
                    <div class="principal-card">
                        <img src="{{ asset('images/kepalasekolah.jpg') }}"
                             alt="Kepala Sekolah"
                             class="principal-image w-full max-w-sm">
                    </div>
                </div>
                <div>
                    <span class="section-badge">Pesan Kepala Sekolah</span>
                    <h2 class="section-title text-white">Visi Pendidikan Masa Depan</h2>
                    <p class="text-gray-300 leading-relaxed mb-6 text-lg">
                        "SMK Siding Puri berkomitmen menciptakan generasi yang tidak hanya unggul secara akademik, tetapi juga berkarakter mulia. Kami mempersiapkan siswa dengan keterampilan abad 21, jiwa entrepreneurship, dan nilai-nilai Pancasila yang kuat."
                    </p>
                    <div class="bg-white/10 backdrop-blur-lg p-6 rounded-xl border border-white/20">
                        <p class="font-bold text-white text-xl">M. Syaiful Anwar, M.Pd., M.Ag.</p>
                        <p class="text-gray-300 mt-1">Kepala Sekolah SMK Siding Puri</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="programs-section py-24">
        <div class="container mx-auto px-6 text-center">
            <span class="section-badge">Program Keahlian</span>
            <h2 class="section-title">Pilihan Program Unggulan</h2>
            <p class="section-subtitle mb-16">
                Berbagai program keahlian yang sesuai dengan kebutuhan industri dan masa depan yang cerah.
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
                <div class="program-card">
                    <div class="program-icon bg-indigo-100 text-indigo-600">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Teknik Komputer dan Informatika</h3>
                    <p class="text-gray-600 mb-6">Mempelajari rekayasa perangkat lunak, jaringan komputer, dan multimedia dengan teknologi terdepan.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            Sertifikasi Internasional
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            Laboratorium Modern
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            Program Magang Industri
                        </li>
                    </ul>
                </div>

                <div class="program-card">
                    <div class="program-icon bg-green-100 text-green-600">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Agribisnis Tanaman Pangan</h3>
                    <p class="text-gray-600 mb-6">Mempelajari budidaya tanaman, pengolahan hasil pertanian, dan kewirausahaan agribisnis.</p>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            Praktik Langsung di Lapangan
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            Instruktur Berpengalaman
                        </li>
                        <li class="flex items-center text-gray-700">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            Peluang Kerja Tinggi
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section py-24">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="section-badge">Info Terkini</span>
                <h2 class="section-title">Berita & Informasi Terbaru</h2>
                <p class="section-subtitle">
                    Ikuti perkembangan dan kegiatan terbaru dari sekolah kami yang selalu berinovasi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($latestPosts as $post)
                <article class="news-card group">
                    <a href="{{ route('posts.show', $post->slug) }}" class="block overflow-hidden">
                        <img src="{{ $post->featured_image_path ? asset('storage/' . $post->featured_image_path) : 'https://placehold.co/600x400/e2e8f0/6366f1?text=Berita' }}"
                             alt="{{ $post->title }}"
                             class="news-image w-full">
                    </a>
                    <div class="p-8">
                        <time class="text-sm text-gray-500 font-medium">
                            {{ \Carbon\Carbon::parse($post->published_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                        </time>
                        <h3 class="font-bold text-xl mt-3 mb-4 text-gray-800 group-hover:text-indigo-600 transition-colors">
                            <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        <a href="{{ route('posts.show', $post->slug) }}"
                           class="inline-flex items-center text-indigo-600 font-semibold hover:text-indigo-700 transition-colors group">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-span-full text-center py-16">
                    <div class="bg-white/50 backdrop-blur-lg rounded-2xl p-12 border border-gray-200">
                        <i class="fas fa-newspaper text-6xl text-gray-300 mb-6"></i>
                        <p class="text-xl text-gray-500 font-medium">Belum ada berita yang dipublikasikan</p>
                        <p class="text-gray-400 mt-2">Nantikan informasi terbaru dari kami</p>
                    </div>
                </div>
                @endforelse
            </div>

            @if($latestPosts->count() > 0)
            <div class="text-center mt-16">
                <a href="{{ route('posts.index') }}"
                   class="inline-flex items-center bg-indigo-600 text-white font-bold py-4 px-10 rounded-full hover:bg-indigo-700 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Lihat Semua Berita
                    <i class="fas fa-arrow-right ml-3"></i>
                </a>
            </div>
            @endif
        </div>
    </section>

    {{--  <!-- Section Testimoni Alumni -->
    <section class="testimonial-section py-24 text-white">
        <div class="container mx-auto px-6 text-center">
            <span class="bg-white/10 font-semibold px-4 py-1 rounded-full text-sm">Testimoni Alumni</span>
            <h2 class="text-4xl font-bold mt-4">Kisah Sukses Lulusan Kami</h2>
            <p class="mt-2 text-indigo-200 max-w-2xl mx-auto">Dengarkan pengalaman dan pencapaian para alumni yang telah berkarir di berbagai industri.</p>
            <div class="mt-12 max-w-2xl mx-auto bg-white/10 backdrop-blur-lg p-8 rounded-2xl">
                <div class="text-yellow-400 text-2xl">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="mt-4 text-lg italic">"SMK Siding Puri memberikan saya fondasi yang kuat dalam bidang IT. Sekarang saya Membangun Startup Sendiri dengan nama KyySolutions. Dengan Pengalaman dan Dedikasi yang tinggi dari Guru Guru Disana Sehingga saya bisa berada di posisi yang sekarang, Terima Kasih SMK Siding Puri."</p>
                <div class="mt-6 flex items-center justify-center">
                    <div class="bg-pink-500 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mr-4">R</div>
                    <div>
                        <p class="font-bold">Sauki Anna'im</p>
                        <p class="text-sm text-indigo-200">Alumni TKJ 2016 - Owner KyySoutions & KS DigitalPrinting</p>
                    </div>
                </div>
            </div>
                <div class="mt-12 max-w-2xl mx-auto bg-white/10 backdrop-blur-lg p-8 rounded-2xl">
                <div class="text-yellow-400 text-2xl">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="mt-4 text-lg italic">"SMK Siding Puri memberikan saya fondasi yang kuat dalam bidang IT. Sekarang saya Membangun Startup Sendiri dengan nama KyySolutions. Dengan Pengalaman dan Dedikasi yang tinggi dari Guru Guru Disana Sehingga saya bisa berada di posisi yang sekarang, Terima Kasih SMK Siding Puri."</p>
                <div class="mt-6 flex items-center justify-center">
                    <div class="bg-pink-500 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mr-4">R</div>
                    <div>
                        <p class="font-bold">Fauzi</p>
                        <p class="text-sm text-indigo-200">Alumni TKJ 2011 - Owner Icon Service</p>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}

@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Animasi Counter
        const counters = document.querySelectorAll('.counter');
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

        // Efek scroll pada Navbar
        const navbar = document.querySelector('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white/95', 'shadow-lg');
            } else {
                navbar.classList.remove('bg-white/95', 'shadow-lg');
            }
        });
    });
</script>
@endpush
