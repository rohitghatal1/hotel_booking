<?php
require '../database/databaseConnection.php';

// Fetch data from the rooms table
$getRoomsQuery = "SELECT * FROM rooms";
$result = $conn->query($getRoomsQuery);
$n = 1;
if ($result->num_rows > 0) {
    // Output data of each row using heredoc
    while ($row = $result->fetch_assoc()) {
        $roomId = $row['roomId'];
        echo <<<roomDisplay
        <tr>
            <td>$n</td>
            <td>{$row['roomType']}</td>
            <td>{$row['roomDesc']}</td>
            <td>{$row['status']}</td>
            <td>{$row['roomPrice']}</td>
            <td>{$row['roomFeatures']}</td> <!-- This will display comma-separated feature names -->
            <td>{$row['roomFacilities']}</td> <!-- This will display comma-separated facility names -->
            <td><button id="addRoomsBtn" class="addRoomsBtn" onclick='openImageModal("$roomId")'><i class="fa-solid fa-plus"></i>Add Photos</button></td>
            <td><a href="deleteRoom.php?roomId=$roomId" id="deleteRoomBtn" class="deleteRoomBtn"><i class="fa-solid fa-trash"></i>Delete</a></td>
        </tr>
roomDisplay;
        $n++;
    }
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}

// Close the database connection
$conn->close();
