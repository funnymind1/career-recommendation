<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Internship;
use App\Models\QuizResult;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index()
    {
        $users = User::where('role', 'student')->latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified student.
     */
    public function show(User $user)
    {
        if ($user->role !== 'student') {
            abort(403, 'Cannot view non-student profiles here.');
        }

        $latestQuiz = QuizResult::where('user_id', $user->id)->latest()->first();
        $internships = Internship::where('user_id', $user->id)->latest()->get();

        return view('admin.users.show', compact('user', 'latestQuiz', 'internships'));
    }
}
