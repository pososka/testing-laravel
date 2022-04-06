<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quiz_id' => rand(1, 8),
            'title' => $this->faker->title() . '???',
            'type' => $this->faker->randomElement(['simple', 'compliance']),
        ];
    }
}
