<?php
function dbconnect(){
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'inventory');

    $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    return $mysqli;

    if(mysqli_connect_errno()){
        echo 'Failed to connect to MYSQLI:' . mysqli_coonect_error();
    }else{
        echo 'Connect to database';
    }
}