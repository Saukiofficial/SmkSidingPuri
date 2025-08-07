<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendar;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = AcademicCalendar::orderBy('start_date', 'desc')->paginate(15);
        return view('pages.admin.calendar.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        AcademicCalendar::create($request->all());

        return redirect()->route('admin.kalender-akademik.index')->with('success', 'Kegiatan baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicCalendar $kalender_akademik)
    {
        return view('pages.admin.calendar.edit', ['event' => $kalender_akademik]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicCalendar $kalender_akademik)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $kalender_akademik->update($request->all());

        return redirect()->route('admin.kalender-akademik.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicCalendar $kalender_akademik)
    {
        $kalender_akademik->delete();
        return redirect()->route('admin.kalender-akademik.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
