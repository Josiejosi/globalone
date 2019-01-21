<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\Helpers ;

class AllocateController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'allocate', ['build' => Helpers::build('Home')] ) ;

    }
}
