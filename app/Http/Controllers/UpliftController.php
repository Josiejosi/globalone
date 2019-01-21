<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Upliner ;
use App\Classes\Helpers ;

class UpliftController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'uplift', [

        	'build' 			=> Helpers::build('Home'), 
        	'upliners' 			=> Upliner::whereUserId( auth()->user()->id )->orderBy( 'id', 'desc' )->get(),
        	 
        ]) ;

    }
}
