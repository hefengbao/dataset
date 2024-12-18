<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('poems', [\App\Http\Controllers\PoemController::class, 'index']);
Route::get('poems/tags', [\App\Http\Controllers\PoemController::class, 'tags']);
Route::get('tags', [\App\Http\Controllers\TagController::class, 'index']);
Route::get('writers', [\App\Http\Controllers\WriterController::class, 'index']);
Route::get('chinese_wisecracks',[\App\Http\Controllers\ChineseWisecrackController::class, 'index']);
Route::get('poem_sentences',[\App\Http\Controllers\PoemSentenceController::class, 'index']);
Route::get('idioms',[\App\Http\Controllers\IdiomController::class, 'index']);
Route::get('tongue_twisters', [\App\Http\Controllers\Api\TongueTwisterController::class, 'index']);
Route::get('chinese_knowledge', [\App\Http\Controllers\Api\ChineseKnowledgeController::class, 'index']);
Route::resource('writings', \App\Http\Controllers\Api\WritingController::class);
Route::resource('riddles',\App\Http\Controllers\Api\RiddleController::class);
Route::resource('people',\App\Http\Controllers\Api\PeopleController::class);
