<?php
require '../database/databaseConnection.php';

if (isset($_POST['featureName'])) {

    $featureName = $_POST['featureName'];

    $delete = $conn->prepare("DELETE FROM features WHERE featureName = ?");
    $delete->bind_param("s", $featureName);

    if ($delete->execute()) {
        echo "success";
    } else {
        die("failed");
    }
    header("Location:a_Admin_facilities.php");
} else {
    echo "FacilityName parameter is missing.";
}
