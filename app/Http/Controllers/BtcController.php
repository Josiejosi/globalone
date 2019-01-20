<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Btc ;

class BtcController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'btc', ['level' => 1,] ) ;

    }

    public function store(Request $request) {

        $account                    = Btc::whereUserId( auth()->user()->id )->update([

            'address'             => $request->btc_Address,

        ]) ;

    	flash()->overlay( "BTC Address updated successfully" ) ;

    	return redirect()->back() ;

    }
}
