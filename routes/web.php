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

Route::get('/','ReportController@index');
Route::resource('/allName','PrepController');
Route::resource('/reports','ReportController');
Route::resource('/metric','MetricController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/my','UserController');
Route::get('/edit/my', 'UserController@myedit')->name('myEdit');
Route::get('/myshow/all', 'UserController@myshow')->name('myShow')->middleware('checkUser');
Route::get('/user/restore/{id}', 'UserController@restore');
Route::get('/user/delete/{id}', 'UserController@delete');

Route::get('/metric/editUp/{id}', 'MetricController@editUp');
Route::get('/metric/editIn/{id}', 'MetricController@editIn');
