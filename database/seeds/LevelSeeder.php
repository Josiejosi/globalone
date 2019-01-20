<?php

use Illuminate\Database\Seeder;

use App\Level ;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

	    Level::create([

	        'name'				=> 1, 
	        'description'		=> "Level 1", 
	        'amount' 			=> "250", 
	        'upgrade_amount'	=> "500",
	        'auto_upgrade' 		=> "3",
	        'profit' 			=> "250",

	    ]) ;

	    Level::create([

	        'name'				=> 2, 
	        'description'		=> "Level 2", 
	        'amount' 			=> "500", 
	        'upgrade_amount'	=> "1000",
	        'auto_upgrade' 		=> "3",
	        'profit' 			=> "500",

	    ]) ;

	    Level::create([

	        'name'				=> 3, 
	        'description'		=> "Level 3", 
	        'amount' 			=> "1000", 
	        'upgrade_amount'	=> "2000",
	        'auto_upgrade' 		=> "3",
	        'profit' 			=> "1000",

	    ]) ;

	    Level::create([

	        'name'				=> 4, 
	        'description'		=> "Level 4", 
	        'amount' 			=> "2000", 
	        'upgrade_amount'	=> "0",
	        'auto_upgrade' 		=> "0",
	        'profit' 			=> "6000",

	    ]) ;

    }
}
