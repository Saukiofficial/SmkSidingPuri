<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with(['user', 'schoolClass']);

        // Logika Filter
        if ($request->filled('search_jurusan')) {
            $query->where('jurusan', $request->search_jurusan);
        }
        if ($request->filled('search_gender')) {
            $query->where('gender', $request->search_gender);
        }
        if ($request->filled('search_kelas')) {
            $query->where('school_class_id', $request->search_kelas);
        }

        // withQueryString() memastikan parameter filter tetap ada di link pagination
        $students = $query->latest()->paginate(20)->withQueryString();

        // Data untuk dropdown filter
        $jurusans = Student::select('jurusan')->whereNotNull('jurusan')->distinct()->get();
        $classes = SchoolClass::all();

        return view('pages.admin.students.index', compact('students', 'jurusans', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::all();
        return view('pages.admin.students.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => 'required|in:male,female',
            'school_class_id' => 'required|exists:school_classes,id',
            'jurusan' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $studentRole = Role::where('name', 'siswa')->first();
        if ($studentRole) {
            $user->roles()->attach($studentRole->id);
        }

        Student::create([
            'user_id' => $user->id,
            'nisn' => $user->id . rand(1000, 9999),
            'school_class_id' => $request->school_class_id,
            'jurusan' => $request->jurusan,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.data-siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $data_siswa)
    {
        $classes = SchoolClass::all();
        return view('pages.admin.students.edit', ['student' => $data_siswa, 'classes' => $classes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $data_siswa)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'school_class_id' => 'required|exists:school_classes,id',
            'jurusan' => 'required|string|max:255',
        ]);

        $data_siswa->user->update(['name' => $request->name]);
        $data_siswa->update($request->only(['gender', 'school_class_id', 'jurusan']));

        return redirect()->route('admin.data-siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $data_siswa)
    {
        $data_siswa->user()->delete();
        return redirect()->route('admin.data-siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'data-siswa.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate(['file' => 'required|mimes:xlsx,xls']);
        Excel::import(new StudentsImport, $request->file('file'));
        return redirect()->route('admin.data-siswa.index')->with('success', 'Data siswa berhasil diimpor.');
    }

    public function downloadTemplate()
    {
        $path = public_path('templates/template_siswa.xlsx');
        return response()->download($path);
    }
}
