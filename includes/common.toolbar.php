<?php
    include_once 'user.utils.php';
?>


<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a id="tracker" class="navbar-brand" href="/">Penguin Tracker</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li id = "home"><a href="/">Home</a></li>
            <?php if (isAuthenticated()) { ?>
                <li id = "userinfo"><a href="/user/userinfo.php">User Info</a></li>
                <li><a id ="logout" href="/user/logout.php"></a></li>
            <?php } else { ?>
                <li id="create"><a href="/user/create.php">Create Account</a></li>
                <li id="login"><a id="button">Login</a></li>
            <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a id="greeting"></a></li>
        </ul>
    </div><!--/.nav-collapse -->
</div>



<div class="toggler">
    <div id="effect" class="ui-widget-content ui-corner-all" width = "500px;">
        <h3 class="ui-widget-header ui-corner-all">Login</h3>
        <form action="/user/login.php" method="post">
            <div class="form-group">
                <label for="inputUsername">Username</label>
                <input type="text" class="form-control" name="inputUsername" id="inputUsername" 
                       placeholder="Username">
            </div>
            <div class="form-group">
                <label for="inputPass1">Password</label>
                <input type="password" class="form-control" name="inputPass1" id="inputPass1" 
                       placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>
</div>