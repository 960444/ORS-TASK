<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;


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



//Display questions
Route::get('/', [QuestionnaireController::class, 'listQuestions']);

//Submit answers
Route::post('questionnaire', [QuestionnaireController::class, 'storeAnswers'])->name('answers.store');

//Display results
Route::get('results', [QuestionnaireController::class, 'listResults']);