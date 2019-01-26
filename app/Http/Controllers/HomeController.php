<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IncomingAmount ;
use App\Downliner ;
use App\UserLevel ;
use App\User ;

use App\Classes\Helpers ;

class HomeController extends Controller {
    
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	$incoming 				= IncomingAmount::whereReceiverId( auth()->user()->id )->get() ;
    	$outgoing 				= IncomingAmount::whereSenderId( auth()->user()->id )->get() ;

    	$incoming_sum 			= IncomingAmount::whereReceiverId( auth()->user()->id )->whereStatus( 2 )->get()->sum('amount') ;
    	$outgoing_sum 			= IncomingAmount::whereSenderId( auth()->user()->id )->whereStatus( 2 )->get()->sum('amount') ;


        return view( 'home', [

        	'build' 			=> Helpers::build('Home'),
        	'outgoing' 			=> $outgoing, 
        	'incoming' 			=> $incoming ,
        	'incoming_sum' 		=> $incoming_sum,
        	'outgoing_sum' 		=> $outgoing_sum,

        ]) ;

    }

    public function upgrade() {

    	if (  UserLevel::whereUserId( auth()->user()->id )->count() == 1 ) {


	        $level 					= UserLevel::whereUserId( auth()->user()->id )->first() ;

	        $incoming_sum 			= IncomingAmount::whereReceiverId( auth()->user()->id )->whereStatus( 2 )->get()->sum('amount') ;

	        $level_id 				= 1 ;

	        $is_upgraded 			= false ;
	        $upgrade_amount 		= 500 ;

	        if ( $incoming_sum == 750 ) {

		        if ( $level->level_id == 1 ) {
		        	$level_id 		= 2 ;
		        	$is_upgraded 	= true ;
		        	$upgrade_amount = 500 ;
		        }

	    	}

	    	if ( $incoming_sum == 1500 ) {

		        if ( $level->level_id == 2 ) {
		        	$level_id 		= 3 ;
		        	$is_upgraded 	= true ;
		        	$upgrade_amount = 1000 ;
		        }

	    	}

		    if ( $incoming_sum == 3000 ) {

		        if ( $level->level_id == 3 ) {
		        	$level_id 		= 1 ;
		        	$is_upgraded 	= true ;
		        	$upgrade_amount = 250 ;
		        }

	    	}

	        $level->delete() ;

	        if ( $is_upgraded ) {	

	        	$upliner 					= User::find( auth()->user()->id ) ;

		        UserLevel::create([

		            'level_id'              => $level_id, 
		            'user_id'               => auth()->user()->id,

		        ]) ;        	

	        	#create aoutgoing transaction.

	        	$downliners 			= Downliner::whereUserId( auth()->user()->id )->get() ;

	        	foreach ( $downliners as $downliner ) {

	        		$user_id 			= $downliner->downliner_id ;

			        IncomingAmount::create([

				        'amount' 		=> $upgrade_amount,
				        'status' 		=> 0,
				        'receiver_id'	=> auth()->user()->id,
				        'sender_id' 	=> $user_id,

			        ]) ;

	        		$down 				= User::find( $user_id ) ;

	        		# send email with member details.


	        	}

	        }

	        

    	} else {

	        $level_id 				= 1 ;

	        UserLevel::create([

	            'level_id'              => $level_id, 
	            'user_id'               => auth()->user()->id,

	        ]) ;

    	}

    	flash()->overlay( "Successfully upgraded." )->success() ;
    	
    	return redirect()->back() ;

    }
}
