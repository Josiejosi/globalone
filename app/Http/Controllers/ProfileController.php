<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;

use App\Classes\Helpers ;

class ProfileController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'profile', ['build' => Helpers::build('Home')] ) ;

    }

    public function store(Request $request) {
        
        $account                    = User::find( auth()->user()->id )->update([

            'name'                  => isset( $request->name ) ? $request->name : '',
            'surname'               => isset( $request->surname ) ? $request->surname : '', 
            'phone'                 => isset( $request->phone ) ? $request->phone : '', 
            'country'               => isset( $request->country ) ? $request->country : '', 

        ]) ;

    	flash()->overlay( "Profile details updated successfully" ) ;

    	return redirect()->back() ;

    }
}
