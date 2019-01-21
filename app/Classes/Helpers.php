<?php

namespace App\Classes;

use App\UserLevel ;

class Helpers {

    public static function build( $title )  {

        $level_id                   = 1 ;

        if ( auth()->check() ) {

            if ( UserLevel::whereUserId( auth()->user()->id )->count() > 0 ) {

                $level              = UserLevel::whereUserId( auth()->user()->id )->first() ;
                $level_id           = $level->level_id ;

            }

        }

        
        return [

            'title'                 => $title,
            'level'                 => $level_id,

        ] ;


    }

}