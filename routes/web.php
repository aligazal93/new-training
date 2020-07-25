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
    return view('begin');
});


// Route::get('/profile.edit', function () {
//     return view('profile.edit');
// });

Route::get('/profile/edit', 'ProfileController@edit');
Route::patch('/profile/update', 'ProfileController@update');


Route::get('/begin', function () {
    return view('begin');
});

Route::get('/products', 'ProductController@index');
Route::get('/products.create', 'ProductController@create');
Route::post('/products', 'ProductController@store');
Route::get('/products/{product}', 'ProductController@show');
Route::get('/products/{product}/edit', 'ProductController@edit');
Route::PATCH('/products/{product}', 'ProductController@update');
Route::DELETE('/products/{product}', 'ProductController@destroy');



Route::get('/users', 'userController@index');
Route::get('/users.create', 'userController@create');
Route::post('/users', 'userController@store');
Route::get('/users/{user}/edit', 'userController@edit');
Route::PATCH('/users/{user}', 'userController@update');
Route::DELETE('/users/{user}', 'userController@destroy');



Route::get('/categories', 'CategoryController@index');
Route::get('/categories.create', 'CategoryController@create');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/{category}/edit', 'CategoryController@edit');
Route::patch('/categories/{category}', 'CategoryController@update');
Route::DELETE('/categories/{category}', 'CategoryController@destroy');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
