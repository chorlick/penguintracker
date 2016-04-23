$(document).ready(function () {
    // Can also be used with $(document).ready()
    $('.flexslider').flexslider({
        animation: "slide"
    });

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
    activateAction();
});