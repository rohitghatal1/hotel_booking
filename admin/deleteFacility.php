<?php
require '../database/databaseConnection.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $stmt = $conn->prepare("DELETE FROM facilities WHERE facilityName = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    exit();
}
?>
