<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserReinvestedLevel ;
use App\UserCompletedLevel ;
use App\IncomingAmount ;
use App\Downliner ;
use App\UserLevel ;
use App\User ;

use App\Classes\Helpers ;

class HomeController extends Controller {
    
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	$user_id 						= auth()->user()->id ;

    	$incoming 						= IncomingAmount::whereReceiverId( $user_id )->get() ;
    	$outgoing 						= IncomingAmount::whereSenderId( $user_id )->get() ;

    	$incoming_sum 					= IncomingAmount::whereReceiverId( $user_id )->whereStatus( 2 )->get()->sum('amount') ;
    	$outgoing_sum 					= IncomingAmount::whereSenderId( $user_id )->whereStatus( 2 )->get()->sum('amount') ;
  

		$user_completed_level 			= UserCompletedLevel::whereUserId( $user_id )->orderBy( 'level', 'asc' )->get() ; 	


 		$currentLevel 					= Helpers::currentLevel() ;

        return view( 'home', [

        	'build' 					=> Helpers::build('Home'),
        	'outgoing' 					=> $outgoing, 
        	'incoming' 					=> $incoming ,
        	'incoming_sum' 				=> $incoming_sum,
        	'outgoing_sum' 				=> $outgoing_sum,
        	'currentLevel' 				=> $currentLevel,

        ]) ;

    }

    public function upgrade() {

    	$currentLevel 				= Helpers::currentLevel() ;

    	if ( $currentLevel->upgrade_count == 3 ) {

            $currentLevel->update([

                'is_level_started'  => 0,
                'is_level_complete' => 1,
                'upgrade_count'     => 0 ,

            ]) ;

            $level_num                  = $currentLevel->level ;

            if ( $level_num == 3 )
                $level_num              = 1 ;
            else if ( $level_num == 1 )
            	$level_num              = 2 ;
            else if ( $level_num == 2 )
            	$level_num              = 3 ;



            UserCompletedLevel::whereUserId( auth()->user()->id )->whereLevel( $level_num )->update([
                'is_level_started'  => 1,
                'is_level_complete' => 0,
                'upgrade_count'     => 0,
            ]) ;

            $level 						= UserLevel::whereUserId( auth()->user()->id )->first() ;
            $level->delete() ;

	        UserLevel::create([

	            'level_id'              => $level_num, 
	            'user_id'               => auth()->user()->id,

	        ]) ; 

        	$downliners 				= Downliner::whereUserId( auth()->user()->id )->get() ;
        	$upgrade_amount				= 0 ;

        	if ( $level_num == 1 ) $upgrade_amount = 250 ;
        	if ( $level_num == 2 ) $upgrade_amount = 500 ;
        	if ( $level_num == 3 ) $upgrade_amount = 1000 ;

        	foreach ( $downliners as $downliner ) {

        		$user_id 				= $downliner->downliner_id ;

		        IncomingAmount::create([

			        'amount' 			=> $upgrade_amount,
			        'status' 			=> 0,
			        'receiver_id'		=> auth()->user()->id,
			        'sender_id' 		=> $user_id,

		        ]) ;

        		$down 				= User::find( $user_id ) ;

        		# send email with member details.

        	}

			flash()->overlay( "Successfully upgraded." )->success() ;
	    	return redirect()->back() ;


    	} else {

			flash()->overlay( "Not ready to upgrade." )->error() ;
	    	return redirect()->back() ;

    	}




    }

}
