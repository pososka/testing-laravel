<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Show the archive index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $quizzes = Quiz::paginate(4);
        
        return view('archive.index', [
            'quizzes' => $quizzes
        ]);
    }
}
