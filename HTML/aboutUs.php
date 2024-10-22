<?php require '../database/databaseConnection.php'?>
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
    <title>Hotel Website-About us
    </title>
    <link rel="stylesheet" href="../CSS/aboutUs.css">
    <link rel="stylesheet" href="../CSS/responsiveAboutPage.css">

    <!-- link for google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- link for font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

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
                    <a class="item-links" href="index.php">Home</a>
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
                    <a class="item-links active" href="aboutUs.php">About</a>
                </li>
            </ul>

            <!-- to display button when not logged in and avatar when logged in  -->
            <span class="loginSignupBtn-desktop"><?php echo $loginSignupBtn ?></span>
        </div>
    </nav>

    <!-- to include code for mobile navbar  -->
    <?php require '../common/mobileNavbar.php'?>

    <?php require '../common/sidebarLoginSignup.php'?>

    <!-- about us section starts form here  -->
    <div class="about-us-section">
        <div class="about-us-container">
            <h2 class="heading-font">About Us</h2>
            <fieldset>
                <legend class="text-font"><b>Owners</b></legend>
                <div class="founders-detail">
                    <div class="founder-info">
                        <div class="founder-description">
                            <h3 class="founder-name heading-font">Rohit Ghatal</h3>
                        </div>
                        <img src="../team/rohit.jpg">
                    </div>
                    <div class="founder-info">
                        <div class="founder-description">
                            <h3 class="founder-name heading-font">Ilu Dangol</h3>
                        </div>
                        <img src="../team/ilu.jpg">
                    </div>
                </div>
            </fieldset>

            <div class="our-team-container">
                <h2 class="heading-font">Our Team</h2>
                <fieldset>
                    <legend class="text-font"><b>Team Members</b></legend>
                    <div class="team-member-details">

                    <!-- to include code for displaying tea member details  -->
                    <?php require '../php/ourTeamDisplay.php'?>

                    </div>
                </fieldset>
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