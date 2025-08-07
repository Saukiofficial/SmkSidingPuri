@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Kelola Profil Sekolah</h2>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Sekolah</label>
                <input type="text" id="name" name="name" value="{{ old('name', $profile->name ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email Sekolah</label>
                <input type="email" id="email" name="email" value="{{ old('email', $profile->email ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
            <div>
                <label for="phone_number" class="block text-gray-700 font-semibold mb-2">Telepon</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $profile->phone_number ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
             <div>
                <label for="address" class="block text-gray-700 font-semibold mb-2">Alamat</label>
                <input type="text" id="address" name="address" value="{{ old('address', $profile->address ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div class="mt-6">
            <label for="vision" class="block text-gray-700 font-semibold mb-2">Visi</label>
            <textarea id="vision" name="vision" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('vision', $profile->vision ?? '') }}</textarea>
        </div>
        <div class="mt-6">
            <label for="mission" class="block text-gray-700 font-semibold mb-2">Misi</label>
            <textarea id="mission" name="mission" rows="5" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('mission', $profile->mission ?? '') }}</textarea>
        </div>
        <div class="mt-6">
            <label for="history" class="block text-gray-700 font-semibold mb-2">Sejarah</label>
            <textarea id="history" name="history" rows="7" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('history', $profile->history ?? '') }}</textarea>
        </div>
         <div class="mt-6">
            <label for="map_url" class="block text-gray-700 font-semibold mb-2">URL Google Maps</label>
            <input type="url" id="map_url" name="map_url" value="{{ old('map_url', $profile->map_url ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
