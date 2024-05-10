<?php
require '../database/databaseConnection.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    // Assuming 'facilities' is the name of your table
    $stmt = $conn->prepare("DELETE FROM facilities WHERE facilityName = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    // You might want to perform additional error checking here
    exit(); // Exit after deletion
}
?>
