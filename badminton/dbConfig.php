<?php 

// Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "ongsa@112233";
$dbName = "badminton";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


?>