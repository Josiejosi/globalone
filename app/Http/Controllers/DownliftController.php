<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownliftController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'downlift', ['level' => 1, 'orders' => [] ] ) ;

    }
}
