<?php

    $env = parse_ini_file(realpath(__DIR__ . '/../.env'));

    $db_user = $env["DB_USER"];
    $db_password = $env["DB_PASSWORD"];
    $db_name = $env["DB_NAME"];
    $db_host = $env["DB_HOST"];

    $db = new PDO ('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_password);

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    define ('APP_NAME', 'PHP REST API TEMPLATE');

?>