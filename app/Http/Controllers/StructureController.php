<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classes\Helpers ;

use App\User ;
use App\Downliner ;
use App\UserLevel ;

class StructureController extends Controller
{
	public function index() {

		$structures 					= Downliner::whereUserId( auth()->user()->id )->orderBy( 'id', 'desc' )->get() ;

		$display_structure 				= [] ;

		foreach ( $structures as $structure ) {

            $user 						= User::find( $structure->downliner_id ) ;
            $level 						= UserLevel::whereUserId($structure->downliner_id)->first() ;

			$display_structure[]		= [

				'name' 					=> $user->name . " " . $user->surname,
				'level' 				=> $level->level_id,
				'join' 					=> $user->created_at,

			] ;
			
			$inner_structures 			= Downliner::whereUserId( $structure->downliner_id )->orderBy( 'id', 'desc' )->get() ;



			if ( count( $inner_structures ) > 0 ) {

				foreach ( $inner_structures as $inner_structure ) {
		            $user 						= User::find( $inner_structure->downliner_id ) ;
		            $level 						= UserLevel::whereUserId($inner_structure->downliner_id)->first() ;

					$display_structure[]		= [

						'name' 					=> $user->name . " " . $user->surname,
						'level' 				=> $level->level_id,
						'join' 					=> $user->created_at,
						
					] ;
				}

			}

		}

		//dd($display_structure) ;

        return view( 'structure', [ 
        	'build' 						=> Helpers::build('Structure'), 
        	'downliners' 					=> $display_structure,
        ] ) ;

    }
}
