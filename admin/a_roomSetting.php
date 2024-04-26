<?php require 'common/adminSession.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rooms</title>

    <!-- to inlcude google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/rooms.css">

    <!-- to inlcude font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- to include sidebar menu  -->
<?php require 'common/adminSidebarMenu.php'?>

<main class="roomSettings">
    <section class="addRoomSection">
        <div class="heading-and-addbtn">
        <h2 class="heading-font">Rooms</h2>
        <span class="addRoomBtn text-font" id="addRoombtn" onclick="openRoomModal()"><i class="fa-solid fa-plus"></i>Add</span>
        </div>

        <div class="addRoomModal" id="addRoom-modal">
            <h2 class="heading-font">Add Room</h2>
            <span class="closebtn" id="closeRoomModal" onclick="closeRoomModal()">&times;</span>

            <!-- form to get information about room  -->
                <form action="addRooms.php" method="post">
                    <label for="roomName">Room Type:</label>
                    <select name="roomType" id="roomType">
                        <option value="" selected disabled hidden>Select Room Type</option>
                        <option value="Basic">Basic</option>
                        <option value="Deluxe">Deluxe</option>
                        <option value="Standard">Standard</option>
                        <option value="Luxury">Luxury</option>
                    </select>
                    <label for="desc">Discription:</label>
                    <input type="text" name="roomDesc" id="roomDesc">

                    <label for="features">Features:</label><br>
                    <!-- code to inlcude code to display available features in checboxes -->
                    <?php require 'Admin_php/featuresCheckbox.php'?>

                    <label for="facilities">Facilities:</label><br>
                    <!-- code to include code to display availabale facilities in checboxes  -->
                    <?php require 'Admin_php/facilityCheckbox.php'?>

                    <label for="price">Price:</label>
                    <input type="number" name="roomPrice" id="roomPrice">
                    <input type="submit" class="submitBtn" id="submitBtn" value="Submit">
                </form>
        </div>
        <div class="roomsTable">
            <table border=1>
                <th>SN</th>
                <th>Room Type</th>
                <th>Description</th>
                <th>Status</th>
                <th>Price</th>
                <th>Features</th>
                <th>Facilities</th>
                <th colspan="2">Action</th>

                <!-- to incldue php file to display room information in table form  -->
                <?php require 'Admin_php/displayRooms.php';?>
            </table>
            <table border=1>
                <th rowspan="2">Display Image</th>
                <th colspan="4">Sliding Images</th>
                <th rowspan="2">Detailed Infromation</th>
                <tr>
                    <th>Image-1</th>
                    <th>Image-2</th>
                    <th>Image-3</th>
                    <th>Image-4</th>
                </tr>
                <?php require 'Admin_php/roomsDisTable.php'?>
            </table>
        </div>

        <!-- add image modal  -->
        <div class="addImageModal" id="addImage-modal">
            <h2 class="heading-font">Add Images</h2>
            <span class="closebtn" id="closeImageModal" onclick="closeImageModal()">&times;</span>

            <form action="addRoomPhotos.php" method="post" enctype="multipart/form-data">

            <!-- Hidden input field for room ID -->
            <input type="hidden" id="roomId" name="roomID" value="">

                <label for="Photo">Display Photo:</label>
                <input type="file" accept=".jpg, .png, .jpeg" name ="DisplayImage">

                <div class="testimonial">
                    <h2 class="heading-font">Add Sliding Images</h2>
                    <label for="img1">Photo-1:</label>
                    <input type="file" accept=".jpg, .png, .jpeg" name="img1">

                    <label for="img2">Photo-2:</label>
                    <input type="file" accept=".jpg, .png, .jpeg" name="img2">

                    <label for="img3">Photo-3:</label>
                    <input type="file" accept=".jpg, .png, .jpeg" name="img3">

                    <label for="img1">Photo-4:</label>
                    <input type="file" accept=".jpg, .png, .jpeg" name="img4">
                </div>
                <label for="details">Detailed Info:</label>
                <textarea name="roomDetail" cols="30" rows="10"></textarea>
                <input type="submit" class="submitBtn" value="Submit">
            </form>
        </div>
    </section>
</main>
</body>

<!-- inlcude JS to toggle logout option  -->
<script src="common/commonAdminJS.js"></script>
<script>
    function openRoomModal(){
        document.getElementById("addRoom-modal").style.display="block";
    }
    function closeRoomModal(){
        document.getElementById("addRoom-modal").style.display="none";
    }

    function openImageModal(roomID){
        console.log(roomID);
        document.getElementById("addImage-modal").style.display="block";
        document.getElementById("roomId").value = roomID;
    }
    function closeImageModal(){
        document.getElementById("addImage-modal").style.display="none";
    }

    function confirmDelete(roomId) {
        if (confirm("Are you sure you want to delete this room?")) {
            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure the request
            xhr.open("GET", "deleteRoom.php?roomId=" + roomId, true);

            // Define what happens on successful data submission
            xhr.onload = function() {
                if (xhr.status == 200) {
                    // Redirect or update the page as needed
                    window.location.reload(); // Refresh the page to reflect changes
                } else {
                    // Handle errors or display a message
                    console.error("Error deleting room: " + xhr.statusText);
                }
            };

            // Send the request
            xhr.send();
        }
    }
</script>
<script src="sendRoomData.js"></script>

</html>
