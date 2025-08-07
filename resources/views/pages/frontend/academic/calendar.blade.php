@extends('layouts.frontend')

@section('title', 'Kalender Akademik')

@push('styles')
<style>
    .calendar-body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .event-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(255,255,255,0.2);
    }
    .event-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }
    .date-badge {
        background: linear-gradient(135deg, #667eea, #764ba2);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }
    .stats-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
    }
    .stat-number {
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .floating-action {
        background: linear-gradient(135deg, #667eea, #764ba2);
        box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
    }
</style>
@endpush

@section('content')
<div class="calendar-body min-h-screen py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12 text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-2 text-shadow-lg">Kalender Akademik</h1>
            <p class="text-lg opacity-90">SMK Siding Puri - Tahun Ajaran 2025/2026</p>
        </div>

        <div class="stats-section rounded-2xl p-8 mb-12">
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Ringkasan Kegiatan</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="stat-number text-4xl font-bold">{{ $totalEvents }}</div>
                    <div class="text-gray-500 text-sm uppercase tracking-wider mt-1">Total Kegiatan</div>
                </div>
                <div class="text-center">
                    <div class="stat-number text-4xl font-bold">{{ $examCount }}</div>
                    <div class="text-gray-500 text-sm uppercase tracking-wider mt-1">Ujian Semester</div>
                </div>
                <div class="text-center">
                    <div class="stat-number text-4xl font-bold">{{ $nationalDayCount }}</div>
                    <div class="text-gray-500 text-sm uppercase tracking-wider mt-1">Hari Nasional</div>
                </div>
                <div class="text-center">
                    <div class="stat-number text-4xl font-bold">{{ $holidayCount }}</div>
                    <div class="text-gray-500 text-sm uppercase tracking-wider mt-1">Libur Semester</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($events as $event)
            <div class="event-card p-6">
                <div class="flex items-center">
                    <div class="date-badge text-white rounded-lg p-4 mr-4 text-center min-w-[70px]">
                        <div class="text-3xl font-bold leading-none">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</div>
                        <div class="text-sm uppercase font-medium">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</div>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-lg text-gray-800 leading-tight">{{ $event->title }}</h3>
                        <p class="text-sm text-gray-500 mt-1 flex items-center gap-2">
                            <i class="fas fa-calendar-alt"></i>
                            <span>{{ \Carbon\Carbon::parse($event->start_date)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
                        </p>
                    </div>
                </div>
            </div>
            @empty
            <div class="md:col-span-2 lg:col-span-3 text-center bg-white/20 p-8 rounded-2xl text-white">
                <p>Belum ada kegiatan akademik yang dijadwalkan.</p>
            </div>
            @endforelse
        </div>
    </div>

    <div onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="floating-action fixed bottom-8 right-8 w-14 h-14 rounded-full flex items-center justify-center text-white text-xl cursor-pointer transition-transform hover:scale-110">
        <i class="fas fa-arrow-up"></i>
    </div>
</div>
@endsection
