<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\ArchiveController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get(RouteServiceProvider::HOME, [ArchiveController::class, 'index'])->name('home');

Route::middleware(['role:admin'])->group(function () {
  Route::get(RouteServiceProvider::DASHBOARD, [DashboardController::class, 'index'])->name('dashboard');
  
  Route::resource(RouteServiceProvider::DASHBOARD_CATEGORY, CategoryController::class);
  
  Route::resource(RouteServiceProvider::DASHBOARD_QUIZ, QuizController::class);
});
