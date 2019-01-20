<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutgoingAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoing_amounts', function (Blueprint $table) {
            $table->bigIncrements('id') ;
            $table->float( 'amount' )->unsigned() ;
            $table->integer( 'status' ) ;
            $table->bigInteger( 'receiver_id' )->unsigned() ;
            $table->bigInteger( 'sender_id' )->unsigned() ;
            
            $table->timestamps() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outgoing_amounts') ;
    }
}
