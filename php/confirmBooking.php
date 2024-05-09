<?php require '../database/databaseConnection.php'?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $roomId = $_POST['roomId'];
    $userId = $_POST['userId'];
    $bookingDate = $_POST['bookingDate'];
    $checkIn = $_POST['checkInDate'];
    $checkOut = $_POST['checkOutDate'];

    // for feteching user Name
    $getUserName = "SELECT firstName, lastName FROM users WHERE UID =$userId";
    $userName = $conn->query($getUserName);
    $row = $userName->fetch_assoc();

    $fName = $row['firstName'];
    $lName = $row['lastName'];
    $fullName = $fName . " " . $lName;

    // for getting roomNumber
    $getRoomNumber = "SELECT roomNo FROM rooms WHERE roomId = $roomId";
    $roomNo = $conn->query($getRoomNumber);
    $roomNum = $roomNo->fetch_assoc();
    $fetchedRoomNo = $roomNum['roomNo'];

    // Validate check-in and check-out dates
    $today = date('Y-m-d');
    if ($checkIn < $today || $checkOut < $today || $checkOut < $checkIn) {
        echo "<script>alert('Invalid date selection. Please select valid dates.')</script>";
        echo "<script>window.history.back()</script>";
        exit; // stop further execution
    }

    $bookingDetails = $conn->prepare("INSERT INTO bookings (userId, Name, roomId, roomNo, checkInDate, checkOutDate, bookedDate) VALUES (?,?,?,?,?,?,?);");
    $bookingDetails->bind_param("isiisss", $userId, $fullName, $roomId, $fetchedRoomNo, $checkIn, $checkOut, $bookingDate);
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
