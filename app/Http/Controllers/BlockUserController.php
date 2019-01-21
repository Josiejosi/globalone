<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;
use App\Classes\Helpers ;

class BlockUserController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'block', [ 'build' => Helpers::build('Home'), 'users' => User::all()] ) ;

    }

    public function post_block_user( $user_id ) {

    	$user = User::find( $user_id ) ;

		if ( $user->is_active == 1 ) {

			//send block email

			$user->update( [ 'is_active' => false ] ) ;

		}

		flash()->overlay( 'You have successfully blocked ' . $user->name . ' ' . $user->surname . '.', 'User Status' ) ;

		return redirect()->back() ;

    }
    
    public function post_unblock_user( $user_id ) {

    	$user = User::find( $user_id ) ;

		if ( $user->is_active == 0 ) {

			//send block email

			$user->update( [ 'is_active' => true ] ) ;

		}

		flash()->overlay( 'You have successfully Unblocked ' . $user->name . ' ' . $user->surname . '.', 'User Status' ) ;

		return redirect()->back() ;

    }

}
