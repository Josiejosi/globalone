<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User ;

class BlockUserController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'block', ['level' => 1, 'users' => User::all()] ) ;

    }
}
