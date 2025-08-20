<?php

use App\Models\ChineseCharacter;
use Illuminate\Support\Facades\Log;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [\App\Http\Controllers\TestController::class, 'index']);
Route::get('test/poem', [\App\Http\Controllers\TestController::class, 'poem']);
Route::post('test/poem_store', [\App\Http\Controllers\TestController::class, 'poem_store'])->name('test.poem_store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tongue_twister', \App\Http\Controllers\TongueTwisterController::class);

Route::get('cook/ingredients', [\App\Http\Controllers\IngredientController::class, 'index']);

Route::resource('lyrics', \App\Http\Controllers\LyricController::class);


Route::get('poem_sentence', [\App\Http\Controllers\PoemSentenceController::class, 'index'])->name('poem_sentence.index');
Route::put('poem_sentence/{id}/store', [\App\Http\Controllers\PoemSentenceController::class, 'store'])->name('poem_sentence.store');

Route::get('pinyin', function (){
    $data = ChineseCharacter::select('pinyin')->distinct()->get();
    $data = $data->pluck('pinyin')->toArray();

    sort($data);
    return json_encode($data, JSON_UNESCAPED_UNICODE);
});
