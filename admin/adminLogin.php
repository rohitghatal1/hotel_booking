<?php
session_start();

//check if user is already logged in
if (isset($_SESSION['admin_username'])) {
    header("loction: a_adminDashboard.php");
    exit();
}
?>
<?php require '../database/databaseConnection.php'?>

<?php

$username = $_POST['admin-name'];
$password = $_POST['admin-pass'];

$data = "SELECT * FROM admin_table";
$result = $conn->query($data);

$incorrectCredintials = true;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (($username == $row["admin_name"]) && ($password == $row["admin_pass"])) {
            session_start(); //starting the session after successful authentication
            $_SESSION['admin_username'] = $username;
            $loggedIn = true;
            break;
        }
    }
}
if ($loggedIn) {
    header("location: a_adminDashboard.php");
    exit();
} else {
    echo '<script>alert("Wrong username or password. Please try again");</script>';
    echo '<script>window.location.href = "adminLoginPage.php";</script>';
}
?>