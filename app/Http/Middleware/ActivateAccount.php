<?php

namespace App\Http\Middleware;

use Closure;

class ActivateAccount
{
    public function handle($request, Closure $next) {

        if ( ! auth()->user()->hasRole("admin") ) {

            if ( auth()->user()->is_active === 0 ) {

                return redirect( '/account/activation' ) ;

            }

        }

        return $next( $request ) ;
    }
}
