
<?php include '../RetrieveData/fetchData.php';
getGeneralData();
getContactDetails(); //function call to retrieve data from the databases
?>

<!-- to inlcude code for user session  -->
<?php require '../php/userSession.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website-ROOMS</title>
    <link rel="stylesheet" href="../CSS/filteredRooms.css">
    <!-- <link rel="stylesheet" href="../CSS/responsiveRoomsPage.css"> -->

    <!-- link for google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- link for font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- css link for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="headingAndremoveFilterBtn"> 
        <h2 class="filteredRoomHeading heading-font">Filtered Rooms</h2>
        <button class="removeFiltersbtn" onclick="window.location.href='rooms.php'">Remove Filters</button>
    </div>
    
    <div class="rooms-section">
        <h1 class="heading-font">Our Rooms</h1>
        <div class="rooms-container">
            </div>

<!-- code to include room card dynamically  -->
<?php require '../database/databaseConnection.php';?>

<?php
$bookButton = '';

// Get filter data
$roomType = $_POST['room_type'];
$minPrice = $_POST['minprice'];
$maxPrice = $_POST['maxprice'];

// Initial query for selecting rooms with no filter and search
$roomInfo = "SELECT * FROM rooms WHERE roomType='$roomType' AND roomPrice BETWEEN $minPrice AND $maxPrice";


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
                   <div class="room_card_img"> <img src="{$row['imagePath']}">
                </div>
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
else{
    echo"<div class='noRoomsError'>No rooms available with this category!!!</div>";
}
?>
        </div>
    </div>

    <!-- code for confirmBookingModal  -->
    <div class="confirmBookingModal" id="confirmBooking-Modal">
        <span class="closeBookingModal" onclick="closeBookingModal()">&times;</span>
        <div class="modalContent">
            <h3 class="heading-font">Confirm Booking</h3>
            <form action="../php/confirmBooking.php" method="post" onsubmit="return validateForm()">

                <input type="hidden" name="roomId" id="room-Id" value="">
                <input type="hidden" name="userId" id="user-Id" value="">
                <input type="hidden" name="bookingDate" id="booking-Date" value="">

                <label for="checkin">Check-in Date:</label>
                <input type="date" id="checkInDate" name="checkInDate" required onchange="validateCheckIn()">
                <p id="checkInError" class="text-font" style="color:red;"></p>


                <label for="checkout">Check-out Date:</label>
                <input type="date" id="checkOutDate" name ="checkOutDate" required onchange="validateCheckOut()">
                <p id="checkOutError" class="text-font" style="color:red;"></p>

                <button type="submit" class="confirmBtn">Confirm </button>
            </form>
        </div>
    </div>

    <!-- to include code for footer from the common folder -->
    <?php require '../common/footer.php'?>

    <!-- to include bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src = ../JS/rooms.js></script>
    
</body>

<script>
        function handleBooking(roomID) {
            <?php if (isset($_SESSION['user'])) {?>
                try {
                    document.getElementById("confirmBooking-Modal").style.display = "block";
                    let userId = <?php echo $_SESSION['userId']; ?>;
                    if (!userId) {
                        throw new Error('User ID not found in session.');
                    }
                    let currentDate = new Date().toISOString().slice(0, 10);
                    document.getElementById("room-Id").value = roomID;
                    document.getElementById("user-Id").value = userId;
                    document.getElementById("booking-Date").value = currentDate;
                } catch (error) {
                    console.error('Error handling booking:', error.message);
                    alert('An error occurred while processing your booking. Please try again later.');
                }
            <?php } else {?>
                alert('Please login first!');
                window.location.href = 'rooms.php';
            <?php }?>
        }
        function closeBookingModal(){
            document.getElementById("confirmBooking-Modal").style.display="none";
        }
    </script>