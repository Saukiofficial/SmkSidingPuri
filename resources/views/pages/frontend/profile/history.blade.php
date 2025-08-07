@extends('layouts.frontend')

@section('title', 'Sejarah Sekolah')

@section('content')
<div class="py-16">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-12">Sejarah Sekolah</h1>
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <img src="{{ asset('images/gedung-sekolah2.png') }}" alt="Sejarah Sekolah" class="w-full h-auto rounded-md mb-8">
            <div class="prose max-w-none text-gray-700">
                {{-- Menampilkan data Sejarah dari database --}}
                {!! nl2br(e($profile->history ?? 'Sejarah sekolah belum diatur.')) !!}
            </div>
        </div>
    </div>
</div>
@endsection
