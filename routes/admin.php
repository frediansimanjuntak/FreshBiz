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

        Route::group(['prefix' => 'event_organisers', 'namespace' => 'EventOrganisers'], function () { 
            Route::name('event_organisers.view.')->group(function () {                
                Route::get('/list', 'EventOrganisersController@index')->name('list');
                Route::get('/create', 'EventOrganisersController@view_create')->name('create');
                Route::get('/update', 'EventOrganisersController@view_update')->name('update');
            });  
            Route::name('event_organisers.func.')->group(function () { 
                Route::post('/create', 'EventOrganisersController@create')->name('create');   
                Route::put('/update', 'EventOrganisersController@update')->name('update'); 
                Route::post('/delete', 'EventOrganisersController@delete')->name('delete');     
            }); 
        }); 

        Route::group(['prefix' => 'event', 'namespace' => 'Event'], function () { 
            Route::name('event.view.')->group(function () {                
                Route::get('/list', 'EventController@index')->name('list');
                Route::get('/detail', 'EventController@view_detail')->name('detail');
                Route::get('/create', 'EventController@view_create')->name('create');
                Route::get('/update', 'EventController@view_update')->name('update');
            });  
            Route::name('event.func.')->group(function () { 
                Route::post('/create', 'EventController@create')->name('create');   
                Route::put('/update', 'EventController@update')->name('update'); 
                Route::post('/delete', 'EventController@delete')->name('delete');     
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
        Route::group(['prefix' => 'email_setting', 'namespace' => 'EmailSetting'], function () { 
            Route::name('setting.email.view.')->group(function () {                
                Route::get('/setting/email', 'EmailSettingController@view_update')->name('update');
            });  
            Route::name('setting.email.func.')->group(function () {   
                Route::put('/setting/email/update', 'EmailSettingController@update')->name('update');    
            }); 
        });   
        Route::group(['prefix' => 'user', 'namespace' => 'User'], function () { 
            Route::name('user.view.')->group(function () {                
                Route::get('/list', 'UserController@index')->name('list');
            });  
            Route::name('user.func.')->group(function () {   
                Route::POST('/update', 'UserController@update')->name('update');      
            }); 
        });  
    });
});