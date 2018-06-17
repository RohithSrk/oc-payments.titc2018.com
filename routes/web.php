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

Auth::routes();

Route::get( '/', 'RegistrationController@create' );
Route::post( '/', 'RegistrationController@store' );
Route::get( '/home', 'HomeController@index' )->name( 'home' );
Route::get( '/member/{member}/', 'HomeController@details' );
Route::get( '/download', 'HomeController@downloadExcel' );

Route::get('/artisan-run', 'HomeController@appDeploy');
Route::get('/artisan-refresh', 'HomeController@appRefresh');
Route::get('/artisan-reset', 'HomeController@appReset');
