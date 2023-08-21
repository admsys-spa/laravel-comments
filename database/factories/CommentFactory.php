<?php

namespace Admsys\Comments\Database\Factories;

use Admsys\Comments\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'content' => fake()->words(rand(3, 10), asText: true),
        ];
    }
}
