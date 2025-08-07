@extends('layouts.frontend')

@section('title', 'Struktur Organisasi')

@push('styles')
<style>
    /* Helper class untuk garis penghubung */
    .connector-line {
        width: 2px;
        background-color: #cbd5e1; /* slate-300 */
    }
    .connector-line-h {
        height: 2px;
        background-color: #cbd5e1; /* slate-300 */
    }
    .org-card {
        background-color: white;
        border: 1px solid #e2e8f0; /* slate-200 */
        border-radius: 0.75rem;
        padding: 1rem;
        text-align: center;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        min-width: 180px;
        margin-bottom: 1rem; /* Menambah jarak antar card */
    }
</style>
@endpush

@section('content')
<div class="bg-slate-50 py-24">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl font-bold text-gray-800">Struktur Organisasi Sekolah</h1>
        <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Diagram ini menunjukkan hierarki dan hubungan antar posisi di sekolah.</p>

        <div class="mt-16 flex flex-col items-center">
            <!-- Kepala Sekolah -->
            @if(isset($organization['KEPALA SEKOLAH']))
                @foreach($organization['KEPALA SEKOLAH'] as $member)
                <div class="org-card">
                    <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                    <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                    <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                </div>
                @endforeach
            @endif

            <!-- Garis ke bawah -->
            <div class="h-12 w-px bg-slate-300"></div>

            <div class="flex flex-wrap justify-center gap-8 md:gap-16">
                <!-- Komite Sekolah -->
                @if(isset($organization['KOMITE SEKOLAH']))
                    @foreach($organization['KOMITE SEKOLAH'] as $member)
                    <div class="org-card">
                        <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                        <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                        <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                    </div>
                    @endforeach
                @endif

                <!-- Kepala Tata Usaha & Staf -->
                <div class="flex flex-col items-center gap-8">
                    @if(isset($organization['KEPALA TATA USAHA']))
                        @foreach($organization['KEPALA TATA USAHA'] as $member)
                        <div class="org-card">
                            <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                            <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                            <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                        </div>
                        @endforeach
                    @endif
                    @if(isset($organization['STAF TATA USAHA']))
                        @foreach($organization['STAF TATA USAHA'] as $member)
                        <div class="org-card">
                            <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                            <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                            <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                        </div>
                        @endforeach
                    @endif
                </div>

                <!-- Wakil Kepala Sekolah -->
                @if(isset($organization['WAKIL KEPALA SEKOLAH']))
                    @foreach($organization['WAKIL KEPALA SEKOLAH'] as $member)
                    <div class="org-card">
                        <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                        <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                        <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                    </div>
                    @endforeach
                @endif
            </div>

            <!-- Garis dan Baris Waka-waka -->
            <div class="h-12 w-px bg-slate-300"></div>
            <div class="flex flex-wrap justify-center gap-8 md:gap-16">
                 @if(isset($organization['WAKA KURIKULUM']))
                    @foreach($organization['WAKA KURIKULUM'] as $member)
                    <div class="org-card">
                        <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                        <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                        <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                    </div>
                    @endforeach
                @endif
                 @if(isset($organization['WAKA KESISWAAN']))
                    @foreach($organization['WAKA KESISWAAN'] as $member)
                    <div class="org-card">
                        <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                        <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                        <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                    </div>
                    @endforeach
                @endif
                 @if(isset($organization['WAKA SARPRAS']))
                    @foreach($organization['WAKA SARPRAS'] as $member)
                    <div class="org-card">
                        <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                        <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                        <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                    </div>
                    @endforeach
                @endif
            </div>
             <div class="h-12 w-px bg-slate-300"></div>
             @if(isset($organization['WAKA HUMAS']))
                @foreach($organization['WAKA HUMAS'] as $member)
                <div class="org-card">
                    <img src="{{ asset('storage/' . $member->photo_path) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-2 object-cover">
                    <h3 class="font-bold text-gray-500 text-sm uppercase">{{ $member->position }}</h3>
                    <p class="font-semibold text-gray-800">{{ $member->name }}</p>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
