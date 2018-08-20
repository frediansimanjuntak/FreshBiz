<?php

// Route::get('/home', function () {
//     $users[] = Auth::user();
//     $users[] = Auth::guard()->user();
//     $users[] = Auth::guard('admin')->user();

//     //dd($users);

//     return view('admin.home');
// })->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () { 
    //category
    Route::name('admin.')->group(function () {
        Route::group(['prefix' => 'event_category', 'namespace' => 'EventCategories'], function () { 
            Route::name('event_categories.view.')->group(function () {                
                Route::get('/list', 'EventCategoriesController@index')->name('list');
                Route::get('/create', 'EventCategoriesController@view_create')->name('create');
                Route::get('/update', 'EventCategoriesController@view_update')->name('update');
            });  
            // Route::name('category.func.')->group(function () { 
            //     Route::post('/create', 'CategoryController@create')->name('create');   
            //     Route::put('/update', 'CategoryController@update')->name('update'); 
            //     Route::post('/delete', 'CategoryController@delete')->name('delete');     
            // }); 
        });  
    });
});