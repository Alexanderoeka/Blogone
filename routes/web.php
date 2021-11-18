<?php

use Illuminate\Support\Facades\Auth;
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
//Auth::get();
// Стартовая страница
Route::get('/','Blog\HomeController@index')->name('mainpage');

// Страница категорий
Route::get('categories','Blog\CategoryController@index')->name('categories');
//Страница постов категории
Route::get('categories/{index}/posts','Blog\PostController@index')->name('categories.posts');

Route::get('post/{id}','Blog\PostController@show')->name('post.show');
