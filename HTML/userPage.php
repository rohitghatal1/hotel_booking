<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../CSS/userPage.css">

    <!-- link for google fonts -->
    <link
    href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
    rel="stylesheet">

    <!-- link for font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="heading">
            <?php 
                require '../database/databaseConnection.php';
                $userHeading = "User Page"; // Default heading
                if (isset($_GET['userId'])) {
                    $uid = $_GET['userId'];

                    $getUserData = "SELECT * FROM users WHERE UID = $uid";
                    $userData = $conn->query($getUserData);
                    if ($userData->num_rows > 0) {
                        $user = $userData->fetch_assoc();
                        $userHeading = "User Page - " . $user['firstName'] . " " . $user['lastName'];
                    }
                }
                echo "<h2 class='heading-font'>$userHeading</h2>";
            ?>
        </div>
        <button class="goBackBtn" onclick="window.history.back()">Go Back</button>
    </header>

    <main class="userData-Container">

        <h2 class="heading-font">Booked Rooms</h2>

        <section class="bookedRoomsSection">
        <?php 
            if (isset($uid)) {
                $getBookingData = "SELECT * FROM bookings WHERE userId = $uid";
                $fetechedBookingData = $conn->query($getBookingData);

                if ($fetechedBookingData->num_rows > 0) {
                    while ($row = $fetechedBookingData->fetch_assoc()) {
                        $bookedRoomId = $row['roomId'];

                        $bookedRoomData = "SELECT * FROM rooms WHERE roomId = $bookedRoomId";
                        $fetchedRoomData = $conn->query($bookedRoomData);
                        $row = $fetchedRoomData->fetch_assoc();

                        $features = explode(',', $row['roomFeatures']);
                        $facilities = explode(',', $row['roomFacilities']);

                        echo "<div class='room-card'>";
                        echo "<img src='" . $row['imagePath'] . "'>";
                        echo "<div class='room-details'>";
                        echo "<h3 class='heading-font'>" . $row['roomType'] . "</h3>";
                        echo "<p class='text-font'>" . $row['roomDesc'] . "</p>";
                        echo "<div class='room-features'>";
                        echo "<h4 class='heading-font'>Features:</h4>";
                        echo "<div class='feature'>";
                        foreach ($features as $feature) {
                            echo "<span>$feature</span>";
                        }
                        echo "</div></div>";
                        echo "<div class='room-facilities'>";
                        echo "<h4 class='heading-font'>Facilities:</h4>";
                        echo "<div class='facility'>";
                        foreach ($facilities as $facility) {
                            echo "<span>$facility</span>";
                        }
                        echo "</div></div></div>";
                        echo "<div class='booking'>";
                        echo "<h4 class='heading-font'>Rs " . $row['roomPrice'] . " per day</h4>";
                        echo "<button class='cancelBooking-button' onclick='confirmCancelBooking($bookedRoomId)'><i class='fa-solid fa-xmark'></i>Cancel</button>";
                        echo "</div></div>";
                    }
                } else {
                    echo "no rooms booked yet";
                }
            } else {
                echo "User Not logged in";
            }
        ?>
        </section>
    </main>
</body>

<script>
    function confirmCancelBooking(roomId){
        if(confirm("Are you sure you want to cancel this booking?")){
            cancelBooking(roomId);
        }
    }

    function cancelBooking(roomId) {
        // Sending AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/cancelBooking.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                   location.reload();
                } else {
                    // Handle error response if needed
                    console.error('Error: ' + xhr.status);
                }
            }
        };
        xhr.send("roomId=" + roomId);
    }
</script>
</html>
=======

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../CSS/userPage.css">

     <!-- link for google fonts -->
    <link
    href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
    rel="stylesheet">

    <!-- link for font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="heading">
            <h2 class="heading-font">User Page</h2>
        </div>
    </header>

    <main class="userData-Container">

        <h2 class="heading-font">Booked Rooms</h2>

        <section class="bookedRoomsSection">
        <?php require '../database/databaseConnection.php';
if (isset($_GET['userId'])) {
    $uid = $_GET['userId'];

    $getBookingData = "SELECT * FROM bookings WHERE userId = $uid";
    $fetechedBookingData = $conn->query($getBookingData);

    if ($fetechedBookingData->num_rows > 0) {
        while ($row = $fetechedBookingData->fetch_assoc()) {
            $bookedRoomId = $row['roomId'];

            $bookedRoomData = "SELECT * FROM rooms WHERE roomId = $bookedRoomId";
            $fetchedRoomData = $conn->query($bookedRoomData);
            $row = $fetchedRoomData->fetch_assoc();

            $features = explode(',', $row['roomFeatures']);
            $facilities = explode(',', $row['roomFacilities']);

            echo <<<roomData
                <div class="room-card">
                    <img src="{$row['imagePath']}">
                    <div class="room-details">
                        <h3 class="heading-font">{$row['roomType']}</h3>
                        <p class="text-font">{$row['roomDesc']}</p>
                        <div class="room-features">
                            <h4 class="heading-font">Features:</h4>
                            <div class="feature">
            roomData;
            //output each feature
            foreach ($features as $feature) {
                echo "<span>$feature</span>";
            }
            echo <<<roomData
                            </div>
                        </div>
                        <div class="room-facilities">
                            <h4 class="heading-font">Facilities:</h4>
                            <div class="facility">
            roomData;
            // output each facility
            foreach ($facilities as $facility) {
                echo "<span>$facility</span>";
            }
            echo <<<roomData
                            </div>
                        </div>
                    </div>
                    <div class="booking">
                        <h4 class="heading-font">Rs {$row['roomPrice']} per day</h4>
                        <button class="cancelBooking-button" onclick="confirmCancelBooking('$bookedRoomId')"><i class="fa-solid fa-xmark"></i>Cancel</button>
                    </div>
                </div>
            roomData;
        }
    } else {
        echo "no rooms booked yet";
    }
} else {
    echo "User Not logged in";
}
?>
        </section>
    </main>
</body>

<script>
    function confirmCancelBooking(roomId){
        if(confirm("Are you sure you want to cancel this booking?")){
            cancelBooking(roomId);
        }
    }
    function cancelBooking(roomId){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","cancelBooking.php", true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.onreadystatechange = function(){
            if(xhr.readyState===XMLHttpReques.DONE){
                if(xhr.readyState==200){
                    alert(xhr.responseText);
                }
                else{
                    alert('Error: ' + xhr.status);
                }
            }
        }
    }
</script>
</html>
>>>>>>> origin/main
