<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;

class PasswordController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'password', ['level' => 1,] ) ;

    }

    public function store( Request $request ) {

        $account                    = User::find( auth()->user()->id )->update([

            'password'              => $request->password,

        ]) ;

    	flash()->overlay( "Password updated successfully" ) ;

    	return redirect()->back() ;

    }
}
