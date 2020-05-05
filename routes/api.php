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
Route::post('/login-api','Auth\LoginController@loginApi');

Route::get('/announcements','AnnouncementController@index')->middleware('auth:api');
Route::post('/add-announcement','AnnouncementController@store')->middleware('auth:api');

Route::post('add-user','UserController@store')->middleware('auth:api');

Route::get('/students','UserController@index')->middleware('auth:api');
Route::get('/students-api','UserController@indexApi')->middleware('auth:api');
Route::put('/edit-user','UserController@update')->middleware('auth:api');
Route::get('/get-all-student','UserController@getAllUser')->middleware('auth:api');
Route::get('/get-all-teacher','UserController@getAllTeacher')->middleware('auth:api');

Route::post('/add-problem','ProblemController@store')->middleware('auth:api');
Route::get('/problems','ProblemController@index')->middleware('auth:api');
Route::get('/problems-ready','ProblemController@indexReady')->middleware('auth:api');
Route::post('/problem-numbers-ready','ProblemNumberController@indexReady')->middleware('auth:api');

Route::post('/add-answers','AnswerController@store')->middleware('auth:api');
Route::get('/answers','AnswerController@indexByProblem')->middleware('auth:api');
Route::post('/answer-numbers','AnswerNumberController@indexByAnswers')->middleware('auth:api');
Route::post('/nilai','AnswerController@nilai')->middleware('auth:api');
Route::get('/answer/show','AnswerController@show')->middleware('auth:api');
Route::get('/answer/show-nilai','AnswerController@showNilai')->middleware('auth:api');

Route::get('/classes-teacher','ClassController@indexByTeacher')->middleware('auth:api');
Route::get('/classes-student','ClassController@indexByStudent')->middleware('auth:api');
Route::post('/add-class','ClassController@store')->middleware('auth:api');
Route::get('/find-class','JoinClassController@index')->middleware('auth:api');
Route::post('/join-class','JoinClassController@join')->middleware('auth:api');
Route::get('/student-in-class','UserController@getStudentByClass')->middleware('auth:api');

Route::post('check-answer','CheckAnswerController@check')->middleware('auth:api');

Route::get('/search-score','ScoreController@search')->middleware('auth:api');
