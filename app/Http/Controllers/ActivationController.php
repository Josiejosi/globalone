<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\AccountActivationJob ;
use App\Jobs\ReceivedProofOfPaymentJob ;

use App\User ;
use App\Btc ;
use App\Upliner ;
use App\ProofOfActivation ;

use App\IncomingAmount ;

use App\UserLevel ;

class ActivationController extends Controller
{
    public function index() {

        $user_id                        = auth()->user()->id ;

        $upliner_id                     = ( Upliner::whereUserId( $user_id )->first() )->upliner_id ;

        $upliner                        = User::find( $upliner_id ) ;

    	return view( 'auth.activation', [ 
            "USD"                       => $this->convertCurrency( 250, "ZAR", "USD" ) ,
            "upliner"                   => $upliner ,
        ] ) ;

    }

    public function activate( Request $request ) {

	    $this->validate($request, [
	        'username' 				    => 'required',
	        'proof_of_activation' 	    => 'required',
	    ]);

	    if ( User::whereUsername( $request->username )->count() > 0 ) {

	    	$user 						= User::whereUsername( $request->username )->first() ;

	    	$proof_of_activation_path 	= $request->proof_of_activation->store( 'pop' ) ;

	    	ProofOfActivation::create([

		        'proof_of_payment'  	=> $proof_of_activation_path, 
		        'user_id' 				=> $user->id ,

	    	]) ;//receiver_id

            $incoming = IncomingAmount::whereSenderId( $user->id )->whereReceiverId( $request->receiver_id )->first() ;

            if ( $incoming->status == 0 ) {
                
                $incoming->update([ 'status' => 1 ]) ;

            }

	    	ReceivedProofOfPaymentJob::dispatch( $user  )->onQueue( 'oneglobal-worker' ) ;
            flash( 'Thank you, We will send you an email once you are activated.' )->success() ;
	    } else {
            flash( "Sorry, we dont have a record with username: '"  . $request->username .  "' on the system." )->error() ;
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

    public function convertCurrency(  $amounts, $from_currency, $to_currency  ) {

        $url = 'https://www.google.co.za/search?q='.$amounts.'+' . $from_currency . '+to+' . $to_currency ;

        $cSession = curl_init();

        curl_setopt($cSession, CURLOPT_URL, $url);
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_SSL_VERIFYPEER, true);

        $buffer = curl_exec($cSession);
        curl_close($cSession);

        preg_match("/<div class=\"J7UKTe\">(.*)<\/div>/",$buffer, $matches);
        $matches = preg_replace("/[^0-9.]/", "", $matches[1]);
        $amount =  round($matches, 2);
        $total = substr($amount, mb_strlen($amounts));
        $total = $total / 100 ;
        return number_format($total,2) ;
    }

}
