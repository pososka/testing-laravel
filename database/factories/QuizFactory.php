<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 4),
            'title' => $this->faker->text(15),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
