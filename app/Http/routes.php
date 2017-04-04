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

Route::get('/', ['as' => '/', 'uses' => 'IndexController@index']);
Route::get('/index', ['as' => 'index', 'uses' => 'QuestionController@listQuestions']);
Route::get('/questions', ['as' => 'index', 'uses' => 'QuestionController@listQuestions']);
Route::get('/login', ['as' => 'login', 'uses' => 'QuestionController@listQuestions']);
Route::get('/privacy', ['as' => 'privacy', 'uses' => 'IndexController@privacy']);
Route::get('/terms', ['as' => 'terms', 'uses' => 'IndexController@terms']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'IndexController@contact']);
Route::get('/aboutus', ['as' => 'aboutus', 'uses' => 'IndexController@aboutus']);
Route::post('/handleContact', ['as' => 'handleContact', 'uses' => 'IndexController@handleContact']);
Route::get('/question/{question_id}', ['uses' => 'QuestionController@detailedQuestions']);
Route::get('/signup', function () {
	$title = "Sign Up | KnowAmp";
    return view('signup', compact('title'));
});
Route::get('verify/{userid}/{verifyid}', ['uses' =>'UsersController@verify']);
Route::post('/forgetPassword', ['as' => 'forgetPassword', 'uses' => 'UsersController@forgetPassword']);
Route::get('resetPassword/{verifyid}/', ['uses' =>'UsersController@resetPassword']);
Route::post('/handleResetPassword', ['as' => 'handleResetPassword', 'uses' =>'UsersController@handleResetPassword']);

Route::get('/sitemap', ['as' => 'sitemap', 'uses' => 'SitemapController@sitemap']);

Route::group(['middleware' => ['web']], function () {
	Route::post('/handleLogin', ['as' => 'handleLogin', 'uses' => 'AuthController@handleLogin']);
	Route::resource('users', 'UsersController', ['only' => ['signup', 'store']]);

	Route::get('/askQuestion', ['middleware' => 'auth', 'as' => 'askQuestion', 'uses' => 'QuestionController@askQuestion']);
	Route::post('/handleaskQuestion', ['middleware' => 'auth', 'as' => 'handleaskQuestion', 'uses' => 'QuestionController@handleaskQuestion']);

	Route::post('/handleAnswer', ['middleware' => 'auth', 'as' => 'handleAnswer', 'uses' => 'AnswerController@handleAnswer']);

	Route::get('/incQuestionRate/{question_id}', ['middleware' => 'auth', 'uses' => 'QuestionController@incApplyRate']);
	Route::get('/decQuestionRate/{question_id}', ['middleware' => 'auth', 'uses' => 'QuestionController@decApplyRate']);

	Route::get('/incAnswerRate/{answer_id}', ['middleware' => 'auth', 'uses' => 'AnswerController@incApplyRate']);
	Route::get('/decAnswerRate/{answer_id}', ['middleware' => 'auth', 'uses' => 'AnswerController@decApplyRate']);

	Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
});