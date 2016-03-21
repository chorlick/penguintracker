<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/css/images/favicon.ico">
        <title>Penguin Tracker - Account Created</title>
        <?php include '../includes/common.header.php'; ?>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <?php include '../includes/common.toolbar.php'; ?>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>User Info</h1>
                    <form>    
                        <div class="form-group" id = "username-group">
                            <label for="username">Username</label>
                            <input type ="text" id="username" placeholder="Username" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type ="text" id ="firstname" class="form-control" placeholder="First Name"></input>
                        </div>
                        <div class="form-group">
                            <label for="firstname">Last Name</label>
                            <input type ="text" id ="lastname" class="form-control" placeholder="Last Name"></input>
                        </div>
                            <input type ="hidden" id ="userID">
                            <button type="button" id="save" class="btn btn-default">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container -->

    <?php include '../includes/common.javascript.php'; ?>

</body>
</html>