<?php
require '../database/databaseConnection.php';

if (isset($_POST['roomId'])) {
    $roomId = $_POST['roomId'];

    $deleteRecord = "DELETE FROM bookings WHERE roomId = $roomId";
    $updateRoomStatus = "UPDATE rooms SET status = 'available' WHERE roomId = $roomId";

    if ($conn->query($deleteRecord) === true && $conn->query($updateRoomStatus) === true) {
        // Redirect back to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Handle error if needed
        echo "Error: " . $conn->error;
    }
} else {
    // Handle case where $_POST['roomId'] is not set
    echo "Room ID is not set.";
}
?>
