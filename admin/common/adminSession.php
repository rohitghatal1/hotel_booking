<?php
session_start(); // Start the PHP session

if (!isset($_SESSION['admin_username'])) {
    header("location: adminLoginPage.php"); // Redirect to login page if not logged in
    exit();
}

//retreve teh loggen-in username

$loggedInUsername = $_SESSION['admin_username'];

//extract the first letter of the username for avatar
$firstLetter = strtoupper(substr($loggedInUsername, 0, 1));
?>