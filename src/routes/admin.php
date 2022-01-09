<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;


Route::namespace('Admin')->group(function () {
    Route::get('login', 'Auth\LoginController@getLogin')->name('admin.login_form');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductController@index')->name('admin.products.index');
            Route::get('/show', [ProductController::class, 'show'])->name('admin.products.show');
        });
    });


});
