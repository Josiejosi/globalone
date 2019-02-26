<?php

namespace App\Classes;

use App\UserLevel ;
use App\UserCompletedLevel ;
use App\UserReinvestedLevel ;

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

    public static function currentLevel() {

        return UserCompletedLevel::whereUserId( auth()->user()->id )->whereIsLevelStarted(1)->whereIsLevelComplete(0)->first() ;

    }

    private function RequestNextLevelPay() {


    }

    public static function incrementLevelPay( $upliner_id ) {

        $current_level              = self::currentLevel() ;

        if ( $current_level->upgrade_count == 2 ) {

            $current_level->update([ 'upgrade_count' => 3, ]) ;

            if ( $current_level->level == 1 ) {

                if ( UserReinvestedLevel::whereLevel( 1 )->whereUserId( $upliner_id )->count() == 0 ) {

                    UserReinvestedLevel::create([
                        'level'             => 1,
                        'is_reinvested'     => 1,
                        'user_id'           => $upliner_id,
                    ]) ;

                }

            }

            if ( $current_level->level == 2 ) {

                if ( UserReinvestedLevel::whereLevel( 2 )->whereUserId( $upliner_id )->count() == 0 ) {

                    UserReinvestedLevel::create([
                        'level'             => 2,
                        'is_reinvested'     => 1,
                        'user_id'           => $upliner_id,
                    ]) ;

                }

            }

            if ( $current_level->level == 3 ) {

                if ( UserReinvestedLevel::whereLevel( 3 )->whereUserId( $upliner_id )->count() == 0 ) {

                    UserReinvestedLevel::create([
                        'level'             => 3,
                        'is_reinvested'     => 1,
                        'user_id'           => $upliner_id,
                    ]) ;

                }

            }


        } else if ( $current_level->upgrade_count == 1 ) {

            $current_level->update([ 'upgrade_count' => 2, ]) ;


        } else if ( $current_level->upgrade_count == 0 ) {

            $current_level->update([ 'upgrade_count' => 1, ]) ;

        }

    }

}