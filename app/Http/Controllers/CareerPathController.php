<?php

namespace App\Http\Controllers;

use App\Models\CareerPath;
use App\Models\QuizResult;
use Illuminate\Support\Facades\Auth;

class CareerPathController extends Controller
{
    public function show(CareerPath $careerPath)
    {
        // Get related internships by matching career path title keywords
        $relatedInternships = \App\Models\Internship::where('category', 'LIKE', '%' . explode(' ', $careerPath->title)[0] . '%')
            ->orWhere('role', 'LIKE', '%' . explode(' ', $careerPath->title)[0] . '%')
            ->limit(4)
            ->get();

        // Get the user's match percentage for this career path
        $userMatchPercent = null;
        if (Auth::check()) {
            $lastResult = QuizResult::where('user_id', Auth::id())->latest()->first();
            if ($lastResult) {
                $match = collect($lastResult->career_matches)
                    ->firstWhere('career_path_id', $careerPath->id);
                $userMatchPercent = $match['match_percent'] ?? null;
            }
        }

        return view('student.career-path-detail', compact('careerPath', 'relatedInternships', 'userMatchPercent'));
    }
}
