<?php
require '../database/databaseConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data sent through AJAX
    $roomId = $_POST['roomId'];
    $userId = $_POST['userId'];
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];

    // Prepare and execute the booking insertion query
    $bookingDetails = $conn->prepare("INSERT INTO bookings (userId, roomId, checkInDate, checkOutDate, bookedDate) VALUES (?,?,?,?, NOW());");
    $bookingDetails->bind_param("iiss", $userId, $roomId, $checkInDate, $checkOutDate);
    if ($bookingDetails->execute()) {
        // Update the room status to booked
        $updateStats = $conn->prepare("UPDATE rooms SET status ='booked' WHERE roomId = ?");
        $updateStats->bind_param("i", $roomId);
        if ($updateStats->execute()) {
            echo "Booking Successful";
        } else {
            echo "Failed to update room status.";
        }
    } else {
        echo "Booking Failed";
    }
}
?>
