<!-- code to start session if admin logged in  -->
<?php require 'common/adminSession.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Facilities</title>
    <!-- to inlcude google fonts  -->
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- to link css  -->
    <link rel = "stylesheet" href="css/Admin_facilities.css">
    <!-- to inlcude font awesome icons  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
        <?php require 'common/adminSidebarMenu.php';?>
    <main class="facilities-container">
        <section class="facilitySection">
            <div class="heading-and-add-button">
                <h2 class="heading-font">Facilites</h2>
                <span class="addFacilityBtn text-font" id="addfacilitybtn"><i class="fa-solid fa-plus"></i>Add Facility</span>
            </div>

            <div class="addFacilityModal" id="facilityModal">
                <h2 class="heading-font">Add a new facility</h2>
                <span class="closebtn" id="closeFacilityModal">&times;</span>

                <form action="addFacility.php" method="post" enctype="multipart/form-data">
                    <label for="picture">Picture</label>
                    <input type="file" name="facilityImage" accept=".jpg, .png, .jpeg" required>
                    <label for="facilityName">Facility Name:</label>
                    <input type="text" id="facilityName" name="facilityname" required>
                    <label for="description">Description:</label>
                    <textarea name="aboutFacility" cols="20" rows="5"></textarea>
                    <input type="submit" value="Submit" class="submitBtn">
                </form>
            </div>

            <h2 class="heading-font tableheading">Current Facilities</h2>
            <table border =1>
                <th>S.No.</th>
                <th>Image</th>
                <th>Facility Name</th>
                <th>Description</th>
                <th>Action</th>
            <!-- code to  display facility data in table form  -->
            <?php require 'Admin_php/facilityTable.php'?>
            </table>
        </section>

        <section class="featuresSection">
            <div class="heading-and-add-button">
                <h2 class="heading-font">Features</h2>
                <span class="addFeatureBtn text-font" id="addfeaturebtn"><i class="fa-solid fa-plus"></i>Add Feature</span>
            </div>

            <div class="addFeatureModal" id="featureModal">
                <h2 class="heading-font">Add a new feature</h2>
                <span class="closebtn" id="closeFeatureModal">&times;</span>

                <form action="addFeature.php" method="post" enctype="multipart/form-data">
                    <label for="picture">Picture</label>
                    <input type="file" name="featureImage" accept=".jpg, .png, .jpeg" required>
                    <label for="featureName">Feature Name:</label>
                    <input type="text" id="featureName" name="featurename" required>
                    <label for="description">Description:</label>
                    <textarea name="aboutFeature" cols="20" rows="5"></textarea>
                    <input type="submit" value="Submit" class="submitBtn">
                </form>
            </div>

            <h2 class="heading-font tableheading">Current Features</h2>
            <table border =1>
                <th>S.No.</th>
                <th>Image</th>
                <th>Feature Name</th>
                <th>Description</th>
                <th>Action</th>
            <!-- code to  display features data in table form  -->
            <?php require 'Admin_php/featureTable.php';?>
            </table>
        </section>
    </main>
</body>


<!-- to include common JS -->
<script src="common/commonAdminJS.js"></script>

<!-- script to close and open add facility modal  -->
<script>
    document.getElementById("addfacilitybtn").addEventListener("click", function(){
        document.getElementById("facilityModal").style.display =  "block";
    })

    // script to close modal when uer click x simbol
    document.getElementById("closeFacilityModal").addEventListener("click", function(){
        document.getElementById("facilityModal").style.display = "none";
    })

    // script to open feature modal
    document.getElementById("addfeaturebtn").addEventListener("click", function(){
        document.getElementById("featureModal").style.display =  "block";
    })

    // script to close modal when uer click x simbol
    document.getElementById("closeFeatureModal").addEventListener("click", function(){
        document.getElementById("featureModal").style.display = "none";
    })


    // to delete a facility 
    function deleteFacility(name) {
    if (confirm("Are you sure you want to delete this facility?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "deleteFacility.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    // Facility deleted successfully, you can perform any action here if needed
                    location.reload(); // Reload the page to reflect changes
                } else {
                    console.error('Error: ' + xhr.status);
                    // Handle error here if needed
                }
            }
        };
        xhr.send("name=" + encodeURIComponent(name)); // Send facility name
    }
}

</script>
</html>