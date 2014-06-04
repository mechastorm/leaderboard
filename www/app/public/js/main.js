var App = (function () {

    /**
     * Private methods
     */

    function onPageload() {
        console.log("hi");
        $("#add-points").click(function() {
            console.log("Add Points");
            addPoints();
        });
    }

    function addPoints() {
        $.ajax({
            type: "Post",
            url: "/api/player/points",
            data: {
                'player' : 1,
                'points' : 5
            },
            dataType: "json",
            success: function(data) {
                console.log('success', data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    /**
     * Public Methods & Vars
     */
    return {
        onPageLoad: onPageload
    };
})();