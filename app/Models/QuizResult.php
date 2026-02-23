<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizResult extends Model
{
    protected $fillable = [
        'user_id',
        'answers',
        'score',
        'career_matches',
    ];

    protected function casts(): array
    {
        return [
            'answers' => 'array',
            'career_matches' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
