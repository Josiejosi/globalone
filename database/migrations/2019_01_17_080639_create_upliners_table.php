<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUplinersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upliners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger( 'user_id' )->unsigned();
            $table->bigInteger( 'upliner_id' )->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upliners');
    }
}
