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
        Route::group(['prefix' => 'website_setting', 'namespace' => 'WebsiteSetting'], function () { 
            Route::name('setting.website.view.')->group(function () {                
                Route::get('/setting/website', 'WebsiteSettingController@view_update')->name('update');
            });  
            Route::name('setting.website.func.')->group(function () {   
                Route::put('/setting/website/update', 'WebsiteSettingController@update')->name('update');    
            }); 
        });  
    });
});