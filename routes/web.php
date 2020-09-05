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

// Papertrail password: Afghan!23

// Webstite
// |--------------------------------------------------------------------------

Route::get('/', 'WebsiteController@index');
Route::get('/rooms', 'WebsiteController@rooms');
Route::get('/rooms/{rooms}', 'WebsiteController@show');
Route::get('/foods', 'WebsiteController@foods');
Route::get('/drinkings', 'WebsiteController@drinkings');
Route::get('/foods/{foods}', 'WebsiteController@foodshow');
Route::get('/services', 'WebsiteController@services');
Route::get('/contact', 'WebsiteController@contact');
Route::resource('/contactform', 'ContactController');

// Testings
// |--------------------------------------------------------------------------

// Route::get('/authorization', 'AuthorizationController');
// Route::get('navbar', 'AdminController@navbar');
// Route::get('storing', 'ServiceController@store');
// Route::get('test', 'TestingController@index');
// Route::get('rooms', 'AdminController@rooms');
// Route::get('store', 'AdminController@store');
// Route::resource('service', 'ServiceController');
// Route::resource('serviceContact', 'ServiceContactController');

// |--------------------------------------------------------------------------
            // Assistant part
// |--------------------------------------------------------------------------

Route::middleware('can:access-receptionist-area')->group(function () {
    Route::resource('service', 'AssistantController');
    Route::resource('customer', 'CustomerController');
    Route::resource('roombooking', 'RoomBookingController');    
    Route::resource('food', 'FoodController');
    Route::resource('bill', 'BillCOntroller');
});

            // Admin part
// |--------------------------------------------------------------------------

Route::middleware(['check.redirect', 'can:access-admin-area'])->group(function () {
    route::get('/dboard', 'DashboardController@index');
    route::get('/dboard/users', 'DashboardController@users');
    route::get('/dboard/employees', 'DashboardController@employees');
    route::get('/dboard/rooms', 'DashboardController@rooms');
    route::get('/dboard/foods', 'DashboardController@foods')->name('foods');
    route::get('/dboard/feedback', 'DashboardController@feedbacks');

    Route::resource('room', 'RoomsController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('foodMenu', 'FoodmenuController');
    Route::resource('receptionist', 'ReceptionistController');
    Route::get('/home', 'AdminController@index');
    
    Route::get('/dboard/daily', 'ReportsController@daily');
    Route::get('/dboard/weekly', 'ReportsController@weekly');
    Route::get('/dboard/monthly', 'ReportsController@monthly');
    Route::get('/dboard/grand', 'ReportsController@grand');
    
    Route::resource('/contactform', 'ContactController');

});
// |--------------------------------------------------------------------------



// |--------------------------------------------------------------------------
Auth::routes();
