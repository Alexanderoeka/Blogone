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
// Страница поста
Route::get('post/{id}/show', 'Blog\PostController@show')->name('post.show');


// Страница создания поста
Route::get('post/create', 'Blog\PostController@create')->name('post.create')->middleware('auth');
// Страница сохранения созданного поста
Route::get('post/store', 'Blog\PostController@store')->name('post.store');
// Создание аутентификации(все контроллеры подключены)
Auth::routes();
// Выход из аккаунта
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Домашняя страница
Route::get('/home', 'HomeController@index')->name('home');
// Страница пользователя
Route::get('user', 'Blog\UserController@index')->name('user')->middleware('auth');
// Страница пользователя, только post (тк там есть как пост запрос(форма), так и гет)
Route::post('user', 'Blog\UserController@index')->name('user')->middleware('auth');
// Сохранение отредактированных данных о пользователе
Route::post('user/store', 'Blog\UserController@store')->name('user.store')->middleware('auth');
// Главная страница админки
Route::get('admin', 'Blog\Admin\AdminController@index')->name('admin.index')->middleware('adminauth');
// Страница входа в админку
Route::get('admin/login', 'Blog\Admin\AdminLoginController@login')->name('admin.login');
// Проверка логина и пароля админа
Route::post('admin/checklogin', 'Blog\Admin\AdminLoginController@checklogin')->name('admin.checklogin');
// Выход из админки
Route::get('admin/logout', 'Blog\Admin\AdminController@logout')->name('admin.logout');

//Страница категорий в админке
Route::get('admin/categories', 'Blog\Admin\AdminCategoryController@index')->name('admin.categories')->middleware('adminauth');
// Страница редактирования категории в админке
Route::get('admin/categories/{id}/edit', 'Blog\Admin\AdminCategoryController@edit')->name('admin.category.edit')->middleware('adminauth');
// Страница сохранения отредактированных данных категории в админке
Route::post('admin/categories/{id}/save', 'Blog\Admin\AdminCategoryController@save')->name('admin.category.save')->middleware('adminauth');
//Удаления категории
Route::get('admin/categories/{id}/destroy', 'Blog\Admin\AdminCategoryController@destroy')->name('admin.category.destroy')->middleware('adminauth');
//Создание категории в админки
Route::get('admin/categories/create', 'Blog\Admin\AdminCategoryController@create')->name('admin.category.create')->middleware('adminauth');
// Сохранение созданной категории в админке
Route::post('admin/categories/store', 'Blog\Admin\AdminCategoryController@store')->name('admin.category.store')->middleware('adminauth');
// Страница с поиском постов по названию, категории и пользователю
Route::get('search', 'Blog\SearchController@index')->name('search');
// Поиск постов
Route::post('search.posts', 'Blog\SearchController@search')->name('search.posts');
// Редактирование поста от имени автора
Route::get('post/{id}/edit', 'Blog\PostController@edit')->name('post.edit')->middleware('checkedit');
// Сохранение отредактированного поста от имени автора
Route::post('post/{id}/save', 'Blog\PostController@save')->name('post.save')->middleware('checkedit');

// Страница поиска автора по имени
Route::get('authors', 'Blog\AuthorController@index')->name('authors');
// Страница автора с его постами
Route::get('author/{id}', 'Blog\AuthorController@show')->name('author');

// Поиск и вывод автора
Route::post('authors/find', 'Blog\AuthorController@find')->name('authors.find');

//Route::post('user/find', 'Blog\UserController@find')->name('user.find');
