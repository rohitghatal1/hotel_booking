<?php
require '../database/databaseConnection.php';

// Fetch data from the rooms table
$getRoomsQuery = "SELECT * FROM rooms";
$result = $conn->query($getRoomsQuery);
if ($result->num_rows > 0) {
    // Output data of each row using heredoc
    while ($row = $result->fetch_assoc()) {
        echo <<<roomDisplay
        <tr>
            <td><img src={$row['imagePath']} height="80px"/></td>
            <td><img src={$row['photo1']} height="50px"/></td>
            <td><img src={$row['photo2']} height="50px"/></td>
            <td><img src={$row['photo3']} height="50px"/></td>
            <td><img src={$row['photo4']} height="50px"/></td>
            <td>{$row['detailedInfo']}</td>
        </tr>
roomDisplay;
    }
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}

// Close the database connection
$conn->close();
