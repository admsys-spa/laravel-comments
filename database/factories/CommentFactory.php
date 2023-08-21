<?php

namespace Admsys\Comments\Database\Factories;

// use Admsys\Comments\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = \Admsys\Comments\Models\Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => fake()->words(rand(3, 10), asText: true)
        ];
    }
}
