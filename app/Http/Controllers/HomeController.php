<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User; // Pastikan ini di-import
use App\Models\Gallery;
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan data statistik.
     */
    public function index()
    {
        // Ambil 3 berita terbaru yang statusnya sudah 'published'
        $latestPosts = Post::where('status', 'published')->latest()->take(3)->get();

        // --- MENYIAPKAN DATA STATISTIK ---
        $studentCount = User::whereHas('roles', fn($q) => $q->where('name', 'siswa'))->count();
        $teacherCount = User::whereHas('roles', fn($q) => $q->where('name', 'guru'))->count();
        $extracurricularCount = 12; //
        $visitorCount = 900;;


        return view('pages.frontend.home', compact(
            'latestPosts',
            'studentCount',
            'teacherCount',
            'extracurricularCount',
            'visitorCount'
        ));
    }
}
