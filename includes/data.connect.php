<?php

include_once dirname(__DIR__) . '\\includes\\debug.php';
include_once dirname(__DIR__) . '\\includes\\config.php';
include_once dirname(__DIR__) . '\\sql\\query.php';

function getConnection() {
    global $SQLITE_CONNECTION_ARGS_ATTR;
    global $SQLITE_CONNECTION_ARGS_EXCP;
    global $SQLITE_DB_LOCATION;
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

    log_to_stdio("Initializing database " . $SQLITE_DB_LOCATION);

    try {
        $connection = new PDO("sqlite:" . $SQLITE_DB_LOCATION);
        $connection->setAttribute($SQLITE_CONNECTION_ARGS_ATTR, $SQLITE_CONNECTION_ARGS_EXCP);
        if ($CONFIG_CREATE_USER_TABLE) {
            log_to_stdio("Creating table");
            $connection->exec($QUERY_CREATE_TABLE_USERS);
        }

        $res = $connection->query($QUERY_FOR_DEFAULT_USER);

        if ($res) {
            if ($CONFIG_CREATE_DEFAULT_USER &&
                    $res->fetchColumn() == 0) {
                log_to_stdio("Creating default user");
                $connection->exec($CREATE_DEFAULT_USER);
            } else {
                log_to_stdio("Skipping user creation");
            }
        } else {
            log_to_stdio("Creating default user");
            $connection->exec($QUERY_CREATE_DEFAULT_USER);
        }
    } catch (Exception $ex) {
        echo "EXCEPTION:  Connection failed : " . $ex->getMessage();
    }
    return $connection;
}

?>