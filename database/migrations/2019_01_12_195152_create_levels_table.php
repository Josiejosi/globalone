<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->bigIncrements('id') ;
            $table->integer( 'name' ) ;
            $table->string( 'description' ) ;
            $table->float( 'amount' ) ;
            $table->float( 'upgrade_amount' ) ;
            $table->integer( 'auto_upgrade' ) ;
            $table->float( 'profit' ) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
