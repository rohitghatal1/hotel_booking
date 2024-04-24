<?php

$hostname = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$database = "web_ppppppp";
$sql = "CREATE DATABASE IF NOT EXISTS $database";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully!!";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
