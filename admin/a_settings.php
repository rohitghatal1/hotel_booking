<!-- code to start session if admin logged in  -->
<?php require 'common/adminSession.php'?>

<?php require '../database/databaseConnection.php'?>
<!-- code to call function and get the general data and contanct detals from database  -->
<?php require '../RetrieveData/fetchData.php';
getGeneralData();
getContactDetails();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Setttings</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="dashboard-container">

        <!-- to include common admin dashboard part(header and sidebar) -->
        <?php require 'common/adminSidebarMenu.php'?>

        <section class="settings-container">
            <div class="general-settings-container">
                <div class="title-and-editbtn">
                    <h2 class ="heading-font">General Settings</h2>
                    <span class ="editBtn" id ="editBtn"><i class="fas fa-edit"></i> Edit</span>
                </div>
                <div class="hotel-information">
                    <h2 for="hotel-name" class="heading-font">Hotel Name:</h2>
                    <!-- to display hotel name stored in database  -->
                    <p class="text-font"><?php echo $hotelName ?></p>

                    <h2 for="hotel-description" class="heading-font">About Hotel</h2>
                    <!-- to display hotel description stored in database  -->
                    <p class="text-font"><?php echo $aboutHotel ?></p>
                </div>

                <div class="edit-settings-contents" id ="editSettingsContainer">
                    <form action="settingsToDB.php" method ="post">
                        <h2 class="heading-font">Change Information</h2>
                        <span class="close-editMenu" id="closeEditMenu">&times;</span>

                        <label for="hotelName">Hotel Name:</label>
                        <input type="text" name = "hotelName">
                        <label for="aboutHotel">About Hotel:</label>
                        <textarea name="aboutHotel" cols="10" rows="3"></textarea>
                        <button type ="submit" class ="confirmBtn">Confirm</button>
                    </form>
                </div>
            </div>

            <div class="contanct-settings">
                <div class="contact-heading-and-editbtn text-font">
                    <h2 class ="heading-font">Contact Settings</h2>
                    <span class ="editBtn" id ="editContactDetails"><i class="fas fa-edit"></i> Edit</span>
                </div>

                <div class="contact-settings-container">
                    <div class="column">
                        <label for="address">Address:</label>
                        <p><?php echo $address ?></p>

                        <label for="phoneNumbers">Phone Numbers:</label>
                        <span>
                        <i class="fa fa-phone"></i>
                        <a href="tel:<?php echo $contact1 ?>" class="text-font"></a><?php echo $contact1 ?><br />
                        </span>

                        <span>
                        <i class="fa fa-phone"></i>
                        <a href="tel:<?php echo $contact2 ?>" class="text-font"></a><?php echo $contact2 ?><br />
                        </span>

                        <label for="Email">Email:</label>
                        <p><?php echo $email ?></p>
                    </div>
                    <div class="column">
                        <label for="social-links">Social Media Links:</label>
                        <span><a href="<?php echo $facbookLink ?>"><i class="fab fa-facebook"></i>Facebook</a></span>
                        <span><a href="<?php echo $instagramLink ?>"><i class="fab fa-instagram"></i>Instagram</a></span>
                        <span><a href="<?php echo $twitterLink ?>"><i class="fab fa-twitter"></i>Twitter</a></span>

                        <label for="iframe">Map:</label>
                        <iframe src="<?php echo $mapLink ?>"></iframe>
                    </div>
                </div>
                <div class="get-contact-details" id="getContactDetails">
                <form action="contactToDB.php" method ="post">
                        <h2 class="heading-font">Change Information</h2>
                        <span class="close-editMenu" id="closeGetContactDetails">&times;</span>

                        <label for="address">Address</label>
                        <input type="text" name = "faddress">
                        <label for="ph1">Phone number-1:</label>
                        <input type="text" name="ph1">
                        <label for="ph2">Phone number-2:</label>
                        <input type="text" name="ph2">
                        <label for="Email">Email:</label>
                        <input type="email" name ="email">
                        <label for="facebook">Facebook-Link:</label>
                        <input type="text" name ="facebookLink">
                        <label for="facebook">Instagram-Link:</label>
                        <input type="text" name ="instagramLink">
                        <label for="facebook">Twitter-Link:</label>
                        <input type="text" name ="twitterLink">
                        <label for="googleMap">Google Map-Link:</label>
                        <input type="text" name="mapLink">
                        <button type ="submit" class ="confirmBtn">Confirm</button>
                    </form>
                </div>
            </div>

             <!-- Add Team member section  -->
            <section class="teamMembers">
                <div class="heading-and-add-button">
                    <h2 class="heading-font">Team Members</h2>
                    <span class="addMembersBtn text-font" id="addMemberbtn"><i class="fa-solid fa-plus"></i>Add Member</span>
                </div>
                <div class="addTeamMember-modal" id="teamMember-modal">
                    <div class="heading-and-close" id="closeAddMember">
                        <h2 class="heading-font">Add Team Member</h2>
                        <span class="close-addMemberModal" id="closeAddMemberModal">&times;</span>
                    </div>
                    <form action="addMember.php" method="post" enctype="multipart/form-data">
                        <label for="name">Name:</label>
                        <input type="text" name="teamMember_name" required>
                        <label for="post">Post:</label>
                        <select name="teamMember_position" id="designationList">
                            <option value="CEO">CEO</option>
                            <option value="Director">Director</option>
                            <option value="Assistant Director">Asstant Director</option>
                            <option value="CTO">CTO</option>
                            <option value="Manager">Manager</option>
                            <option value="Dean">Dean</option>
                            <option value="COO">COO</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Receptionist">Receptionist</option>
                            <option value="Staff">Staff</option>
                        </select>
                        <!-- <label for="Des">Description</label>
                        <textarea name="memeberdes" id="" cols="30" rows="10"></textarea> -->
                        <label for="photo">Picture:</label>
                        <input type="file" name="memberPhoto" accept=".jpg,.jpeg,.png" placeholder="Select a photo"/>
                        <input type="submit" value="Submit" class="submitBtn">
                    </form>
                </div>

                <!-- code to display team members -->

                <div class="our-team-container">
                    <div class="team-member-details">

                    <!-- to display team members  -->
                    <?php require 'Admin_php/displayTeamMember.php'?>
                    </div>
            </div>
            </section>
        </section>
    </div>
</body>

<script src ="settings.js"></script>
<script src="common/commonAdminJS.js"></script>
</html>