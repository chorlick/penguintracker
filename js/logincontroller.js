$(function () {
    // run the currently selected effect
    function runEffect() {
        // get effect type from
        var selectedEffect = "blind";
        var options = {};

        if ($("#effect").is(":visible")) {
            $("#effect:visible").hide("blind", options, 500);
        } else {
            $("#effect").show("blind", options, 500);
        }
    }
    


    // set effect from select menu value
    $("#button").click(function () {
        runEffect();
    });

    $("#effect").hide();
});
