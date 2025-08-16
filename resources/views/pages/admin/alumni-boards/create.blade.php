@extends('layouts.admin')

@section('title', 'Tambah Pengurus Alumni')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Formulir Tambah Pengurus Alumni</h2>

    {{--
      TINDAKAN PERBAIKAN:
      Mengganti route() dengan url() untuk memastikan form dikirim ke endpoint yang benar.
      Ini adalah langkah debugging untuk mengatasi masalah di mana route() tidak menghasilkan URL yang tepat.
    --}}
    <form action="{{ url('admin/pengurus-alumni') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Memuat formulir dari file partial --}}
        @include('pages.admin.alumni-boards.partials.form-control')
    </form>
</div>
@endsection
