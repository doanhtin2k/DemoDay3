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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/home/category/{title}', 'HomeController@category')->name('category.user');
    Route::get('/home/cart', 'CartController@index')->name('cart.user');
    Route::get('/add-to-cart', 'CartController@addToCart')->name('add_to_cart.user');
    Route::get('/bill', 'BillController@index')->name('bill.index.user');
    Route::post('/bill', 'BillController@create')->name('bill.create.user');
    Route::get('/bill/history', 'BillController@history')->name('bill.history.user');
    Route::get('/bill/history/{id}', 'BillController@show')->name('bill.history.details.user');
    Route::get('/notification/details/{id}', 'NotificationController@show')->name('notification.details.user');
});


Route::group(['middleware' => 'Check_logout_admin'], function() {
    Route::get('/register-admin', 'Admin\RegisterController@index')->name('form.register.admin');
    Route::post('/register-admin', 'Admin\RegisterController@register')->name('register.admin');
    Route::get('/login-admin', 'Admin\LoginController@index')->name('form.login.admin');
    Route::post('/login-admin', 'Admin\LoginController@login')->name('login.admin');

    Route::post("/admin/password/email",'Admin\ForgotPasswordController@sendResetLinkEmail')->name("password.email.admin");
    Route::post("/admin/password/reset",'Admin\ResetPasswordController@reset')->name("password.update.admin");

    Route::get("/admin/password/reset",'Admin\ForgotPasswordController@showLinkRequestForm')->name("password.request.admin");
    Route::get("/admin/password/reset/{token}",'Admin\ResetPasswordController@showResetForm')->name("password.reset.admin");
});


Route::group(['middleware' => 'Check_login_admin'], function() {
    Route::get("/home-admin",'Admin\HomeController@index')->name("home.admin");
    Route::get("/logout-admin",'Admin\LogoutController@logout')->name("logout.admin");
    Route::resource("/category-admin",'Admin\CategoryController');
    Route::resource("/book-admin",'Admin\BookController');
    Route::resource("/user-admin",'Admin\UserController')->only(['index','destroy']);
    Route::get("/bill-admin",'Admin\BillController@index')->name("bill.index.admin");
});

Route::get('/database-demo', 'DemodatabaseController@index');
// Route::get('/sendmail-demo', 'DemoSendMailController@index');




Route::get('/task', 'TaskController@index')->name('index');
Route::post('/task', 'TaskController@store')->name('store.task');
Route::delete('/task/{task}', 'TaskController@delete')->name('delete.task');
Route::get('/demo-notification', 'DemoNotificationController@index');
