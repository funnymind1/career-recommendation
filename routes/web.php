<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InternshipController as AdminInternshipController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CareerPathController as AdminCareerPathController;
use App\Http\Controllers\Admin\QuizQuestionController as AdminQuizQuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->isAdmin() ? redirect()->route('admin.dashboard') : redirect('/dashboard');
    }
    return view('welcome');
});

Route::view('/about', 'about')->name('about');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/quiz', [QuizController::class, 'show'])->name('quiz');
    Route::post('/quiz', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz/results', [QuizController::class, 'results'])->name('quiz.results');
    Route::get('/career-paths/{careerPath}', [\App\Http\Controllers\CareerPathController::class, 'show'])->name('career-paths.show');
    Route::get('/internships', [InternshipController::class, 'index'])->name('internships');
    Route::post('/internships/{internship}/apply', [InternshipController::class, 'apply'])->name('internships.apply');
    Route::patch('/internships/{internship}/status', [InternshipController::class, 'updateStatus'])->name('internships.updateStatus');
    Route::get('/internships/{internship}', [InternshipController::class, 'show'])->name('internships.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminAuthController::class, 'create'])->name('login');
        Route::post('login', [AdminAuthController::class, 'store']);
    });

    Route::middleware(['auth', 'is_admin'])->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'destroy'])->name('logout');

        // Management Routes
        Route::resource('internships', AdminInternshipController::class);
        Route::resource('users', AdminUserController::class)->only(['index', 'show']);
        Route::resource('career-paths', AdminCareerPathController::class);
        Route::resource('quiz-questions', AdminQuizQuestionController::class);
    });
});

require __DIR__ . '/auth.php';
