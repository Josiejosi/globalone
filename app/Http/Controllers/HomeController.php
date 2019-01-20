<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IncomingAmount ;

class HomeController extends Controller {
    
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	$incoming = IncomingAmount::whereReceiverId( auth()->user()->id )->get() ;
    	$outgoing = IncomingAmount::whereSenderId( auth()->user()->id )->get() ;

    	$incoming_sum = $incoming->sum('amount') ;
    	$outgoing_sum = $outgoing->sum('amount') ;

        return view( 'home', [
        	'level' 			=> 1, 
        	'outgoing' 			=> $outgoing, 
        	'incoming' 			=> $incoming ,
        	'incoming_sum' 		=> $incoming_sum ,
        	'outgoing_sum' 		=> $outgoing_sum ,
        ]) ;

    }
}
