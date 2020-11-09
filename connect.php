<?php

// Turn off all error reporting
error_reporting(0);

// Connect to database
$connection = mysqli_connect('host', 'username', 'password');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

// Select database
$select_db = mysqli_select_db($connection, 'turnitin');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}