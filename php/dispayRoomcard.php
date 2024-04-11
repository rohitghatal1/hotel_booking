<?php require '../database/databaseConnection.php';?>

<?php
$bookButton = '';

// code to include search and filter option
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$roomTypeFilter = isset($_GET['room_type']) ? $_GET['room_type'] : '';
$minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : '';

// initial query for selecting rooms with no filter and search
$roomInfo = "SELECT * FROM rooms";

// check if search query is set
if (!empty($searchQuery)) {
    // adding search condition to the query
    $roomInfo .= " WHERE roomType LIKE '%$searchQuery%'";
}

// check if roomType filter is set
if (!empty($roomTypeFilter)) {
    // checking if query already has a WHERE clause
    if (strpos($roomInfo, 'WHERE') !== false) {
        $roomInfo .= " AND roomType='$roomTypeFilter'";
    } else {
        $roomInfo .= " WHERE roomType='$roomTypeFilter'";
    }
}

// adding price range filter to the query
if (!empty($minPrice) && !empty($maxPrice)) {
    // checking if query already has a WHERE clause
    if (strpos($roomInfo, 'WHERE') !== false) {
        $roomInfo .= " AND roomPrice BETWEEN $minPrice AND $maxPrice";
    } else {
        $roomInfo .= " WHERE roomPrice BETWEEN $minPrice AND $maxPrice";
    }
}
$fetchedRoomData = $conn->query($roomInfo);

if ($fetchedRoomData->num_rows > 0) {
    $index = 0;
    while ($row = $fetchedRoomData->fetch_assoc()) {
        // Generate unique IDs for each room card
        $moreDetailsDivID = "moreDetailsDiv_$index";

        // split features and facilities string into an array
        $features = explode(',', $row['roomFeatures']);
        $facilities = explode(',', $row['roomFacilities']);
        $roomId = $row['roomId'];

        $bookButton = "<button class='book-button' onclick='handleBooking($roomId)'>Book Now</button>";
        if ($row['status'] == 'booked') {
            $bookButton = '<h2 style="color: red; font-size: 24px;">Booked</h2>';
        }
        echo <<<roomData
            <div class="room-card-withmoreDetail">
                <div class="room-card">
                    <img src="{$row['imagePath']}">
                    <div class="room-details">
                        <h3 class="heading-font">{$row['roomType']}</h3>
                        <p class="text-font">{$row['roomDesc']}</p>
                        <div class="room-features">
                            <h4 class="heading-font">Features:</h4>
                            <div class="feature">
roomData;
        // Output each feature
        foreach ($features as $feature) {
            echo "<span>$feature</span> ";
        }
        echo <<<roomData
                            </div>
                        </div>
                        <div class="room-facilities">
                            <h4 class="heading-font">Facilities:</h4>
                            <div class="facility">
roomData;
        // Output each facility
        foreach ($facilities as $facility) {
            echo "<span>$facility</span> ";
        }
        echo <<<roomData
                            </div>
                        </div>
                    </div>

                    <div class="booking">
                        <h4 class="heading-font">Rs {$row['roomPrice']} per day</h4>
                        $bookButton
                        <button class="more-details-button" onclick="expandRoomCard('$moreDetailsDivID')">More Details</button>
                    </div>
                </div>
                <div class="moreDetails" id="$moreDetailsDivID">
                    <h3>Photos</h3>
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{$row['photo1']}" class="d-block w-100" alt="photo1">
                            </div>
                            <div class="carousel-item">
                                <img src="{$row['photo2']}" class="d-block w-100" alt="photo2">
                            </div>
                            <div class="carousel-item">
                                <img src="{$row['photo3']}" class="d-block w-100" alt="photo3">
                            </div>
                            <div class="carousel-item">
                                <img src="{$row['photo4']}" class="d-block w-100" alt="photo4">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <h3>Description</h3>
                    <p>{$row['detailedInfo']}</p>
                    <button class="showLessDetailsBtn" id="showLessDetails" onclick="collapseRoomCard('$moreDetailsDivID')">Show Lesss...</button>
                </div>
            </div>
roomData;
        $index++;
    }
}
?>
