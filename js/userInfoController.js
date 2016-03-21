


var currentUsername;

function readUserInfo($user) {
    var data = {};
    data.request = {};
    data.request.action = "read";
    data.request.user = {};
    data.request.user.username = currentUsername;
    
    $.post("/ajax/userInfoController.php", data, function (resp, text, xhr) {
        $("#username").val(resp["username"]);
        $("#firstname").val(resp["firstName"]);
        $("#lastname").val(resp["lastName"]);
        $("#userID").val(resp["userID"]);
    }, "json");
}

function writeUserInfo() {
    var data = {};
    data.request = {};
    data.request.action = "write";
    data.request.user = {};
    data.request.user.username = $("#username").val();
    data.request.user.firstname = $("#firstname").val();
    data.request.user.lastname = $("#lastname").val();
    data.request.user.userID = $("#userID").val();
    $.post("/ajax/userInfoController.php", data, function (resp, text, xhr) {
        if (resp == "ok") {
            alert("User information updated");
                        $("#logout").text("Logout " + $("#username").val());

        }
    }, "json");
}

function checkUsername() {
    var data = {};
    data.request = {};
    data.request.action = "user_exists";
    data.request.user = {};
    data.request.user.username = $("#username").val();
    $.post("/ajax/userInfoController.php", data, function (resp, text, xhr) {

        if (resp == "true") {
            $("#username-group").addClass("has-error");
        } else {
            $("#username-group").removeClass("has-error");
        }

        if (currentUsername == $("#username").val()) {
            $("#username-group").removeClass("has-error");
        }

    }, "json");
}

function getUserName() {
    var data = {};
    data.request = {};
    data.request.action = "getuser";
    
    $.ajax({
        url: "/ajax/userInfoController.php",
        async: true,
        data: data,
        method: "POST",
        dataType: "json",
        success: function (data, status, xhr) {
            currentUsername = data;
            $("#logout").text("Logout " + data);
        }
    });
}

$(document).ready(function () {
    var today = new Date()
    var curHr = today.getHours();
    var greeting = "";

    if (curHr < 12) {
        greeting = "Good Morning, ";
    } else if (curHr < 18) {
        greeting = "Good Afternoon, ";
    } else {
        greeting = "Good Evening, ";
    }

    $("#save").click(function () {
        if ($("#username-group").hasClass("has-error")) {
            alert("That username is already taken");
            currentUsername = $("#username").val();
            return;
        }
        getUserName();
        writeUserInfo();
    });

    $("#username").focusout(function () {
        checkUsername();
    });
    currentUsername = readCookie("AUTH_USER");
    readUserInfo(currentUsername);
    getUserName();
});



