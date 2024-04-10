<<<<<<< HEAD
<?php require '../database/databaseConnection.php'?>
<?php

// geting form data
$userName = $_POST['username'];
$pass = $_POST['password'];

$getUserData = "SELECT UID, username, password FROM users";
$fetchedData = $conn->query($getUserData);
if ($fetchedData->num_rows > 0) {
    while ($row = $fetchedData->fetch_assoc()) {
        if ($row['username'] == $userName && $row['password'] == $pass) {
            session_start();
            $_SESSION['user'] = $row['username'];
            $_SESSION['userId'] = $row['UID'];
            $loggedIn = true;
            break;
        }
    }
}
if ($loggedIn) {
    echo "<script>alert('LoginSuccessful')</script>";
    header("Location: ../HTML/index.php");
} else {
    echo "<script>alert('User Not found')</script>";
    echo "<script>window.history.back()</script>";
}
=======
<?php require '../database/databaseConnection.php'?>
<?php

// geting form data
$userName = $_POST['username'];
$pass = $_POST['password'];

$getUserData = "SELECT UID, username, password FROM users";
$fetchedData = $conn->query($getUserData);
if ($fetchedData->num_rows > 0) {
    while ($row = $fetchedData->fetch_assoc()) {
        if ($row['username'] == $userName && $row['password'] == $pass) {
            session_start();
            $_SESSION['user'] = $row['username'];
            $_SESSION['userId'] = $row['UID'];
            $loggedIn = true;
            break;
        }
    }
}
if ($loggedIn) {
    echo "<script>alert('LoginSuccessful')</script>";
    header("Location: ../HTML/index.php");
} else {
    echo "<script>alert('User Not found')</script>";
    echo "<script>window.history.back()</script>";
}
>>>>>>> origin/main
