<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerPath;
use Illuminate\Http\Request;

class CareerPathController extends Controller
{
    /**
     * Display a listing of the career paths.
     */
    public function index()
    {
        $careerPaths = CareerPath::all();
        return view('admin.career-paths.index', compact('careerPaths'));
    }

    /**
     * Show the form for creating a new career path.
     */
    public function create()
    {
        return view('admin.career-paths.create');
    }

    /**
     * Store a newly created career path in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string', // Comma separated
            'match_keywords' => 'required|string', // Comma separated
            'average_salary' => 'required|string|max:255',
            'required_education' => 'required|string|max:255',
            'projected_growth' => 'required|string|max:255',
        ]);

        // Convert comma-separated strings back to arrays
        $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        $validated['match_keywords'] = array_map('trim', explode(',', $validated['match_keywords']));

        CareerPath::create($validated);

        return redirect()->route('admin.career-paths.index')->with('success', 'Career Path created successfully.');
    }

    /**
     * Show the form for editing the specified career path.
     */
    public function edit(CareerPath $careerPath)
    {
        return view('admin.career-paths.edit', compact('careerPath'));
    }

    /**
     * Update the specified career path in storage.
     */
    public function update(Request $request, CareerPath $careerPath)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string',
            'match_keywords' => 'required|string',
            'average_salary' => 'required|string|max:255',
            'required_education' => 'required|string|max:255',
            'projected_growth' => 'required|string|max:255',
        ]);

        $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        $validated['match_keywords'] = array_map('trim', explode(',', $validated['match_keywords']));

        $careerPath->update($validated);

        return redirect()->route('admin.career-paths.index')->with('success', 'Career Path updated successfully.');
    }

    /**
     * Remove the specified career path from storage.
     */
    public function destroy(CareerPath $careerPath)
    {
        $careerPath->delete();
        return redirect()->route('admin.career-paths.index')->with('success', 'Career Path deleted successfully.');
    }
}
