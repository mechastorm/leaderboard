<?php

class HomeController extends BaseController {

	public function showWelcome()
	{
        return View::make('hello');
	}

    public function showLeaderboard()
    {
        $players = Player::all();

        return View::make('home')->with('players', $players);
    }

}
