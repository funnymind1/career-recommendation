<?php

namespace App\Http\Controllers;

use App\Models\CareerPath;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function show()
    {
        $questions = QuizQuestion::orderBy('order')->get();
        return view('student.quiz', compact('questions'));
    }

    public function results()
    {
        $result = QuizResult::where('user_id', Auth::id())
            ->latest()
            ->first();

        if (!$result) {
            return redirect()->route('quiz');
        }

        // Load the full career path objects for the matches
        $matches = collect($result->career_matches)
            ->map(function ($match) {
                $path = CareerPath::find($match['career_path_id']);
                if (!$path)
                    return null;
                return [
                    'career_path' => $path,
                    'match_percent' => $match['match_percent'],
                ];
            })
            ->filter()
            ->sortByDesc('match_percent')
            ->values();

        return view('student.quiz-results', compact('result', 'matches'));
    }

    public function submit(Request $request)
    {
        $questions = QuizQuestion::orderBy('order')->get();

        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer|min:0|max:3',
        ]);

        $answers = $validated['answers'];

        // Calculate score based on correct answers
        $correctCount = 0;
        foreach ($questions as $question) {
            if (isset($answers[$question->id]) && (int) $answers[$question->id] === $question->correct_option) {
                $correctCount++;
            }
        }
        $score = $questions->count() > 0
            ? round(($correctCount / $questions->count()) * 100)
            : 0;

        $careerPaths = CareerPath::all();
        $careerMatches = [];

        $categoryMap = [
            0 => ['programming', 'coding', 'software', 'development', 'algorithms', 'web'],
            1 => ['data', 'analytics', 'statistics', 'machine learning', 'python', 'visualization'],
            2 => ['design', 'ui', 'ux', 'creative', 'prototype', 'figma', 'user research'],
            3 => ['finance', 'marketing', 'social media', 'content', 'seo', 'branding', 'communication', 'accounting', 'economics'],
        ];

        $optionCounts = [0 => 0, 1 => 0, 2 => 0, 3 => 0];
        foreach ($answers as $selectedOption) {
            $optionCounts[(int) $selectedOption]++;
        }

        foreach ($careerPaths as $career) {
            $matchScore = 0;
            $keywords = $career->match_keywords;

            foreach ($categoryMap as $optionIndex => $categoryKeywords) {
                $overlap = count(array_intersect($keywords, $categoryKeywords));
                $matchScore += $overlap * $optionCounts[$optionIndex];
            }

            $maxPossible = $questions->count() * count($keywords);
            $matchPercent = $maxPossible > 0
                ? min(100, round(($matchScore / $maxPossible) * 100))
                : 0;

            $careerMatches[] = [
                'career_path_id' => $career->id,
                'match_percent' => $matchPercent,
            ];
        }

        usort($careerMatches, fn($a, $b) => $b['match_percent'] - $a['match_percent']);

        QuizResult::create([
            'user_id' => Auth::id(),
            'answers' => $answers,
            'score' => $score,
            'career_matches' => $careerMatches,
        ]);

        return redirect()->route('quiz.results');
    }
}
