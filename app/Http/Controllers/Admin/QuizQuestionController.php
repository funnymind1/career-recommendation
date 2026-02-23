<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    /**
     * Display a listing of all quiz questions.
     */
    public function index()
    {
        $questions = QuizQuestion::orderBy('order')->get();
        return view('admin.quiz-questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new quiz question.
     */
    public function create()
    {
        $nextOrder = QuizQuestion::max('order') + 1;
        return view('admin.quiz-questions.create', compact('nextOrder'));
    }

    /**
     * Store a newly created quiz question in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_text' => 'required|string',
            'option_0' => 'required|string|max:255',
            'option_1' => 'required|string|max:255',
            'option_2' => 'required|string|max:255',
            'option_3' => 'required|string|max:255',
            'correct_option' => 'required|integer|in:0,1,2,3',
            'category' => 'required|string|max:100',
            'order' => 'required|integer|min:1',
        ]);

        QuizQuestion::create([
            'question_text' => $validated['question_text'],
            'options' => [
                $validated['option_0'],
                $validated['option_1'],
                $validated['option_2'],
                $validated['option_3'],
            ],
            'correct_option' => (int) $validated['correct_option'],
            'category' => $validated['category'],
            'order' => (int) $validated['order'],
        ]);

        return redirect()->route('admin.quiz-questions.index')
            ->with('success', 'Quiz question created successfully.');
    }

    /**
     * Show the form for editing the specified quiz question.
     */
    public function edit(QuizQuestion $quizQuestion)
    {
        return view('admin.quiz-questions.edit', compact('quizQuestion'));
    }

    /**
     * Update the specified quiz question in storage.
     */
    public function update(Request $request, QuizQuestion $quizQuestion)
    {
        $validated = $request->validate([
            'question_text' => 'required|string',
            'option_0' => 'required|string|max:255',
            'option_1' => 'required|string|max:255',
            'option_2' => 'required|string|max:255',
            'option_3' => 'required|string|max:255',
            'correct_option' => 'required|integer|in:0,1,2,3',
            'category' => 'required|string|max:100',
            'order' => 'required|integer|min:1',
        ]);

        $quizQuestion->update([
            'question_text' => $validated['question_text'],
            'options' => [
                $validated['option_0'],
                $validated['option_1'],
                $validated['option_2'],
                $validated['option_3'],
            ],
            'correct_option' => (int) $validated['correct_option'],
            'category' => $validated['category'],
            'order' => (int) $validated['order'],
        ]);

        return redirect()->route('admin.quiz-questions.index')
            ->with('success', 'Quiz question updated successfully.');
    }

    /**
     * Remove the specified quiz question from storage.
     */
    public function destroy(QuizQuestion $quizQuestion)
    {
        $quizQuestion->delete();
        return redirect()->route('admin.quiz-questions.index')
            ->with('success', 'Quiz question deleted successfully.');
    }
}
