@extends('layouts.admin')

@section('title', 'Detail Pendaftar')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-md">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $admission->full_name }}</h2>
            <p class="font-mono text-gray-500">{{ $admission->registration_number }}</p>
        </div>
        <a href="{{ route('admin.ppdb.index') }}" class="text-indigo-600 hover:underline font-semibold">&larr; Kembali ke Daftar</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Kolom Kiri: Detail Data --}}
        <div class="md:col-span-2 space-y-6">
            <!-- Data Diri -->
            <div>
                <h3 class="font-bold text-lg text-gray-800 border-b pb-2 mb-3">Data Diri Siswa</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <p class="text-gray-500">Jenis Kelamin</p><p class="text-gray-800 font-semibold">{{ $admission->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p class="text-gray-500">Tempat, Tgl Lahir</p><p class="text-gray-800 font-semibold">{{ $admission->birth_place }}, {{ \Carbon\Carbon::parse($admission->birth_date)->format('d M Y') }}</p>
                    <p class="text-gray-500">Asal Sekolah</p><p class="text-gray-800 font-semibold">{{ $admission->previous_school }}</p>
                    <p class="text-gray-500">Alamat</p><p class="text-gray-800 font-semibold col-span-2">{{ $admission->address }}</p>
                </div>
            </div>
             <!-- Data Orang Tua -->
            <div>
                <h3 class="font-bold text-lg text-gray-800 border-b pb-2 mb-3">Data Orang Tua</h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <p class="text-gray-500">Nama Ayah</p><p class="text-gray-800 font-semibold">{{ $admission->father_name }}</p>
                    <p class="text-gray-500">Nama Ibu</p><p class="text-gray-800 font-semibold">{{ $admission->mother_name }}</p>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Foto & Berkas --}}
        <div class="space-y-6">
            @php
                $photo = $admission->documents->where('document_name', 'Foto Siswa')->first();
            @endphp
            @if($photo)
                <div>
                    <h3 class="font-bold text-lg text-gray-800 border-b pb-2 mb-3">Foto Siswa</h3>
                    <img src="{{ asset('storage/' . $photo->file_path) }}" alt="Foto Siswa" class="w-full rounded-lg shadow-md">
                </div>
            @endif

            <div>
                <h3 class="font-bold text-lg text-gray-800 border-b pb-2 mb-3">Berkas Terlampir</h3>
                <ul class="space-y-2">
                    @forelse($admission->documents->where('document_name', '!=', 'Foto Siswa') as $doc)
                        <li>
                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="flex items-center justify-between bg-slate-100 hover:bg-slate-200 p-3 rounded-lg text-sm">
                                <span class="font-semibold text-gray-700">{{ $doc->document_name }}</span>
                                <i class="fas fa-download text-gray-500"></i>
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-500 text-sm">Tidak ada berkas yang diupload.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
