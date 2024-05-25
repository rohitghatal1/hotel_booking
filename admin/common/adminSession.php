<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("location: adminLoginPage.php");
    exit();
}

$loggedInUsername = $_SESSION['admin_username'];

//extracting the first letter of the username for avatar
$firstLetter = strtoupper(substr($loggedInUsername, 0, 1));
?>