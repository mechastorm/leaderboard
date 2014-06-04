<?php

class ApiController extends BaseController {

    public function addPlayerPoints()
    {
        $points = Input::get('points', 0);
        $playerId = Input::get('player', 0);

        $transaction = new Transaction;

        $transaction->ip = Request::getClientIp();
        $transaction->player_id = $playerId;
        $transaction->points = $points;
        $transaction->Save();

        return Response::json(array('message' => 'ok'));
    }

}
