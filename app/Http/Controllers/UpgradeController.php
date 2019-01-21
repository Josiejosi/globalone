<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\Helpers ;

class UpgradeController extends Controller
{
    
    public function __construct() { $this->middleware('auth') ; }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        return view( 'upgrade', ['build' => Helpers::build('Home')] ) ;

    }
}
