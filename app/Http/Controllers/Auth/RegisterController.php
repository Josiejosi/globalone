<?php

namespace App\Http\Controllers\Auth;

use App\Btc ;
use App\User ;
use App\Role ;
use App\Account ;
use App\UserLevel ;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name'                  => ['required', 'string', 'max:255'],
            'surname'               => ['required', 'string', 'max:255'],
            'country'               => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username'              => ['required', 'string', 'unique:users'],
            'phone'                 => ['required', 'string', 'unique:users'],
            'password'              => ['required', 'string', 'min:6', 'confirmed'],

            //Account validation.
            //
            'bank_name'             => ['required', 'string', 'max:255'],
            'account_holder'        => ['required', 'string', 'min:6', 'max:255'],
            'account_number'        => ['required', 'string', 'min:6', 'max:255'],

            //BTC validation.
            //
            'btc_address'           => ['required', 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user                       = User::create([

            'name'                  => $data['name'],
            'email'                 => $data['email'],
            'username'              => $data['username'], 
            'surname'               => $data['surname'], 
            'phone'                 => $data['phone'], 
            'country'               => $data['country'], 
            'is_active'             => 0, 
            'password'              => Hash::make($data['password']),

        ]);

        $role                       = Role::where( 'name', 'member' )->first() ;

        $user->roles()->attach( $role ) ;

        $account                    = Account::create([

            'bank_name'             => $data['bank_name'], 
            'account_holder'        => $data['account_holder'], 
            'account_number'        => $data['account_number'], 
            'account_type'          => $data['account_type'],

            'user_id'               => $user->id ,

        ]) ;

        UserLevel::create([

            'level_id'              => 1, 
            'user_id'               => $user->id,


        ]) ;

        Btc::create([

            'btc_address'           => $data["btc_address"], 
            'user_id'               => $user->id,


        ]) ;

        return $user ;
    }
}
