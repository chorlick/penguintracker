<?php

include_once '../includes/user.utils.php';

deleteAuthCookie();

header('Location: /user/login.php');

?>