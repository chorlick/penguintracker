

$(document).ready(function () {
    function activateAction() {
        var path = document.location.pathname;
        if (path == "/user/userinfo.php") {
            $("#userinfo").addClass("active");
        } else if (path == "/") {
            $("#home").addClass("active");
        } else if (path == "/user/create.php") {
            $("#create  ").addClass("active");
        } else if (path == "/user/login.php") {
            $("#login").addClass("active");
        }
    }

    $("#home").mouseover(function () {
        $("#home").addClass("active");
        activateAction();
    });

    $("#home").mouseleave(function () {
        $("#home").removeClass("active");
        activateAction();
    });

    $("#userinfo").mouseover(function () {
        $("#userinfo").addClass("active");
        activateAction();
    });

    $("#userinfo").mouseleave(function () {
        $("#userinfo").removeClass("active");
        activateAction();
    });

    $("#home").mouseover(function () {
        $("#home").addClass("active");
        activateAction();
    });

    $("#home").mouseleave(function () {
        $("#home").removeClass("active");
        activateAction();
    });

    $("#create").mouseover(function () {
        $("#create").addClass("active");
        activateAction();
    });

    $("#create").mouseleave(function () {
        $("#create").removeClass("active");
        activateAction();
    });

    $("#login").mouseover(function () {
        $("#login").addClass("active");
        activateAction();
    });

    $("#login").mouseleave(function () {
        $("#login").removeClass("active");
        activateAction();
    });

    $("#tracker").mouseover(function () {
        $("#tracker").addClass("active");
        activateAction();
    });

    $("#tracker").mouseleave(function () {
        $("#tracker").removeClass("active");
        activateAction();
    });

    $("#logout").mouseover(function () {
        $("#logout").addClass("active");
        activateAction();
    });

    $("#logout").mouseleave(function () {
        $("#logout").removeClass("active");
        activateAction();
    });
});



