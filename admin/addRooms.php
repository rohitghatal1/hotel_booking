<?php
require '../database/databaseConnection.php';

if (isset($_POST['roomType'], $_POST['roomDesc'], $_POST['roomPrice'], $_POST['selected_features'], $_POST['selected_facilities'])) {

    $roomNo = $_POST['roomNo'];
    $roomType = $_POST['roomType'];
    $roomDesc = $_POST['roomDesc'];
    $status = 'available';
    $roomPrice = $_POST['roomPrice'];
    $features = $_POST['selected_features'];
    $facilities = $_POST['selected_facilities'];

    // Check if $features and $facilities are arrays before imploding
    $featuresString = is_array($features) ? implode(',', $features) : '';
    $facilitiesString = is_array($facilities) ? implode(',', $facilities) : '';

    $insert = $conn->prepare("INSERT INTO rooms (roomNo, roomType, roomDesc, status, roomPrice, roomFeatures, roomFacilities) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $insert->bind_param("issssss", $roomNo, $roomType, $roomDesc, $status, $roomPrice, $featuresString, $facilitiesString);

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
