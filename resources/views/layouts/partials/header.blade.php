{{-- Modern Professional Header - Fixed and Optimized --}}
<header x-data="{ open: false, scrolled: false }"
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="scrolled ? 'bg-white/95 shadow-xl' : 'bg-white/90 shadow-lg'"
        class="backdrop-blur-xl sticky top-0 z-50 transition-all duration-500 border-b border-gray-100/50">

    <!-- Enhanced gradient background -->
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-50/30 via-purple-50/20 to-pink-50/30 pointer-events-none"></div>

    <nav class="container mx-auto px-4 lg:px-8 relative">
        <div class="flex items-center justify-between h-16">

            <!-- Logo Section -->
            <div class="flex items-center group">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 transition-all duration-300 hover:scale-105">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-xl blur-sm opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
                        <img src="{{ asset('images/logo.png') }}"
                             onerror="this.src='https://placehold.co/40x40/6366f1/ffffff?text=SP'"
                             alt="Logo SMK Siding Puri"
                             class="h-10 w-10 object-contain relative z-10 drop-shadow-sm">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-bold bg-gradient-to-r from-indigo-700 to-purple-600 bg-clip-text text-transparent">
                            SMK SIDING PURI
                        </span>
                        <span class="text-xs text-gray-500 -mt-1 hidden sm:block">Excellence in Education</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-1">

                <!-- Home Link -->
                <a href="{{ route('home') }}"
                   class="relative px-4 py-2 text-gray-700 font-medium rounded-xl transition-all duration-300 hover:text-indigo-600 group {{ request()->routeIs('home') ? 'text-indigo-600' : '' }}">
                    <span class="relative z-10">Home</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl opacity-0 group-hover:opacity-100 transition-all duration-300 {{ request()->routeIs('home') ? 'opacity-100' : '' }}"></div>
                    @if(request()->routeIs('home'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></div>
                    @endif
                </a>

                <!-- Profile Dropdown -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen"
                            class="relative px-4 py-2 flex items-center text-gray-700 font-medium rounded-xl transition-all duration-300 hover:text-indigo-600 group {{ request()->routeIs('profile.*') ? 'text-indigo-600' : '' }}">
                        <span class="relative z-10">Profile</span>
                        <svg class="w-4 h-4 ml-1 transform transition-all duration-300"
                             :class="{'rotate-180': dropdownOpen}"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl opacity-0 group-hover:opacity-100 transition-all duration-300 {{ request()->routeIs('profile.*') ? 'opacity-100' : '' }}"></div>
                        @if(request()->routeIs('profile.*'))
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></div>
                        @endif
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                         class="absolute right-0 mt-2 w-56 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl py-2 z-50 border border-gray-100/50"
                         style="display: none;">
                        <div class="absolute inset-0 bg-gradient-to-br from-white via-indigo-50/20 to-purple-50/20 rounded-2xl"></div>
                        <div class="relative z-10 space-y-1 px-2">
                            @foreach([
                                ['route' => 'profile.vision-mission', 'name' => 'Visi & Misi'],
                                ['route' => 'profile.history', 'name' => 'Sejarah'],
                                ['route' => 'profile.organization', 'name' => 'Struktur Organisasi'],
                                ['route' => 'profile.facilities', 'name' => 'Fasilitas']
                            ] as $item)
                            <a href="{{ route($item['route']) }}"
                               class="flex items-center px-4 py-2.5 text-sm text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-600 transition-all duration-200">
                                {{ $item['name'] }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Kesiswaan Dropdown -->
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen"
                            class="relative px-4 py-2 flex items-center text-gray-700 font-medium rounded-xl transition-all duration-300 hover:text-indigo-600 group {{ request()->routeIs('pages.*') ? 'text-indigo-600' : '' }}">
                        <span class="relative z-10">Kesiswaan</span>
                        <svg class="w-4 h-4 ml-1 transform transition-all duration-300"
                             :class="{'rotate-180': dropdownOpen}"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl opacity-0 group-hover:opacity-100 transition-all duration-300 {{ request()->routeIs('pages.*') ? 'opacity-100' : '' }}"></div>
                        @if(request()->routeIs('pages.*'))
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></div>
                        @endif
                    </button>

                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                         class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl py-2 z-50 border border-gray-100/50"
                         style="display: none;">
                        <div class="absolute inset-0 bg-gradient-to-br from-white via-indigo-50/20 to-purple-50/20 rounded-2xl"></div>
                        <div class="relative z-10 space-y-1 px-2">
                            @foreach([
                                ['route' => 'pages.teachers', 'name' => 'Dewan Guru'],
                                ['route' => 'pages.osis', 'name' => 'Pengurus OSIS']
                            ] as $item)
                            <a href="{{ route($item['route']) }}"
                               class="flex items-center px-4 py-2.5 text-sm text-gray-700 rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-600 transition-all duration-200">
                                {{ $item['name'] }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Regular Navigation Links -->
                @foreach([
                    ['route' => 'academic.calendar', 'name' => 'Akademik', 'pattern' => 'academic.*'],
                    ['route' => 'posts.index', 'name' => 'Berita', 'pattern' => 'posts.*'],
                    ['route' => 'gallery.index', 'name' => 'Galeri', 'pattern' => 'gallery.*'],
                    ['route' => 'alumni.index', 'name' => 'Alumni', 'pattern' => 'alumni.*'],
                    ['route' => 'contact.index', 'name' => 'Kontak', 'pattern' => 'contact.*']
                ] as $nav)
                <a href="{{ route($nav['route']) }}"
                   class="relative px-4 py-2 text-gray-700 font-medium rounded-xl transition-all duration-300 hover:text-indigo-600 group {{ request()->routeIs($nav['pattern']) ? 'text-indigo-600' : '' }}">
                    <span class="relative z-10">{{ $nav['name'] }}</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl opacity-0 group-hover:opacity-100 transition-all duration-300 {{ request()->routeIs($nav['pattern']) ? 'opacity-100' : '' }}"></div>
                    @if(request()->routeIs($nav['pattern']))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></div>
                    @endif
                </a>
                @endforeach
            </div>

            <!-- Fixed Login Button -->
            <div class="hidden lg:flex">
                <a href="{{ route('login') }}"
                   class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold px-5 py-2 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Login
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button @click="open = !open"
                        class="p-2 text-gray-600 focus:outline-none rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'block': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path :class="{'hidden': !open, 'block': open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 max-h-0"
             x-transition:enter-end="opacity-100 max-h-screen"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 max-h-screen"
             x-transition:leave-end="opacity-0 max-h-0"
             class="lg:hidden overflow-hidden">

            <div class="py-4 px-2 space-y-1 bg-gradient-to-br from-white/80 via-indigo-50/30 to-purple-50/30 backdrop-blur-sm rounded-2xl mt-4 border border-gray-100/50">

                <a href="{{ route('home') }}"
                   class="block py-3 px-4 text-gray-700 font-medium rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-600 transition-all duration-200">
                    Home
                </a>

                <div class="px-4 pt-3 pb-1">
                    <span class="text-xs text-gray-500 uppercase font-bold tracking-wider">Profile Sekolah</span>
                </div>
                <div class="space-y-1 pl-4">
                    @foreach([
                        ['route' => 'profile.vision-mission', 'name' => 'Visi & Misi'],
                        ['route' => 'profile.history', 'name' => 'Sejarah'],
                        ['route' => 'profile.organization', 'name' => 'Struktur Organisasi'],
                        ['route' => 'profile.facilities', 'name' => 'Fasilitas']
                    ] as $item)
                    <a href="{{ route($item['route']) }}"
                       class="block py-2.5 px-4 text-sm text-gray-600 rounded-lg hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-600 transition-all duration-200">
                        {{ $item['name'] }}
                    </a>
                    @endforeach
                </div>

                <div class="px-4 pt-3 pb-1">
                    <span class="text-xs text-gray-500 uppercase font-bold tracking-wider">Kesiswaan</span>
                </div>
                <div class="space-y-1 pl-4">
                    @foreach([
                        ['route' => 'pages.teachers', 'name' => 'Dewan Guru'],
                        ['route' => 'pages.osis', 'name' => 'Pengurus OSIS']
                    ] as $item)
                    <a href="{{ route($item['route']) }}"
                       class="block py-2.5 px-4 text-sm text-gray-600 rounded-lg hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-600 transition-all duration-200">
                        {{ $item['name'] }}
                    </a>
                    @endforeach
                </div>

                <div class="space-y-1 pt-2">
                    @foreach([
                        ['route' => 'academic.calendar', 'name' => 'Akademik'],
                        ['route' => 'posts.index', 'name' => 'Berita'],
                        ['route' => 'gallery.index', 'name' => 'Galeri'],
                        ['route' => 'alumni.index', 'name' => 'Alumni'],
                        ['route' => 'contact.index', 'name' => 'Kontak']
                    ] as $nav)
                    <a href="{{ route($nav['route']) }}"
                       class="block py-3 px-4 text-gray-700 font-medium rounded-xl hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 hover:text-indigo-600 transition-all duration-200">
                        {{ $nav['name'] }}
                    </a>
                    @endforeach
                </div>

                <div class="pt-4 px-4">
                    <a href="{{ route('login') }}"
                       class="block w-full text-center bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold px-4 py-3 rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
