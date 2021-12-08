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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login-admin', 'Admin\LoginController@index')->name('form.login.admin');
Route::post('/login-admin', 'Admin\LoginController@login')->name('login.admin');
Route::get("/home-admin",'Admin\HomeController@index')->name("home.admin");
Route::get("/logout-admin",'Admin\LogoutController@logout')->name("logout.admin");


Route::resource("/category-admin",'Admin\CategoryController');
Route::resource("/book-admin",'Admin\BookController');