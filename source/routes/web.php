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

Route::get('/', 'PagesController@home');
Route::get('/analysis', 'QuestionsController@showAnalysis');
Route::post('/analysis/result', 'TempUserController@calculate');
Route::post('/setnew', 'QuestionsController@setNew');
Route::put('/editold', 'QuestionsController@editOld');
Route::delete('/delete', 'QuestionsController@deleteOld');

Auth::routes();

//Route::get('/home', 'QuestionsController@test')->name('home');
Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});
//Route::get('/edit/{id}', 'QuestionsController@edit');

//Route::resource('pages/analysis', 'QuestionsController');
Route::resource('admin', 'QuestionsController');
