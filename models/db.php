<?php

function connectionDB()
{
    // $conn = new mysqli("83.54.185.32", "admin", "root", "employees");
    $conn = new mysqli("127.0.0.1", "faber", "userpass", "employeesDB");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}