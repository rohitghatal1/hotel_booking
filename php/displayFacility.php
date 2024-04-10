<?php
$getFacility = "SELECT * FROM facilities";
$facilityDisplay = $conn->query($getFacility);
if ($facilityDisplay->num_rows > 0) {
    while ($row = $facilityDisplay->fetch_assoc()) {
        echo "<div class='facility-items'>";
        echo "<div class='border-top'></div>";
        echo "<img src='{$row['pic']}' alt=''>";
        echo "<h4>{$row['facilityName']}</h4>";
        echo "<p>{$row['aboutFacility']}</p>";
        echo "</div>";
    }
}
?>
