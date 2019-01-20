<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Upliner ;

class UpliftController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'uplift', ['level' => 1, 'upliners' => Upliner::whereUserId( auth()->user()->id )->orderBy( 'id', 'desc' )->get() ] ) ;

    }
}
