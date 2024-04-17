<?php
$getFacility = "SELECT * FROM facilities";
$facilityDisplay = $conn->query($getFacility);
if ($facilityDisplay->num_rows > 0) {
    while ($row = $facilityDisplay->fetch_assoc()) {
        echo "<div class='facility-items'>";
        echo "<div class='facilityImage'><img src='{$row['pic']}' alt=''></div>";
        echo "<h4>{$row['facilityName']}</h4>";
        echo "<p>{$row['aboutFacility']}</p>";
        echo "</div>";
    }
}
?>
