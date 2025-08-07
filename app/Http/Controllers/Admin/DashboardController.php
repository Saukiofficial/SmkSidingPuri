<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Admission;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin.
     */
    public function index()
    {
        // Hitung beberapa data untuk statistik di dashboard
        $postCount = Post::count();
        $pendingAdmissionCount = Admission::where('status', 'pending')->count();
        $teacherCount = User::whereHas('roles', fn($q) => $q->where('name', 'guru'))->count();
        $studentCount = User::whereHas('roles', fn($q) => $q->where('name', 'siswa'))->count();

        return view('pages.admin.dashboard', compact(
            'postCount',
            'pendingAdmissionCount',
            'teacherCount',
            'studentCount'
        ));
    }
}
