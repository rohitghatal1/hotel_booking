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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RG Hotel-CONTACT</title>
    <link rel="stylesheet" href="../CSS/contactUs.css" />
    <link rel="stylesheet" href = "../css/responsiveContactPage.css">

    <!-- link for google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet" />

    <!-- link for font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
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
                    <a class="item-links active" href="contactUs.php">Contact Us</a>
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

    <!-- contact us container  -->
    <section class="contactUs-section">

        <h1 class="heading-font">Contact Us</h1>
        
        <div class="contactUs-container">
            <section class="address-section">
                <div class="map">
                    <!-- Google Maps -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3490.5007668645203!2d80.17659861281034!3d28.972528475378617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39a1ab87e8629bc5%3A0x6962a1a1789686c5!2sMahendranagar%20Buspark%2F%20Bus%20station!5e0!3m2!1sen!2snp!4v1699530678839!5m2!1sen!2snp"></iframe>
                </div>

                <div class="content-inside-address-section">
                    <h2 class="heading-font">Address</h2>
                    <i class="fas fa-map-marker-alt"></i>
                    <a href="https://maps.app.goo.gl/fvuF7ARjw73eVCGT6" class="text-font"
                        target="_blank">Mahendranagar-05
                        Kanchanpur, Nepal</a>
                </div>

                <div class="content-inside-address-section">
                    <h2 class="heading-font">Call Us</h2>
                    <span>
                        <i class="fa fa-phone"></i>
                        <a href="tel:<?php echo $contact1 ?>" class="text-font"><?php echo $contact1 ?></a><br />
                    </span>
                    <span>
                        <i class="fa fa-phone"></i>
                        <a href="tel:<?php echo $contact2 ?>" class="text-font"><?php echo $contact2 ?></a>
                    </span>
                </div>
                <div class="content-inside-address-section">
                    <h2 class="heading-font">Email</h2>
                    <span>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo $email ?>" class="text-font"><?php echo $email ?></a>
                    </span>
                </div>
                <div class="content-inside-address-section">
                    <h2 class="heading-font">Follow Us</h2>
                    <div class="social-icons">
                        <a href="<?php echo $facebookLink ?>"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo $twitterLink ?>"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo $instagramLink ?>"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </section>

            <!-- code for send message to admin form  -->
            <section class="send-message-section">
                <h2 class="heading-font">Send Message</h2>

                <form method="post" action="https://formspree.io/f/mvoedkbr">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required />

                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required />

                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" required/>

                    <label for="message">Message</label>
                    <textarea name="message" id="message" required></textarea>

                    <button type="submit" class="submitButton">Send</button>
                </form>
            </section>
        </div>
    </section>

    <!-- to include code for footer from the common folder -->
    <?php require '../common/footer.php'?>

    <!-- to embed common javascript code  -->
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