<?php
require '../database/databaseConnection.php';

// Check if the array keys exist
if (isset($_POST['roomType'], $_POST['roomDesc'], $_POST['roomPrice'], $_POST['selected_features'], $_POST['selected_facilities'])) {
    // Retrieving data from AJAX request
    $roomType = $_POST['roomType'];
    $roomDesc = $_POST['roomDesc'];
    $status = 'available';
    $roomPrice = $_POST['roomPrice'];
    $features = $_POST['selected_features'];
    $facilities = $_POST['selected_facilities'];

    // Check if $features and $facilities are arrays before imploding
    $featuresString = is_array($features) ? implode(',', $features) : '';
    $facilitiesString = is_array($facilities) ? implode(',', $facilities) : '';

    // Prepare the INSERT statement
    $insert = $conn->prepare("INSERT INTO rooms (roomType, roomDesc, status, roomPrice, roomFeatures, roomFacilities) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind variables to the prepared statement
    $insert->bind_param("ssssss", $roomType, $roomDesc, $status, $roomPrice, $featuresString, $facilitiesString);

    // Execute the statement
    if ($insert->execute()) {
        echo "<script>alert('Room added successfully!')</script>";
        echo "<script>window.location.href='a_roomSetting.php'</script>";
    } else {
        echo "<script>alert('Failed to add room')</script>";
    }

    $insert->close();
} else {
    // Handle case where required data is not received
    echo "<script>alert('Required data is missing')</script>";
    echo "<script>history.back();</script>";
}

// Close the database connection
$conn->close();
