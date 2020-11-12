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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Category
// for index
Route::get('/category_index', 'CategoryController@index')->name('category_index');
// for category store
Route::post('/category_index', 'CategoryController@store')->name('category_store');
//for category_update
Route::get('/category_update','CategoryController@edit')->name('category_edit');
//for category_update post
Route::post('/category_update','CategoryController@update')->name('category_update');


//for  Profile
Route::get('/profile/{id}','UserController@index')->name('profile');


// Post
// for home
Route::get('/home', 'HomeController@index')->name('home');

// for post
Route::get('/index','PostController@index')->name('post_index');

// for create post
Route::post('/index','PostController@store')->name('post_store');
 // for create
Route::get('/post_create','PostController@create')->name('post_create');

// for post_edit
Route::get('/post_update/{id}','PostController@edit')->name('post_edit');
//for post_store_update
Route::post('/post_update/{id}','PostController@update')->name('post_update');
//for post_delete
Route::get('/post_delete/{id}','PostController@destroy')->name('post_delete');
//for post view page
Route::get('/post_view/{id}','PostController@show')->name('post_view');

//for delete controller to delete and update
Route::get('/delete/{id}','DeleteController@destroy')->name('delete');











