<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Downliner ;

class DownliftController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'downlift', ['level' => 1, 'downliners' => Downliner::whereUserId( auth()->user()->id )->orderBy( 'id', 'desc' )->get() ] ) ;

    }
}
