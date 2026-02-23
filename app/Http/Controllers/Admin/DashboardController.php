<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Internship;
use App\Models\CareerPath;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = User::where('role', 'student')->count();
        $internshipCount = Internship::count();
        $careerPathCount = CareerPath::count();
        $quizResultsCount = QuizResult::count();

        // 1. Student registrations over last 7 days
        $registrations = User::where('role', 'student')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $registrationChartData = [
            'labels' => [],
            'data' => []
        ];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $registrationChartData['labels'][] = Carbon::parse($date)->format('M d');
            $found = $registrations->firstWhere('date', $date);
            $registrationChartData['data'][] = $found ? $found->count : 0;
        }

        // 2. Top Career Matches
        // Since career_matches is a JSON array, we'll aggregate top matches in PHP
        // for better performance if the dataset is small, or use MySQL JSON functions if larger.
        // We'll take the top career match from each QuizResult and count them.
        $allResults = QuizResult::all();
        $topMatchCounts = [];

        foreach ($allResults as $result) {
            $matches = $result->career_matches;
            if (!empty($matches)) {
                $topMatch = $matches[0]; // Already sorted by match_percent in QuizController
                $id = $topMatch['career_path_id'];
                $topMatchCounts[$id] = ($topMatchCounts[$id] ?? 0) + 1;
            }
        }

        arsort($topMatchCounts);
        $top3 = array_slice($topMatchCounts, 0, 5, true);

        $careerChartData = [
            'labels' => [],
            'data' => []
        ];

        foreach ($top3 as $id => $count) {
            $path = CareerPath::find($id);
            if ($path) {
                $careerChartData['labels'][] = $path->title;
                $careerChartData['data'][] = $count;
            }
        }

        // 3. Quiz Completion Rate
        $studentsWithQuiz = QuizResult::distinct('user_id')->count('user_id');
        $quizCompletionRate = $studentCount > 0 ? round(($studentsWithQuiz / $studentCount) * 100) : 0;

        return view('admin.dashboard', compact(
            'studentCount',
            'internshipCount',
            'careerPathCount',
            'quizResultsCount',
            'registrationChartData',
            'careerChartData',
            'quizCompletionRate'
        ));
    }
}
