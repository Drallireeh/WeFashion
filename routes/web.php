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

Route::get('products', function(){
    return App\Product::all();
});

// Route::get('/soldes', function () {
//     return view('welcome');
// });

// Route::get('/hommes', function () {
//     return view('welcome');
// });

// Route::get('/femmes', function () {
//     return view('welcome');
// });