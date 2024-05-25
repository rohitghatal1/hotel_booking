<?php require 'common/adminSession.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Users</title>

    <!-- to inlcude google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- to inlcude font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel = "stylesheet" href="css/users.css">
</head>
<body>
    <!-- to inlcude code for sidebar  -->
    <?php require 'common/adminSidebarMenu.php'?>

    <main class="userInfo-container">
        <section class="userInfo">
            <h2 class="heading-font">Current Users</h2>
            <div class="usersTable">
                <table border="1">
                    <th>SN</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th colspan="2">Action</th>
                    <?php require '../database/databaseConnection.php'?>
                    <?php
$userDetail = "SELECT * FROM users";
$fetchedUserData = $conn->query($userDetail);
$count = 1;

if ($fetchedUserData->num_rows > 0) {
    while ($row = $fetchedUserData->fetch_assoc()) {
        $userId = $row['UID'];
        echo <<<userdata
                                    <tr>
                                        <td>$count</td>
                                        <td>{$row['firstName']}</td>
                                        <td>{$row['lastName']}</td>
                                        <td>{$row['gender']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['contact']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['username']}</td>
                                        <td><button id="editUserInfo" class="editUserButton" onclick='openEditUserModal("$userId")'><i class="fa-regular fa-pen-to-square"></i></i></button></td>
                                        <td><button class="deleteUserBtn" onclick="deleteUser($userId)"><i class="fa-solid fa-trash"></i></button></td>
                                    </tr>
                                userdata;
        $count++;
    }
}
?>
                </table>
            </div>

            <div class="editUserModal" id="editUser-Modal">
                <h2 class="heading-font">Edit User Info</h2>
                <span class="closebtn" id="closeEditUserModal" onclick="closeEditUserModal()">&times;</span>

                <form action="updateUserData.php" method="post">

                    <!-- Hidden input field for user ID -->
                    <input type="hidden" id="userId" name="userID" value="">

                    <label for="fname">First Name</label>
                    <input type="text" name="fname">

                    <label for="lname">Last Name</label>
                    <input type="text" name = "lname">

                    <label for="gender">Gender</label>
                    <input type="text" name="gender">

                    <label for="address">Address</label>
                    <input type="text" name = "address">

                    <label for="contact">Contact</label>
                    <input type="text" name="contact">

                    <label for="email">Email</label>
                    <input type="text" name = "email">

                    <label for="username">UserName</label>
                    <input type="text" name="username">

                    <label for="password">Password</label>
                    <input type="password" name = "password">

                    <input type="submit" value = "Confirm" id="submitButton">
                </form>
            </div>
        </section>
    </main>
</body>

<!-- inlcude JS to toggle logout option  -->
<script src="common/commonAdminJS.js"></script>
<script>
    function openEditUserModal(uId){
        document.getElementById("editUser-Modal").style.display = "block";
        document.getElementById("userId").value = uId;
    }

    function closeEditUserModal(){
        document.getElementById("editUser-Modal").style.display = "none";
    }

    function deleteUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
         
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "deleteUser.php?userId=" + userId, true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    window.location.href = "a_userPage.php";
                } else {
                    console.error("Error deleting user: " + xhr.statusText);
                }
            };
            xhr.send();
        }
    }
</script>
</html>