<?php
require '../database/databaseConnection.php';

// Check if the facilityName parameter is present in the URL
if (isset($_POST['featureName'])) {
    // Retrieve and sanitize the facilityName from the URL
    $featureName = $_POST['featureName'];

    // Prepare the SQL statement to delete the facility
    $delete = $conn->prepare("DELETE FROM features WHERE featureName = ?");

    // Bind the facilityName parameter
    $delete->bind_param("s", $featureName);

    // Execute the SQL statement
    if ($delete->execute()) {
        echo "success";
    } else {
        die("failed");
    }
    header("Location:a_Admin_facilities.php");
} else {
    // Handle case where facilityName parameter is missing
    echo "FacilityName parameter is missing.";
}
