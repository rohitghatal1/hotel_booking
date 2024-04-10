<<<<<<< HEAD
<?php require '../database/databaseConnection.php';
$hotelFacility = "SELECT * FROM facilities";
$fetchedfacilites = $conn->query($hotelFacility);
if ($fetchedfacilites->num_rows > 0) {
    while ($row = $fetchedfacilites->fetch_assoc()) {
        echo <<<facilityDisplay
            <div class="hotel-facility">
                <img src="{$row['pic']}">
                <h3 class="heading-font">{$row['facilityName']}</h3>
                <p class="text-font">{$row['aboutFacility']}</p>
            </div>
        facilityDisplay;
    }
}
=======
<?php require '../database/databaseConnection.php';
$hotelFacility = "SELECT * FROM facilities";
$fetchedfacilites = $conn->query($hotelFacility);
if ($fetchedfacilites->num_rows > 0) {
    while ($row = $fetchedfacilites->fetch_assoc()) {
        echo <<<facilityDisplay
            <div class="hotel-facility">
                <img src="{$row['pic']}">
                <h3 class="heading-font">{$row['facilityName']}</h3>
                <p class="text-font">{$row['aboutFacility']}</p>
            </div>
        facilityDisplay;
    }
}
>>>>>>> origin/main
