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

Route::get('/', 'HomeController@show')->name('home.home');

Route::resource('categories', 'CategoryController');
Route::get('categories/{category}/create', 'ProductController@createInCategory')->name('products.create.inCategory');

Route::resource('products', 'ProductController',[
	'except' => ['index']
]);

Route::resource('product_images', 'ProductImageController', [
    'except' => ['index', 'show', 'update', 'edit']
]);
