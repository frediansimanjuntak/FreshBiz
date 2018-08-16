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
