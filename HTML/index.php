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
    <title>Hotel Website</title>
</head>
<link rel="stylesheet" href="../CSS/style.css">
<link rel = "stylesheet" href ="../CSS/responsiveHomePage.css">
<link
    href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<body>
    <!-- code for creating navigation bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <span class="HotelName heading-font"><?php echo $hotelName ?></span>
            
            <!-- to add three line icon  -->
            <div class="hamburgerMenu" onclick="openSidebarNav()">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <ul class="navbar-contents">
                <li class="nav-item">
                    <a class="item-links active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="item-links" href="rooms.php">Rooms</a>
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
            <span class="loginSignupBtn-desktop"><?php echo $loginSignupBtn ?></span>
        </div>
    </nav>

    <!-- to include code for mobile navbar  -->
    <?php require '../common/mobileNavbar.php'?>

    <!-- sidebar for login and signup  -->
    <?php require '../common/sidebarLoginSignup.php'?>

    <!-- image slider section  -->
    <div class="slider-container">
        <div class="slider">
            <div class="slide"><img src="../rooms/room1.jpg" alt="room1"></div>
            <div class="slide"><img src="../rooms/room2.jpg" alt="room2"></div>
            <div class="slide"><img src="../rooms/room3.jpg" alt="room3"></div>
        </div>
        <button class="prev-button"><i class="fa-solid fa-angle-left"></i></button>
        <button class="next-button"><i class="fa-solid fa-angle-right"></i></button>
    </div>

    <!-- booking availability check form  -->
    <div class="availability-check">
        <h2 class="availability-title">Check Booking Availability</h2>
        <form action ="availabilityCheck.php" method="post" id="availability-form" class="booking-form">

            <div class="form-row">
                <label for="check-in-date">Check-In Date:</label>
                <input type="date" id="check-in-date" name="check-in-date" required>
            </div>

            <div class="form-row">
                <label for="check-out-date">Check-Out Date:</label>
                <input type="date" id="check-out-date" name="check-out-date" required>
            </div>

            <div class="form-row">
                <label for="roomType">Room Type</label>
                <select id="roomType" name="roomType" required>
                    <option value="Basic">Baisc</option>
                    <option value="Standard">Standard</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Luxury">Luxury</option>
                </select>
            </div>

            <div class="form-row">
                <label for="persons">Number of Persons:</label>
                <select id="persons" name="personsCount" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class="form-row">
            <?php
            if (isset($_GET['error'])) {
                echo '<div style="color:red"; >' . $_GET['error'] . '</div>';
            } 
            ?>
                <button type="submit" class="check-availability-btn">Check Availability</button>
            </div>
        </form>
    </div>

    <!-- code for room cards  -->
    <div class="roomCards-and-link">
        <h2 class="our-rooms-heading heading-font">Our Rooms</h2>
        <div class="room-card-container">

            <!-- to inlcude code for displaying room card  -->
        <?php require '../php/displayRoomInHomepage.php'?>

        </div>
        <span class="show-more-link"><a href="rooms.php">More Rooms</a></span>
    </div>

    <!-- confirm bookng section  -->
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

    <!-- code for dispaying facilities -->
    <div class="facilities-section">
        <h2 class="facility-heading heading-font">Our Facilities</h2>
        <div class="facilities">

        <!-- to include code to display facility card form availabe facilites  -->
        <?php require '../php/displayFacilityInHome.php'?>
        </div>
        <span class="show-more-link"><a href="facilities.php">More Facilities</a></span>
    </div>

    <!-- code for displaying map and contact info  -->
    <div class="reach-us-section">

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3490.5007668645203!2d80.17659861281034!3d28.972528475378617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a1ab87e8629bc5%3A0x6962a1a1789686c5!2sMahendranagar%20Buspark%2F%20Bus%20station!5e0!3m2!1sen!2snp!4v1699530678839!5m2!1sen!2snp"></iframe>
        </div>
        <div class="contact-container">
            <div class="call-option">
                <h2 class="heading-font">Call Us</h2>
                <a href="tel:<?php echo $contact1 ?>"><i class="fa fa-phone"></i><?php echo $contact1 ?></a><br><br>
                <a href="tel:<?php echo $contact2 ?>"><i class="fa fa-phone"></i><?php echo $contact2 ?></a>
            </div>

            <div class="follow-us-section">
                <h2 class="heading-font">Follow Us</h2>
                <span class="social-icons">
                    <a href="<?php echo $facebookLink ?>" class="icon-link">
                        <i class="fab fa-facebook"></i>
                        Facebook
                    </a>
                </span>
                <span class="social-icons">
                    <a href="<?php echo $twitterLink ?>" class="icon-link">
                        <i class="fab fa-twitter"></i>
                        Twitter
                    </a>
                </span>
                <span class="social-icons">
                    <a href="<?php echo $instagramLink ?>" class="icon-link text-font">
                        <i class="fab fa-instagram"></i>
                        Instagram
                    </a>
                </span>
            </div>
        </div>
    </div>

    <!-- to include code for footer from the common folder -->
    <?php require '../common/footer.php'?>

    <!-- to embed common javascript code  -->
    <script src="../JS/script.js"></script>
    <script src = "../common/commonJS.js"></script>

    <!-- to inlcude code to validate form  -->
    <script src="../JS/formValidation.js"></script>

    <!-- to include code for getting form data and send it to php to store in database  -->
    <script src = "../JS/sendRegisterDataToDb.js"></script>

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

    </script>
</body>


</html>