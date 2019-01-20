<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OutgoingAmounts ;
use App\IncomingAmount ;

class OutgoingAmountController extends Controller
{
    //incoming
    public function __construct() { $this->middleware('auth') ; }

    public function index() {


    	$outgoing = IncomingAmount::whereSenderId( auth()->user()->id )->get() ;
 
        return view( 'outgoing', ['level' => 1, 'outgoing' => $outgoing ] ) ;

    }
}
