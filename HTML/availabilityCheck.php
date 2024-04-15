<link rel = "stylesheet" href="../CSS/checkBookingPage.css">
<link rel = "stylesheet" href="../CSS/responsivecheckBooking.css">

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

// Query to fetch all rooms of the specified type
$getRoomsQuery = "SELECT * FROM rooms WHERE roomType = '$roomType'";
$getRoomsResult = $conn->query($getRoomsQuery);
$roomAvilable = false; //to check if room is available or not

if ($getRoomsResult->num_rows > 0) {
    while ($room = $getRoomsResult->fetch_assoc()) {
        $roomId = $room['roomId'];

        // Check if the room is already booked for the provided dates
        $checkBookingQuery = "SELECT * FROM bookings WHERE roomId = $roomId AND ('$checkIn' >= checkOutDate OR '$checkOut' <= checkInDate)";
        $checkBookingResult = $conn->query($checkBookingQuery);

        if ($checkBookingResult->num_rows > 0) {
            // Room is available for booking because there are no conflicting bookings
            $features = explode(',', $room['roomFeatures']);
            $facilities = explode(',', $room['roomFacilities']);
            $roomId = $room['roomId'];

            $roomAvilable = true; //setting true if room available
?>
        <!-- code to display room card  -->
            <div class="room-card">
                <img src="<?php echo $room['imagePath']; ?>">
                <h3 class="heading-font"><?php echo $room['roomType']; ?></h3>
                <p class="text-font"><?php echo $room['roomDesc']; ?></p>
                <p class="text-font"><strong>Price:</strong> <?php echo $room['roomPrice']; ?></p>
                <div class="room-features">
                    <h4 class="heading-font">Features:</h4>
                    <div class="feature">
                        <?php
                        // output each feature
                        foreach ($features as $feature) {
                            echo "<span>$feature</span>";
                        }
                        ?>
                    </div>
                </div>
                <div class="room-facilities">
                    <h4>Facilities:</h4>
                    <div class="facility">
                        <?php
                        // output each facility
                        foreach ($facilities as $facility) {
                            echo "<span>$facility</span>";
                        }
                        ?>
                    </div>
                </div>

                <!-- to set room id to a hidded filed for booking process  -->
                <input type="hidden" class="room-id" id="roomId" value="<?php echo $roomId; ?>">
                <button class="book-button" onclick="handleBooking()">Book Now</button>
            </div>
<?php
        }
    }
    if(!$roomAvilable){
        echo "<script>alert('No rooms available for this time period. Please Select different date!!!')</script>";
        echo "<script>window.history.back()</script>";
    }
} else {
    // No rooms found for the selected room type
    echo "<script>alert('No rooms available for the selected room type.')</script>";
}
?>

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