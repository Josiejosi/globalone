<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('btcs', function (Blueprint $table) {
            $table->bigIncrements( 'id' );
            $table->string( "address" ) ;
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
        Schema::dropIfExists('btcs');
    }
}
