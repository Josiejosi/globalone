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

Route::get( '/', 'FrontController@index' ) ;

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/account/activation', 'ActivationController@index')->name('activation')->middleware('verified') ;
Route::post('/account/activation', 'ActivationController@activate');
Route::get('/home', 'HomeController@index')->name('home')->middleware( 'verified', 'activate' ) ;
