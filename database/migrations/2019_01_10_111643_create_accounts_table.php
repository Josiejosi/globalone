<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id') ;
            $table->string( 'bank_name' ) ;
            $table->string( 'account_holder' ) ;
            $table->string( 'account_number' ) ;
            $table->string( 'account_type' ) ;
            $table->bigInteger( 'user_id' ) ;

            $table->foreign('user_id')->references('id')->on('user') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
