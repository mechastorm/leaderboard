<?php

class Player extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'players';

    public function transactions()
    {
        return $this->hasMany('Transaction');
    }

}
