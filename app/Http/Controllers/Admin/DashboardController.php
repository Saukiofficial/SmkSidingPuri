<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Post;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Data Statistik yang sudah ada
        $postCount = Post::count();
        $teacherCount = Teacher::count();
        $studentCount = Student::count();
        $pendingAdmissionCount = Admission::where('status', 'pending')->count();

        // --- DATA BARU UNTUK DIAGRAM (DENGAN QUERY YANG DIPERBAIKI) ---

        // 1. Mengambil semua data siswa dan nama kelasnya melalui relasi
        $allStudents = Student::with('schoolClass:id,name')->select('id', 'school_class_id', 'gender')->get()
            ->map(function ($student) {
                return [
                    'id' => $student->id,
                    'classroom' => $student->schoolClass->name ?? 'Tanpa Kelas', // Mengambil nama kelas dari relasi
                    'gender' => $student->gender,
                ];
            });

        // 2. Mengambil daftar kelas yang unik dari data siswa yang ada
        $classrooms = $allStudents->pluck('classroom')->unique()->sort()->values();

        // 3. Menghitung persentase gender secara keseluruhan
        $genderStats = $allStudents->countBy('gender');

        $maleCount = $genderStats->get('Laki-laki', 0);
        $femaleCount = $genderStats->get('Perempuan', 0);

        return view('pages.admin.dashboard', [
            'postCount' => $postCount,
            'teacherCount' => $teacherCount,
            'studentCount' => $studentCount,
            'pendingAdmissionCount' => $pendingAdmissionCount,
            // Mengirim data baru ke view
            'allStudents' => $allStudents,
            'classrooms' => $classrooms,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
        ]);
    }
}
