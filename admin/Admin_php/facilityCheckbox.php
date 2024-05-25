<?php
// code to get facility name and display in checkboxes
require '../database/databaseConnection.php';

// Fetch features from the database
$getFacilityQuery = "SELECT facilityName FROM facilities";
$result = $conn->query($getFacilityQuery);

if (!$result) {
    die("Error fetching features: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    $facilityName = $row['facilityName'];
    echo '<input type="checkbox" name="selected_facilities[]" value="' . $facilityName . '">';
    echo $facilityName;
    echo '<br>';
}
