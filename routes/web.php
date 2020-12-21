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

use Illuminate\Support\Facades\Route;

/// -- Version 2 Front page -- ///
Route::namespace('V2\Front')->group(function (){
    // --  Posts actions -- //
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/post/{slug}', 'HomeController@show')->name('posts.single');
    Route::get('/category/{categorySlug}', 'HomeController@getCategoryPosts')->name('category.posts');
    Route::get('search', 'HomeController@search')->name('posts.search');

});

/// -- Version 2 Admin -- ///
Route::namespace('V2\Admin')->prefix('manage')->group(function (){

    // -- Authorization -- //
    Route::namespace('Auth')->group(function (){
       Route::get('login', 'AuthController@loginPage')->name('login.page');
       Route::post('login', 'AuthController@login')->name('login');
    });

    // --  Dashboard actions -- //
    Route::get('/', 'DashboardController@index')->name('manage.home');
    Route::prefix('dashboard')->group(function (){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/analytics', 'DashboardController@index')->name('analytics');
    });

    // --  Posts actions -- //
    Route::prefix('posts')->group(function (){
        Route::get('/', 'PostController@index')->name('manage.posts.all');
        Route::get('/archive', 'PostController@archive')->name('archive');
        Route::get('/editor', 'PostController@editorPosts')->name('editor');
        Route::get('/banner', 'PostController@editorPosts')->name('banner');
        Route::get('create', 'PostController@create')->name('posts.create');
        Route::post('store', 'PostController@store')->name('posts.store');
        Route::get('{post}/edit', 'PostController@edit')->name('posts.edit');
        Route::post('{slug}/changeStatus', 'PostController@changeStatus')->name('posts.changeStatus');
        Route::put('{post}/update/type', 'PostController@updateType')->name('posts.updateType');
    });

    // -- Category actions -- //
    Route::prefix('categories')->group(function (){
        Route::get('/', 'CategoryController@index')->name('categories.all');
        Route::get('create', 'CategoryController@create')->name('categories.create');
        Route::post('store', 'CategoryController@store')->name('categories.store');
        Route::get('{category}/get', 'CategoryController@get')->name('categories.get');
        Route::get('{category}/update', 'CategoryController@update')->name('categories.update');
        Route::post('{category}/delete', 'CategoryController@destroy')->name('categories.delete');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

