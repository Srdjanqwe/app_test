<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', 'UserController@index');
Route::resource('/users', 'UserController')->middleware('auth');
Route::get('/impersonate/{user_id}', 'UserController@impersonate')->name('impersonate');
Route::get('/impersonate_leave', 'UserController@impersonate_leave')->name('impersonate_leave');
Auth::routes();
