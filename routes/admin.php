<?php

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () { 
    //category
    Route::name('admin.')->group(function () {
        Route::get('dashboard', 'HomeController@index')->name('home');
        Route::group(['prefix' => 'event_category', 'namespace' => 'EventCategories'], function () { 
            Route::name('event_categories.view.')->group(function () {                
                Route::get('/list', 'EventCategoriesController@index')->name('list');
                Route::get('/create', 'EventCategoriesController@view_create')->name('create');
                Route::get('/update', 'EventCategoriesController@view_update')->name('update');
            });  
            Route::name('event_categories.func.')->group(function () { 
                Route::post('/create', 'EventCategoriesController@create')->name('create');   
                Route::put('/update', 'EventCategoriesController@update')->name('update'); 
                Route::post('/delete', 'EventCategoriesController@delete')->name('delete');     
            }); 
        }); 
         
    });
});