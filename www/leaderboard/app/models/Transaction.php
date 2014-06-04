<?php

class Transaction extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'transactions';

    /**
     * Laravel Eloquent ORM boot method - called when model are first loaded
     * Usually an ideal location to player event bindings
     */
    public static function boot()
    {
        /**
         * Saved Event - Logic to run after the transaction is saved to the table
         */
        Transaction::saved(function($transaction)
        {
            $player = Player::find($transaction->player_id);
            $total = Transaction::where('player_id', '=', $transaction->player_id)->sum('points');

            $player->total = $total;
            $player->save();

        });
    }

}
