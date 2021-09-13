<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/survey/create', 'SurveyController@create');
Route::post('/survey/create', 'SurveyController@store');
Route::get('/survey/{survey}', 'SurveyController@show');

Route::get('/survey/{survey}/questions/create', 'QuestionController@create');
Route::post('/survey/{survey}/questions/create', 'QuestionController@store');
Route::delete('/survey/{survey}/questions/{question}', 'QuestionController@delete');

Route::get('/survey/take/{survey}-{slug}', 'SurveyController@take');
Route::post('/survey/take/{survey}-{slug}', 'SurveyController@takeStore');



Route::get('/validation', 'ValidationController@index');
Route::post('/validation', 'ValidationController@store');

Route::get('/coupon', 'CouponController@index');
Route::post('/coupon', 'CouponController@store');
