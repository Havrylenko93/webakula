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

Route::get('/', 'FeedbackController@index');
Route::get('/admin', 'Admin\IndexController@index')->middleware('auth.basic')->name('indexadmin');
Route::post('/saveComment', 'FeedbackController@saveComment');
Route::group(['prefix' => 'admin'], function() {
    Route::get('/unpublish/{id}', 'Admin\IndexController@unpublish');
    Route::get('/publish/{id}', 'Admin\IndexController@publish');
    Route::get('/delete/{id}', 'Admin\IndexController@delete');
});

