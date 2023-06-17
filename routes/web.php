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
$prefix = "Web";
//Route::get('/', $prefix . '\HomeController@index')->name('frontend.home');
//Route::resource('web_rooms', $prefix . '\RoomController');
//Route::get('show_room_type/{id}', $prefix . '\RoomController@showRoomType')->name('show_room_type');
//Route::post('search_room', $prefix . '\SearchController@search')->name('search_room');
//Route::get('search_booking', $prefix . '\SearchController@createSearchBooking')->name('search_booking');
//Route::post('search_boking_result', $prefix . '\SearchController@searchBooking')->name('search_boking_result');
//Route::get('/contact', $prefix . '\ContactController@index')->name('frontend.contact');
//Route::get('/create_request/{id}', $prefix . '\BookingController@createRequest')->name('create_request');
//Route::put('/cancel_booking/{id}', $prefix . '\BookingController@cancelBooking')->name('cancel_booking');
//Route::post('/store_request', $prefix . '\BookingController@storeRequest')->name('store_request');
//Route::get('/about', $prefix . '\AboutController@index')->name('frontend.about');


Auth::routes();

