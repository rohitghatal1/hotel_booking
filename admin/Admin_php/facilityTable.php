<?php require '../database/databaseConnection.php';
$i = 1;
$getFacilityData = "SELECT * FROM facilities";
$fetchedData = $conn->query($getFacilityData);
if ($fetchedData->num_rows > 0) {
    while ($row = $fetchedData->fetch_assoc()) {
        $name = $row['facilityName'];

        // heredoc method for echo
        echo <<<facilityTable
        <tr>
        <td>$i</td>
        <td><img src="{$row['pic']}" alt="Image" style="width: 100px;"></td>
        <td>{$row['facilityName']}</td>
        <td>{$row['aboutFacility']}</td>
        <td><a href="deleteFacility.php?facilityName=$name" class='deleteFacilityBtn'><i class="fa-solid fa-trash"></i>Delete</a></td>
        </tr>
        facilityTable;
        $i++;
    }
}
