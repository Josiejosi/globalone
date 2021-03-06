<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * php artisan make:seeder LevelSeeder ; php artisan make:seeder RoleTableSeeder ; php artisan make:seeder UserTableSeeder ;
     */
    public function run()
    {
        $this->call( LevelSeeder::class ) ;
        $this->call( RoleTableSeeder::class ) ;
        $this->call( UserTableSeeder::class ) ;
    }
}
