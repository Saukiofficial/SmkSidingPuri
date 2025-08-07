<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

    {{-- CSS KUSTOM DIPINDAHKAN KE SINI --}}
    <style>
        /* --- KODE UNTUK KURSOR KUSTOM --- */
        body {
            /* Kursor default: lingkaran kosong */
            cursor: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><circle cx="16" cy="16" r="10" stroke="%23667eea" stroke-width="2" fill="none"/></svg>') 16 16, auto;
        }
        a, button, input[type="submit"], .stat-item, [onclick] {
            /* Kursor saat di atas elemen yang bisa diklik */
            /* Menambahkan !important untuk prioritas */
            cursor: url("{{ asset('images/cursor-pointer.png') }}") 4 0, pointer !important;
        }
        /* --- AKHIR KODE KURSOR KUSTOM --- */
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

    @stack('scripts')
</body>
</html>
