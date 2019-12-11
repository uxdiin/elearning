<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

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
Route::post('/login','Auth\LoginController@login');

Route::get('/announcements','AnnouncementController@index')->middleware('auth:api');
Route::post('/add-announcement','AnnouncementController@store');

Route::post('add-user','UserController@store');
Route::get('/students','UserController@index');
Route::put('/edit-user','UserController@update');

Route::post('/add-problem','ProblemController@store');
Route::get('/problems','ProblemController@index');
Route::get('/problems-ready','ProblemController@indexReady');

Route::post('/add-answers','AnswerController@store');
