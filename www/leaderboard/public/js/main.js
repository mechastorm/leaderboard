/**
 * Main App
 */
var App = (function () {

    /**
     * Private methods
     */
    var
        revealedAddPointsUI = false,
        brainSocket,
        selectedPlayer = {
            'name' : '',
            'id'   : null
        };

    /**
     * Event Handler when Page is first loaded
     */
    function onPageload() {
        brainSocket = new BrainSocket(
            new WebSocket('ws://leaderboard.app:8080'),
            new BrainSocketPubSub()
        );

        playerTotalUpdatesGlobalListener();

        playerSelectListener();
    }

    /**
     * Listener for updates to the player's total points globally from other clients
     */
    function playerTotalUpdatesGlobalListener() {
        brainSocket.Event.listen('player.total.update',function(response) {
            // console.log('player.total.update', response);
            updatePlayerTotal(response.client.data);
        });
    }

    /**
     * Listener for when a player is selected
     */
    function playerSelectListener() {
        $('#leaderboard-list').on('click', 'tbody tr', function(event) {
            $(this).addClass('highlight').siblings().removeClass('highlight');

            if (!revealedAddPointsUI) {
                revealAddPointsUI();
                revealedAddPointsUI = true;
            }

            selectedPlayer.name = $(this).data('name');
            selectedPlayer.id = $(this).data('id');
            $('#selected-player').html(selectedPlayer.name);
        });
    }

    /**
     * Reveal the Add Points UI and begin listening to related events to it.
     */
    function revealAddPointsUI() {
        $('#add-points').removeClass('hide');
        addPointsListener();
    }

    /**
     * Listener for when user wants points are to be added
     */
    function addPointsListener() {
        $('#add-points').click(function() {
            var
                playerId = selectedPlayer.id,
                points = $(this).data('points');

            if (playerId != null) {
                addPoints(playerId, points);
            }

        });
    }

    /**
     * AJAX call to add points for a player
     * @param playerId
     * @param points
     */
    function addPoints(playerId, points) {
        $.ajax({
            type: 'Post',
            url: '/api/player/points',
            data: {
                'player' : playerId,
                'points' : points
            },
            dataType: 'json',
            success: function(data) {
                brainSocket.message('player.total.update', data.player);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    /**
     * Update the player total to the user
     * @param player
     */
    function updatePlayerTotal(player) {
        var el = $('#player-'+player.id).find('.player-total');
        el.html(player.total);
    }

    /**
     * Public Methods & Vars
     */
    return {
        onPageLoad: onPageload
    };
})();