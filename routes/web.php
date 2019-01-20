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

Auth::routes(['verify' => false]) ;

Route::get('/account/activation', 'ActivationController@index')->name('activation') ;

Route::post('/account/activation', 'ActivationController@activate') ;
Route::get('/home', 'HomeController@index')->name('home')->middleware( 'activate' ) ;

Route::get('/account', 'AccountController@index')->name('account')->middleware( 'activate' ) ;
Route::post('/account', 'AccountController@store') ;

Route::get('/btc', 'BtcController@index')->name('btc')->middleware( 'activate' ) ;
Route::post('/btc', 'BtcController@store') ;

Route::get('/profile', 'ProfileController@index')->name('profile')->middleware( 'activate' ) ;
Route::post('/profile', 'ProfileController@store') ;

Route::get('/password', 'PasswordController@index')->name('password')->middleware( 'activate' ) ;
Route::post('/password', 'PasswordController@store') ;

Route::get('/send/cash', 'CashController@send')->name('send')->middleware( 'activate' ) ;
Route::post('/send/cash', 'CashController@post_send')->name('send') ;
Route::get('/receive/cash', 'CashController@receive')->name('receive')->middleware( 'activate' ) ;
Route::get('/upgrade', 'UpgradeController@index')->name('upgrade')->middleware( 'activate' ) ;

Route::get('/upliner', 'UpliftController@index')->name('upliner')->middleware( 'activate' ) ;
Route::get('/downliner', 'DownliftController@index')->name('downliner')->middleware( 'activate' ) ;
Route::get('/member/{username}', 'MemberController@index') ;
Route::post('/member', 'MemberController@store') ;

Route::get('/incoming', 'IncomingAmountController@index')->name('incoming')->middleware( 'activate' ) ;
Route::get('/approve/{transaction_id}', 'IncomingAmountController@approve');
Route::get('/pay/{transaction_id}', 'IncomingAmountController@pay');
Route::get('/outgoing', 'OutgoingAmountController@index')->name('outgoing')->middleware( 'activate' ) ;


/*
 * ADMIN.
 */

Route::get('/user/activate/', 'ActivationController@activate_user') ;
Route::get('/user/activate/{user_id}', 'ActivationController@post_activate_user') ;
Route::get('/user/block/{user_id}', 'BlockUserController@post_block_user') ;
Route::get('/user/unblock/{user_id}', 'BlockUserController@post_unblock_user') ;
Route::get('/block', 'BlockUserController@index') ;
Route::get('/allocate', 'AllocateController@index') ;
