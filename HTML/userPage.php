
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
