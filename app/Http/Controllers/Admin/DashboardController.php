<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * construct function
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * undocumented function summary
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quizCount = Quiz::all()->count();
        $categoryCount = Category::all()->count();

        return view('dashboard.index', [
            'quizCount' => $quizCount,
            'categoryCount' => $categoryCount,
        ]);
    }
}
