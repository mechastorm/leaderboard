<?php

/**
 * Laravel Database Migration
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('transactions', function($table)
        {
            $table->increments('id')->unique();
            $table->string('ip');
            $table->integer('player_id')->foreign()->references('id')->on('players');
            $table->integer('points')->default(0);
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
        Schema::drop('transactions');
	}

}
