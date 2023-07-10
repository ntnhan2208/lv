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
            Route::post('/employees-changes-status-commission', 'EmployeeController@changeStatus');
            Route::get('/employee-commission/{id}', 'EmployeeController@commission')->name('employee_commission');
            Route::get('/employee-ready-room', 'EmployeeController@showReadyRoom')->name('employee_ready_room');

            Route::resource('/bookings', 'BookingController');

            Route::get('/check', 'BookingController@checkDuplicateCustomer')->name('check');
            Route::get('/room-booked', 'BookingController@roomBooked')->name('room-booked');

            Route::resource('/customers', 'CustomerController');
            Route::get('/booking/customer/{id}', 'BookingController@customerBooked')->name('customer-booked');
            Route::resource('/rooms', 'RoomController');
            Route::resource('/types', 'TypeController');
            Route::resource('/services', 'ServiceController');
            Route::resource('/appointments', 'AppointmentController');
            Route::resource('/deposits', 'DepositsController');
            Route::get('/add-deposits/{id}', 'DepositsController@addDepositsFromAppointment')->name('add-deposits');
            Route::get('/add-booking/{id}', 'BookingController@addBookingFromAppointment')->name('add-bookings');
            Route::get('/add-booking-from-deposits/{id}', 'BookingController@addBookingFromDeposits')->name('add-booking-from-deposits');

            Route::get('/bills/{id}', 'BillController@index')->name('bill-index');
            Route::get('/bills/create/{id}', 'BillController@create')->name('bill-create');
            Route::get('/bills/edit/{id}', 'BillController@edit')->name('bill-edit');
            Route::post('/bills/store/{id}', 'BillController@store')->name('bill-store');
            Route::put('/bills/update/{id}', 'BillController@update')->name('bill-update');
        });
        Route::get('log', 'ActivitylogController@index')->name('activitylog.index');
        Route::get('data-log', 'ActivitylogController@data')->name('activitylog.data');
        Route::get('/clear-cache', function () {
            Artisan::call('cache:clear');
            return redirect()->route('dashboard');
        });
    });
});
