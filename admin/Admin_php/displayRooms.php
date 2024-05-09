<?php
require '../database/databaseConnection.php';

// Fetch data from the rooms table
$getRoomsQuery = "SELECT * FROM rooms";
$result = $conn->query($getRoomsQuery);
if ($result->num_rows > 0) {
    // Output data of each row using heredoc
    while ($row = $result->fetch_assoc()) {
        $roomId = $row['roomId'];
        echo <<<roomDisplay
        <tr>
            <td>{$row['roomNo']}</td>
            <td>{$row['roomType']}</td>
            <td>{$row['roomDesc']}</td>
            <td>{$row['status']}</td>
            <td>{$row['roomPrice']}</td>
            <td>{$row['roomFeatures']}</td> <!-- This will display comma-separated feature names -->
            <td>{$row['roomFacilities']}</td> <!-- This will display comma-separated facility names -->
            <td><button id="addRoomsBtn" class="addRoomsBtn" onclick='openImageModal("$roomId")'><i class="fa-solid fa-plus"></i>Add Photos</button></td>
            <td><button class="deleteRoomBtn" onclick="confirmDelete($roomId)"><i class="fa-solid fa-trash"></i>Delete</button></td>
        </tr>
roomDisplay;
    }
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}

// Close the database connection
$conn->close();
