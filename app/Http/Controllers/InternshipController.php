<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        // Live internships (no user_id)
        $liveQuery = Internship::whereNull('user_id')->where('status', 'live');
        if ($category && $category !== 'All') {
            $liveQuery->where('category', $category);
        }
        $liveInternships = $liveQuery->orderBy('deadline')->get();

        // User's applied/tracked internships
        $myInternships = Internship::where('user_id', Auth::id())
            ->orderBy('deadline')
            ->get();

        // Get unique categories for filter pills
        $categories = Internship::whereNull('user_id')
            ->distinct()
            ->pluck('category')
            ->toArray();

        return view('student.internships.index', compact(
            'liveInternships',
            'myInternships',
            'categories',
            'category'
        ));
    }

    public function apply(Internship $internship)
    {
        // Clone the live internship as user's applied entry
        Internship::create([
            'user_id' => Auth::id(),
            'company' => $internship->company,
            'role' => $internship->role,
            'location' => $internship->location,
            'category' => $internship->category,
            'status' => 'applied',
            'deadline' => $internship->deadline,
            'duration' => $internship->duration,
            'details' => $internship->details,
            'apply_url' => $internship->apply_url,
        ]);

        return back()->with('success', 'Applied to ' . $internship->company . ' successfully!');
    }

    public function updateStatus(Request $request, Internship $internship)
    {
        $validated = $request->validate([
            'status' => 'required|in:applied,interview,offer_received',
        ]);

        // Only allow updating own internships
        if ($internship->user_id !== Auth::id()) {
            abort(403);
        }

        $internship->update(['status' => $validated['status']]);

        return back()->with('success', 'Status updated!');
    }

    public function show(Internship $internship)
    {
        return response()->json($internship);
    }
}
