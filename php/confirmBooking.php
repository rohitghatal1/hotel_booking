<?php require '../database/databaseConnection.php'?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roomId = $_POST['roomId'];
    $cName = $_POST['customerName'];
    $cNumber = $_POST['customerNumber'];
    $cEmail = $_POST['customerEmail'];
    $checkIn = $_POST['checkInDate'];
    $checkOut = $_POST['checkOutDate'];

    // Validate check-in and check-out dates
    $today = date('Y-m-d');
    if ($checkIn < $today || $checkOut < $today || $checkOut < $checkIn) {
        echo "<script>alert('Invalid date selection. Please select valid dates.')</script>";
        echo "<script>window.history.back()</script>";
        exit; // Stop further execution
    }

    $bookingDetails = $conn->prepare("INSERT INTO bookings (customerName, customerNumber, customerEmail, checkInDate, checkOutDate) VALUES (?,?,?,?,?);");
    $bookingDetails->bind_param("sssss", $cName, $cNumber, $cEmail, $checkIn, $checkOut);
    if ($bookingDetails->execute()) {
        $bookingDone = true;
        echo "<script>alert('Booking Successful')</script>";
        echo "<script>window.history.back()</script>";
    } else {
        echo "Booking Failed";
    }

    if ($bookingDone) {
        $updateStats = $conn->prepare("UPDATE rooms SET status ='booked' WHERE roomId = ?");
        $updateStats->bind_param("i", $roomId);
        $updateStats->execute();
    }
}
