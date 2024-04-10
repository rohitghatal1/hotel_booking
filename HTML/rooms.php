<<<<<<< HEAD
<!-- php script for retrieving data from generral settings  -->
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
    <title>Hotel Website-ROOMS
    </title>
    <link rel="stylesheet" href="../CSS/rooms.css">

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
    <!-- code for creating navigation bar -->
    <nav class="navigationbar">
        <div class="navigationbar-container">
            <span class="HotelName heading-font"><?php echo $hotelName ?></span>
            <ul class="navigationbar-contents">
                <li class="nav-item">
                    <a class="item-links " href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="item-links active" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="item-links" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="item-links" href="contactUs.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="item-links" href="aboutUs.php">About</a>
                </li>
            </ul>

            <!-- to display button when not logged in and avatar when logged in  -->
            <?php echo $loginSignupBtn ?>
        </div>
    </nav>

    <!-- login/signup form  -->
    <?php require '../common/sidebarLoginSignup.php'?>

    <div class="rooms-section">
        <h1 class="heading-font">Our Rooms</h1>
        <div class="rooms-container">
            <div class="filter">
                <span class=" filter-button text-font" id="toggle-filter"><i class="fas fa-filter"></i> Filter</span>
            </div>

            <!-- code to include room card dynamically  -->
            <?php require '../php/dispayRoomcard.php'?>
        </div>
    </div>

    <div class="filter-container" id="filter-container">
        <form class="filter-options">
            <h2 class="heading-font">Filter Rooms</h2>
            <span class="close-filter" id="close-filterbtn">&times;</span>
            <label for="room-type">Room Type:</label>
            <select name="room_type" id="room-type">
                <option value="Luxury">Luxury Room</option>
                <option value="delux">Delux Room</option>
                <option value="standard">Standard Room</option>
                <option value="basic">Basic Room</option>
            </select>

            <div class="priceRange">
                <h3 class="heading-font">Price Range:</h3>
                <label for="min-price">Min-Price:</label>
                <input type="number" name="minprice" id="min-price">

                <label for="max-price">Max-Price:</label>
                <input type="number" name="maxprice" id="max-price">
            </div>

            <button onclick="applyFilters()" class="btn-inside-filter-option">Filter</button>

        </form>
    </div>

    <div class="confirmBookingModal" id="confirmBooking-Modal">
        <span class="closeBookingModal" onclick="closeBookingModal()">&times;</span>
        <div class="modalContent">
            <h3 class="heading-font">Confirm Booking</h3>
            <form action="../php/confirmBooking.php" method="post">

                <input type="hidden" name="roomId" id="room-Id" value="">
                <input type="hidden" name="userId" id="user-Id" value="">
                <input type="hidden" name="bookingDate" id="booking-Date" value="">

                <label for="checkin">Check-in Date:</label>
                <input type="date" name="checkInDate" required>

                <label for="checkout">Check-out Date:</label>
                <input type="date" name ="checkOutDate" required>

                <p class="text-font" style="color:red;">Provide check-in and check-out date</p>
                <button type="submit" class="confirmBtn">Confirm </button>
            </form>
        </div>
    </div>

    <!-- to include code for footer from the common folder -->
    <?php require '../common/footer.php'?>

    <!-- to include bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- to embed common javascript code  -->
    <script src = "../common/commonJS.js"></script>

    <!-- to inlcude code to validate form  -->
    <script src="../JS/formValidation.js"></script>

    <!-- to include code for getting form data and send it to php to store in database  -->
    <script src = "../JS/sendRegisterDataToDb.js"></script>

    <script>
        // code for filter option
        var filtertoggler = document.getElementById("toggle-filter");
        var filterOptions = document.getElementById("filter-container");
        filtertoggler.addEventListener("click", function () {
            filterOptions.style.display = "block";
            filterOptions.style.width = "350px";
        })

        document.getElementById("close-filterbtn").addEventListener("click", function () {
            document.getElementById("filter-container").style.width = "0";
        })

        // script to expand room card
        function expandRoomCard(id) {
            document.getElementById(id).style.display = "block";
        }

        // script to collapse room card
        function collapseRoomCard(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>

    <!-- to toggle dropdown for user logout  -->
    <script>
    function toggleDropdown(){
        let dropdown = document.querySelector('.dropdown-content');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }
    </script>

    <!-- script for opening and closeBookingModal on window -->
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
                document.getElementById("loginRegisterForm").style.display = "block";
                document.getElementById("loginRegisterForm").style.width = "350px";
            <?php }?>
        }
        function closeBookingModal(){
            document.getElementById("confirmBooking-Modal").style.display="none";
        }

        function applyFilters(){
            let roomTypeFilter = document.getElementById("room-type").value;
            let minPrice = document.getElementById("min-price").value;
            let maxPrice = document.getElementById("max-price").value;

            window.location.href = 'rooms.php?room_type=' + roomTypeFilter + '&min_price=' + minPrice + '&max_price=' + maxPrice;
        }

    </script>
=======
<!-- php script for retrieving data from generral settings  -->
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
    <title>Hotel Website-ROOMS
    </title>
    <link rel="stylesheet" href="../CSS/rooms.css">

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
    <!-- code for creating navigation bar -->
    <nav class="navigationbar">
        <div class="navigationbar-container">
            <span class="HotelName heading-font"><?php echo $hotelName ?></span>
            <ul class="navigationbar-contents">
                <li class="nav-item">
                    <a class="item-links " href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="item-links active" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="item-links" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="item-links" href="contactUs.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="item-links" href="aboutUs.php">About</a>
                </li>
            </ul>

            <!-- to display button when not logged in and avatar when logged in  -->
            <?php echo $loginSignupBtn ?>
        </div>
    </nav>

    <!-- login/signup form  -->
    <?php require '../common/sidebarLoginSignup.php'?>

    <div class="rooms-section">
        <h1 class="heading-font">Our Rooms</h1>
        <div class="rooms-container">
            <div class="filter">
                <span class=" filter-button text-font" id="toggle-filter"><i class="fas fa-filter"></i> Filter</span>
            </div>

            <!-- code to include room card dynamically  -->
            <?php require '../php/dispayRoomcard.php'?>
        </div>
    </div>

    <div class="filter-container" id="filter-container">
        <form class="filter-options">
            <h2 class="heading-font">Filter Rooms</h2>
            <span class="close-filter" id="close-filterbtn">&times;</span>
            <label for="room-type">Room Type:</label>
            <select name="room_type" id="room-type">
                <option value="Luxury">Luxury Room</option>
                <option value="delux">Delux Room</option>
                <option value="standard">Standard Room</option>
                <option value="basic">Basic Room</option>
            </select>

            <div class="priceRange">
                <h3 class="heading-font">Price Range:</h3>
                <label for="min-price">Min-Price:</label>
                <input type="number" name="minprice" id="min-price">

                <label for="max-price">Max-Price:</label>
                <input type="number" name="maxprice" id="max-price">
            </div>

            <button onclick="applyFilters()" class="btn-inside-filter-option">Filter</button>

        </form>
    </div>

    <div class="confirmBookingModal" id="confirmBooking-Modal">
        <span class="closeBookingModal" onclick="closeBookingModal()">&times;</span>
        <div class="modalContent">
            <h3 class="heading-font">Confirm Booking</h3>
            <form action="../php/confirmBooking.php" method="post">

                <input type="hidden" name="roomId" id="room-Id" value="">
                <input type="hidden" name="userId" id="user-Id" value="">
                <input type="hidden" name="bookingDate" id="booking-Date" value="">

                <label for="checkin">Check-in Date:</label>
                <input type="date" name="checkInDate" required>

                <label for="checkout">Check-out Date:</label>
                <input type="date" name ="checkOutDate" required>

                <p class="text-font" style="color:red;">Provide check-in and check-out date</p>
                <button type="submit" class="confirmBtn">Confirm </button>
            </form>
        </div>
    </div>

    <!-- to include code for footer from the common folder -->
    <?php require '../common/footer.php'?>

    <!-- to include bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- to embed common javascript code  -->
    <script src = "../common/commonJS.js"></script>

    <!-- to inlcude code to validate form  -->
    <script src="../JS/formValidation.js"></script>

    <!-- to include code for getting form data and send it to php to store in database  -->
    <script src = "../JS/sendRegisterDataToDb.js"></script>

    <script>
        // code for filter option
        var filtertoggler = document.getElementById("toggle-filter");
        var filterOptions = document.getElementById("filter-container");
        filtertoggler.addEventListener("click", function () {
            filterOptions.style.display = "block";
            filterOptions.style.width = "350px";
        })

        document.getElementById("close-filterbtn").addEventListener("click", function () {
            document.getElementById("filter-container").style.width = "0";
        })

        // script to expand room card
        function expandRoomCard(id) {
            document.getElementById(id).style.display = "block";
        }

        // script to collapse room card
        function collapseRoomCard(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>

    <!-- to toggle dropdown for user logout  -->
    <script>
    function toggleDropdown(){
        let dropdown = document.querySelector('.dropdown-content');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }
    </script>

    <!-- script for opening and closeBookingModal on window -->
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
                document.getElementById("loginRegisterForm").style.display = "block";
                document.getElementById("loginRegisterForm").style.width = "350px";
            <?php }?>
        }
        function closeBookingModal(){
            document.getElementById("confirmBooking-Modal").style.display="none";
        }

        function applyFilters(){
            let roomTypeFilter = document.getElementById("room-type").value;
            let minPrice = document.getElementById("min-price").value;
            let maxPrice = document.getElementById("max-price").value;

            window.location.href = 'rooms.php?room_type=' + roomTypeFilter + '&min_price=' + minPrice + '&max_price=' + maxPrice;
        }

    </script>
>>>>>>> origin/main
</body>