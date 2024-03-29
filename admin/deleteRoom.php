<?php require '../database/databaseConnection.php';?>
<?php
if (isset($_GET['roomId'])) {
    $roomId = $_GET['roomId'];
    $delete = $conn->prepare("DELETE FROM rooms where roomId =?");
    $delete->bind_param("i", $roomId);
    $delete->execute();

    header("Location: roomSetting.php");
    exit();
}
