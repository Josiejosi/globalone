<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Btc ;
use App\User ;
use App\Role ;
use App\Account ;
use App\UserLevel ;
use App\Classes\Helpers ;

class AdminController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'new_admin', [ 'build' => Helpers::build('Home'), ] ) ;

    }

    public function store(Request $request) {


	    $this->validate( $request, [

            'name'                  => 'required|string|max:255',
            'surname'               => 'required|string|max:255',
            'country'               => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255',
            'username'              => 'required|string|unique:users',
            'phone'                 => 'required|string',
            'password'              => 'required|string|min:6|confirmed',

            //Account validation.
            //
            'bank_name'             => 'required|string|max:255',
            'account_holder'        => 'required|string|min:6|max:255',
            'account_number'        => 'required|string|min:6|max:255',

            //BTC validation.
            //

	    ]);


        $user                       = User::create([

            'name'                  => $request->name,
            'email'                 => $request->email,
            'username'              => $request->username, 
            'surname'               => $request->surname, 
            'phone'                 => $request->phone, 
            'country'               => $request->country, 
            'is_active'             => 0, 
            'is_blocked'            => 0, 
            'password'              => Hash::make( $request->password ),

        ]);

        $role                       = Role::where( 'name', 'admin' )->first() ;

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

            'address'               => isset( $request->btc_address ) ? $request->btc_address: '', 
            'user_id'               => $user->id,

        ]) ;

        flash( "Account created successfully, now you need to activate by sending POP to Up-liner" )->success() ;
        return redirect()->back() ;

    }
}
