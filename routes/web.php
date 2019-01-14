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

Auth::routes(['verify' => true]) ;

Route::get('/account/activation', 'ActivationController@index')->name('activation') ; //->middleware('verified') ;

Route::post('/account/activation', 'ActivationController@activate') ;
Route::get('/home', 'HomeController@index')->name('home')->middleware( 'verified', 'activate' ) ;

Route::get('/account', 'AccountController@index')->name('account')->middleware( 'verified', 'activate' ) ;
Route::post('/account', 'AccountController@store') ;

Route::get('/profile', 'ProfileController@index')->name('profile')->middleware( 'verified', 'activate' ) ;
Route::post('/profile', 'ProfileController@store') ;

Route::get('/password', 'PasswordController@index')->name('password')->middleware( 'verified', 'activate' ) ;
Route::post('/password', 'PasswordController@store') ;

Route::get('/send/cash', 'CashController@send')->name('send')->middleware( 'verified', 'activate' ) ;
Route::post('/send/cash', 'CashController@post_send')->name('send') ;
Route::get('/receive/cash', 'CashController@receive')->name('receive')->middleware( 'verified', 'activate' ) ;
Route::get('/upgrade', 'UpgradeController@index')->name('upgrade')->middleware( 'verified', 'activate' ) ;

Route::get('/uplift', 'UpliftController@index')->name('uplift')->middleware( 'verified', 'activate' ) ;
Route::get('/downlift', 'DownliftController@index')->name('downlift')->middleware( 'verified', 'activate' ) ;
Route::get('/member/{username}', 'MemberController@index') ;


/*
 * ADMIN.
 */

Route::get('/user/activate/', 'ActivationController@activate_user') ;
Route::get('/user/activate/{user_id}', 'ActivationController@post_activate_user') ;
Route::get('/block', 'BlockUserController@index') ;
Route::get('/allocate', 'AllocateController@index') ;
