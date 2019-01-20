<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Btc ;
use App\User ;
use App\Role ;
use App\Account ;
use App\UserLevel ;
use App\Upliner ;
use App\Downliner ;
use App\IncomingAmount ;
use App\OutgoingAmounts ;


class MemberController extends Controller
{
    public function index( $username ) {

    	if ( ! isset( $username ) ) {

    		$username 				= "onegoalnetwork" ;

    	}

        return view( 'auth.member', [ 'upliter' => $username, ] ) ;

    }

    public function store( Request $request ) {


	    $this->validate( $request, [

            'name'                  => 'required|string|max:255',
            'surname'               => 'required|string|max:255',
            'country'               => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'username'              => 'required|string|unique:users',
            'phone'                 => 'required|string|unique:users',
            'password'              => 'required|string|min:6|confirmed',

            //Account validation.
            //
            'bank_name'             => 'required|string|max:255',
            'account_holder'        => 'required|string|min:6|max:255',
            'account_number'        => 'required|string|min:6|max:255',

            //BTC validation.
            //
            //'btc_address'           => 'required|string|max:255',
            'upliner'				=> 'required',

	    ]);

	    if ( User::whereUsername( $request->upliner )->count() === 0 ) {

	    	flash( "Please provide your up-liner" )->error() ;

	    	return redirect()->back() ;

	    }


        $user                       = User::create([

            'name'                  => $request->name,
            'email'                 => $request->email,
            'username'              => $request->username, 
            'surname'               => $request->surname, 
            'phone'                 => $request->phone, 
            'country'               => $request->country, 
            'is_active'             => 0, 
            'password'              => Hash::make( $request->password ),

        ]);

        $role                       = Role::where( 'name', 'member' )->first() ;

        $user->roles()->attach( $role ) ;

        $account                    = Account::create([

            'bank_name'             => $request->bank_name, 
            'account_holder'        => $request->account_holder, 
            'account_number'        => $request->account_number, 
            'account_type'          => $request->account_type,

            'user_id'               => $user->id ,

        ]) ;

        UserLevel::create([

            'level_id'              => 1, 
            'user_id'               => $user->id,

        ]) ;

        Btc::create([

            'address'           	=> isset( $request->btc_address ) ? $request->btc_address: '', 
            'user_id'               => $user->id,

        ]) ;

        $upliner 					= User::whereUsername( $request->upliner )->first() ;

        OutgoingAmounts::create([

	        'amount' 				=> 250,
	        'status' 				=> 0,
	        'receiver_id'			=> $user->id,
	        'sender_id' 			=> $upliner->id,

        ]) ;

        IncomingAmount::create([

	        'amount' 				=> 250,
	        'status' 				=> 0,
	        'receiver_id'			=> $upliner->id,
	        'sender_id' 			=> $user->id,

        ]) ;

        Downliner::create([

	        'user_id'				=> $upliner->id,
	        'downliner_id' 			=> $user->id,

        ]) ;

        Upliner::create([

	        'user_id'				=> $user->id,
	        'upliner_id' 			=> $upliner->id,

        ]) ;


        if ( auth()->attempt([ 'email' => $request->email, 'password' => $request->password ]) ) {

	        flash( "Account created successfully, now you need to activate by sending POP to Up-liner" )->success() ;
	        return redirect( "account/activation" ) ;

		}

    }
}
