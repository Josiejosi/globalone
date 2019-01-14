<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\AccountActivationJob ;
use App\Jobs\ReceivedProofOfPaymentJob ;

use App\User ;
use App\ProofOfActivation ;

use App\UserLevel ;

class ActivationController extends Controller
{
    public function index() {

    	return view( 'auth.activation' ) ;

    }

    public function activate( Request $request ) {

	    $this->validate($request, [
	        'username' 				=> 'required',
	        'proof_of_activation' 	=> 'required',
	    ]);

	    if ( User::whereUsername( $request->username )->count() > 0 ) {

	    	$user 						= User::whereUsername( $request->username )->first() ;

	    	$proof_of_activation_path 	= $request->proof_of_activation->store( 'pop' ) ;

	    	ProofOfActivation::create([

		        'proof_of_payment'  	=> $proof_of_activation_path, 
		        'user_id' 				=> $user->id ,

	    	]) ;

	    	ReceivedProofOfPaymentJob::dispatch( $user  )->onQueue( 'oneglobal-worker' ) ;

	    	session()->flash('success','Thank you, We will send you an email once you are activated.') ;
	    } else {
	    	session()->flash( 'error', "Sorry, we dont have a record with username: '"  . $request->username .  "' on the system." ) ;
	    }

    	return redirect()->back() ;

    }
    public function activate_user() {

    	$user_level = UserLevel::whereUserId( auth()->user()->id  )->get() ;


    	return view( 'activate_user', [

    		'level' 					=> 1,
    		'users'						=> User::all(),
    		
    	]) ;

    }
    public function post_activate_user($user_id) {

    	$user = User::find( $user_id ) ;

    	$user->update([ 'is_active' => 1 ]) ;

    	AccountActivationJob::dispatch( $user  )->onQueue( 'oneglobal-worker' ) ;

    	flash()->overlay( $user->name . " " . $user->surname . " account was activated." ) ;

    	return redirect()->back() ;

    }
}
