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

use Illuminate\Support\Facades\Route;

Route::get('/', 'User\UserController@list');
Route::get('/user/{id}/editUser', 'User\UserController@editUser')->name('user.editUser');
Route::put('/user/{id}/updateUser/', 'User\UserController@updateUser')->name('user.updateUser');
Route::delete('/user/{id}/destroyUser/', 'User\UserController@destroyUser')->name('user.destroyUser');
Route::resource('user', 'User\UserController');





