@extends('layouts.frontend')

@section('title', 'Selamat Datang di SMK Siding Puri')

{{-- Menambahkan CSS kustom untuk animasi dan style dari referensi --}}
@push('styles')
<style>
    /* Menghapus .hero-section karena sekarang menggunakan inline style */
    .highlight-text {
        background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .stat-number {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .stat-item {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        position: relative;
        overflow: hidden;
    }
    .stat-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .stat-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(102, 126, 234, 0.2);
    }
    .testimonial-section {
        background: linear-gradient(135deg, #6B73FF 0%, #4D45B2 100%);
    }
    @keyframes gentle-bounce {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    .animate-gentle-bounce {
        animation: gentle-bounce 3s ease-in-out infinite;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section dengan tinggi yang disesuaikan -->
    <section class="relative h-[650px] flex items-center overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('images/gedung-sekolah2.png') }}');">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-800/80 to-purple-900/80"></div>

        <div class="container mx-auto px-6 relative z-10 max-w-7xl">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <!-- Kolom Teks -->
                <div class="text-center md:text-left text-white">
                    <h1 class="text-4xl lg:text-6xl font-extrabold leading-tight tracking-tight text-shadow-lg">
                        Membangun <span class="highlight-text">Generasi</span><br>
                        Unggul Berkarakter
                    </h1>
                    <p class="mt-4 text-lg lg:text-xl text-indigo-200 max-w-xl mx-auto md:mx-0">
                        Pendidikan berkualitas untuk masa depan cerah anak bangsa dengan teknologi modern dan nilai-nilai luhur.
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                        <a href="{{ route('admission.index') }}" class="bg-white text-indigo-700 font-bold py-3 px-8 rounded-full hover:bg-indigo-100 transition duration-300 shadow-lg w-full sm:w-auto transform hover:scale-105">
                            Daftar Sekarang
                        </a>
                        <a href="{{ route('profile.vision-mission') }}" class="text-white font-semibold py-3 px-8 border-2 border-white/30 rounded-full hover:bg-white/10 transition duration-300 w-full sm:w-auto backdrop-blur-sm">
                            Tentang Kami
                        </a>
                    </div>
                </div>
                <!-- Kolom Gambar Karakter Siswa -->
                <div class="hidden md:flex justify-center">
                    {{--  <img src="{{ asset('images/siswa.png') }}"alt="Karakter Siswi SMK" class="h-80 lg:h-96 drop-shadow-2xl animate-gentle-bounce bounce-delay">  --}}
                    <img src="{{ asset('images/siswa-siswi.png') }}" alt="Karakter Siswa SMK" class="max-w-sm lg:max-w-md drop-shadow-2xl animate-gentle-bounce">
                </div>
            </div>
        </div>
    </section>

    <!-- Section Statistik Animasi -->
    <section id="stats-section" class="bg-white py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div class="p-8 stat-item rounded-2xl transition-all duration-300">
                    <div class="stat-number text-5xl font-bold counter" data-target="{{ $studentCount ?? 0 }}">0</div>
                    <p class="text-gray-600 font-semibold mt-2 text-lg">Siswa Terdaftar</p>
                </div>
                <div class="p-8 stat-item rounded-2xl transition-all duration-300">
                    <div class="stat-number text-5xl font-bold counter" data-target="{{ $teacherCount ?? 0 }}">0</div>
                    <p class="text-gray-600 font-semibold mt-2 text-lg">Tenaga Pengajar</p>
                </div>
                <div class="p-8 stat-item rounded-2xl transition-all duration-300">
                    <div class="stat-number text-5xl font-bold counter" data-target="{{ $extracurricularCount ?? 0 }}">0</div>
                    <p class="text-gray-600 font-semibold mt-2 text-lg">Ekstrakurikuler</p>
                </div>
                 <div class="p-8 stat-item rounded-2xl transition-all duration-300">
                    <div class="stat-number text-5xl font-bold counter" data-target="98">0%</div>
                    <p class="text-gray-600 font-semibold mt-2 text-lg">Tingkat Kelulusan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Pesan Kepala Sekolah -->
    <section class="bg-slate-50 py-24">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="flex justify-center">
                    <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-8 rounded-3xl transform -rotate-6">
                         <img src="{{ asset('images/kepalasekolah.png') }}"alt="Kepala Sekolah" class="w-64 h-auto transform rotate-6">
                    </div>
                </div>
                <div>
                    <span class="text-indigo-600 bg-indigo-100 font-semibold px-4 py-1 rounded-full text-sm">Pesan Kepala Sekolah</span>
                    <h2 class="text-4xl font-bold text-gray-800 mt-4">Visi Pendidikan Masa Depan</h2>
                    <p class="mt-4 text-gray-600 leading-relaxed">"SMK Siding Puri berkomitmen menciptakan generasi yang tidak hanya unggul secara akademik, tetapi juga berkarakter mulia. Kami mempersiapkan siswa dengan keterampilan abad 21, jiwa entrepreneurship, dan nilai-nilai Pancasila yang kuat."</p>
                    <div class="mt-6">
                        <p class="font-bold text-gray-900">Drs. Ahmad Supriyanto, M.Pd</p>
                        <p class="text-gray-500">Kepala Sekolah SMK Siding Puri</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Program Keahlian -->
    <section class="bg-white py-24">
        <div class="container mx-auto px-6 text-center">
            <span class="text-indigo-600 bg-indigo-100 font-semibold px-4 py-1 rounded-full text-sm">Program Keahlian</span>
            <h2 class="text-4xl font-bold text-gray-800 mt-4">Pilihan Program Unggulan</h2>
            <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Berbagai program keahlian yang sesuai dengan kebutuhan industri dan masa depan.</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12 text-left">
                <!-- Jurusan TKI -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <i class="fas fa-laptop-code text-3xl text-indigo-500 bg-indigo-100 p-4 rounded-full"></i>
                    <h3 class="text-xl font-bold mt-4">Teknik Komputer dan Informatika (TKI)</h3>
                    <p class="text-gray-600 mt-2">Mempelajari rekayasa perangkat lunak, jaringan komputer, dan multimedia.</p>
                    <ul class="mt-4 space-y-2 text-sm text-gray-500">
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Sertifikasi Internasional</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Lab Modern</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Magang Industri</li>
                    </ul>
                </div>
                <!-- Jurusan ATPH -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <i class="fas fa-seedling text-3xl text-green-500 bg-green-100 p-4 rounded-full"></i>
                    <h3 class="text-xl font-bold mt-4">Agribisnis Tanaman Pangan dan Hortikultura (ATPH)</h3>
                    <p class="text-gray-600 mt-2">Mempelajari budidaya tanaman, pengolahan hasil pertanian, dan kewirausahaan.</p>
                     <ul class="mt-4 space-y-2 text-sm text-gray-500">
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Praktik Langsung</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Instruktur Berpengalaman</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Peluang Kerja Tinggi</li>
                    </ul>
                </div>
                 <!-- Jurusan Contoh -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <i class="fas fa-cogs text-3xl text-orange-500 bg-orange-100 p-4 rounded-full"></i>
                    <h3 class="text-xl font-bold mt-4">Teknik Mesin</h3>
                    <p class="text-gray-600 mt-2">Mempelajari perancangan, manufaktur, dan pemeliharaan sistem mekanik.</p>
                     <ul class="mt-4 space-y-2 text-sm text-gray-500">
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Software Terkini</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Proyek Nyata</li>
                        <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i>Kerjasama DU/DI</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="text-center">
                <span class="text-indigo-600 bg-indigo-100 font-semibold px-4 py-1 rounded-full text-sm">Info Terkini</span>
                <h2 class="text-4xl font-bold text-gray-800 mt-4">Berita & Informasi Terbaru</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Ikuti perkembangan dan kegiatan terbaru dari sekolah kami.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">

                {{-- Loop data berita asli dari database --}}
                @forelse ($latestPosts as $post)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col group">
                    <a href="{{ route('posts.show', $post->slug) }}" class="block overflow-hidden">
                        <img src="{{ $post->featured_image_path ? asset('storage/' . $post->featured_image_path) : 'https://placehold.co/600x400/e2e8f0/6366f1?text=Berita' }}" alt="{{ $post->title }}" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                    </a>
                    <div class="p-6 flex flex-col flex-grow">
                        <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($post->published_at)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                        <h3 class="font-bold text-xl mt-2 mb-3 flex-grow">
                             <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-indigo-600 transition-colors">{{ $post->title }}</a>
                        </h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}</p>
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-indigo-600 font-semibold hover:underline mt-auto self-start">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
                @empty
                <p class="col-span-full text-center text-gray-500">Belum ada berita yang dipublikasikan.</p>
                @endforelse

            </div>
            <div class="text-center mt-12">
                <a href="{{ route('posts.index') }}" class="bg-indigo-600 text-white font-bold py-3 px-8 rounded-full hover:bg-indigo-700 transition duration-300 shadow-md">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    <!-- Section Testimoni Alumni -->
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
        </div>
    </section>

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
