<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamDriving\QuestionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix("v1")->group(function () {

    Route::controller(QuestionController::class)->prefix("questions")->group(function () {
        Route::get("/", "index");
    });
});
