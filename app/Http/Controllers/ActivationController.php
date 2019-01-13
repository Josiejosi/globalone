<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    	session()->flash(['activation' => 'Thank you we will send you an email once you are activated.']) ;

    	return redirect()->back() ;

    }

}
