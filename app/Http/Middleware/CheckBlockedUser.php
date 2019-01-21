<?php

namespace App\Http\Middleware;

use Closure;

class CheckBlockedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( ! auth()->user()->hasRole("admin") ) {

            if ( auth()->user()->is_blocked === 1 ) {

                return redirect( '/blocked/account' ) ;

            }

        }

        return $next( $request ) ;
    }
}
