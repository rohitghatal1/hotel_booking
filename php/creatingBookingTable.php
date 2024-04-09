<?php require '../database/databaseConnection.php'?>
<?php
$createTable = "CREATE TABLE bookings(
    bookingId INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    userId INT,
    roomId INT,
    checkInDate DATE,
    checkOutDate DATE,
    bookedDate DATE,
    FOREIGN KEY (userId) REFERENCES users(UID),
    FOREIGN KEY (roomId) REFERENCES rooms(roomId)
)";

if ($conn->query($createTable) === true) {
    echo "table created successfully";
} else {
    echo "table creation failed";
}
