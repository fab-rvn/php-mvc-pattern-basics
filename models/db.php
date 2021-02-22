<?php

define('HOST', "83.54.185.32");
define('USERNAME', "admin");
define('PASSWORD', "root");
define('DATABASE', "employees");

function connectionDB()
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    // $conn = new mysqli("127.0.0.1", "faber", "userpass", "employeesDB");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}