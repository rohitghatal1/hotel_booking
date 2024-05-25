<?php
require '../database/databaseConnection.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Hashing the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if the email already exists
$checkEmailQuery = "SELECT * FROM users WHERE email = ?";
$checkEmailStmt = $conn->prepare($checkEmailQuery);
$checkEmailStmt->bind_param("s", $email);
$checkEmailStmt->execute();
$existingEmail = $checkEmailStmt->get_result()->fetch_assoc();

// Check if the username already exists
$checkUsernameQuery = "SELECT * FROM users WHERE username = ?";
$checkUsernameStmt = $conn->prepare($checkUsernameQuery);
$checkUsernameStmt->bind_param("s", $username);
$checkUsernameStmt->execute();
$existingUsername = $checkUsernameStmt->get_result()->fetch_assoc();

// Check if email or username already exists
if ($existingEmail) {
    echo "Email Already Used";
} elseif ($existingUsername) {
    echo "Username Already taken";
} else {
    $insert = $conn->prepare("INSERT INTO users (firstName, lastName, gender, address, contact, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $insert->bind_param("ssssssss", $fname, $lname, $gender, $address, $contact, $email, $username, $hashedPassword);

    if ($insert->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error inserting data";
        error_log("Error inserting data: " . $insert->error);
    }

    $insert->close();
}

$checkEmailStmt->close();
$checkUsernameStmt->close();
$conn->close();
?>
