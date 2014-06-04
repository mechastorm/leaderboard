<?php

/**
 * Application Routes
 */


Route::get('/', 'HomeController@showLeaderboard');

// API Endpoints

Route::post('/api/player/points', 'ApiController@addPlayerPoints');

