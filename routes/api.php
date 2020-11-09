<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('questions', QuestionController::class);
});

Route::group(['prefix' => 'public'], function () {
    Route::post('login', [LoginController::class, 'login']);

    Route::get('quiz', [QuizController::class, 'index']);
    Route::post('quiz', [QuizController::class, 'check']);
});
