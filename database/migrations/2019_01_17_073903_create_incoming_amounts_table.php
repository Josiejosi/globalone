<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomingAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_amounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float( 'amount' )->unsigned() ;
            $table->integer( 'status' ) ;
            $table->bigInteger( 'receiver_id' )->unsigned();
            $table->bigInteger( 'sender_id' )->unsigned();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_amounts');
    }
}
