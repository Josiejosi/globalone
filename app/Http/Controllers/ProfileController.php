<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;

class ProfileController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'profile', ['level' => 1,] ) ;

    }

    public function store(Request $request) {

        $account                    = User::find( auth()->user()->id )->update([

            'name'                  => $request->name,
            'surname'               => $request->surname, 
            'phone'                 => $request->phone, 
            'country'               => $request->country, 

        ]) ;

    	flash()->overlay( "Profile details updated successfully" ) ;

    	return redirect()->back() ;

    }
}