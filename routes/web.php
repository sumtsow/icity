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

Auth::routes(['verify' => true]);

// Main page
Route::get('/', 'Controller@index')->name('index');

// Category page
Route::get('/category/{id}', 'Controller@show')->name('category');

// Service page
Route::get('/service/{id}', 'ServiceController@show')->name('service');

// Order page
Route::get('/order/create', 'OrderController@create')->name('order');

// Users list view
Route::get('/user', 'UserController@index')->name('user')->middleware('can:admin, App\User')->middleware('verified');

// User show form
Route::get('/user/{id}', 'UserController@show')->middleware('can:admin, App\User')->middleware('verified');

// User edit form
Route::get('/user/{id}/edit', 'UserController@edit')->middleware('can:admin, App\User')->middleware('verified');

//Language switch action
Route::get('/setlocale', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

// Home page
Route::get('/home', 'HomeController@index')->name('home')->middleware('can:admin, App\User')->middleware('verified');




