@extends('layouts.admin')

@section('title', 'Kelola Berita')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Berita & Pengumuman</h2>
        <a href="{{ route('admin.berita.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
            <i class="fas fa-plus mr-2"></i> Tambah Berita
        </a>
    </div>

    {{-- NOTIFIKASI SUKSES DITAMBAHKAN DI SINI --}}
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-slate-100">
                <tr>
                    <th class="text-left py-3 px-5 text-gray-600 font-semibold uppercase text-sm">Judul</th>
                    <th class="text-left py-3 px-5 text-gray-600 font-semibold uppercase text-sm">Tipe</th>
                    <th class="text-left py-3 px-5 text-gray-600 font-semibold uppercase text-sm">Status</th>
                    <th class="text-center py-3 px-5 text-gray-600 font-semibold uppercase text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($posts as $post)
                <tr class="border-b border-slate-200 hover:bg-slate-50">
                    <td class="py-3 px-5">{{ $post->title }}</td>
                    <td class="py-3 px-5">
                        @if($post->type == 'news')
                            <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-full text-xs font-medium">Berita</span>
                        @else
                            <span class="bg-yellow-100 text-yellow-800 py-1 px-3 rounded-full text-xs font-medium">Pengumuman</span>
                        @endif
                    </td>
                    <td class="py-3 px-5">
                         @if($post->status == 'published')
                            <span class="bg-green-100 text-green-800 py-1 px-3 rounded-full text-xs font-medium">Published</span>
                        @else
                            <span class="bg-slate-100 text-slate-800 py-1 px-3 rounded-full text-xs font-medium">Draft</span>
                        @endif
                    </td>
                    <td class="py-3 px-5 text-center">
                        <a href="{{ route('admin.berita.edit', $post->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4 font-medium">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Belum ada berita atau pengumuman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection
