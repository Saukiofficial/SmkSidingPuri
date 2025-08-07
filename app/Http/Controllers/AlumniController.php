<?php

namespace App\Http\Controllers;

use App\Models\Alumnus;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Menampilkan halaman data alumni dan testimoni dari database.
     */
    public function index()
    {
        // Mengambil data alumni, diurutkan berdasarkan tahun lulus terbaru, dengan pagination
        $alumni = Alumnus::orderBy('graduation_year', 'desc')->paginate(20);

        // Mengambil testimoni yang sudah disetujui (published)
        $testimonials = Testimonial::where('is_published', true)->with('alumnus')->latest()->get();

        return view('pages.frontend.alumni.index', compact('alumni', 'testimonials'));
    }
}
