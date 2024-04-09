<!-- inlcuding database connection  -->
<?php require '../database/databaseConnection.php';?>
<?php

// retrieving data form form
$hotelName = $_POST['hotelName'];
$aboutHotel = $_POST['aboutHotel'];

// query for updating table data in database
$update = $conn->prepare("UPDATE general_settings set hotel_name = ?, about_hotel = ?");
$update->bind_param("ss", $hotelName, $aboutHotel);

if ($update->execute()) {
    // javascript to show alert box when data inserteed Successfully and and to redirect to settings page
    echo "<script>alert('Information Updated Successfully');</script>";
    echo "<script>window.location ='a_settings.php';</script>";
} else {
    // history is used to return back to the previous page and re-enter data
    die("<script>alert('Failed to update information'); window.history.back();</script>");
}

$update->close();
$conn->close();
?>
