@extends('layouts.frontend')

@section('title', 'Berita & Pengumuman')

@section('content')
<div class="py-16">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-12">Berita & Pengumuman</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Loop dari data post asli --}}
            @forelse ($posts as $post)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col">
                <a href="{{ route('posts.show', $post->slug) }}">
                    <img src="{{ $post->featured_image_path ? asset('storage/' . $post->featured_image_path) : 'https://placehold.co/600x400/e2e8f0/6366f1?text=Berita' }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                </a>
                <div class="p-6 flex flex-col flex-grow">
                    <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($post->published_at)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                    <h3 class="font-bold text-xl mt-2 mb-3 flex-grow">
                        <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-indigo-600">{{ $post->title }}</a>
                    </h3>
                    <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100) }}</p>
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-indigo-600 font-semibold hover:underline mt-auto">Baca Selengkapnya &rarr;</a>
                </div>
            </div>
            @empty
            <p class="col-span-full text-center text-gray-500">Belum ada berita yang dipublikasikan.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
