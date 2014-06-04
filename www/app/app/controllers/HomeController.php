<?php

/**
 * Class HomeController
 *
 * The main controller for user-facing pages
 *
 * @author     Shih Oon Liong <shihoon@mechaloid.com>
 */


class HomeController extends BaseController {

    /**
     * The leaderboard page
     * @return mixed
     */
    public function showLeaderboard()
    {
        $players = Player::all();

        return View::make('home')->with('players', $players);
    }

}
