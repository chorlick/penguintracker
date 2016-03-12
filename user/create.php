<!DOCTYPE html>

<?php

//Check here to see if we need to init anything;
include_once "../includes/data.connect.php";
init_db();


$errors = array();
$firstName = "";
$lastName = "";
$username = "";
$pass1 = "";
$pass2 = "";

// Check if this is a postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    include_once '../includes/user.utils.php';

    $errors = array();

    if (isset($_POST["inputFirstName"]) && $_POST["inputFirstName"] != "") {

        $firstName = $_POST["inputFirstName"];
    } else {

        array_push($errors, "First Name can not be empty");
    }

    if (isset($_POST["inputLastName"]) && $_POST["inputLastName"] != "") {

        $lastName = $_POST["inputLastName"];
    } else {

        array_push($errors, "Last Name can not be empty");
    }

    if (isset($_POST["inputUsername"]) && $_POST["inputUsername"] != "") {

        $username = $_POST["inputUsername"];
    } else {

        array_push($errors, "Username can not be empty");
    }

    if (isset($_POST["inputPass1"]) && isset($_POST["inputPass2"]) &&
            strlen($_POST["inputPass1"]) > 3 &&
            $_POST["inputPass1"] == $_POST["inputPass2"]) {

        $pass1 = $_POST["inputPass1"];
        $pass2 = $_POST["inputPass2"];
    } else {

        array_push($errors, "Password can not be empty, must be 4 or more chars, and passwords must match.");
    }

    if (count($errors) == 0) {

        try {
            $connection = getConnection();
            if ($connection != null) {
                $passHash = md5($pass1);
                $sql = "INSERT INTO users (`firstname`, `lastname`, `username`, `passwordhash`)"
                        . "VALUES ('$firstName', '$lastName', '$username', '$passHash')";
                $connection->exec($sql);
                $connection = null;
                
                setAuthCookie($username);

                header('Location: /user/userinfo.php');
            }
        } catch (Exception $ex) {

            array_push($errors, "Account Creation failed: " . $ex->getMessage());
        }
    }
}
?>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/css/images/favicon.ico">

        <title>Penguin Tracker - Create Account</title>

        <?php include '../includes/common.header.php'; ?>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <?php include '../includes/common.toolbar.php'; ?>
        </nav>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Create Account</h1>
                </div>
            </div>

            <?php
            if (count($errors) > 0) {
                $errorCount = count($errors);
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php for ($x = 0; $x < $errorCount; $x++) { ?>
                            <div class="alert alert-danger" role="alert"><?php echo($errors[$x]); ?></div>
                        <?php } ?>
                    </div>
                </div>

            <?php } ?>

            <form action="create.php" method="post">
                <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" 
                           placeholder="First Name" value="<?php echo($firstName); ?>">
                </div>
                <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" name="inputLastName" id="inputLastName" 
                           placeholder="Last Name" value="<?php echo($lastName); ?>">
                </div>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" name="inputUsername" id="inputUsername" 
                           placeholder="Username" value="<?php echo($username); ?>">
                </div>
                <div class="form-group">
                    <label for="inputPass1">Password</label>
                    <input type="password" class="form-control" name="inputPass1" id="inputPass1" 
                           placeholder="Password" value="<?php echo($pass1); ?>">
                </div>
                <div class="form-group">
                    <label for="inputPass2">Confirm Password</label>
                    <input type="password" class="form-control" name="inputPass2" id="inputPass2" 
                           placeholder="Confirm Password" value="<?php echo($pass2); ?>">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div><!-- /.container -->

        <?php include '../includes/common.javascript.php'; ?>

    </body>
</html>