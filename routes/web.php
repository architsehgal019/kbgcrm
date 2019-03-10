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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/destination', 'DestinationController@index');
Route::post('/destination/add', 'DestinationController@store');

Route::post('/destination/subplaces', 'SubdestinationController@store');

Route::get('/travelpackages', 'TravelpackageController@index');
Route::post('/travelpackages/add', 'TravelpackageController@store');

Route::get('/testimonial', 'TestimonialController@index');
Route::post('/testimonial/add', 'TestimonialController@store');

Route::get('/team', 'TeamController@index');
Route::post('/team/add', 'TeamController@store');

Route::get('/destination-all/view', 'DestinationviewController@view');

Route::get('/aboutus', 'AboutController@index');
Route::post('/aboutus/update', 'AboutController@update');