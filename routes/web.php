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
    return Redirect::to('meeting');
});

Route::get('/home', function(){
	return Redirect::to('meeting');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mypage/','MypageController@index')->name('mypage');

Route::get('/meeting/', 'MeetingController@index');

Route::get('/meeting/create', 'MeetingController@create')->name('create');

Route::post('/meeting/', 'MeetingController@store')->name('store');

Route::get('/meeting/gcreate/{id}', 'GroupController@create')->name('g_create');

Route::post('/meeting/gstore', 'GroupController@store')->name('g_store');

Route::get('/meeting/{meeting}', 'MeetingController@show')->name('show');

Route::get('/meeting/join/{group}', 'SubmitController@create')->name('submit_create');

Route::post('/meeting/{meeting}/submit/', 'SubmitController@store')->name('submit_store');
