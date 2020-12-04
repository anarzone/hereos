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


//    Route::group(['prefix'=>'admin'], function (){
//        Auth::routes();
//        Route::get('/', 'AdminController@dashboard')->name('dashboard');
//        Route::resource('users', 'UserController');
//        Route::post('posts/restore_post', 'PostController@restore_post')->name('posts.restore_post');
//        Route::post('posts/restore-all', 'PostController@restore_all')->name('posts.restore_all');
//        Route::get('posts/trash', 'PostController@show_deleted_posts')->name('posts.deleted_posts');
//        Route::resource('posts', 'PostController');
//        Route::resource('categories', 'CategoryController');
//        Route::resource('pages', 'PageController');
//        Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
//        Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
//    });

//Route::get('/', 'FrontController@index')->name('home');
//Route::get('/search', 'FrontController@searchPage')->name('search');
//Route::get('/category/{slug}', 'FrontController@showCategory')->name('category.single');
//Route::get('/post/{slug}', 'FrontController@showPost')->name('post.single');
//Route::get('/{slug}', 'FrontController@showPage')->name('page.single');

    /// -- Version 2 Front page -- ///
    Route::namespace('V2\Front')->group(function (){
        // --  Posts actions -- //
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/post/{slug}', 'HomeController@show')->name('posts.single');
        Route::get('/category/{categorySlug}', 'HomeController@getCategoryPosts')->name('category.posts');
    });

    /// -- Version 2 Admin -- ///
    Route::namespace('V2\Admin')->prefix('manage')->group(function (){
        // -- File upload -- //
        Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
        Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

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





