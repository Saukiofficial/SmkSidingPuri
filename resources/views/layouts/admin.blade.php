<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
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
    {{-- Alpine.js untuk interaktivitas dropdown --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-100 font-inter">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 flex-shrink-0 bg-indigo-800 text-indigo-100 flex flex-col">
            <div class="h-20 flex items-center justify-center px-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/logo.png') }}" onerror="this.src='https://placehold.co/40x40/ffffff/6366f1?text=SP'" alt="Logo Sekolah" class="h-10 w-10">
                    <div class="text-left">
                        <h1 class="text-base font-bold text-white">Admin Panel</h1>
                        <p class="text-xs text-indigo-300">SMK Siding Puri</p>
                    </div>
                </a>
            </div>
            <nav class="flex-grow px-4 py-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-tachometer-alt fa-fw mr-3"></i> Dashboard
                </a>
                <a href="{{ route('admin.profile.edit') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.profile.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-school fa-fw mr-3"></i> Profil Sekolah
                </a>
                <a href="{{ route('admin.struktur-organisasi.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.struktur-organisasi.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-sitemap fa-fw mr-3"></i> Struktur Organisasi
                </a>
                <a href="{{ route('admin.kalender-akademik.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.kalender-akademik.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-calendar-alt fa-fw mr-3"></i> Kalender Akademik
                </a>
                <a href="{{ route('admin.ppdb.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.ppdb.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-user-plus fa-fw mr-3"></i> Data PPDB
                </a>
                <a href="{{ route('admin.berita.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.berita.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-newspaper fa-fw mr-3"></i> Berita
                </a>
                <a href="{{ route('admin.galeri.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.galeri.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-images fa-fw mr-3"></i> Galeri
                </a>
                <a href="{{ route('admin.fasilitas.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.fasilitas.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-building fa-fw mr-3"></i> Fasilitas
                </a>
                 <a href="{{ route('admin.data-guru.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.data-guru.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-chalkboard-teacher fa-fw mr-3"></i> Data Guru
                </a>
                 <a href="{{ route('admin.data-siswa.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.data-siswa.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-users fa-fw mr-3"></i> Data Siswa
                </a>
                <a href="{{ route('admin.alumni.index') }}" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 {{ request()->routeIs('admin.alumni.*') ? 'bg-indigo-600 text-white' : 'hover:bg-indigo-700' }}">
                    <i class="fas fa-user-graduate fa-fw mr-3"></i> Kelola Alumni
                </a>
                <a href="#" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 hover:bg-indigo-700">
                    <i class="fas fa-users-cog fa-fw mr-3"></i> Manajemen User (coming Soon)
                </a>
                <a href="#" class="mt-2 flex items-center px-4 py-2.5 rounded-lg transition duration-200 hover:bg-indigo-700">
                    <i class="fas fa-chart-line fa-fw mr-3"></i> Laporan (coming Soon)
                </a>
            </nav>
            {{-- TOMBOL LOGOUT DI SINI DIHAPUS --}}
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-sm h-20 flex items-center justify-between px-8">
                <div class="text-gray-800">
                    <h1 class="text-2xl font-bold">@yield('title')</h1>
                </div>
                {{-- BAGIAN PROFIL ADMIN DIPERBARUI MENJADI DROPDOWN --}}
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="flex items-center focus:outline-none">
                        <div class="text-right mr-4">
                            <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500">Administrator</p>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-indigo-600 text-white flex items-center justify-center text-xl font-bold overflow-hidden">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Foto Profil" class="w-full h-full object-cover">
                            @else
                                {{ substr(Auth::user()->name, 0, 1) }}
                            @endif
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl py-2 z-20 border border-gray-100">

                        <div class="px-4 py-2 border-b">
                            <p class="font-bold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                        </div>

                       <a href="{{ route('admin.my-profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">
                            <i class="fas fa-user-edit fa-fw mr-3"></i> Edit Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700">
                                <i class="fas fa-sign-out-alt fa-fw mr-3"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>
            <main class="flex-1 p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
