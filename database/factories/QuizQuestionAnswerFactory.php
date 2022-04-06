<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizQuestionAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id' => rand(1, 24),
            'title' => $this->faker->text(25),
            'correct' => $this->faker->boolean(),
        ];
    }
}
