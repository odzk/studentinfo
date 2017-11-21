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

Route::get('/login', function () {
	return view('login');

});

Route::resource('manage', 'ManageStudentsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/create', 'ManageStudentsController@create');

Route::post('/manage/store', 'ManageStudentsController@store');

Route::delete('manage/delete/{id}', array('uses' => 'ManageStudentsController@destroy', 'as' => 'manage.delete'));

Route::get('/manage/edit/{id}', 'ManageStudentsController@edit');

Route::post('/manage/update/{id}', 'ManageStudentsController@update');

Route::get('/manage/index/all', 'ManageStudentsController@all');


