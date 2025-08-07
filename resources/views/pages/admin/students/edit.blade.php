@extends('layouts.admin')

@section('title', 'Edit Data Siswa')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Formulir Edit Data Siswa</h2>

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

    <form action="{{ route('admin.data-siswa.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name', $student->user->name) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
            </div>
            <div>
                <label for="gender" class="block text-gray-700 font-semibold mb-2">Jenis Kelamin</label>
                <select id="gender" name="gender" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                    <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div>
                <label for="school_class_id" class="block text-gray-700 font-semibold mb-2">Kelas</label>
                <select id="school_class_id" name="school_class_id" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
                    @php
                        $classes = \App\Models\SchoolClass::all();
                    @endphp
                    @foreach($classes as $class)
                        <option value="{{ $class->id }}" {{ old('school_class_id', $student->school_class_id) == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>
             <div>
                <label for="jurusan" class="block text-gray-700 font-semibold mb-2">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', $student->jurusan) }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg" required>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('admin.data-siswa.index') }}" class="text-gray-600 hover:underline py-2 px-4 mr-4">Batal</a>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
