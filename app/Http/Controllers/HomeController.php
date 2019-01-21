<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IncomingAmount ;
use App\UserLevel ;

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

	        if ( $incoming_sum == 750 || $incoming_sum == 500 ) {

		        if ( $level->level_id == 1 ) {
		        	$level_id 		= 2 ;
		        }

	    	}

	    	if ( $incoming_sum == 1000 || $incoming_sum == 1500 ) {

		        if ( $level->level_id == 2 ) {
		        	$level_id 		= 3 ;
		        }

	    	}

	    	if ( $incoming_sum == 2000 || $incoming_sum == 3000 ) {

		        if ( $level->level_id == 3 ) {
		        	$level_id 		= 4 ;
		        }
		    }

		    if ( $incoming_sum == 6000 ) {

		        if ( $level->level_id == 4 ) {
		        	$level_id 		= 1 ;
		        }

	    	}

	        $level->delete() ;

	        UserLevel::create([

	            'level_id'              => $level_id, 
	            'user_id'               => auth()->user()->id,

	        ]) ;

	        

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
