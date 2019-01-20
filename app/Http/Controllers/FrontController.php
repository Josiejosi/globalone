<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Level ;

class FrontController extends Controller {

    public function index() {

        return view( 'welcome', ['levels' => Level::all()] ) ;

    }

    public function faq() {

        return view( 'faq') ;

    }
}
