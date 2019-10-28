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

Route::get('/blog', 'BlogPostController@index');
Route::post('/blog', 'BlogPostController@createBlog');
Route::post('/blog/edit', 'BlogPostController@editBlog');
Route::post('/blog/delete', 'BlogPostController@deleteBlog');
Route::get('/blog/{name}', 'BlogPostController@blogDesc');

Route::get('/calculator', 'PracticeController@calculatorForm');
Route::post('/calculator', 'PracticeController@calculator');
Route::post('/calculator/ajax', 'PracticeController@calculatorAjax');
Route::post('/calculator/api', 'PracticeController@calculatorApi');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
