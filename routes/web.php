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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/good/buy/{id}', 'HomeController@buyGood')->name('buyGood');
Route::get('/good/{id}', 'HomeController@detailGood')->name('detailGood');

Route::get('/good/category/{id}', 'HomeController@category')->name('category');
Route::get('/good/category/delete/{id}', 'HomeController@deleteCategory')
    ->name('deleteCategory')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/category/edit/{id}', 'AdminController@editCategory')
    ->name('editCategory')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/category/add/', 'AdminController@addCategory')
    ->name('addCategory')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/category/update/{id}', 'AdminController@updateCategory')
    ->name('updateCategory')
    ->middleware(\App\Http\Middleware\Admin::class);

Route::get('/order/{id}', 'OrderController@makeOrder')->name('order');

Route::get('/admin','AdminController@index')->name('admin')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/category/','AdminController@categories')->name('categoriesAdmin')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/goods/','AdminController@goods')->name('goodsAdmin')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/orders/','AdminController@orders')->name('ordersAdmin')
    ->middleware(\App\Http\Middleware\Admin::class);


Route::get('/admin/good/update/{id}','AdminController@updateGood')->name('updateGood')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/good/delete/{id}','AdminController@deleteGood')->name('deleteGood')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/good/edit/{id}','AdminController@editGood')->name('editGood')
    ->middleware(\App\Http\Middleware\Admin::class);
Route::get('/admin/good/add/','AdminController@addGood')->name('addGood')
    ->middleware(\App\Http\Middleware\Admin::class);