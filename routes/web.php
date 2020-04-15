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
    return view('home');
});

Route::get('checkExistingCategory/{category}','CategoryController@checkExistingCategory');

Route::get('cancelEditCategory/{id}', 'CategoryController@cancelEditCategory');
Route::get('cancelEditProduct/{id}', 'ProductController@cancelEditProduct');

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');