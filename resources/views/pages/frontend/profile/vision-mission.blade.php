@extends('layouts.frontend')

@section('title', 'Visi & Misi Sekolah')

@section('content')
<div class="bg-white py-16">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-12">Visi & Misi</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Visi --}}
            <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 text-indigo-600">Visi</h2>
                {{-- Menampilkan data Visi dari database --}}
                <p class="text-gray-700 leading-relaxed">
                    {{ $profile->vision ?? 'Visi sekolah belum diatur.' }}
                </p>
            </div>
            {{-- Misi --}}
            <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                <h2 class="text-3xl font-semibold mb-4 text-indigo-600">Misi</h2>
                {{-- Menampilkan data Misi dari database --}}
                <div class="text-gray-700 space-y-3 prose">
                    {!! nl2br(e($profile->mission ?? 'Misi sekolah belum diatur.')) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
