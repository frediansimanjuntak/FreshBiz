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
include_once('admin.php');

Route::get('/', function () {
    return view('front.home');
})->name('front.home');

Route::get('/event', function () {
    return view('front.event.index');
})->name('front.event');

Route::get('/news', function () {
    return view('front.news.index');
})->name('front.news');

Route::get('/news/detail', function () {
    return view('front.news.detail');
})->name('front.news.detail');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::name('admin.')->group(function () {
        Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'AdminAuth\LoginController@login');
        Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');

        Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
        Route::post('/register', 'AdminAuth\RegisterController@register');

        Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
        Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
        Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
    });  
});
