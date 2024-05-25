<!-- code to start session if admin logged in  -->
<?php require 'common/adminSession.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/adminDashboard.css">
</head>

<body>

    <!-- to retrive required data to display on dashboard -->
    <?php require '../database/databaseConnection.php';
        $getAllRooms = "SELECT count(*) AS totalRooms FROM rooms";
        $noOfRooms = $conn->query($getAllRooms);

        $rooms = $noOfRooms->fetch_assoc();
        $totalRooms = $rooms['totalRooms'];


        $getAvailableRooms = "SELECT count(*) AS availableRooms FROM rooms WHERE status = 'available'";
        $availableRoomsCount = $conn->query($getAvailableRooms);
        $availableRoomsRes = $availableRoomsCount->fetch_assoc();
        $availableRooms = $availableRoomsRes['availableRooms'];

    
        // for user count
        $usersCount = "SELECT count(*) AS totalUsers FROM users";
        $userCountRes = $conn->query($usersCount);
        $users = $userCountRes->fetch_assoc();
        $totalUsers = $users['totalUsers'];

        //for bookings count
        $bookingCount = "SELECT count(*) AS totalBookings FROM bookings";
        $bookingCountRes = $conn->query($bookingCount);
        $bookings = $bookingCountRes->fetch_assoc();
        $totalBookings = $bookings['totalBookings'];
    ?>

    <div class="dashboard-container">

    <!-- code to inclde common admin dashboard part -->
    <?php require 'common/adminSidebarMenu.php'?>

        <div class="dashboard-content">

            <h1 class="heading-font">Admin Dashboard</h1>

            <div class="cards">
                <div class="card">
                    <div class="roomCard">
                        <h3 class="heading-font"><a href="a_roomSetting.php">Rooms</a></h3>
                        <p class="text-font">Total Rooms:</p>
                        <span class="text-font" id="total_rooms"><?php echo $totalRooms?></span>
                        <p class="text-font">Available:</p>
                        <span class="text-font"><?php echo $availableRooms?></span>
                    </div>
                </div>

                <div class="card">
                    <div class="userCard">
                        <h3 class="heading-font"><a href="a_userPage.php">Users</a></h3>
                        <p class="text-font">Current Users:</p>
                        <span class="text-font" id="total_rooms"><?php echo $totalUsers?></span>
                    </div>
                </div>

                <div class="card">
                    <div class="bookingCard">
                        <h3 class="heading-font"><a href="a_booking.php">Bookings</a></h3>
                        <p class="text-font">New Bookings:</p>
                        <span class="text-font" id="total_rooms"><?php echo $totalBookings ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="common/commonAdminJS.js"></script>
</html>
