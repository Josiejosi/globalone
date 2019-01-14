<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index( $username ) {

        return view( 'auth.member', [ 'upliter' => $username, ] ) ;

    }
}
