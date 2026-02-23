<?php

namespace App\Http\Controllers;

use App\Models\CareerPath;
use App\Models\Internship;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        // Latest quiz result
        $latestQuiz = QuizResult::where('user_id', $user->id)
            ->latest()
            ->first();

        // Top career match
        $topMatch = null;
        $topMatchPercent = 0;
        if ($latestQuiz && $latestQuiz->career_matches) {
            $matches = collect($latestQuiz->career_matches)
                ->sortByDesc('match_percent')
                ->first();
            if ($matches) {
                $topMatch = CareerPath::find($matches['career_path_id']);
                $topMatchPercent = $matches['match_percent'];
            }
        }

        // Upcoming internship deadlines
        $upcomingInternships = Internship::where('user_id', $user->id)
            ->where('deadline', '>=', now())
            ->orderBy('deadline')
            ->take(3)
            ->get();

        // Profile completion (simple: name + email = 100%)
        $profileCompletion = 100;
        if (empty($user->name))
            $profileCompletion -= 50;
        if (empty($user->email))
            $profileCompletion -= 50;

        // Recommended careers
        $recommendedCareers = CareerPath::take(6)->get();

        // Quiz score
        $quizScore = $latestQuiz ? $latestQuiz->score : 0;

        return view('student.dashboard', compact(
            'latestQuiz',
            'topMatch',
            'topMatchPercent',
            'upcomingInternships',
            'profileCompletion',
            'recommendedCareers',
            'quizScore'
        ));
    }
}
