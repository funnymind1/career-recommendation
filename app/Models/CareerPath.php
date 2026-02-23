<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerPath extends Model
{
    protected $fillable = [
        'title',
        'description',
        'match_keywords',
        'tags',
        'image_url',
    ];

    protected function casts(): array
    {
        return [
            'match_keywords' => 'array',
            'tags' => 'array',
        ];
    }
}
