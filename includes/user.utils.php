<?php

include_once 'data.connect.php';

class User {

    public $userID = null;
    public $firstName = null;
    public $lastName = null;
    public $username = null;
    public $passHash = null;

}

function isAuthenticated() {

    return isset($_COOKIE['AUTH_USER']) && strlen($_COOKIE['AUTH_USER']) > 0;
}

function getAuthUsername() {

    return $_COOKIE['AUTH_USER'];
}

function getAuthUser() {

    return getUser(getAuthUsername());
}

function setAuthCookie($username) {

    setcookie('AUTH_USER', $username, time() + 60 * 60 * 24 * 365, '/');
}

function deleteAuthCookie() {
    
    setcookie('AUTH_USER', '', time() - 1000, '/');
}

function authenticate($username, $password) {

    $passHash = md5($password);
    $user = getUser($username);

    if ($user->passHash == $passHash) {

        setAuthCookie($username);
        return true;
    } else {

        return false;
    }
}

function getUser($username) {

    try {
        $conn = getConnection();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT `userid`, `firstname`, `lastname`, `username`, `passwordhash` FROM `users`");
        $stmt->execute();

        $user = null;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $user = new User();
            $user->userID = $row["userid"];
            $user->firstName = $row["firstname"];
            $user->lastName = $row["lastname"];
            $user->username = $row["username"];
            $user->passHash = $row["passwordhash"];
        }

        $conn = null;

        return $user;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
