<?php

/**
 * Laravel Database Migration
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration {

	/**
	 * Run the migrations. Create the celebrities Tables
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('players', function($table)
        {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('image_url');
            $table->integer('total')->default(0);
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
		Schema::drop('players');
	}

}
