<?php

namespace Admsys\LaravelComments\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Admsys\Comments\Models\Comment;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'content' => $this->faker->words(rand(3, 10), asText: true),
        ];
    }
}
