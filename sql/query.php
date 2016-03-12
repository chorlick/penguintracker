<?php
include_once dirname(__DIR__) . '../includes/config.php';

//using sqlite
//https://github.com/sqlitebrowser/sqlitebrowser/releases/download/v3.8.0/sqlitebrowser-3.8.0-win32v3.exe

$QUERY_CREATE_TABLE_USERS = "CREATE TABLE users (
                    userid INTEGER PRIMARy KEY  AUTOINCREMENT,
                    firstname CHAR(300) DEFAULT NULL,
                    lastname CHAR(300) DEFAULT NULL,
                    username CHAR(300) NOT NULL,
                    passwordhash CHAR(100) NOT NULL)";

$QUERY_CREATE_DEFAULT_USER = "INSERT INTO users (`firstname`, `lastname`, `username`, `passwordhash`)"
                        . "VALUES ('$CONFIG_DEFAULT_USERNAME', '$CONFIG_DEFAULT_USERNAME', '$CONFIG_DEFAULT_USERNAME', '" . md5($CONFIG_DEFAULT_PASSWORD) . "')";


$QUERY_FOR_DEFAULT_USER = "SELECT COUNT(*) FROM USER where username = '".$CONFIG_DEFAULT_USERNAME."'";

?>