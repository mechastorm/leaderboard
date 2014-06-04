<?php
Event::listen('player.total.update',function($clientData){
    return BrainSocket::message('player.total.update',array('message'=>'Player total has been updated', 'client' => $clientData));
});

Event::listen('app.success',function($clientData){
    return BrainSocket::success(array('There was a Laravel App Success Event!'));
});

Event::listen('app.error',function($clientData){
    return BrainSocket::error(array('There was a Laravel App Error!'));
});