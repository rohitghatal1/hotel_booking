<?php require '../database/databaseConnection.php'?>

<?php
session_start();

$userName = $_POST['username'];
$pass = $_POST['password'];

// Hash the password to match the stored hashed password
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

$getUserData = "SELECT UID, username, password FROM users WHERE username = ?";
$getStmt = $conn->prepare($getUserData);
$getStmt->bind_param("s", $userName);
$getStmt->execute();
$result = $getStmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify the hashed password
    if (password_verify($pass, $row['password'])) {
        $_SESSION['user'] = $row['username'];
        $_SESSION['userId'] = $row['UID'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "User not found";
}

$getStmt->close();
$conn->close();
?>