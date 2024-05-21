<?php require '../database/databaseConnection.php';
$i = 1;
$getFacilityData = "SELECT * FROM features";
$fetchedData = $conn->query($getFacilityData);
if ($fetchedData->num_rows > 0) {
    while ($row = $fetchedData->fetch_assoc()) {
        $name = $row['featureName'];
        // heredoc method for echo
        echo <<<featureTable
        <tr>
        <td>$i</td>
        <td><img src="{$row['pic']}" alt="Image" style="width: 50px;"></td>
        <td>{$row['featureName']}</td>
        <td>{$row['aboutFeature']}</td>

         <td><button class='deleteFacilityBtn' onclick='deleteFeature("$name")'><i class="fa-solid fa-trash"></i>Delete</button></td>

        </tr>
        featureTable;
        $i++;
    }
}
else {
    echo "<tr>";
    echo "<td colspan='5'> No features added yet!!! </td>";
    echo "</tr>";
}
