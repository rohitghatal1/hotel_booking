<?php require '../database/databaseConnection.php';?>
<body>
    <!-- code for footer design -->
    <footer>
        <div class="footer-container">
            <div class="about-hotel">
                <h2 class="heading-font"><?php echo $hotelName ?></h2>
                <p class="text-font"><?php echo $aboutHotel ?></p>
            </div>
            <div class="links">
                <h2 class="heading-font">Links</h2>
                <a href="index.php">Home</a>
                <a href="rooms.php">Rooms</a>
                <a href="facilities.php">Facilities</a>
                <a href="contacttUs.php">Contact Us</a>
                <a href="aboutUs.php">About Us</a>
            </div>
            <div class="follow-us-links">
                <h2 class="heading-font">Follow Us</h2>
                <a href="https://www.facebook.com/rohit.rohit.ghatal/"><i class="fab fa-facebook"></i>Facebook</a>
                <a href="#"><i class="fa-brands fa-twitter"></i>Twitter</a>
                <a href="#"><i class="fa-brands fa-instagram"></i>Instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i>LinkedIn</a>
            </div>
        </div>
        <hr>
        <div class="privacy-container">
            <p class="copyright-info text-font">&copy; 2021 RG Hotel | All Rights Reserved.</p>
            <a href="#"><span class="privacy-policy text-font">Privacy Policy</span></a>
            <a href="#"><span class="terms-and-conditions text-font">Terms & Conditions</span></a>
        </div>
    </footer>
</body>