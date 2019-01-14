<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->bigIncrements('id') ;
            
            $table->string( 'order_number' ) ;
            $table->float( 'amount' ) ;
            $table->integer( 'status' ) ;
            $table->bigInteger( 'member_id' )->unsigned() ;
            $table->bigInteger( 'user_id' )->unsigned() ;

            $table->timestamps();
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
        Schema::dropIfExists('orders');
    }
}
