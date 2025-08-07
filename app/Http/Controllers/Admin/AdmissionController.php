<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Menampilkan daftar semua pendaftar PPDB.
     */
    public function index()
    {
        $admissions = Admission::latest()->paginate(20);
        return view('pages.admin.admissions.index', compact('admissions'));
    }

    /**
     * Menampilkan detail data seorang pendaftar.
     */
    public function show(Admission $ppdb)
    {
        // Eager load dokumen untuk ditampilkan
        $ppdb->load('documents');
        return view('pages.admin.admissions.show', ['admission' => $ppdb]);
    }

    /**
     * Mengupdate status pendaftaran (Lulus / Tidak Lulus).
     */
    public function update(Request $request, Admission $ppdb)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected,pending',
        ]);

        $ppdb->update(['status' => $request->status]);

        return redirect()->route('admin.ppdb.index')->with('success', 'Status pendaftar berhasil diperbarui.');
    }

    /**
     * Menghapus data pendaftar.
     */
    public function destroy(Admission $ppdb)
    {
        // Logika untuk menghapus file-file terkait bisa ditambahkan di sini
        $ppdb->delete();
        return redirect()->route('admin.ppdb.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }
}
