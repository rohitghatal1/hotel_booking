<?php
require '../database/databaseConnection.php';

// Fetch features from the database
$getFeaturesQuery = "SELECT featureName FROM features";
$result = $conn->query($getFeaturesQuery);

if (!$result) {
    die("Error fetching features: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    $featureName = $row['featureName'];
    echo '<input type="checkbox" name="selected_features[]" value="' . $featureName . '">';
    echo $featureName;
    echo '<br>';
}
