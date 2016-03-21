<?php

include_once dirname(__DIR__) . '\\includes\\user.utils.php';
include_once dirname(__DIR__) . '\\includes\\debug.php';

function readUserInformation($username) {
    log_to_stdio("Reading user  " . $username);
    $ret = readUser($username);
    return $ret;
}

function writeUserInformation($username) {
    return writeUser($username);
}

function checkForUsername($username) {
    return user_exists($username);
}

function getUsername() {
    return getAuthUser();
}

//request post with userinfoController
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $request = ($_POST["request"]);
    if (strcmp($request["action"], "read") == 0) {
        $text = readUserInformation($request["user"]["username"]);
        print json_encode($text);
    } elseif (strcmp($request["action"], "write") == 0) {
        $text = writeUserInformation($request["user"]);
        print json_encode($text);
    } elseif (strcmp($request["action"], "user_exists") == 0) {
        $text = json_encode(checkForUsername($request["user"]['username']));
        print json_encode($text);
    } elseif (strcmp($request["action"], "getuser") == 0) {
        $text = getUsername()->username;
        print json_encode($text);
    }
}
?>
