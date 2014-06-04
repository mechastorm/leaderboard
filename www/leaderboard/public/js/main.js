/**
 * Main App
 */
var App = (function () {

    /**
     * Private methods
     */
    var
        selectedPlayer = {
            'name' : '',
            'id'   : null
        };

    /**
     * Event Handler when Page is first loaded
     */
    function onPageload() {
        $('#leaderboard-list').on('click', 'tbody tr', function(event) {
            $(this).addClass('highlight').siblings().removeClass('highlight');

            selectedPlayer.name = $(this).data('name');
            selectedPlayer.id = $(this).data('id');
            $('#selected-player').html(selectedPlayer.name);
        });

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
                updatePlayerTotal(data.player.id, data.player.points);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function updatePlayerTotal(playerId, total) {
        var el = $('#player-'+playerId).find('.player-total');
        el.html(total);
    }

    /**
     * Public Methods & Vars
     */
    return {
        onPageLoad: onPageload
    };
})();