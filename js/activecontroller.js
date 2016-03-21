$(document).ready( function() {
    
    function activateAction() {
        var path = document.location.pathname;
        if(path == "/user/userinfo.php") {
            $("#userinfo").addClass("active");
        }else if(path == "/") {
            $("#home").addClass("active");
        }else if(path == "/user/create.php") {
            $("#create  ").addClass("active");
        }else if(path == "/user/login.php") {
            $("#login").addClass("active");
        }
    }
    activateAction();
});