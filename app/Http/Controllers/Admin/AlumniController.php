<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumnus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// Impor class yang baru kita buat dan pustaka Excel
use App\Exports\AlumniTemplateExport;
use App\Imports\AlumniImport;
use Maatwebsite\Excel\Facades\Excel;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumni = Alumnus::latest()->paginate(15);
        return view('pages.admin.alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'required|integer|digits:4',
            'occupation' => 'nullable|string|max:255',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('alumni', 'public');
        }

        Alumnus::create($request->except('photo_path') + ['photo_path' => $path]);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumnus $alumnus)
    {
        return view('pages.admin.alumni.edit', compact('alumnus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumnus $alumnus)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'graduation_year' => 'required|integer|digits:4',
            'occupation' => 'nullable|string|max:255',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $alumnus->photo_path;
        if ($request->hasFile('photo_path')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('photo_path')->store('alumni', 'public');
        }

        $alumnus->update($request->except('photo_path') + ['photo_path' => $path]);

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumnus $alumnus)
    {
        if ($alumnus->photo_path) {
            Storage::disk('public')->delete($alumnus->photo_path);
        }
        $alumnus->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }

    /**
     * FUNGSI BARU: Untuk mengunduh template Excel.
     */
    public function downloadTemplate()
    {
        return Excel::download(new AlumniTemplateExport, 'template_alumni.xlsx');
    }

    /**
     * FUNGSI BARU: Untuk mengimpor data dari file Excel.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new AlumniImport, $request->file('file'));
            return redirect()->route('admin.alumni.index')->with('success', 'Data alumni berhasil diimpor.');
        } catch (\Exception $e) {
            return redirect()->route('admin.alumni.index')->with('error', 'Terjadi kesalahan saat mengimpor data: ' . $e->getMessage());
        }
    }
}
