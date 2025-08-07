@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    {{-- Baris untuk menampilkan statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card Total Berita -->
        <div class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">TOTAL BERITA</p>
                <p class="text-4xl font-bold text-gray-800">{{ $postCount ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Artikel yang dipublikasi</p>
            </div>
            <div class="bg-blue-100 text-blue-500 rounded-lg p-4">
                <i class="fas fa-newspaper fa-2x"></i>
            </div>
        </div>

        <!-- Card Pendaftar Baru -->
        <div class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">PENDAFTAR BARU</p>
                <p class="text-4xl font-bold text-gray-800">{{ $pendingAdmissionCount ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Calon siswa bulan ini</p>
            </div>
            <div class="bg-orange-100 text-orange-500 rounded-lg p-4">
                <i class="fas fa-user-plus fa-2x"></i>
            </div>
        </div>

        <!-- Card Jumlah Guru -->
        <div class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">JUMLAH GURU</p>
                <p class="text-4xl font-bold text-gray-800">{{ $teacherCount ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Tenaga pengajar aktif</p>
            </div>
            <div class="bg-green-100 text-green-500 rounded-lg p-4">
                <i class="fas fa-chalkboard-teacher fa-2x"></i>
            </div>
        </div>

        <!-- Card Jumlah Siswa -->
        <div class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center">
            <div>
                <p class="text-gray-500 text-sm">JUMLAH SISWA</p>
                <p class="text-4xl font-bold text-gray-800">{{ $studentCount ?? 0 }}</p>
                <p class="text-xs text-gray-400 mt-1">Siswa terdaftar</p>
            </div>
            <div class="bg-purple-100 text-purple-500 rounded-lg p-4">
                <i class="fas fa-user-graduate fa-2x"></i>
            </div>
        </div>

    </div>

    {{-- Area untuk konten lain di dashboard --}}
    <div class="mt-8 bg-white p-6 rounded-xl shadow-md">
        <div class="flex items-center mb-4 pb-4 border-b">
            <i class="fas fa-history fa-fw mr-3 text-gray-500"></i>
            <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
        </div>
        <div class="text-center text-gray-500 py-10">
            <div class="text-4xl mb-4">
                <i class="far fa-folder-open"></i>
            </div>
            <p>Area ini dapat diisi dengan log aktivitas terbaru, pesan masuk, atau shortcut ke menu-menu penting lainnya.</p>
            <p class="text-sm">Sistem siap untuk menampilkan data real-time aktivitas sekolah.</p>
        </div>
    </div>
@endsection
