@extends('layouts.frontend')

@section('title', $post->title)

@section('content')
<div class="py-16">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Konten Utama Berita --}}
            <div class="lg:col-span-2 bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
                <div class="text-gray-500 mb-6">
                    <span>Dipublikasikan pada: {{ \Carbon\Carbon::parse($post->published_at)->locale('id')->isoFormat('D MMMM YYYY') }}</span> | <span>Oleh: {{ $post->author->name }}</span>
                </div>
                @if($post->featured_image_path)
                <img src="{{ asset('storage/' . $post->featured_image_path) }}" alt="{{ $post->title }}" class="w-full rounded-md mb-8">
                @endif
                <div class="prose max-w-none text-gray-700">
                    {!! $post->content !!}
                </div>
            </div>

            {{-- Sidebar Berita Terbaru --}}
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-6 border-b pb-4">Berita Lainnya</h3>
                    <ul class="space-y-4">
                        @forelse ($latestPosts as $latestPost)
                        <li class="flex items-center space-x-4">
                             <a href="{{ route('posts.show', $latestPost->slug) }}">
                                <img src="{{ $latestPost->featured_image_path ? asset('storage/' . $latestPost->featured_image_path) : 'https://placehold.co/100x100/e2e8f0/6366f1?text=Thumb' }}" class="w-20 h-20 rounded-md object-cover">
                            </a>
                            <div>
                                <a href="{{ route('posts.show', $latestPost->slug) }}" class="font-semibold text-gray-800 hover:text-indigo-600">{{ $latestPost->title }}</a>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($latestPost->published_at)->locale('id')->isoFormat('D MMMM Y') }}</p>
                            </div>
                        </li>
                        @empty
                        <p class="text-gray-500">Tidak ada berita lain.</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
