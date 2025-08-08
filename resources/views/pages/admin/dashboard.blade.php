@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    {{-- Baris untuk menampilkan statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto">

        <!-- Card Total Berita -->
        <div class="group bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-blue-100">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center mb-2">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                        <p class="text-blue-700 text-xs font-semibold tracking-wide uppercase">Total Berita</p>
                    </div>
                    <p class="text-3xl lg:text-4xl font-bold text-blue-900 mb-1">{{ $postCount ?? 0 }}</p>
                    <p class="text-xs text-blue-600">Artikel yang dipublikasi</p>
                </div>
                <div class="bg-blue-500 bg-opacity-10 group-hover:bg-opacity-20 transition-all duration-300 rounded-xl p-3 ml-4">
                    <i class="fas fa-newspaper text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Card Pendaftar Baru -->
        <div class="group bg-gradient-to-br from-orange-50 to-orange-100 hover:from-orange-100 hover:to-orange-200 p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-orange-100">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center mb-2">
                        <div class="w-2 h-2 bg-orange-500 rounded-full mr-2"></div>
                        <p class="text-orange-700 text-xs font-semibold tracking-wide uppercase">Pendaftar Baru</p>
                    </div>
                    <p class="text-3xl lg:text-4xl font-bold text-orange-900 mb-1">{{ $pendingAdmissionCount ?? 0 }}</p>
                    <p class="text-xs text-orange-600">Calon siswa bulan ini</p>
                </div>
                <div class="bg-orange-500 bg-opacity-10 group-hover:bg-opacity-20 transition-all duration-300 rounded-xl p-3 ml-4">
                    <i class="fas fa-user-plus text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Guru -->
        <div class="group bg-gradient-to-br from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-green-100">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center mb-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                        <p class="text-green-700 text-xs font-semibold tracking-wide uppercase">Jumlah Guru</p>
                    </div>
                    <p class="text-3xl lg:text-4xl font-bold text-green-900 mb-1">{{ $teacherCount ?? 0 }}</p>
                    <p class="text-xs text-green-600">Tenaga pengajar aktif</p>
                </div>
                <div class="bg-green-500 bg-opacity-10 group-hover:bg-opacity-20 transition-all duration-300 rounded-xl p-3 ml-4">
                    <i class="fas fa-chalkboard-teacher text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Card Jumlah Siswa -->
        <div class="group bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-purple-100">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center mb-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mr-2"></div>
                        <p class="text-purple-700 text-xs font-semibold tracking-wide uppercase">Jumlah Siswa</p>
                    </div>
                    <p class="text-3xl lg:text-4xl font-bold text-purple-900 mb-1">{{ $studentCount ?? 0 }}</p>
                    <p class="text-xs text-purple-600">Siswa terdaftar</p>
                </div>
                <div class="bg-purple-500 bg-opacity-10 group-hover:bg-opacity-20 transition-all duration-300 rounded-xl p-3 ml-4">
                    <i class="fas fa-user-graduate text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- Area untuk konten lain di dashboard --}}
    <div class="mt-6 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-5xl mx-auto">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-5 border-b border-gray-100">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-history text-white text-lg"></i>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Aktivitas Terbaru</h2>
            </div>
        </div>
        <div class="p-8">
            <div class="text-center py-12">
                <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="far fa-folder-open text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Belum Ada Aktivitas</h3>
                <p class="text-gray-500 leading-relaxed max-w-lg mx-auto mb-2">Area ini dapat diisi dengan log aktivitas terbaru, pesan masuk, atau shortcut ke menu-menu penting lainnya.</p>
                <p class="text-sm text-gray-400">Sistem siap untuk menampilkan data real-time aktivitas sekolah.</p>
            </div>
        </div>
    </div>

    {{-- Custom Styles untuk Enhancement Visual --}}
    <style>
        /* Responsive Grid Improvements */
        @media (max-width: 640px) {
            .grid {
                gap: 1rem;
            }
        }

        /* Card Hover Effects */
        .group:hover {
            transform: translateY(-2px);
        }

        /* Enhanced Shadow System */
        .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .hover\:shadow-xl:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Smooth Transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }

        /* Icon Container Animations */
        .group:hover .bg-opacity-10 {
            transform: scale(1.05);
        }

        /* Typography Enhancements */
        .tracking-wide {
            letter-spacing: 0.025em;
        }

        /* Mobile Responsive Typography */
        @media (max-width: 640px) {
            .text-3xl {
                font-size: 2.25rem;
            }
            .lg\:text-4xl {
                font-size: 2.25rem;
            }
        }

        /* Tablet Responsive */
        @media (min-width: 641px) and (max-width: 1024px) {
            .sm\:grid-cols-2 > div {
                min-height: 160px;
            }
        }

        /* Desktop Enhancements - Control Card Width */
        @media (min-width: 1024px) {
            .lg\:grid-cols-4 {
                max-width: 1200px;
                grid-template-columns: repeat(4, minmax(250px, 280px));
                justify-content: center;
            }
            .lg\:grid-cols-4 > div {
                min-height: 160px;
                width: 100%;
            }
        }

        /* Large Desktop */
        @media (min-width: 1280px) {
            .lg\:grid-cols-4 {
                grid-template-columns: repeat(4, 280px);
                gap: 1.5rem;
            }
            .lg\:grid-cols-4 > div {
                min-height: 170px;
            }
        }

        /* Extra Large Desktop */
        @media (min-width: 1536px) {
            .lg\:grid-cols-4 {
                grid-template-columns: repeat(4, 300px);
                gap: 2rem;
            }
        }
    </style>
@endsection
