<?php

namespace Database\Seeders;

use App\Models\QuizQuestionAnswer;
use Illuminate\Database\Seeder;

class QuizQuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuizQuestionAnswer::factory(72)->create();
    }
}
