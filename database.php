<?php

    $hostName = "sql312.infinityfree.com";
    $dbUser = "if0_36115829";
    $dbPassword = "5BaXL48yn9tz";
    $dbName = "if0_36115829_webdatabase"; //database name

    $mysqli = new mysqli(hostname: $hostName,
                        username: $dbUser,
                        password: $dbPassword,
                        database: $dbName);

    if ($mysqli->connect_errno) {
        die("Something went wrong!" . $mysqli->connect_error);
    }

    return $mysqli;