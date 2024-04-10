<<<<<<< HEAD
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

        <td><a href="deleteFeature.php?featureName=$name" class='deleteFacilityBtn'><i class="fa-solid fa-trash"></i>Delete</a></td>

        </tr>
        featureTable;
        $i++;
    }
}
=======
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

        <td><a href="deleteFeature.php?featureName=$name" class='deleteFacilityBtn'><i class="fa-solid fa-trash"></i>Delete</a></td>

        </tr>
        featureTable;
        $i++;
    }
}
>>>>>>> origin/main
