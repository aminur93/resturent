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

Route::get('/', 'HomeController@index')->name('welcome');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact','ContactController@Add_contact')->name('contact.Add_contact');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'admin'], function () {
    
    //Dashboard controller
    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
    
    //Slider image controller
    Route::resource('slider','SliderController');
    
    //category controller
    Route::resource('category','CategoryController');
    
    //Food Item controller
    Route::resource('item','ItemController');
    
    //reservation controller
    Route::get('reserve','ReservationController@index')->name('reserve.index');
    Route::post('reserve/{id}','ReservationController@status')->name('reserve.status');
    Route::delete('reserve/{id}','ReservationController@destroy')->name('reserve.destroy');
    
    //Contact Controller
    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
});    
