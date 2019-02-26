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

        return view( 'structure', [ 
        	'build' 						=> Helpers::build('Structure'), 
        ] ) ;

    }

    public function structure() {

    	$owner_level 					= Helpers::getLevel() ;

		$firstlevel 					= [] ;
		$secondlevel 					= [] ;

		$owner 							= [

			'name' 						=> auth()->user()->name . " " . auth()->user()->surname,
			'phone' 					=> auth()->user()->phone,
			'level' 					=> $owner_level,

		] ;

		$structures 					= Downliner::whereUserId( auth()->user()->id )->orderBy( 'id', 'desc' )->get() ;

		foreach ( $structures as $structure ) {

            $user 						= User::find( $structure->downliner_id ) ;
            $level 						= UserLevel::whereUserId($structure->downliner_id)->first() ;

			$firstlevel[]				= [

				'id' 					=> $user->id,
				'name' 					=> $user->name . " " . $user->surname,
				'phone' 				=> $user->phone,
				'level' 				=> $level->level_id,

			] ;

		}

		foreach ( $firstlevel as $member ) {

			$structures 					= Downliner::whereUserId( $member['id'] )->orderBy( 'id', 'desc' )->get() ;

			$secondlevelowner 				= [
				'name' 						=> $member['name'],
				'phone' 					=> $member['phone'],
				'level' 					=> $member['level'],				
			] ;

			$secondlevel 					= [] ;

			foreach ( $structures as $structure ) {

	            $user 						= User::find( $structure->downliner_id ) ;
	            $level 						= UserLevel::whereUserId($structure->downliner_id)->first() ;

				$secondlevel[]				= [

					'name' 					=> $user->name . " " . $user->surname,
					'phone' 				=> $user->phone,
					'level' 				=> $level->level_id,

				] ;

			}

			$secondlevelbuild[] 		    = [$secondlevelowner, 'children'=>$secondlevel] ;
		}

		return [ 			
			'name' 							=> auth()->user()->name . " " . auth()->user()->surname,
			'phone' 						=> auth()->user()->phone,  
			'children' => $firstlevel 
		] ;
		//return [ $owner,  'children' => $secondlevelbuild ] ;

    }

}
