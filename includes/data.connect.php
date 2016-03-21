<?php

include_once dirname(__DIR__) . '\\includes\\debug.php';
include_once dirname(__DIR__) . '\\includes\\config.php';
include_once dirname(__DIR__) . '\\sql\\query.php';
include_once dirname(__DIR__) . '\\exceptions\\TableDoesNotExistException.php';
include_once dirname(__DIR__) . '\\exceptions\\DefaultUserDoesNotExistException.php';

function getConnection() {
    global $SQLITE_CONNECTION_ARGS_ATTR;
    global $SQLITE_CONNECTION_ARGS_EXCP;
    global $SQLITE_DB_LOCATION;

    if (!file_exists($SQLITE_DB_LOCATION)) {
        init_db();
    }

    try {
        $connection = new PDO("sqlite:" . $SQLITE_DB_LOCATION);
        $connection->setAttribute($SQLITE_CONNECTION_ARGS_ATTR, $SQLITE_CONNECTION_ARGS_EXCP);
    } catch (Exception $ex) {
        echo "EXCEPTION:  Connection failed : " . $ex->getMessage();
    }

    return $connection;
}

function init_db() {
    global $SQLITE_CONNECTION_ARGS_ATTR;
    global $SQLITE_CONNECTION_ARGS_EXCP;
    global $SQLITE_DB_LOCATION;
    global $CONFIG_CREATE_USER_TABLE;
    global $CONFIG_CREATE_DEFAULT_USER;
    global $QUERY_CREATE_TABLE_USERS;
    global $QUERY_FOR_DEFAULT_USER;
    global $QUERY_CREATE_DEFAULT_USER;
    global $CONFIG_DEFAULT_USERNAME;

    log_to_stdio("Initializing database " . $SQLITE_DB_LOCATION);
    $connection = null;

    try {
        $connection = new PDO("sqlite:" . $SQLITE_DB_LOCATION);
        $connection->setAttribute($SQLITE_CONNECTION_ARGS_ATTR, $SQLITE_CONNECTION_ARGS_EXCP);
    } catch (Exception $ex) {
        $connection = null;
        echo "EXCEPTION:  Connection failed : " . $ex->getMessage();
    }

    try {
        log_to_stdio("Checking for table");
        table_exists($connection, "users");
    } catch (TableDoesNotExistException $ex) {
        log_to_stdio($ex->getMessage());
        if ($CONFIG_CREATE_USER_TABLE) {
            log_to_stdio("Creating table");
            $connection->exec($QUERY_CREATE_TABLE_USERS);
        }
    }

    try {
        log_to_stdio("Checking for default user");
        default_user_exists($connection, $CONFIG_DEFAULT_USERNAME);
    } catch (DefaultUserDoesNotExistException $ex) {
        log_to_stdio($ex->getMessage());
        if ($CONFIG_CREATE_USER_TABLE) {
            log_to_stdio("Creating default user");
            $connection->exec($QUERY_CREATE_DEFAULT_USER);
        }
    }

    $connection = null;
}

function table_exists($pdo, $tablename) {
    $sql = "SELECT name FROM sqlite_master WHERE type='table' AND name='$tablename';";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    if (sizeof($result) == 0) {
        log_to_stdio("Table $tablename does not exist");
        throw new TableDoesNotExistException("Table $tablename does not exist");
    } else {
        log_to_stdio("Table $tablename exists");
        return true;
    }
}

function default_user_exists($pdo, $username) {
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    if (sizeof($result) == 0) {
        log_to_stdio("Default user does not exist");
        throw new DefaultUserDoesNotExistException("Default exists already");
    } else {
        log_to_stdio("Default user already installed");
        return true;
    }
}

function user_exists( $username) {
    $pdo = getConnection();
    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    log_to_stdio($sql);
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    if (sizeof($result) == 0) {
        log_to_stdio("username ");
    
        return false;
    } else {
        return true;
        log_to_stdio("username does not exist");
    }
    $pdo = null;
} 
?>


