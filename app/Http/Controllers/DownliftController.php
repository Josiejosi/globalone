<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Downliner ;
use App\Classes\Helpers ;

class DownliftController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'downlift', [
        	'build' 		=> Helpers::build('Home'), 
        	'downliners' 	=> Downliner::whereUserId( auth()->user()->id )->orderBy( 'id', 'desc' )->get() 
        ]) ;

    }
}
