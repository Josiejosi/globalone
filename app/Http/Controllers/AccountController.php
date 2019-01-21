<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account ;
use App\Classes\Helpers ;

class AccountController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

        return view( 'account', [ 'build' => Helpers::build('Home'), ] ) ;

    }

    public function store(Request $request) {

        $account                    = Account::whereUserId( auth()->user()->id )->update([

            'bank_name'             => $request->bank_name, 
            'account_holder'        => $request->account_holder, 
            'account_number'        => $request->account_number, 
            'account_type'          => $request->account_type,

        ]) ;

    	flash()->overlay( "Account details updated successfully" ) ;

    	return redirect()->back() ;

    }
}
