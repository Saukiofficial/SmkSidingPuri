<footer class="bg-gray-800 text-white">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- Kolom Tentang Sekolah --}}
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-lg font-semibold mb-4">Tentang Sekolah</h3>
                <p class="text-gray-400">
                    Sekolah kami berkomitmen untuk menyediakan pendidikan berkualitas yang menginspirasi siswa untuk mencapai potensi penuh mereka. Dengan fasilitas modern dan staf pengajar yang berdedikasi.
                </p>
                <div class="mt-6 flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i> Instagram</a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube"></i> YouTube</a>
                </div>
            </div>

            {{-- Kolom Tautan Cepat --}}
            <div>
                <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('profile.facilities') }}" class="text-gray-400 hover:text-white">Fasilitas</a></li>
                    <li><a href="{{ route('posts.index') }}" class="text-gray-400 hover:text-white">Berita Terbaru</a></li>
                    <li><a href="{{ route('admission.index') }}" class="text-gray-400 hover:text-white">Pendaftaran</a></li>
                    <li><a href="{{ route('contact.index') }}" class="text-gray-400 hover:text-white">Hubungi Kami</a></li>
                </ul>
            </div>

            {{-- Kolom Kontak --}}
            <div>
                <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-start">
                        <span class="mr-3 mt-1"><i class="fas fa-map-marker-alt"></i></span>
                        <span>JL. KALIMAS NO.05 RT 00 RW 00. Desa/Kelurahan, Poreh. Kecamatan, Kec. Lenteng. Kabupaten, Kab. Sumenep.</span>
                    </li>
                    <li class="flex items-center">
                        <span class="mr-3"><i class="fas fa-phone"></i></span>
                        <span>081232916758</span>
                    </li>
                    <li class="flex items-center">
                        <span class="mr-3"><i class="fas fa-envelope"></i></span>
                        <span>kontak@namasekolah.sch.id</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bagian Copyright --}}
        <div class="mt-12 border-t border-gray-700 pt-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} SMK SIDING PURI. Semua Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>

{{-- Font Awesome untuk ikon sosial media --}}
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
