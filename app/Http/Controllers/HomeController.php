<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User; // Tambahkan ini
use App\Models\Gallery;
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan data untuk animasi dan konten.
     */
    public function index()
    {
        // Ambil 3 berita terbaru yang statusnya sudah 'published'
        $latestPosts = Post::where('status', 'published')->latest()->take(3)->get();

        // --- DATA BARU UNTUK ANIMASI ---
        $studentCount = User::whereHas('roles', fn($q) => $q->where('name', 'siswa'))->count();
        $teacherCount = User::whereHas('roles', fn($q) => $q->where('name', 'guru'))->count();
        // Anda bisa menambahkan data lain di sini, misal dari tabel ekstrakurikuler
        $extracurricularCount = 12; // Contoh data statis

        // Kirim semua data ke view
        return view('pages.frontend.home', compact(
            'latestPosts',
            'studentCount',
            'teacherCount',
            'extracurricularCount'
        ));
    }
}
