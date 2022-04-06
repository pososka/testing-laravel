<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
    ];
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function questions() {
        return $this->hasMany(QuizQuestion::class);
    }
}
