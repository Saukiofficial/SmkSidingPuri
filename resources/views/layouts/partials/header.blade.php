{{-- x-data untuk state Alpine.js (mengelola buka/tutup menu mobile) --}}
<header x-data="{ open: false }" class="bg-white/80 backdrop-blur-lg shadow-sm sticky top-0 z-50 transition-all duration-300">
    <nav class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <!-- Logo dan Nama Sekolah -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" onerror="this.src='https://placehold.co/40x40/6366f1/ffffff?text=SP'" alt="Logo SMK Siding Puri" class="h-10 w-10 object-contain">
                    <span class="text-xl font-bold text-gray-800 tracking-wide">SMK SIDING PURI</span>
                </a>
            </div>

            <!-- Navigasi Desktop -->
            <div class="hidden md:flex items-center space-x-2">
                <a href="{{ route('home') }}" class="px-4 py-2 text-gray-600 font-medium rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 {{ request()->routeIs('home') ? 'text-indigo-600 bg-indigo-50' : '' }}">Home</a>

                <!-- Dropdown Profil -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="px-4 py-2 flex items-center text-gray-600 font-medium rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 {{ request()->routeIs('profile.*') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                        <span>Profil</span>
                        <svg class="w-4 h-4 ml-1 transform transition-transform duration-300" :class="{'rotate-180': dropdownOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-1 z-20 border border-gray-100" style="display: none;">
                        <a href="{{ route('profile.vision-mission') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Visi & Misi</a>
                        <a href="{{ route('profile.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Sejarah</a>
                        <a href="{{ route('profile.organization') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Struktur Organisasi</a>
                        <a href="{{ route('profile.facilities') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Fasilitas</a>
                    </div>
                </div>

                <!-- Dropdown Kesiswaan -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="px-4 py-2 flex items-center text-gray-600 font-medium rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 {{ request()->routeIs('pages.*') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                        <span>Kesiswaan</span>
                        <svg class="w-4 h-4 ml-1 transform transition-transform duration-300" :class="{'rotate-180': dropdownOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-1 z-20 border border-gray-100" style="display: none;">
                        <a href="{{ route('pages.teachers') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Dewan Guru</a>
                        <a href="{{ route('pages.osis') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Pengurus OSIS</a>
                    </div>
                </div>

                <a href="{{ route('academic.calendar') }}" class="px-4 py-2 text-gray-600 font-medium rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 {{ request()->routeIs('academic.*') ? 'text-indigo-600 bg-indigo-50' : '' }}">Akademik</a>
                <a href="{{ route('posts.index') }}" class="px-4 py-2 text-gray-600 font-medium rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 {{ request()->routeIs('posts.*') ? 'text-indigo-600 bg-indigo-50' : '' }}">Berita</a>
                <a href="{{ route('gallery.index') }}" class="px-4 py-2 text-gray-600 font-medium rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 {{ request()->routeIs('gallery.*') ? 'text-indigo-600 bg-indigo-50' : '' }}">Galeri</a>

                <!-- Dropdown Alumni (Diperbarui) -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="px-4 py-2 flex items-center text-gray-600 font-medium rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 {{ request()->routeIs('alumni.*') || request()->routeIs('pages.alumni-board') ? 'text-indigo-600 bg-indigo-50' : '' }}">
                        <span>Alumni</span>
                        <svg class="w-4 h-4 ml-1 transform transition-transform duration-300" :class="{'rotate-180': dropdownOpen}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-1 z-20 border border-gray-100" style="display: none;">
                        <a href="{{ route('alumni.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Jejak Alumni</a>
                        <a href="{{ route('pages.alumni-board') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">Pengurus Alumni</a>
                    </div>
                </div>

                <a href="{{ route('contact.index') }}" class="px-4 py-2 text-gray-600 font-medium rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition duration-300 {{ request()->routeIs('contact.*') ? 'text-indigo-600 bg-indigo-50' : '' }}">Kontak</a>
            </div>

            <!-- Tombol Login -->
            <div class="hidden md:block">
                <a href="{{ route('login') }}" class="bg-indigo-600 text-white font-semibold px-5 py-2.5 rounded-lg hover:bg-indigo-700 transition duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">Login</a>
            </div>

            <!-- Tombol Hamburger Mobile -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-600 focus:outline-none p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path :class="{'hidden': open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path :class="{'hidden': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu Mobile (Diperbarui dengan semua link) -->
        <div x-show="open" x-transition class="md:hidden mt-4 space-y-1">
            <a href="{{ route('home') }}" class="block py-2 px-4 text-sm font-medium rounded-lg hover:bg-gray-100">Home</a>

            <div class="px-4 pt-2 text-xs text-gray-400 uppercase font-bold">Profil</div>
            <a href="{{ route('profile.vision-mission') }}" class="block py-2 pl-6 pr-4 text-sm font-medium rounded-lg hover:bg-gray-100">Visi & Misi</a>
            <a href="{{ route('profile.history') }}" class="block py-2 pl-6 pr-4 text-sm font-medium rounded-lg hover:bg-gray-100">Sejarah</a>
            <a href="{{ route('profile.organization') }}" class="block py-2 pl-6 pr-4 text-sm font-medium rounded-lg hover:bg-gray-100">Struktur Organisasi</a>
            <a href="{{ route('profile.facilities') }}" class="block py-2 pl-6 pr-4 text-sm font-medium rounded-lg hover:bg-gray-100">Fasilitas</a>

            <div class="px-4 pt-2 text-xs text-gray-400 uppercase font-bold">Kesiswaan</div>
            <a href="{{ route('pages.teachers') }}" class="block py-2 pl-6 pr-4 text-sm font-medium rounded-lg hover:bg-gray-100">Dewan Guru</a>
            <a href="{{ route('pages.osis') }}" class="block py-2 pl-6 pr-4 text-sm font-medium rounded-lg hover:bg-gray-100">Pengurus OSIS</a>

            <a href="{{ route('academic.calendar') }}" class="block py-2 px-4 text-sm font-medium rounded-lg hover:bg-gray-100">Akademik</a>
            <a href="{{ route('posts.index') }}" class="block py-2 px-4 text-sm font-medium rounded-lg hover:bg-gray-100">Berita</a>
            <a href="{{ route('gallery.index') }}" class="block py-2 px-4 text-sm font-medium rounded-lg hover:bg-gray-100">Galeri</a>

            <div class="px-4 pt-2 text-xs text-gray-400 uppercase font-bold">Alumni</div>
            <a href="{{ route('alumni.index') }}" class="block py-2 pl-6 pr-4 text-sm font-medium rounded-lg hover:bg-gray-100">Jejak Alumni</a>
            <a href="{{ route('pages.alumni-board') }}" class="block py-2 pl-6 pr-4 text-sm font-medium rounded-lg hover:bg-gray-100">Pengurus Alumni</a>

            <a href="{{ route('contact.index') }}" class="block py-2 px-4 text-sm font-medium rounded-lg hover:bg-gray-100">Kontak</a>
            <div class="pt-2">
                <a href="{{ route('login') }}" class="block w-full text-center bg-indigo-600 text-white font-semibold px-4 py-2.5 rounded-lg hover:bg-indigo-700">Login</a>
            </div>
        </div>
    </nav>
</header>
