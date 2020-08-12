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

// Route::get('/', function () {
//     return view('user.index');
// });
// Route::get('/admin', function () {
//     return view('admin.index');
// });
Auth::routes();

Route::group(['middleware' => ['admin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('status', 'StatusController');
        Route::resource('workDay','WorkDayController');
        Route::resource('session', 'SessionController');
        Route::get('booking','AdminBookingController@index')->name('admin.booking'); 
        Route::get('/complete/{id}','AdminBookingController@complete')->name('complete');
        Route::get('/cancel/{id}','AdminBookingController@cancel')->name('cancel');
        Route::put('update-booking/{id}','AdminBookingController@update')->name('admin.booking.update');
        route::get('/','DashboardController@index')->name('dashboard.index');
        route::get('/user','AdminController@index')->name('user.index');
        route::post('/user','AdminController@store')->name('user.store');
        Route::delete('users/{id}','AdminController@destroy')->name('user.destroy');
        Route::get('/feature','FeatureController@index')->name('feature.index');
        Route::post('/feature','FeatureController@store')->name('feature.store');
        Route::put('/feature/{id}','FeatureController@update')->name('feature.update');
        Route::delete('/feature/{id}','FeatureController@destroy')->name('feature.destroy');
        Route::get('/doctor','DoctorsController@index')->name('doctor.index');
        Route::post('/doctor','DoctorsController@store')->name('doctor.store');
        Route::put('/doctor/{id}','DoctorsController@update')->name('doctor.update');
        Route::delete('/doctor/{id}','DoctorsController@destroy')->name('doctor.destroy');
        Route::get('/quality','QualityController@index')->name('quality.index');
        Route::post('/quality','QualityController@store')->name('quality.store');
        Route::put('/quality/{id}','QualityController@update')->name('quality.update');
        Route::delete('/quality/{id}','QualityController@destroy')->name('quality.destroy');
        Route::get('/company','CompanyController@index')->name('company.index');
        Route::put('/company/{id}','CompanyController@update')->name('company.update');
        Route::get('/available','AvailableController@index')->name('available.index');
        Route::post('/available','AvailableController@store')->name('available.store');
        Route::put('/available/{id}','AvailableController@update')->name('available.update');
        Route::delete('/available/{id}','AvailableController@destroy')->name('available.destroy');
        Route::get('/about','AboutController@index')->name('about.index');
        Route::put('/about/{id}','AboutController@update')->name('about.update');
        Route::get('/contact','ContactController@index')->name('admin.contact');
    });
});
Route::get('/', 'BookingController@index')->name('booking.index');
Route::post('/','BookingController@store')->name('booking.store');
Route::get('/booking','BookingController@show')->name('booking.show');
Route::get('/booking/cancel/{id}','BookingController@cancel')->name('booking.cancel');
Route::get('/about','CompanyController@about')->name('contact.index');
Route::post('/about','ContactController@store')->name('contact.store');
// Route::get('/about','AboutController@index')->name('about.index');
// Route::put('/about/{id}','AboutController@update')->name('about.update');

