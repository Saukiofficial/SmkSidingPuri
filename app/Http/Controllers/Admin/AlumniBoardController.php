<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AlumniBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniBoardController extends Controller
{
    public function index()
    {
        $members = AlumniBoard::orderBy('display_order')->paginate(15);
        return view('pages.admin.alumni-boards.index', compact('members'));
    }

    public function create()
    {
        return view('pages.admin.alumni-boards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:alumni_boards,name',
            'position' => 'required|string|max:255',
            'display_order' => 'required|integer',
            'photo_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('photo_path')->store('alumni-boards', 'public');

        AlumniBoard::create($request->except('photo_path') + ['photo_path' => $path]);

        return redirect()->route('admin.pengurus-alumni.index')->with('success', 'Anggota pengurus alumni berhasil ditambahkan.');
    }

    public function edit(AlumniBoard $pengurus_alumni)
    {
        return view('pages.admin.alumni-boards.edit', ['member' => $pengurus_alumni]);
    }

    public function update(Request $request, AlumniBoard $pengurus_alumni)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:alumni_boards,name,' . $pengurus_alumni->id,
            'position' => 'required|string|max:255',
            'display_order' => 'required|integer',
            'photo_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $pengurus_alumni->photo_path;
        if ($request->hasFile('photo_path')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('photo_path')->store('alumni-boards', 'public');
        }

        $pengurus_alumni->update($request->except('photo_path') + ['photo_path' => $path]);

        return redirect()->route('admin.pengurus-alumni.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * TINDAKAN PERBAIKAN:
     * Mengubah metode destroy untuk menjadi lebih direct dan anti-gagal.
     * 1. Menerima $id secara langsung, bukan model binding.
     * 2. Mencari record terlebih dahulu untuk menghapus foto.
     * 3. Menggunakan query builder `where('id', $id)->delete()` yang lebih direct ke database.
     * Ini untuk menghindari kemungkinan adanya Model Event yang membatalkan penghapusan.
     */
    public function destroy($id)
    {
        // Cari record berdasarkan ID
        $pengurus_alumni = AlumniBoard::find($id);

        // Jika record ditemukan
        if ($pengurus_alumni) {
            // Hapus file foto dari storage jika ada
            if ($pengurus_alumni->photo_path) {
                Storage::disk('public')->delete($pengurus_alumni->photo_path);
            }

            // Hapus record dari database secara langsung menggunakan query
            AlumniBoard::where('id', $id)->delete();

            return redirect()->route('admin.pengurus-alumni.index')->with('success', 'Data berhasil dihapus.');
        }

        // Jika record tidak ditemukan, kembalikan dengan pesan error
        return redirect()->route('admin.pengurus-alumni.index')->with('error', 'Data tidak ditemukan.');
    }
}
