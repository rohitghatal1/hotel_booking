<?php
echo "User ID: " . $_GET['userId'];

require '../database/databaseConnection.php';

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    $delete = $conn->prepare("DELETE FROM users WHERE UID = ?");
    if (!$delete) {
        die('Error preparing delete statement: ' . $conn->error);
    }

    $delete->bind_param('i', $userId);
    if (!$delete->execute()) {
        die('Error executing delete statement: ' . $delete->error);
    }

    header('Location: a_userPage.php');
    exit;
}
?>
