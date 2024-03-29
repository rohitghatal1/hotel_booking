<?php require '../database/databaseConnection.php'?>
<?php
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    $delete = $conn->prepare("DELETE FROM users WHERE UID = ?");
    $delete->bind_param('i', $userId);
    $delete->execute();
    header('Location: userPage.php');
}
