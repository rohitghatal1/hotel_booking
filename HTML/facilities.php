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
    <title>Hotel Website - Facilities</title>
    <link rel="stylesheet" href="../CSS/facilities.css">
    <link rel="stylesheet" href="../css/responsiveFacilitiesPage.css">

    <!-- link for google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- link for font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <span class="HotelName heading-font"><?php echo $hotelName ?></span>

            <!-- hamberger menu (three linn icon) -->
            <div class="hamburgerMenu" onclick="openSidebarNav()">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <ul class="navbar-contents">
                <li class="nav-item">
                    <a class="item-links" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="item-links" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="item-links active" href="facilities.php">Facilities</a>
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

    <!-- login/signup form  -->
    <?php require '../common/sidebarLoginSignup.php'?>

    <div class="facilities-display">
        <div class="facility-container">
            <h1 class="facililty-heading heading-font">Our Facilities</h1>

            <div class="facility-section">
                <!-- to include code to display facilities  -->
                <?php require '../php/displayFacility.php'?>
                </div>

            </div>
        </div>
    </div>

    <!-- to include code for footer from the common folder -->
    <?php require '../common/footer.php'?>

    <!-- to embed common javascript code  -->
    <script src = "../common/commonJS.js"></script>

    <!-- to include code for getting form data and send it to php to store in database  -->
    <script src = "../JS/sendRegisterDataToDb.js"></script>

    <!-- to toggle dropdown for user logout  -->
    <script>
    function toggleDropdown(){
        let dropdown = document.querySelector('.dropdown-content');
        dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
    }

    // script for sidebar navMenu for mobile 
    function openSidebarNav(){
        document.getElementById("mobileNavbar").style.display = "block";
        document.body.classList.add("sidebar-open");
    }

    function closeSidebarNav(){
        document.getElementById("mobileNavbar").style.display = "none";
        document.body.classList.remove("sidebar-open");
    }
    </script>

</body>

</html>