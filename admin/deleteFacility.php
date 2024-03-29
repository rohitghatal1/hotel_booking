<?php
require '../database/databaseConnection.php';

// Check if the facilityName parameter is present in the URL
if (isset($_GET['facilityName'])) {
    // Retrieve and sanitize the facilityName from the URL
    $facilityName = $_GET['facilityName'];

    // Prepare the SQL statement to delete the facility
    $delete = $conn->prepare("DELETE FROM facilities WHERE facilityName = ?");

    // Bind the facilityName parameter
    $delete->bind_param("s", $facilityName);

    // Execute the SQL statement
    if ($delete->execute()) {
        echo "success";
    } else {
        die("failed");
    }
    header("Location:Admin_facilities.php");
} else {
    // Handle case where facilityName parameter is missing
    echo "FacilityName parameter is missing.";
}
