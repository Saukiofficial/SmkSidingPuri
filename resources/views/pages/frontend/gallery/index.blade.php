@extends('layouts.frontend')

@section('title', 'Galeri Sekolah')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-12">Galeri Kegiatan Sekolah</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Menampilkan data album dari database --}}
            @forelse ($albums as $album)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden group">
                {{-- Kita belum membuat halaman detail album, jadi linknya masih '#' --}}
                <a href="#">
                    <div class="relative">
                        <img src="{{ $album->galleries->first() ? asset('storage/' . $album->galleries->first()->file_path) : 'https://placehold.co/600x400/e2e8f0/6366f1?text=No+Image' }}" alt="{{ $album->name }}" class="w-full h-56 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-lg font-bold">Lihat Album</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800">{{ $album->name }}</h3>
                        <p class="text-sm text-gray-500">{{ $album->galleries->count() }} Foto</p>
                    </div>
                </a>
            </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada album yang dipublikasikan.</p>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="mt-12">
            {{ $albums->links() }}
        </div>
    </div>
</div>
@endsection
