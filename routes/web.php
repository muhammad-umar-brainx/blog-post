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
    return redirect('/blog');
});


Route::get('/blog', 'BlogPostController@index');



Route::post('/blog', 'BlogPostController@createBlog');
Route::post('/blog/edit', 'BlogPostController@editBlog');
Route::post('/blog/delete', 'BlogPostController@deleteBlog');

Route::get('/blog/{name}', 'PostController@getPost')->name('allPost');
Route::post('/store-post', 'PostController@createPost');
Route::post('/edit-post', 'PostController@editPost');
Route::post('/delete-post', 'PostController@deletePost');


Route::get('/calculator', 'PracticeController@calculatorForm');
Route::post('/calculator', 'PracticeController@calculator');
Route::post('/calculator/ajax', 'PracticeController@calculatorAjax');
Route::post('/calculator/api', 'PracticeController@calculatorApi');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
