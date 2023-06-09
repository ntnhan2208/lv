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

Route::namespace('admin')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login')->name('admin.login.submit');
    Route::group(['middleware' => ['auth:admin']], function () {
        Route::group(['middleware' => 'locale'], function () {
            Route::get('/', 'HomeController@index');
            Route::get('/home', 'HomeController@index')->name('dashboard');
            Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('admin.change-language');
            Route::post('/logout', 'AuthController@logout')->name('admin.logout');
            Route::get('change_profile', 'AdminController@changeProfile')->name('change_profile');
            Route::get('change_password', 'AdminController@changePassword')->name('change_password');
            Route::post('update_password', 'AdminController@updatePassword')->name('update_password');
            Route::resource('/admins', 'AdminController');
            Route::resource('/employees', 'EmployeeController');

            Route::resource('/bookings', 'BookingController');

            Route::get('/create_for_new/{id}', 'RequestBookingController@createConfirmForNewCustomer')->name('create_for_new');
            Route::post('/store_for_new/{id}', 'RequestBookingController@storeConfirmForNewCustomer')->name('store_for_new');
            Route::get('/create_for_old/{id}', 'RequestBookingController@createConfirmForOldCustomer')->name('create_for_old');
            Route::post('/store_for_old/{id}', 'RequestBookingController@storeConfirmForOldCustomer')->name('store_for_old');


            Route::get('/re_create/{id}', 'BookingController@re_create')->name('re_create');
            Route::get('/check', 'BookingController@checkDuplicateCustomer')->name('check');
            Route::post('/re_store/{id}', 'BookingController@re_store')->name('re_store');

            Route::resource('/customers', 'CustomerController');
            Route::resource('/rooms', 'RoomController');
            Route::resource('/types', 'TypeController');
            Route::resource('/services', 'ServiceController');
        });
        Route::get('log', 'ActivitylogController@index')->name('activitylog.index');
        Route::get('data-log', 'ActivitylogController@data')->name('activitylog.data');
        Route::get('/clear-cache', function () {
            Artisan::call('cache:clear');
            return redirect()->route('dashboard');
        });
    });
});
