<<<<<<< HEAD
<?php require '../database/databaseConnection.php'?>
<?php
if (isset($_GET['roomId'])) {
    $roomId = $_GET['roomId'];

    $deleteRecord = "DELETE FROM bookings WHERE roomId = $roomId";
    $updateRoomStatus = "UPDATE rooms SET status = 'available' WHERE roomId = $roomId";

    if ($conn->query($deleteRecord) === true && $conn->query($updateRoomStatus) === true) {
        echo "<script>alert('Booking Cancelled Successfully')</script>";
        echo "<script>window.location.href='a_booking.php'</script>";
    }
}
=======
<?php require '../database/databaseConnection.php'?>
<?php
if (isset($_GET['roomId'])) {
    $roomId = $_GET['roomId'];

    $deleteRecord = "DELETE FROM bookings WHERE roomId = $roomId";
    $updateRoomStatus = "UPDATE rooms SET status = 'available' WHERE roomId = $roomId";

    if ($conn->query($deleteRecord) === true && $conn->query($updateRoomStatus) === true) {
        echo "<script>alert('Booking Cancelled Successfully')</script>";
        echo "<script>window.location.href='a_booking.php'</script>";
    }
}
>>>>>>> origin/main
