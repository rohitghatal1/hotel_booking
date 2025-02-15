<?php
$loginSignupBtn = '<button class="login-signup-button" id="openLoginRegisterForm" onclick="openLoginRegisterForm()">Login/Signup</button>';
session_start();
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    $uid = $_SESSION['userId'];
    $firstLetterAvatar = strtoupper(substr($username, 0, 1));
    $loginSignupBtn = <<<dropdown
            <div class="userDropdown">
                <div class="avatar" onclick="toggleDropdown()">$firstLetterAvatar</div>
                <div class="dropdown-content" id="droppedDownContent">
                    <h3 class="heading-font">$firstLetterAvatar</h3>
                    <p class="text-font">$username</p>
                    <p class="text-font myBooking"><a href="userPage.php?userId={$uid}">My bookings</a></p>
                    <a id = "logout"href="../php/logout.php">Log out</a>
                </div>
            </div>
        dropdown;
}
