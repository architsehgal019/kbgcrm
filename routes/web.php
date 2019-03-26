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

Route::get('/team/view', 'TeamviewController@index');
Route::post('/team/update', 'TeamviewController@update');
Route::get('/team/delete/{id}', 'TeamviewController@delete');

Route::get('/destination/view', 'DestinationviewController@index');
Route::post('/destination/update', 'DestinationviewController@update');
Route::get('/destination/delete/{id}', 'DestinationviewController@delete');

Route::get('/aboutus', 'AboutController@index');
Route::post('/aboutus/update', 'AboutController@update');

Route::get('/offers', 'BannerController@index');
Route::post('/offers/add', 'BannerController@store');
Route::post('/offers/update', 'BannerController@update');
Route::get('/offers/delete/{id}', 'BannerController@delete');

Route::get('/subdestination/view', 'SubdestinationviewController@index');
Route::post('/subdestination/update', 'SubdestinationviewController@update');
Route::get('/subdestination/delete/{id}', 'SubdestinationviewController@delete');

Route::get('/testimonial/view', 'TestimonialviewController@index');
Route::post('/testimonial/update', 'TestimonialviewController@update');
Route::get('/testimonial/delete/{id}', 'TestimonialviewController@delete');

Route::get('/blogs', 'BlogController@index');
Route::post('/blogs/add', 'BlogController@store');

Route::get('/travelpackages/view', 'PackageviewController@index');
Route::get('/travelpackages/edit/{id}', 'PackageeditController@index');