<?php

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

Route::group(['middleware' => ['auth']], function () {
Route::get('/question/index', 'QuestionController@index')->name('question.index');
Route::get('/question/edit/{id}', 'QuestionController@edit')->name('question.edit');
Route::post('/question/edit/create', 'QuestionController@editCreate')->name('question.edit.create');
Route::get('/question/new', 'QuestionController@new')->name('question.new');
Route::post('/question/newCreate', 'QuestionController@newCreate')->name('question.new.create');

});