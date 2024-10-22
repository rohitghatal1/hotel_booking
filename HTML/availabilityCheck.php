<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking availability</title>
    <link rel = "stylesheet" href="../CSS/checkBookingPage.css">
    <link rel = "stylesheet" href="../CSS/responsivecheckBooking.css">

    <!-- google fonts link  -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="noRoomsHeading">
        <h2 class="heading-font">Available Rooms</h2>
        <button class="goBackBtn" onclick="window.location.href = 'index.php'">Go Back</button>
    </div>

    <div class="roomCards-container">
<?php
require '../database/databaseConnection.php';

session_start();
$checkIn = $_POST['check-in-date'];
$checkOut = $_POST['check-out-date'];
$roomType = $_POST['roomType'];
$persons = $_POST['personsCount'];

$today = date('Y-m-d');
if ($checkIn < $today || $checkOut < $today || $checkOut < $checkIn) {
    echo "<script>alert('Invalid date selection. Please select valid dates!!!')</script>";
    echo "<script>window.history.back()</script>";
    exit();
}

// Query to fetch all rooms of the specified type that are available in the given time period
$getRoomsQuery = "
    SELECT * 
    FROM rooms 
    WHERE roomType = '$roomType' 
    AND roomId NOT IN (
        SELECT roomId 
        FROM bookings 
        WHERE ('$checkIn' < checkOutDate AND '$checkOut' > checkInDate)
    )
";
$getRoomsResult = $conn->query($getRoomsQuery);

$roomsAvailable = false;

if ($getRoomsResult->num_rows > 0) {
    while ($room = $getRoomsResult->fetch_assoc()) {
        $roomId = $room['roomId'];

        $roomsAvailable = true;

        // Displaying room card
        ?>
            <div class="room-card">
                <img src="<?php echo $room['imagePath']; ?>">
                <h3 class="heading-font"><?php echo $room['roomType']; ?></h3>
                <p class="text-font"><?php echo $room['roomDesc']; ?></p>
                <p class="text-font"><strong>Price:</strong> <?php echo $room['roomPrice']; ?></p>
                <button class="book-button" onclick="handleBooking(<?php echo $roomId; ?>)">Book Now</button>
            </div>
        <?php
    }
}
else{
    echo"<div class='noRoomsError'>No rooms available within this time period!!!</div>";
}

?>
</div>
</body>
<script>
        function handleBooking() {
            <?php if (isset($_SESSION['user'])) {?>

                let roomId = document.getElementById("roomId").value;
                let checkInDate = '<?php echo $checkIn?>';
                let checkOutDate = '<?php echo $checkOut?>';
                let userId = <?php echo $_SESSION['userId']; ?>;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../php/bookAvailableRoom.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === XMLHttpRequest.DONE){
                        if(xhr.status ===200){
                            alert("Room Booked successfully!");
                            window.location.href = 'index.php';
                        }else {
                            alert("Failed to book room. Please try again later.");
                        }
                    }
                };

                // Sending roomId, checkInDate, checkOutDate, and userId in the request
                var params = "roomId=" + roomId + "&checkInDate=" + checkInDate + "&checkOutDate=" + checkOutDate + "&userId=" + userId;
                xhr.send(params);

            <?php } else {?>
                alert('Please login first!');
                window.history.back();
            <?php }?>
        }
        function closeBookingModal(){
            document.getElementById("confirmBooking-Modal").style.display="none";
        }
    </script>
</html>