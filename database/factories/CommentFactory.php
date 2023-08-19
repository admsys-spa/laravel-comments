<?php

namespace Admsys\LaravelComments\Database\Factories;

use Admsys\Comments\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

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
