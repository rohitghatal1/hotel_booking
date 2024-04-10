<!-- code for common admin dashboard menu  -->
<div class="heading">
            <h2 class="heading-font">SR Hotel</h2>
            <div class="dropdowntogler" id = "dropdown" onclick="openDropDown()">
                <!-- to display avatar  -->
                <div class="avatar text-font"><?php echo $firstLetter; ?></div>
            </div>

            <div class="dropdown-items" id ="droppedDown-items">
                <span class="close-btn" id="close-dropdown" onclick="closeDropDown()">&times;</span>

                <!-- to show the first letter of username as an avatar  -->
                <h3 class="text-font"><?php echo $firstLetter; ?></h3>

                <p class="text-font"><?php echo strtoupper($loggedInUsername); ?></p>
                <a class="text-font" href="logout.php">LogOut</a>
            </div>
        </div>

        <aside class="sidebar">
            <h2 class = "heading-font">Admin Panel</h2>
            <div class="sidebar_menu">
                <ul class = "menu-items">
                    <li><a href="a_adminDashboard.php" class = "menu-links">Dashboard</a></li>
                    <li><a href="a_roomSetting.php" class = "menu-links">Rooms</a></li>
                    <li><a href="a_booking.php" class = "menu-links">Bookings</a></li>
                    <li><a href="a_Admin_facilities.php" class = "menu-links">Facilities</a></li>
                    <li><a href="a_userPage.php" class = "menu-links">Users</a></li>
                    <li><a href="a_settings.php" class = "menu-links">Settings</a></li>
                </ul>
            </div>
        </aside>