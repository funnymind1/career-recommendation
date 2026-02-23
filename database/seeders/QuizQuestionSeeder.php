<?php

namespace Database\Seeders;

use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;

class QuizQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'question_text' => 'Which activity do you enjoy the most in your free time?',
                'options' => ['Building websites or apps', 'Analyzing data and trends', 'Creating visual designs', 'Managing budgets and finances'],
                'correct_option' => 0,
                'category' => 'general_interest',
                'order' => 1,
            ],
            [
                'question_text' => 'What type of problem-solving approach do you prefer?',
                'options' => ['Writing code to automate tasks', 'Using statistics to find patterns', 'Sketching ideas and wireframes', 'Developing marketing strategies'],
                'correct_option' => 0,
                'category' => 'problem_solving',
                'order' => 2,
            ],
            [
                'question_text' => 'Which tool are you most comfortable using?',
                'options' => ['VS Code or an IDE', 'Excel or Google Sheets', 'Figma or Adobe XD', 'Social media platforms'],
                'correct_option' => 0,
                'category' => 'tools',
                'order' => 3,
            ],
            [
                'question_text' => 'How do you prefer to work in a team?',
                'options' => ['As the technical lead', 'As the data interpreter', 'As the creative director', 'As the project coordinator'],
                'correct_option' => 0,
                'category' => 'teamwork',
                'order' => 4,
            ],
            [
                'question_text' => 'Which subject did you enjoy most in school?',
                'options' => ['Computer Science', 'Mathematics/Statistics', 'Art and Design', 'Business Studies'],
                'correct_option' => 0,
                'category' => 'academic',
                'order' => 5,
            ],
            [
                'question_text' => 'What motivates you the most at work?',
                'options' => ['Building things that work', 'Discovering hidden insights', 'Making things look beautiful', 'Growing a brand or audience'],
                'correct_option' => 0,
                'category' => 'motivation',
                'order' => 6,
            ],
            [
                'question_text' => 'Which industry fascinates you the most?',
                'options' => ['Technology & Software', 'Finance & Banking', 'Design & Media', 'Healthcare & Biotech'],
                'correct_option' => 0,
                'category' => 'industry',
                'order' => 7,
            ],
            [
                'question_text' => 'How do you handle deadlines and pressure?',
                'options' => ['Break the task into code sprints', 'Create a detailed analysis plan', 'Prioritize creative flow and iterate', 'Organize and delegate tasks'],
                'correct_option' => 0,
                'category' => 'work_style',
                'order' => 8,
            ],
            [
                'question_text' => 'What skill would you most like to develop?',
                'options' => ['Cloud computing & DevOps', 'Machine learning & AI', 'UX research & prototyping', 'Cybersecurity & risk management'],
                'correct_option' => 0,
                'category' => 'skill_growth',
                'order' => 9,
            ],
            [
                'question_text' => 'Where do you see yourself in 5 years?',
                'options' => ['Leading a development team', 'Running a data science lab', 'Head of design at a startup', 'Managing a business portfolio'],
                'correct_option' => 0,
                'category' => 'career_vision',
                'order' => 10,
            ],
        ];

        foreach ($questions as $question) {
            QuizQuestion::create($question);
        }
    }
}
