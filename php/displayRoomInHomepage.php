<?php require '../database/databaseConnection.php';
$roomData = "SELECT * FROM rooms WHERE status != 'booked' LIMIT 5";
$fetchedRoomData = $conn->query($roomData);
if ($fetchedRoomData->num_rows > 0) {

    while ($row = $fetchedRoomData->fetch_assoc()) {
        $features = explode(',', $row['roomFeatures']);
        $facilities = explode(',', $row['roomFacilities']);
        $roomId = $row['roomId'];
        echo <<<roomData
                            <div class="room-card">
                            <div class="room_card_img"> <img src="{$row['imagePath']}"></div>
                              
                            <h3 class="heading-font">{$row['roomType']}</h3>
                                <p class="text-font">{$row['roomDesc']}</p>
                                <p class="text-font"><strong>Price:</strong> {$row['roomPrice']}</p>
                             
                                <div class="room-features">
                                    <h4 class="heading-font">Features:</h4>
                                    <div class="feature">
                        roomData;

        // output each feature
        foreach ($features as $feature) {
            echo "<span>$feature</span>";
        }

        echo <<<roomData
                                    </div>
                                </div>
                                <div class="room-facilities">
                                    <h4>Facilities:</h4>
                                    <div class="facility">
                        roomData;

        // output each facility
        foreach ($facilities as $facility) {
            echo "<span>$facility</span>";
        }
        echo <<<roomData
                                    </div>
                                </div>
                                <button class="book-button" onclick="handleBooking($roomId)">Book Now</button>
                            </div>
                        roomData;
    }
}
