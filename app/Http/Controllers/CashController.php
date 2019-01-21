<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Order ;

use App\Jobs\NewOrderJob ;

use App\Classes\Helpers ;

class CashController extends Controller
{
    
    public function __construct() { $this->middleware('auth') ; }

    public function send() {

        return view( 'send', [ 'build' => Helpers::build('Home'), ] ) ;

    }

    public function post_send( Request $request ) {

    	$order 						= Order::create([

    		'order_number'			=> rand( 1111111111, 9999999999 ),
	        'amount' 				=> $request->amount, 
	        'status' 				=> 0, 
	        'member_id' 			=> 0, 
	        'user_id' 				=> auth()->user()->id,

    	]) ;

    	$user 						= User::find( auth()->user()->id ) ;

    	NewOrderJob::dispatch( $order, $user )->onQueue( 'oneglobal-worker' ) ;

    	flash()->overlay( "New order created successfully" ) ;

        return redirect( '/home' ) ;

    }


    public function receive() {

        return view( 'receive', ['level' => 1,] ) ;

    }
}
