<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "widget_crop");

    // Create Database Connection
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    // Test if connection succeeded
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
            mysqli_connect_errno() . 
            " (" . mysqli_connect_errno() . ") "
        );
    }
?>
