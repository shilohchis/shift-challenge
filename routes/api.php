<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Api',
], function() {
    Route::prefix('questions')->name('question.')->group(function() {
        Route::get('/', 'QuestionController@index')->name('index');
    });

    Route::prefix('answers')->name('answer.')->group(function() {
        Route::post('/', 'AnswerController@store')->name('store');
        Route::get('/', 'AnswerController@report')->name('report');
    });
});
