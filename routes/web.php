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

//Language switch action
Route::get('/setlocale', 'Controller@locale')
        ->where('locale', '[a-z]{2}');

// Home page
Route::get('/home', 'HomeController@index')->name('home')->middleware('can:admin, App\User')->middleware('verified');

// Category resource routes
Route::resource('category', 'CategoryController');

// Service resource routes
Route::resource('service', 'ServiceController');

// Order resource routes
Route::resource('order', 'OrderController');

// User resource routes
Route::resource('user', 'UserController');

// User state switch action
Route::get('/user/switchstate/{id}', 'UserController@switchstate')->name('switchstate')->middleware('can:admin, App\User')->middleware('verified');

// Category list page 
Route::get('/{id}', 'Controller@show')->name('category');