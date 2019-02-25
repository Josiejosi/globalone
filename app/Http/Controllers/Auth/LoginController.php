<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use App\UserCompletedLevel ;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    protected function authenticated( Request $request, $user ) {

        $user_id                        = $user->id ;


        if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(1)->count() == 0 ) {

            UserCompletedLevel::create([

                'level'                 => 1,
                'is_level_started'      => 1,
                'is_level_complete'     => 0,
                'upgrade_count'         => 0,
                'user_id'               => $user->id,

            ]) ;

        }

        if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(2)->count() == 0 ) {

            UserCompletedLevel::create([

                'level'                 => 2,
                'is_level_started'      => 0,
                'is_level_complete'     => 0,
                'upgrade_count'         => 0,
                'user_id'               => $user->id,

            ]) ;

        }

        if ( UserCompletedLevel::whereUserId( $user_id )->whereLevel(3)->count() == 0 ) {

            UserCompletedLevel::create([

                'level'                 => 3,
                'is_level_started'      => 0,
                'is_level_complete'     => 0,
                'upgrade_count'         => 0,
                'user_id'               => $user->id,

            ]) ;

        }


    }

}
