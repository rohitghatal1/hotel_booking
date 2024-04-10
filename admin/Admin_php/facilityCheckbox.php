<<<<<<< HEAD
<?php
// code to get facility name and display in checkboxes
require '../database/databaseConnection.php';

// Fetch features from the database
$getFacilityQuery = "SELECT facilityName FROM facilities";
$result = $conn->query($getFacilityQuery);

if (!$result) {
    die("Error fetching features: " . $conn->error);
}

// Iterate over fetched features and display checkboxes
while ($row = $result->fetch_assoc()) {
    $facilityName = $row['facilityName']; // Use htmlspecialchars to prevent XSS
    echo '<input type="checkbox" name="selected_facilities[]" value="' . $facilityName . '">';
    echo $facilityName;
    echo '<br>';
}
=======
<?php
// code to get facility name and display in checkboxes
require '../database/databaseConnection.php';

// Fetch features from the database
$getFacilityQuery = "SELECT facilityName FROM facilities";
$result = $conn->query($getFacilityQuery);

if (!$result) {
    die("Error fetching features: " . $conn->error);
}

// Iterate over fetched features and display checkboxes
while ($row = $result->fetch_assoc()) {
    $facilityName = $row['facilityName']; // Use htmlspecialchars to prevent XSS
    echo '<input type="checkbox" name="selected_facilities[]" value="' . $facilityName . '">';
    echo $facilityName;
    echo '<br>';
}
>>>>>>> origin/main
