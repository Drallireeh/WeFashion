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

Route::get('/', 'FrontController@index');

Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

Route::get('category/{id}', 'FrontController@showCategory')->where(['id' => '[1|2]']);

Route::get('discount', 'FrontController@showSales');

Route::resource('admin/product', 'ProductController')->middleware('auth');

Auth::routes();

Route::middleware(['auth', 'checkElevation'])->group(function () {
    Route::resource('admin/product', 'ProductController');
});

Route::get('/home', 'HomeController@index')->name('home');
