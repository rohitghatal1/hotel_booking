   <!-- navbar for mobile  -->
   <div class="navbarforMobile" id="mobileNavbar">
        <div class="navItems">
            <span class="closeNavBar" onclick="closeSidebarNav()">&times;</span>
            <span><a class="item-links" href="index.php">Home</a></span>
            <span><a class="item-links" href="rooms.php">Rooms</a></span>
            <span><a class="item-links" href="facilities.php">Facilities</a></span>
            <span><a class="item-links" href="contactUs.php">Contact Us</a></span>
            <span><a class="item-links" href="aboutUs.php">About Us</a></span>
        </div>

        <!-- to display button when not logged in and avatar when logged in  -->
        <span class="loginSignupBtn-mobile"><?php echo $loginSignupBtn ?></span>
    </div>