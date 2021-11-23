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
Route::get('/', 'Blog\HomeController@index')->name('mainpage');

// Страница категорий
Route::get('categories', 'Blog\CategoryController@index')->name('categories');
//Страница постов категории
Route::get('categories/{index}/posts', 'Blog\PostController@index')->name('categories.posts');

Route::get('post/{id}/show', 'Blog\PostController@show')->name('post.show');



Route::get('post/create', 'Blog\PostController@create')->name('post.create')->middleware('auth');

Route::get('post/store', 'Blog\PostController@store')->name('post.store');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('user', 'Blog\UserController@index')->name('user')->middleware('auth');

Route::post('user/store', 'Blog\UserController@store')->name('user.store')->middleware('auth');

Route::get('admin', 'Blog\Admin\AdminController@index')->name('admin.index')->middleware('adminauth');

Route::get('admin/login', 'Blog\Admin\AdminLoginController@login')->name('admin.login');

Route::post('admin/checklogin','Blog\Admin\AdminLoginController@checklogin')->name('admin.checklogin');

Route::get('admin/logout','Blog\Admin\AdminController@logout')->name('admin.logout');


Route::get('admin/categories','Blog\Admin\AdminCategoryController@index')->name('admin.categories')->middleware('adminauth');
