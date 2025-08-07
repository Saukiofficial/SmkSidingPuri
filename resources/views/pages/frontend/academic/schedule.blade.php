@extends('layouts.frontend')

@section('title', 'Jadwal Pelajaran')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <h1 class="text-4xl font-bold text-center mb-12">Jadwal Pelajaran</h1>

        {{-- Form Pemilihan Kelas --}}
        <div class="max-w-md mx-auto mb-8">
            <form action="{{ route('academic.schedule') }}" method="GET">
                <label for="class_id" class="block text-gray-700 font-medium mb-2">Pilih Kelas:</label>
                <div class="flex">
                    <select name="class_id" id="class_id" class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Pilih Kelas --</option>
                        {{-- Loop dari data $classes --}}
                        <option value="1">Kelas 10-A</option>
                        <option value="2">Kelas 11-B</option>
                        <option value="3">Kelas 12-C</option>
                    </select>
                    <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-6 rounded-r-md hover:bg-indigo-700">Tampilkan</button>
                </div>
            </form>
        </div>

        {{-- Tampilan Jadwal --}}
        <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center mb-6">Jadwal Kelas 10-A</h2>
            <div class="space-y-6">
                {{-- Loop per hari --}}
                @php
                    $schedule_data = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                    $subjects = ['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'Fisika', 'Kimia', 'Biologi', 'Sejarah'];
                @endphp
                @foreach($schedule_data as $day)
                <div>
                    <h3 class="font-bold text-xl mb-3 border-b pb-2">{{ $day }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- Loop per jam pelajaran --}}
                        @for($i=0; $i<3; $i++)
                        <div class="bg-gray-100 p-4 rounded-md">
                            <p class="font-semibold text-gray-800">{{ $subjects[$i] }}</p>
                            <p class="text-sm text-gray-600">0{{7+$i}}:00 - 0{{8+$i}}:00</p>
                            <p class="text-sm text-indigo-600">Guru Pengajar {{$i+1}}</p>
                        </div>
                        @endfor
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
