<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "testing";

// Establishing a database connection
$con = new mysqli($host, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
