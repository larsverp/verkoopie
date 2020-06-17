<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Auth::routes(['verify' => true]);

# Home routes
Route::get('/home', 'ProductsController@show')->name('home');

# Authentication routes (These are predifined)
Route::post('/authenticate', 'Auth\VerificationController@verify')
    ->middleware('auth')
    ->name('verify_me');

# Product routes
Route::get('/product/{id}', 'ProductsController@index');
Route::get('product', function () {
    return view('new_product');
})->middleware('auth');
Route::post('product', 'ProductsController@create')
    ->middleware('auth')
    ->name('new_product');

Route::get('/product/update/{id}', 'ProductsController@get_update')
    ->middleware('auth');
Route::put('product', 'ProductsController@update')
    ->middleware('auth')
    ->name('update_product');

Route::delete('product/{id}', 'ProductsController@remove')
    ->middleware('auth');

# User routes
Route::get('/user/product', 'UsersController@list')
    ->middleware('auth')
    ->name('my_products');
Route::get('/user/product/{id}', 'UsersController@products')
    ->middleware('auth');

# Categories routes
Route::get('/categories/{id}', 'CategoriesController@index')
        ->middleware('auth');