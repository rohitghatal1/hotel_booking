<?php require '../database/databaseConnection.php'?>
<?php 
$checkIn = $_POST['check-in-date'];
$checkOut = $_POST['check-out-date'];
$roomType = $_POST['roomType'];
$persons = $_POST['personsCount'];

$today = date('Y-m-d');
if($checkIn < $today || $checkOut < $today || $checkOut < $checkIn){
    echo "<script>alert('Invalid date selection. Please select valid date!!!')</script>";
    echo "<script>window.history.back()</script>";
    exit();
}

$getRooms = "SELECT * FROM rooms WHERE roomType = $roomType";
$fetechedRoomData = $conn->query($getRooms);

if($fetechedRoomData->num_rows>0){
    while($room = $fetechedRoomData->fetch_assoc()){
        $roomId = $room['roomId'];

        $checkBooking = "SELECT * FROM bookings WHERE roomId = $roomId AND ($checkIn > checkOutDate)";
        $checkBookingResult = $conn->query($checkBooking)
    }
    // check if the room is already booked or not 
}