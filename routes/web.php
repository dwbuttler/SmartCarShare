<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| @author: David Buttler
| @version: 1.0
| @since: 10-11-2017
|
*/

// Authentication Routes
Auth::routes();

// Routes encountered upon first visiting the website
Route::get('/', 'RolesController@index');
Route::get('/home', 'RolesController@index');

// Booking Routes
Route::get('/bookings', 'BookingController@index');
Route::get('/bookings/{booking}', 'BookingController@viewBooking');
Route::get('/booking', 'BookingController@displayForm');
Route::post('/booking', 'BookingController@saveBooking');
Route::get('/booking/{booking}', 'BookingController@displayEditForm');
Route::post('/booking/update', 'BookingController@updateBooking');
Route::post('/booking/archive/{booking}', 'BookingController@archiveBooking');
Route::delete('/booking/{booking}', 'BookingController@delete');

// Member Routes
Route::get('/members', 'MemberController@index');
Route::get('/members/{member}', 'MemberController@viewMember');
Route::get('/member', 'MemberController@displayForm');
Route::post('/member', 'MemberController@saveMember');
Route::get('/member/{member}', 'MemberController@displayEditForm');
Route::post('/member/update', 'MemberController@updateMember');
Route::post('/member/approve/{member}', 'MemberController@approveMember');
Route::post('/member/archive/{member}', 'MemberController@archiveMember');
Route::get('/member/displayEditPasswordForm/{member}', 'MemberController@displayEditPasswordForm');
Route::post('/member/editPassword', 'MemberController@editPassword');
Route::delete('/member/{member}', 'MemberController@delete');

// Location Routes
Route::get('/locations', 'LocationController@index');
Route::get('/locations/{location}', 'LocationController@viewLocation');
Route::get('/location', 'LocationController@displayForm');
Route::post('/location', 'LocationController@saveLocation');
Route::get('/location/{location}', 'LocationController@displayEditForm');
Route::post('/location/update', 'LocationController@updateLocation');
Route::delete('/location/{location}', 'LocationController@delete');

// Vehicle Routes
Route::get('/vehicles', 'VehicleController@index');
Route::get('/vehicles/{vehicle}', 'VehicleController@viewVehicle');
Route::get('/vehicle', 'VehicleController@displayForm');
Route::post('/vehicle', 'VehicleController@saveVehicle');
Route::get('/vehicle/{vehicle}', 'VehicleController@displayEditForm');
Route::post('/vehicle/update', 'VehicleController@updateVehicle');
Route::delete('/vehicle/{vehicle}', 'VehicleController@delete');

// Archived Booking Routes
Route::get('/archives/bookings', 'ArchiveBookingController@index');
Route::get('/archives/bookings/{booking}', 'ArchiveBookingController@viewArchiveBooking');

// Archived Member Routes
Route::get('/archives/members', 'ArchiveMemberController@index');
Route::get('/archives/members/{member}', 'ArchiveMemberController@viewArchiveMember');

// Change Account Details Routes
Route::get('/accounts/{accountId}', 'AccountController@index');
Route::post('/accounts/update/{accountId}', 'AccountController@updateDetails');
Route::get('/password/{accountId}', 'AccountController@displayPasswordPage');
Route::post('/password', 'AccountController@changePassword');

// Help Documentation
Route::get('/help', 'HelpController@index');

// ADMIN Access
Route::group(['middleware' => 'auth', 'middleware' => 'App\Http\Middleware\AdminMiddleware'],
function() {
    // can only access the below if user is Admin (NOT Staff)
    Route::get('/AdminHP', 'AdminController@adminHomePage');
});

// STAFF Access
Route::group(['middleware' => 'auth', 'middleware' => 'App\Http\Middleware\StaffMiddleware'],
function() {
    // can only access the below if user is Staff (NOT Admin)
    Route::get('/StaffHP', 'StaffController@staffHomePage');
});

