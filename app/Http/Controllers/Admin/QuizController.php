<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::orderBy('id', 'DESC')->get();

        return view('dashboard.quiz.index', [
            'quizzes' => $quizzes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('title', 'DESC')->get();

        return view('dashboard.quiz.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            // 'description' => '',
            // 'image' => '',
            // 'category_id' => '',
        ]);

        $quiz = new Quiz([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category,
        ]);
        
        if ($quiz->save()) {
            return redirect()->back()->with('status.success', __('Quiz successfully created'));
        }
        
        return redirect()->back()->with('status.error', __('Error occured when quiz created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $categories = Category::orderBy('title', 'DESC')->get();

        return view('dashboard.quiz.edit', [
            'quiz' => $quiz,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required',
            // 'description' => '',
            // 'image' => '',
            // 'category_id' => '',
        ]);

        $quiz->fill([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category,
        ]);

        if ($quiz->save()) {
            return redirect()->back()->with('status.success', __('Quiz successfully updated'));
        }
        
        return redirect()->back()->with('status.error', __('Error occured when quiz updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        if ($quiz->delete()) {
            return redirect()->back()->with('status.success', __('Quiz successfully deleted'));
        }
        
        return redirect()->back()->with('status.error', __('Error occured when quiz deleted'));
    }
}
