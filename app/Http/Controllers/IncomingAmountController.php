<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\IncomingAmount ;
use App\UserCompletedLevel ;

use App\Classes\Helpers ;

class IncomingAmountController extends Controller
{
 
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	$incoming               = IncomingAmount::whereReceiverId( auth()->user()->id )->get() ;
 
        return view( 'incoming', [
            'build'             => Helpers::build('Home'),
            'incoming'          => $incoming 
        ]) ;

    }


    public function approve( $transaction_id ) {

    	$incoming               = IncomingAmount::find( $transaction_id ) ;

        $sender_id              = $incoming->sender_id ;
    	$receiver_id            = $incoming->receiver_id ;



    	if ( $incoming->status == 1 ) {
    		
    		$incoming->update([ 'status' => 2 ]) ;

    		$user              = User::find($sender_id) ;

    		if ( $user->is_active == 0 ) {

    			//send activation email

    			$user->update( [ 'is_active' => true ] ) ;

    		}

            Helpers::incrementLevelPay( auth()->user()->id ) ;

    		flash()->overlay( 'You have successfully approved a transaction.', 'Transaction approved' ) ;

    		return redirect()->back() ;

    	}

    }


    public function pay( $transaction_id ) {

    	$incoming = IncomingAmount::find( $transaction_id ) ;

    	$sender_id = $incoming->sender_id ;

    	if ( $incoming->status == 0 ) {
    		
    		$incoming->update([ 'status' => 1 ]) ;

    		flash()->overlay( 'You have successfully made a pay request.', 'Pay Request' ) ;

    		return redirect()->back() ;

    	}

    }
}
