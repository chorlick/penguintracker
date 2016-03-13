<!DOCTYPE html>

<?php
$errors = array();
$username = "";
$pass1 = "";

//Check here to see if we need to init anything;
include_once "../includes/data.connect.php";
init_db();

// Check if this is a postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    include_once '../includes/user.utils.php';

    $errors = array();

    if (isset($_POST["inputUsername"]) && $_POST["inputUsername"] != "") {

        $username = $_POST["inputUsername"];
    } else {

        array_push($errors, "Username can not be empty");
    }

    if (isset($_POST["inputPass1"])) {

        $pass1 = $_POST["inputPass1"];
    } else {

        array_push($errors, "Password can not be empty.");
    }

    if (count($errors) == 0) {

        if (authenticate($username, $pass1) == false) {
            
            array_push($errors, "Failed to authenticate.");
        }
        else {
            
            header('Location: /user/userinfo.php');
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

        <title>Penguin Tracker - Login</title>

        <?php include '../includes/common.header.php'; ?>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <?php include '../includes/common.toolbar.php'; ?>
        </nav>

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Login</h1>
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

            <form action="login.php" method="post">
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
                <button type="submit" class="btn btn-default">Login</button>
            </form>

        </div><!-- /.container -->

        <?php include '../includes/common.javascript.php'; ?>

    </body>
</html>