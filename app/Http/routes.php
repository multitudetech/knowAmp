<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => '/', 'uses' => 'QuestionController@listQuestions']);
Route::get('/index', ['as' => 'index', 'uses' => 'QuestionController@listQuestions']);
Route::get('/login', ['as' => 'login', 'uses' => 'QuestionController@listQuestions']);
Route::get('/question/{question_id}', ['uses' => 'QuestionController@detailedQuestions']);
Route::get('/signup', function () {
    return view('signup');
});
Route::get('verify/{userid}/{verifyid}', ['uses' =>'UsersController@verify']);

Route::group(['middleware' => ['web']], function () {
	Route::post('/handleLogin', ['as' => 'handleLogin', 'uses' => 'AuthController@handleLogin']);
	Route::resource('users', 'UsersController', ['only' => ['signup', 'store']]);
	Route::get('/askQuestion', ['middleware' => 'auth', 'as' => 'askQuestion', 'uses' => 'QuestionController@askQuestion']);
	Route::post('/handleaskQuestion', ['middleware' => 'auth', 'as' => 'handleaskQuestion', 'uses' => 'QuestionController@handleaskQuestion']);
	Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
});