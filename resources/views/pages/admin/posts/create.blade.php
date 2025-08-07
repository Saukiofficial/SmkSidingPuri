@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Formulir Tambah Berita Baru</h2>

    {{-- BLOK UNTUK MENAMPILKAN ERROR VALIDASI --}}
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
            <p class="font-bold">Terjadi kesalahan:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Judul</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-semibold mb-2">Konten</label>
            <textarea id="content" name="content" rows="10" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>{{ old('content') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
            <div>
                <label for="type" class="block text-gray-700 font-semibold mb-2">Tipe</label>
                <select name="type" id="type" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="news" {{ old('type') == 'news' ? 'selected' : '' }}>Berita</option>
                    <option value="announcement" {{ old('type') == 'announcement' ? 'selected' : '' }}>Pengumuman</option>
                </select>
            </div>
            <div>
                <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publish</option>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div>
                <label for="featured_image_path" class="block text-gray-700 font-semibold mb-2">Gambar Utama</label>
                <input type="file" id="featured_image_path" name="featured_image_path" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('admin.berita.index') }}" class="text-gray-600 hover:underline py-2 px-4 mr-4">Batal</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Simpan</button>
        </div>
    </form>
</div>
@endsection
