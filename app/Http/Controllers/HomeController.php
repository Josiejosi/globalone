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

    	//Check if user has levels complete
    	//


    	if ( $incoming_sum < 750 ) {

    		if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(1)->count() == 0 ) {
    			UserCompletedLevel::create([

			        'level'				=> 1,
			        'is_level_complete'	=> 0,
			        'user_id' 			=> $user_id,

    			]) ;
    		}

    	}

    	if ( $incoming_sum >= 750 && $incoming_sum < 2250  ) {

    		if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(1)->count() == 0 ) {

    			UserCompletedLevel::create([

			        'level'				=> 1,
			        'is_level_complete'	=> 1,
			        'user_id' 			=> $user_id,

    			]) ;

    		} else {

    			UserCompletedLevel::whereUserId( $user_id )->whereLevel(1)->update(['is_level_complete'	=> 1,]) ;

    		}

    		if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(2)->count() == 0 ) {

    			UserCompletedLevel::create([

			        'level'				=> 2,
			        'is_level_complete'	=> 0,
			        'user_id' 			=> $user_id,

    			]) ;

    		}

    	}

    	if ( $incoming_sum >= 2250 && $incoming_sum < 5250  ) {

    		if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(1)->count() == 0 ) {

    			UserCompletedLevel::create([

			        'level'				=> 1,
			        'is_level_complete'	=> 1,
			        'user_id' 			=> $user_id,

    			]) ;

    		} else {

    			UserCompletedLevel::whereUserId( $user_id )->whereLevel(1)->update(['is_level_complete'	=> 1,]) ;

    		}

    		if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(2)->count() == 0 ) {

    			UserCompletedLevel::create([

			        'level'				=> 2,
			        'is_level_complete'	=> 1,
			        'user_id' 			=> $user_id,

    			]) ;

    		}

    	}

    	if ( $incoming_sum >= 5250 ) {

    		if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(1)->count() == 0 ) {
    			UserCompletedLevel::create([

			        'level'				=> 1,
			        'is_level_complete'	=> 1,
			        'user_id' 			=> $user_id,

    			]) ;
    		} else {
    			UserCompletedLevel::whereUserId( $user_id )->whereLevel(1)->update(['is_level_complete'	=> 1,]) ;
    		}

    		if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(2)->count() == 0 ) {
    			UserCompletedLevel::create([

			        'level'				=> 2,
			        'is_level_complete'	=> 1,
			        'user_id' 			=> $user_id,

    			]) ;
    		} else {
    			UserCompletedLevel::whereUserId( $user_id )->whereLevel(2)->update(['is_level_complete'	=> 1,]) ;
    		}

    		if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(3)->count() == 0 ) {
    			UserCompletedLevel::create([

			        'level'				=> 3,
			        'is_level_complete'	=> 1,
			        'user_id' 			=> $user_id,

    			]) ;
    		} else {
    			UserCompletedLevel::whereUserId( $user_id )->whereLevel(3)->update(['is_level_complete'	=> 1,]) ;
    		}

    	}


		if ( UserReinvestedLevel::whereUserId( $user_id )->whereLevel(1)->count() == 0 ) {

			UserReinvestedLevel::create([

		        'level'				=> 1,
		        'is_reinvested'		=> 0,
		        'user_id' 			=> $user_id,

			]) ;

		}

		if ( UserReinvestedLevel::whereUserId( $user_id )->whereLevel(2)->count() == 0 ) {

			UserReinvestedLevel::create([

		        'level'				=> 2,
		        'is_reinvested'		=> 0,
		        'user_id' 			=> $user_id,

			]) ;

		}

		if ( UserReinvestedLevel::whereUserId( $user_id )->whereLevel(3)->count() == 0 ) {

			UserReinvestedLevel::create([

		        'level'					=> 3,
		        'is_reinvested'			=> 0,
		        'user_id' 				=> $user_id,

			]) ;

		}    

		$user_completed_level 			= UserCompletedLevel::whereUserId( $user_id )->orderBy( 'level', 'asc' )->get() ; 	

        return view( 'home', [

        	'build' 					=> Helpers::build('Home'),
        	'outgoing' 					=> $outgoing, 
        	'incoming' 					=> $incoming ,
        	'incoming_sum' 				=> $incoming_sum,
        	'outgoing_sum' 				=> $outgoing_sum,
        	'user_completed_level' 		=> $user_completed_level,

        ]) ;

    }

    public function upgrade() {

    	if (  UserLevel::whereUserId( auth()->user()->id )->count() == 1 ) {


	        $level 					= UserLevel::whereUserId( auth()->user()->id )->first() ;

	        $incoming_sum 			= IncomingAmount::whereReceiverId( auth()->user()->id )->whereStatus( 2 )->get()->sum('amount') ;

	        $level_id 				= 1 ;

	        $is_upgraded 			= false ;
	        $upgrade_amount 		= 500 ;

	        if ( $incoming_sum == 500 || $incoming_sum == 750 ) {

		        if ( $level->level_id == 1 ) {
		        	$level_id 		= 2 ;
		        	$is_upgraded 	= true ;
		        	$upgrade_amount = 500 ;
		        }

	    	}

	    	if ( $incoming_sum >= 2250 && $incoming_sum < 5250 ) {

		        if ( $level->level_id == 2 ) {
		        	$level_id 		= 3 ;
		        	$is_upgraded 	= true ;
		        	$upgrade_amount = 1000 ;
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

    public function reinvest_level_one() {

    	$user_id 						= auth()->user()->id ;

    	//if ( UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(1)->count() == 0 ) {

/*	    	if ( UserReinvestedLevel::whereUserId( $user_id )->whereLevel(1)->count() == 1 ) {

				UserReinvestedLevel::create([

			        'level'				=> 1,
			        'is_reinvested'		=> 1,
			        'user_id' 			=> $user_id,

				]) ;

	    	} else {
	    		UserReinvestedLevel::whereUserId( $user_id )->whereLevel(1)->update(['is_reinvested' => 1,]) ;
	    	}*/

        	#create aoutgoing transaction.

        	$downliners 			= Downliner::whereUserId( $user_id )->get() ;

        	foreach ( $downliners as $downliner ) {

        		$sender_id 			= $downliner->downliner_id ;

		        IncomingAmount::create([

			        'amount' 		=> 250,
			        'status' 		=> 0,
			        'receiver_id'	=> $user_id,
			        'sender_id' 	=> $sender_id,

		        ]) ;

        		# send email with member details.


        	}

	    	$invested 					= UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(1)->first() ;

		    flash()->overlay( "Successfully reinvested on Level: " . $invested->level  )->success() ;
		    return redirect()->back() ; 

/*    	} else {

    		$invested 					= UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(1)->first() ;

	     	flash()->overlay( "Sorry, you already reinvested on Level: " . $invested->level . " Please wait for members to fully complete your reinvestment" ) ;
	    	return redirect()->back() ; 

    	}*/

    }

    public function reinvest_level_two() {

    	$user_id 						= auth()->user()->id ;

    	//if ( UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(2)->count() == 0 ) {

/*	    	if ( UserReinvestedLevel::whereUserId( $user_id )->whereLevel(2)->count() == 1 ) {

				UserReinvestedLevel::create([

			        'level'				=> 2,
			        'is_reinvested'		=> 1,
			        'user_id' 			=> $user_id,

				]) ;

	    	} else {
	    		UserReinvestedLevel::whereUserId( $user_id )->whereLevel(1)->update(['is_reinvested' => 2,]) ;
	    	}*/

        	#create aoutgoing transaction.

        	$downliners 			= Downliner::whereUserId( $user_id )->get() ;

        	foreach ( $downliners as $downliner ) {

        		$sender_id 			= $downliner->downliner_id ;

		        IncomingAmount::create([

			        'amount' 		=> 250,
			        'status' 		=> 0,
			        'receiver_id'	=> $user_id,
			        'sender_id' 	=> $sender_id,

		        ]) ;

        		# send email with member details.

        	}

    		$invested 					= UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(2)->first() ;

	     	flash()->overlay( "Successfully reinvested on Level: " . $invested->level  )->success() ;
	    	return redirect()->back() ; 

/*    	} else {

    		$invested 					= UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(2)->first() ;

	     	flash()->overlay( "Sorry, you already reinvested on Level: " . $invested->level . " Please wait for members to fully complete your reinvestment" ) ;
	    	return redirect()->back() ; 

    	}*/

    }

    public function reinvest_level_three() {

    	$user_id 						= auth()->user()->id ;

    	//if ( UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(3)->count() == 0 ) {

/*	    	if ( UserReinvestedLevel::whereUserId( $user_id )->whereLevel(3)->count() == 1 ) {

				UserReinvestedLevel::create([

			        'level'				=> 3,
			        'is_reinvested'		=> 1,
			        'user_id' 			=> $user_id,

				]) ;

	    	} else {
	    		UserReinvestedLevel::whereUserId( $user_id )->whereLevel(1)->update(['is_reinvested' => 3,]) ;
	    	}*/

        	#create aoutgoing transaction.

        	$downliners 			= Downliner::whereUserId( $user_id )->get() ;

        	foreach ( $downliners as $downliner ) {

        		$sender_id 			= $downliner->downliner_id ;

		        IncomingAmount::create([

			        'amount' 		=> 250,
			        'status' 		=> 0,
			        'receiver_id'	=> $user_id,
			        'sender_id' 	=> $sender_id,

		        ]) ;

        		# send email with member details. 

        	}

    		$invested 					= UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(3)->first() ;

	     	flash()->overlay( "Successfully reinvested on Level: " . $invested->level  )->success() ;
	    	return redirect()->back() ;

/*    	} else {

    		$invested 					= UserReinvestedLevel::whereUserId( $user_id )->whereIsReinvested(3)->first() ;

	     	flash()->overlay( "Sorry, you already reinvested on Level: " . $invested->level . " Please wait for members to fully complete your reinvestment" ) ;
	    	return redirect()->back() ; 

    	}*/

    }
}
