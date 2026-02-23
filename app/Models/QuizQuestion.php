<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'question_text',
        'options',
        'correct_option',
        'category',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array',
        ];
    }
}
