@extends('layouts.frontend')

@section('title', 'Data Alumni & Testimoni')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-12">Alumni & Testimoni</h1>

        {{-- Bagian Testimoni --}}
        @if(isset($testimonials) && $testimonials->isNotEmpty())
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-8">Apa Kata Mereka?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <p class="text-gray-600 italic">"{{ $testimonial->content }}"</p>
                    <div class="mt-4 flex items-center">
                        <img src="{{ $testimonial->alumnus->photo_path ? asset('storage/' . $testimonial->alumnus->photo_path) : 'https://placehold.co/50x50/e2e8f0/6366f1?text='.substr($testimonial->alumnus->name, 0, 1) }}" alt="Foto Alumni" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <div>
                            <p class="font-bold text-gray-800">{{ $testimonial->alumnus->name }}</p>
                            <p class="text-sm text-gray-500">Lulusan {{ $testimonial->alumnus->graduation_year }} - {{ $testimonial->alumnus->occupation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Bagian Daftar Alumni --}}
        <div>
            <h2 class="text-3xl font-bold text-center mb-8">Jejak Alumni</h2>
            <div class="bg-white p-6 rounded-lg shadow-lg overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            {{-- KOLOM NAMA LENGKAP DIPERBARUI UNTUK MENCAKUP FOTO --}}
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Nama Lengkap</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Tahun Lulus</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Pekerjaan / Profesi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @if(isset($alumni))
                            @forelse($alumni as $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                {{-- FOTO DITAMPILKAN DI SINI --}}
                                <td class="py-3 px-4 flex items-center">
                                    <img src="{{ $item->photo_path ? asset('storage/' . $item->photo_path) : 'https://placehold.co/40x40/e2e8f0/6366f1?text='.substr($item->name, 0, 1) }}" alt="Foto {{ $item->name }}" class="w-10 h-10 rounded-full mr-4 object-cover">
                                    <span>{{ $item->name }}</span>
                                </td>
                                <td class="py-3 px-4">{{ $item->graduation_year }}</td>
                                <td class="py-3 px-4">{{ $item->occupation ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4">Belum ada data alumni yang dipublikasikan.</td>
                            </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- Link Pagination --}}
            @if(isset($alumni))
            <div class="mt-6">
                {{ $alumni->links() }}
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
