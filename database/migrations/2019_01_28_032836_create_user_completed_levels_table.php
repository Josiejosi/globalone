<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCompletedLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_completed_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer( 'level' ) ;
            $table->boolean( 'is_level_started' ) ;
            $table->boolean( 'is_level_complete' ) ;
            $table->integer( 'upgrade_count' ) ;
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
        Schema::dropIfExists('user_completed_levels');
    }
}
