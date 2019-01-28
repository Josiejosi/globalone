<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReinvestedLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reinvested_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer( 'level' ) ;
            $table->boolean( 'is_reinvested' ) ;
            $table->bigInteger( 'user_id' )->unsigned() ;

            $table->foreign('user_id')->references('id')->on('users') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reinvested_levels');
    }
}
