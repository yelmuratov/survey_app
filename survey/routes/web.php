<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    $categories = App\Models\Category::all();
    $surveys = App\Models\Survey::all();
    return view('dashboard.index', compact('categories', 'surveys'));
});

Route::get('/categories',[CategoryController::class, 'categories'])->name('category.index');
Route::get('/surveys',[SurveyController::class, 'surveys'])->name('survey.index');
Route::put('/surveys/{survey}/status', [SurveyController::class, 'surveyStatusUpdate'])->name('survey.update');

