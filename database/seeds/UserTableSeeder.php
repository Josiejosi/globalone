<?php

use Illuminate\Database\Seeder;

use App\Btc ;
use App\User ;
use App\Role ;
use App\Account ;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user                       = User::create([

            'name'                  => "One",
            'email'                 => "onegoalnetwork@gmail.com",
            'username'              => "onegoalnetwork", 
            'surname'               => "Goal", 
            'phone'                 => "0000000000", 
            'country'               => "German", 
            'is_active'             => 0, 
            'password'              => Hash::make( "TY5X^5fE!bTt8ske" ),

        ]);

        $role                       = Role::where( 'name', 'admin' )->first() ;

        $user->roles()->attach( $role ) ;

        $account                    = Account::create([

            'bank_name'             => "Bank of German", 
            'account_holder'        => "One Goal", 
            'account_number'        => "0000000000", 
            'account_type'          => "Current",

            'user_id'               => $user->id ,

        ]) ;

        Btc::create([

            'address'               => '1C9Nq69ZNNSL17GKrGRiTEyYLcpsoM5z47', 
            'user_id'               => $user->id,

        ]) ;

    }
}
