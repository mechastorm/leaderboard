<?php

/**
 * Class ApiController
 *
 * Controller for API calls in the app
 *
 * @author     Shih Oon Liong <shihoon@mechaloid.com>
 */

class ApiController extends BaseController {

    /**
     * Add points to a player. This is expected to be call as a API endpoints /api/player/points
     *
     * Expected POST var
     * 'points' - An integer representing the amount of points to add to the player
     * 'player' - The player for which the points are for
     *
     * @return mixed
     */
    public function addPlayerPoints()
    {
        // Get POST var values
        $points = Input::get('points', 0);
        $playerId = Input::get('player', 0);

        // Create transaction Data
        $transaction = new Transaction;
        $transaction->ip = Request::getClientIp();
        $transaction->player_id = $playerId;
        $transaction->points = $points;
        $transaction->save();

        // Get updated player data after transaction was completed
        $player = Player::find($transaction->player_id);

        return Response::json(array(
            'message'   => 'ok',
            'player'    => $player->toArray(),
        ));
    }

}
