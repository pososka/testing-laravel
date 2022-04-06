<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function answers() {
        return $this->hasMany(QuizQuestionAnswer::class, 'question_id');
    }
}
