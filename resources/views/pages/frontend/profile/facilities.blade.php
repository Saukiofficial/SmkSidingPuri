@extends('layouts.frontend')

@section('title', 'Fasilitas Sekolah')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-12">Fasilitas Sekolah</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Looping data fasilitas asli dari database --}}
            @forelse ($facilities as $facility)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="{{ asset('storage/' . $facility->image_path) }}" alt="{{ $facility->name }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2">{{ $facility->name }}</h3>
                    <p class="text-gray-600">{{ $facility->description }}</p>
                </div>
            </div>
            @empty
            <p class="col-span-full text-center text-gray-500">Data fasilitas belum ditambahkan.</p>
            @endforelse
        </div>
        <div class="mt-12">
            {{ $facilities->links() }}
        </div>
    </div>
</div>
@endsection
