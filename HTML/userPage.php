<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../CSS/userPage.css">

     <!-- link for google fonts -->
    <link
    href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
    rel="stylesheet">

    <!-- link for font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="heading">
            <h2 class="heading-font">User Page</h2>
        </div>
    </header>

    <main class="userData-Container">

        <h2 class="heading-font">Booked Rooms</h2>

        <section class="bookedRoomsSection">
            <div class="room-card">
                <img src="../ourRooms/room4.jpg" alt="Room Image">
                <div class="room-details">
                    <h3 class="heading-font">Deluxe Room</h3>
                    <p class="text-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed condimentum semper augue vel aliquet.</p>
                    <div class="room-features">
                        <h4 class="heading-font">Features:</h4>
                        <div class="feature">
                            <span>Free Wi-Fi</span>
                            <span>Mini Bar</span>
                            <span>Flat Screen TV</span>
                        </div>
                    </div>
                    <div class="room-facilities">
                        <h4 class="heading-font">Facilities:</h4>
                        <div class="facility">
                            <span>Swimming Pool</span>
                            <span>Gym</span>
                            <span>Spa</span>
                        </div>
                    </div>
                </div>
                <div class="booking">
                    <h4 class="heading-font">Rs 2000 per day</h4>
                    <button class="book-button">Book Now</button>
                    <button class="cancelBooking-button" onclick="expandRoomCard('moreDetailsDivID')"><i class="fa-solid fa-xmark"></i>Cancel</button>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
