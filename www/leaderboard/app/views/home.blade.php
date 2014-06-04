@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="leaderboard col-md-6 col-md-offset-3">

            <table id="leaderboard-list" class="table">
                <tbody>
                @foreach($players as $player)
                <tr id="player-{{ $player->id }}"
                    data-name="{{ $player->name }}" data-id="{{ $player->id }}">
                    <td><h3>{{ $player->name }}</h3></td>
                    <td><h3 class="player-total">{{ $player->total }}</h3></td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <hr />

            <div class="user-actions">
                <h2><span id="selected-player">Please Select a Player</span></h2>
                <p>
                    <button type="button" id="add-points" class="add-points btn btn-default" data-points="5">Add 5 Points</button>
                </p>
            </div>
        </div>
    </div>
</div>
@stop