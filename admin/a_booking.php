<?php require 'common/adminSession.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Bookings</title>

    <!-- to inlcude google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- to inlcude font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="css/booking.css">

</head>
<body>
    <!-- to inlcude code for sidebar  -->
    <?php require 'common/adminSidebarMenu.php'?>

    <main class="bookingContainer">

    <div class="bookingDetails">
        <h2 class="heading-font">Booking Details</h2>
        <div class="bookingsTable">
            <table border=1>
                <th>SN</th>
                <th>Customer Name</th>
                <th>Customer Number</th>
                <th>Customer Email</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th colspan="2">Action</th>

                <?php require '../database/databaseConnection.php'?>
                <?php
$getBookingData = "SELECT * FROM bookings";
$fetchedBookingData = $conn->query($getBookingData);
$count = 1;
if ($fetchedBookingData->num_rows > 0) {
    while ($row = $fetchedBookingData->fetch_assoc()) {
        echo <<<bookingData
                                <tr>
                                    <td>$count</td>
                                    <td>{$row['customerName']}</td>
                                    <td>{$row['customerNumber']}</td>
                                    <td>{$row['customerEmail']}</td>
                                    <td>{$row['checkInDate']}</td>
                                    <td>{$row['checkOutDate']}</td>
                                    <td><a class="cancelBookingBtn" href="cancelBooking.php">Cancel Booking</a></td>
                                </tr>
                            bookingData;
        $count++;
    }
}
?>
            </table>
        </div>
        </div>
    </main>

    <script src="common/commonAdminJS.js"></script>
</body>
</html>
