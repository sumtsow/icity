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

// Company resource routes
Route::resource('company', 'CompanyController');

// Service view page 
Route::get('/service/view/{id}', 'ServiceController@view');

// Service resource routes
Route::resource('service', 'ServiceController');

// Order resource routes
Route::resource('order', 'OrderController');

// Order remove service route
Route::get('/order/remove-service/{id}/{id_service}', 'OrderController@removeService')->middleware('can:admin, App\User')->middleware('verified');

// Tariff plan resource routes
Route::resource('plan', 'PlanController');

// User resource routes
Route::resource('user', 'UserController');

// User state switch action
Route::get('/user/switchstate/{id}', 'UserController@switchstate')->name('switchstate')->middleware('can:admin, App\User')->middleware('verified');

// Company state switch action
Route::get('/company/switchstate/{id}/{property}', 'CompanyController@switchstate')->middleware('can:admin, App\User')->middleware('verified');

// Category list page 
Route::get('/{id}', 'Controller@show')->name('category');