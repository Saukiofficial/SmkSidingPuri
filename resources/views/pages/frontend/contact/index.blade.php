@extends('layouts.frontend')

@section('title', 'Hubungi Kami')

@section('content')
<div class="py-16">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-12">Hubungi Kami</h1>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                {{-- Form Kontak --}}
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-6">Kirim Pesan</h2>

                    {{-- Notifikasi Sukses --}}
                    {{-- @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Sukses!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif --}}

                    <form action="#" method="POST">
                        {{-- @csrf --}}
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Alamat Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Pesan Anda</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 px-6 rounded-md hover:bg-indigo-700 transition duration-300">Kirim Pesan</button>
                        </div>
                    </form>
                </div>

                {{-- Info & Peta --}}
                <div class="bg-gray-50 p-8">
                    <h2 class="text-2xl font-bold mb-6">Informasi Kontak</h2>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-indigo-600 w-6 mt-1"></i>
                            <span>JL. KALIMAS NO. 05RT 0RW 0. Desa/Kelurahan, Poreh. Kecamatan, Kec. Lenteng. Kabupaten/Kota, Kab. Sumenep.</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-indigo-600 w-6"></i>
                            <span>(021) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-indigo-600 w-6"></i>
                            <span>kontak@namasekolah.sch.id</span>
                        </li>
                    </ul>
                    <div class="mt-8">
                        <h3 class="text-xl font-bold mb-4">Lokasi Kami</h3>
                        <div class="w-full h-64 rounded-md overflow-hidden">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.7615049906813!2d113.78524467584387!3d-7.037291992964699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e738a2e0b955%3A0x4d94ca92938064e9!2sSMK%20Siding%20Puri%20Lenteng%20Sumenep!5e0!3m2!1sen!2sid!4v1754487258491!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
