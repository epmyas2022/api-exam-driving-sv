<?php

use App\Http\Controllers\ExamDriving\QuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/questions/{type}', QuestionController::class . '@uiQuestion')->name('questions');
Route::get('/', QuestionController::class . '@uiCategories')->name('categories');
