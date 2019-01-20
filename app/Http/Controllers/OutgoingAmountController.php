<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OutgoingAmounts ;

class OutgoingAmountController extends Controller
{
    //incoming
    public function __construct() { $this->middleware('auth') ; }

    public function index() {



    	$outgoing = OutgoingAmounts::whereSenderId( auth()->user()->id )->get() ;

    	dump($outgoing) ;
 
        return view( 'outgoing', ['level' => 1, 'outgoing' => $outgoing ] ) ;

    }
}
