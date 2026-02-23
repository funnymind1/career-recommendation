<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    /**
     * Display a listing of live internships.
     */
    public function index()
    {
        $internships = Internship::whereNull('user_id')->latest()->paginate(10);
        return view('admin.internships.index', compact('internships'));
    }

    /**
     * Show the form for creating a new internship.
     */
    public function create()
    {
        return view('admin.internships.create');
    }

    /**
     * Store a newly created internship in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'deadline' => 'required|date',
            'duration' => 'required|string|max:255',
            'details' => 'required|string',
            'apply_url' => 'required|url',
        ]);

        Internship::create(array_merge($validated, [
            'status' => 'live' // Admin created ones are templates/live postings
        ]));

        return redirect()->route('admin.internships.index')->with('success', 'Internship created successfully.');
    }

    /**
     * Show the form for editing the specified internship.
     */
    public function edit(Internship $internship)
    {
        // Admins should only edit base templates
        if ($internship->user_id !== null) {
            abort(403, 'Cannot edit student applications here.');
        }

        return view('admin.internships.edit', compact('internship'));
    }

    /**
     * Update the specified internship in storage.
     */
    public function update(Request $request, Internship $internship)
    {
        if ($internship->user_id !== null) {
            abort(403, 'Cannot edit student applications here.');
        }

        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'deadline' => 'required|date',
            'duration' => 'required|string|max:255',
            'details' => 'required|string',
            'apply_url' => 'required|url',
            'status' => 'required|in:live,closed'
        ]);

        $internship->update($validated);

        return redirect()->route('admin.internships.index')->with('success', 'Internship updated successfully.');
    }

    /**
     * Remove the specified internship from storage.
     */
    public function destroy(Internship $internship)
    {
        if ($internship->user_id !== null) {
            abort(403, 'Cannot delete student applications through this panel.');
        }

        $internship->delete();

        return redirect()->route('admin.internships.index')->with('success', 'Internship deleted successfully.');
    }
}
