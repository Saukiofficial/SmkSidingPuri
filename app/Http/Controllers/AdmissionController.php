<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdmissionController extends Controller
{
    /**
     * Menampilkan halaman pendaftaran PPDB.
     */
    public function index()
    {
        return view('pages.frontend.admission.index');
    }

    /**
     * Menyimpan data pendaftar baru beserta dokumennya.
     */
    public function store(Request $request)
    {
        // Validasi untuk semua field di form yang lengkap
        $request->validate([
            'full_name' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:20',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'religion' => 'nullable|string|max:50',
            'previous_school' => 'required|string|max:255',
            'address' => 'required|string',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'jurusan_pilihan' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'document_birth_certificate' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'document_family_card' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'document_ijazah' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'document_raport' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'agreement' => 'required',
        ]);

        // Simpan data utama pendaftar
        $admission = Admission::create($request->all() + [
            'registration_number' => 'PPDB-' . date('Y') . '-' . Str::upper(Str::random(6)),
        ]);

        // Simpan foto siswa
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('admissions/photos', 'public');
            $admission->documents()->create([
                'document_name' => 'Foto Siswa',
                'file_path' => $path,
            ]);
        }

        // Simpan dokumen-dokumen lainnya
        $documents = [
            'document_birth_certificate' => 'Akta Kelahiran',
            'document_family_card' => 'Kartu Keluarga',
            'document_ijazah' => 'Ijazah/SKHUN',
            'document_raport' => 'Raport Terakhir',
        ];

        foreach ($documents as $key => $name) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('admissions/documents', 'public');
                $admission->documents()->create([
                    'document_name' => $name,
                    'file_path' => $path,
                ]);
            }
        }

        return redirect()->route('admission.index')->with('success', 'Pendaftaran Anda berhasil. Nomor pendaftaran Anda adalah ' . $admission->registration_number);
    }

    /**
     * Menampilkan halaman hasil seleksi.
     */
    public function results(Request $request)
    {
        $admission = null;
        if ($request->has('registration_number')) {
            $admission = Admission::where('registration_number', $request->registration_number)->first();
        }

        return view('pages.frontend.admission.results', compact('admission'));
    }
}
