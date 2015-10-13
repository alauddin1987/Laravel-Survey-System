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

// Default route...
Route::get('/', function () { return view('auth.login'); });

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('home', 'HomeController@index');


// Category routes...
Route::get('category/index', ['as' => 'index-category', 'uses' => 'CategoryController@index']);

Route::get('category/new', ['as' => 'create-category', 'uses' => 'CategoryController@create']);

Route::post('category/new', ['as' => 'store-category', 'uses' => 'CategoryController@store']);

Route::get('category/edit/{id}', ['as' => 'edit-category', 'uses' => 'CategoryController@edit']);

Route::post('category/edit', ['as' => 'update-category', 'uses' => 'CategoryController@update']);

Route::get('category/destroy/{id}', ['as' => 'destroy-category', 'uses' => 'CategoryController@destroy']);

// Answer Type routes...
Route::get('answertype/index', ['as' => 'index-answertype', 'uses' => 'AnswerTypeController@index']);

Route::get('answertype/new', ['as' => 'create-answertype', 'uses' => 'AnswerTypeController@create']);

Route::post('answertype/new', ['as' => 'store-answertype', 'uses' => 'AnswerTypeController@store']);

Route::get('answertype/edit/{id}', ['as' => 'edit-answertype', 'uses' => 'AnswerTypeController@edit']);

Route::post('answertype/edit', ['as' => 'update-answertype', 'uses' => 'AnswerTypeController@update']);



// Survey routes...
Route::get('survey/index', ['as' => 'index-survey', 'uses' => 'SurveyController@index']);

Route::get('survey/new', ['as' => 'create-survey', 'uses' => 'SurveyController@create']);

Route::post('survey/new', ['as' => 'store-survey', 'uses' => 'SurveyController@store']);

Route::get('survey/edit/{id}', ['as' => 'edit-survey', 'uses' => 'SurveyController@edit']);

Route::post('survey/edit', ['as' => 'update-survey', 'uses' => 'SurveyController@update']);


// Survey Questions routes...
Route::get('{sid}/question/index', ['as' => 'index-question', 'uses' => 'QuestionController@index']);

Route::get('{sid}/new-question', ['as' => 'create-question', 'uses' => 'QuestionController@create']);

Route::post('{sid}/new-question', ['as' => 'store-question', 'uses' => 'QuestionController@store']);

Route::get('{sid}/edit-question/{id}', ['as' => 'edit-question', 'uses' => 'QuestionController@edit']);

Route::post('{sid}/edit-question', ['as' => 'update-question', 'uses' => 'QuestionController@update']);

